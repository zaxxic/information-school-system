<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\ClassArticle;
use App\Models\EkstraArticle;
use App\Models\Greeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class InformationController extends Controller
{
    public function home()
    {
        $prestation = Announcement::where('jenis', 'prestasi')->pluck('created_at')->last();
        $prestation_count = Announcement::where('jenis', 'prestasi')->pluck('created_at')->count();

        $announcement = Announcement::where('jenis', 'pengumuman')->pluck('created_at')->last();
        $announcement_count = Announcement::where('jenis', 'pengumuman')->pluck('created_at')->count();


        $class = ClassArticle::latest()->first();
        $class_count = ClassArticle::pluck('created_at')->count();

        
        $ekstra = EkstraArticle::latest()->first();
        $ekstra_count = EkstraArticle::pluck('created_at')->count();


        return view('admin.home', compact('prestation', 'prestation_count', 'announcement', 'announcement_count', 'class', 'class_count','ekstra', 'ekstra_count'));
    }

    public function  admin_greeting()
    {
        // dd($greeting);
        $greeting = Greeting::where('jenis', 'greeting')->first();
        return view('admin.info.greeting', compact('greeting'));
    }
    public function update_greeting(Request $request)
    {
        $greeting = Greeting::where('jenis', 'greeting')->first();
        try {
            $validator = $request->validate([
                'paragraf1' => 'required|string',
                'paragraf2' => 'required|string',
                'paragraf3' => 'string|nullable',
                'paragraf4' => 'string|nullable',
                'quote' => 'max:255',
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ], [
                'paragraf1.required' => 'Kolom paragraf 1 wajib diisi.',
                'paragraf2.required' => 'Kolom paragraf 2 wajib diisi.',
                'paragraf3.string' => 'Kolom paragraf 3 harus berupa teks.',
                'paragraf4.string' => 'Kolom paragraf 4 harus berupa teks.',
                'quote.max' => 'Panjang kutipan tidak boleh melebihi 255 karakter.',
                'photo.image' => 'Berkas yang diunggah harus berupa gambar.',
                'photo.mimes' => 'Format gambar yang diunggah harus jpeg, png, jpg, atau gif.',
                'photo.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB.',
            ]);
        } catch (ValidationException $e) {
            $validator = $e->validator;

            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', 'Error chek lagi form yang anda isi.');
        }

        if (!$greeting) {
            return redirect()->back()->with('error', 'Data Greeting tidak ditemukan.');
        }

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $randomNamePhoto = uniqid() . '.' . $extension;
            $file->storeAs('public/information', $randomNamePhoto);

            if ($greeting->photo) {
                Storage::delete('public/information/' . $greeting->photo);
            }

            $greeting->photo = $randomNamePhoto;
        }

        $greeting->paragraf1 = $request->paragraf1;
        $greeting->paragraf2 = $request->paragraf2;
        $greeting->paragraf3 = $request->paragraf3;
        $greeting->paragraf4 = $request->paragraf4;
        $greeting->quote = $request->quote;
        $greeting->jenis = 'greeting';

        $greeting->save();

        return redirect()->back()->with('success', 'Data berhasil di perbarui.');
    }
    public function index_greeting()
    {
        $greeting = Greeting::where('jenis', 'greeting')->first();

        return view('user.information.greeting', compact('greeting'));
    }



    public function  admin_history()
    {
        $history = Greeting::where('jenis', 'history')->first();
        // dd($history);
        return view('admin.info.history', compact('history'));
    }

    public function  index_history()
    {
        // dd($greeting);
        $history = Greeting::where('jenis', 'history')->first();
        return view('user.information.history', compact('history'));
    }

    public function update_history(Request $request)
    {
        $history = Greeting::where('jenis', 'history')->first();
        try {
            $validator = $request->validate([
                'paragraf1' => 'required|string',
                'paragraf2' => 'required|string',
                'paragraf3' => 'required|string',
                'paragraf4' => 'string|nullable',
                'paragraf5' => 'string|nullable',
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'photo2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ], [
                'paragraf1.required' => 'Kolom paragraf 1 wajib diisi.',
                'paragraf2.required' => 'Kolom paragraf 2 wajib diisi.',
                'paragraf3.required' => 'Kolom paragraf 3 wajib diisi.',
                'photo.required' => 'Kolom foto wajib diisi.',
                'photo.image' => 'Berkas yang diunggah harus berupa gambar.',
                'photo.mimes' => 'Format gambar yang diunggah harus jpeg, png, jpg, atau gif.',
                'photo.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB.',
                'photo2.image' => 'Berkas yang diunggah harus berupa gambar.',
                'photo2.mimes' => 'Format gambar yang diunggah harus jpeg, png, jpg, atau gif.',
                'photo2.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB.',
            ]);
        } catch (ValidationException $e) {
            $validator = $e->validator;

            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', 'Error chek lagi form yang anda isi.');
        }

        if (!$history) {
            return redirect()->back()->with('error', 'Data Greeting tidak ditemukan.');
        }

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $randomNamePhoto = uniqid() . '.' . $extension;
            $file->storeAs('public/information', $randomNamePhoto);

            if ($history->photo) {
                Storage::delete('public/information/' . $history->photo);
            }

            $history->photo = $randomNamePhoto;
        }

        if ($request->hasFile('photo2')) {
            $file = $request->file('photo2');
            $extension = $file->getClientOriginalExtension();
            $randomNamePhoto2 = uniqid() . '.' . $extension;
            $file->storeAs('public/information', $randomNamePhoto2);

            if ($history->photo2) {
                Storage::delete('public/information/' . $history->photo2);
            }

            $history->photo2 = $randomNamePhoto2;
        }

        $history->paragraf1 = $request->paragraf1;
        $history->paragraf2 = $request->paragraf2;
        $history->paragraf3 = $request->paragraf3;
        $history->paragraf4 = $request->paragraf4;
        $history->paragraf5 = $request->paragraf5;
        $history->jenis = 'history';

        $history->save();

        return redirect()->back()->with('success', 'Data berhasil di perbarui.');
    }

    public function  index_visi()
    {
        // dd($greeting);
        $visi = Greeting::where('jenis', 'visi')->first();
        $data = json_decode($visi->text);

        return view('user.information.visi', compact('visi', 'data'));
    }

    public function  admin_visi()
    {
        // dd($greeting);
        $visi = Greeting::where('jenis', 'visi')->first();
        $data = json_decode($visi->text);

        return view('admin.info.visi', compact('visi', 'data'));
    }

    public function update_visi(Request $request)
    {
        $history = Greeting::where('jenis', 'visi')->first();
        try {
            $validator = $request->validate([
                'paragraf1' => 'required|string',
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'repeater-group.*.area' => 'required|string|required_with:repeater-group.*',
            ], [
                'paragraf1.required' => 'Kolom paragraf 1 wajib diisi.',
                'photo.image' => 'Berkas yang diunggah harus berupa gambar.',
                'photo.mimes' => 'Format gambar yang diunggah harus jpeg, png, jpg, atau gif.',
                'photo.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB.',
                'repeater-group.*.area.required' => 'Kolom area pada setiap item repeater wajib diisi.',
                'repeater-group.*.area.not_in' => 'Kolom area pada setiap item repeater tidak valid.',
                'repeater-group.*.area.string' => 'Kolom area pada setiap item repeater harus berupa teks.',
                'repeater-group.*.area.required_with' => 'Kolom area pada setiap item repeater wajib diisi.',


            ]);
        } catch (ValidationException $e) {
            $validator = $e->validator;

            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', 'Error chek lagi form yang anda isi.');
        }

        if (!$history) {
            return redirect()->back()->with('error', 'Data Greeting tidak ditemukan.');
        }

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $randomNamePhoto = uniqid() . '.' . $extension;
            $file->storeAs('public/information', $randomNamePhoto);

            if ($history->photo) {
                Storage::delete('public/information/' . $history->photo);
            }

            $history->photo = $randomNamePhoto;
        }
        $repeaterArea = $request->input('repeater-group') ?? [];
        // dd($repeaterArea);

        $paragraf = [];



        foreach ($repeaterArea as $data) {
            if ($data && array_key_exists('area', $data)) {
                $area = $data['area'];
                $paragraf[] = [
                    $area,
                ];
            }
        }
        $history->paragraf1 = $request->paragraf1;
        $history->text = $paragraf;
        $history->jenis = 'visi';

        $history->save();

        return redirect()->back()->with('success', 'Data berhasil di perbarui.');
    }

    public function  admin_contact()
    {
        $contact = Greeting::where('jenis', 'contact')->first();
        // dd($contact);
        return view('admin.info.contact', compact('contact'));
    }
    public function update_contact(Request $request)
    {
        $history = Greeting::where('jenis', 'contact')->first();
        try {
            $validator = $request->validate([
                'paragraf1' => 'required|string',
                'paragraf2' => 'required|string|email',
                'paragraf3' => 'required|string',
                'paragraf4' => 'nullable|numeric',
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ], [
                'paragraf1.required' => 'Lokasi wajib diisi.',
                'paragraf2.required' => 'Email wajib diisi.',
                'paragraf2.email' => 'Isikan dengan email yang benar.',
                'paragraf3.required' => 'Isi nama penghubung.',
                'paragraf4.numeric' => 'Isikan dengan angka.',
                'photo.image' => 'Berkas yang diunggah harus berupa gambar.',
                'photo.mimes' => 'Format gambar yang diunggah harus jpeg, png, jpg, atau gif.',
                'photo.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB.',
            ]);
        } catch (ValidationException $e) {
            $validator = $e->validator;

            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', 'Error cek lagi form yang anda isi.');
        }


        if (!$history) {
            return redirect()->back()->with('error', 'Data Greeting tidak ditemukan.');
        }

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $randomNamePhoto = uniqid() . '.' . $extension;
            $file->storeAs('public/information', $randomNamePhoto);

            if ($history->photo) {
                Storage::delete('public/information/' . $history->photo);
            }

            $history->photo = $randomNamePhoto;
        }

        $history->paragraf1 = $request->paragraf1;
        $history->paragraf2 = $request->paragraf2;
        $history->paragraf3 = $request->paragraf3;
        $history->paragraf4 = $request->paragraf4;
        $history->jenis = 'contact';

        $history->save();

        return redirect()->back()->with('success', 'Data berhasil di perbarui.');
    }
    public function index_kontak()
    {
        $kontak = Greeting::where('jenis', 'contact')->first();
        // dd($kontak);
        return view('user.information.contact', compact('kontak'));
    }
}
