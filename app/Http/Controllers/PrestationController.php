<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class PrestationController extends Controller
{
    public function index(Request $request)
    {
        $prestation = Announcement::where('jenis', 'prestasi');

        if ($request->has('filter')) {
            $dates = explode(' - ', $request->filter);
            if (count($dates) === 2) {
                $startDate = \Carbon\Carbon::createFromFormat('m/d/Y', $dates[0])->startOfDay();
                $endDate = \Carbon\Carbon::createFromFormat('m/d/Y', $dates[1])->endOfDay();

                $prestation->whereBetween('created_at', [$startDate, $endDate]);
            }
        }

        if ($request->has('title')) {
            $query = $request->title;
            if ($query != null) {
                $prestation->where('title', 'like', "%$query%");
            }
        }

        $prestation = $prestation->paginate(12);

        return view('admin.prestation.index', compact('prestation'));
    }
    public function index_prestation()
    {
        $prestation = Announcement::where('jenis', 'prestasi')
            ->where('status', 1)
            ->paginate(10);
        $recent = Announcement::orderBy('id', 'desc')
            ->take(4)
            ->get();
        return view('user.prestation.prestation', compact('prestation', 'recent'));
    }
    public function create()
    {
        return view('admin.prestation.create');
    }
    public function store(Request $request)
    {
        try {
            $validator = $request->validate([
                'title' => 'required|string|unique:class_articles',
                'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'photo2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'paragraf1' => 'required|string',
                'paragraf2' => 'required|string',
                'paragraf3' => 'string|required ',
                'repeater-group.*.area' => 'string|nullable',
                'video' => 'file|mimes:mp4,avi,wmv,mov|max:35000',
            ], [
                'title.required' => 'Kolom Judul harus diisi',
                'title.string' => 'Kolom Judul harus berupa teks',
                'photo.required' => 'Setiap file foto harus diisi',
                'title.unique' => 'judul sudah digunakan.',
                'photo.image' => 'Setiap file foto harus berupa gambar',
                'photo.mimes' => 'Format setiap file foto harus jpeg, png, atau jpg',
                'photo.max' => 'Ukuran setiap file foto maksimal 2048 KB',
                'photo2.image' => 'File foto2 harus berupa gambar',
                'photo2.mimes' => 'Format setiap file foto harus jpeg, png, atau jpg',
                'photo2.max' => 'Ukuran setiap file foto maksimal 2048 KB',
                'paragraf1.required' => 'Kolom Paragraf 1 harus diisi',
                'paragraf1.string' => 'Kolom Paragraf 1 harus berupa teks',
                'paragraf2.required' => 'Kolom Paragraf 2 harus diisi',
                'paragraf2.string' => 'Kolom Paragraf 2 harus berupa teks',
                'paragraf3.string' => 'Kolom Paragraf 3 harus berupa teks',
                'paragraf3.required' => 'Kolom Paragraf 3 harus diisi',
                'repeater-group.*.area.string' => 'Setiap Paragraf Bebas harus berupa teks',
                'video.file' => 'File video harus diisi',
                'video.mimes' => 'Format file video harus mp4, avi, wmv, atau mov',
                'video.max' => 'Ukuran file video maksimal 20480 KB',
            ]);
        } catch (ValidationException $e) {
            $validator = $e->validator;

            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', 'There are validation errors. Please check the form.');
        }

        $requestVideo = $request->file('video');
        $randomNameVideo = '';
        if ($requestVideo) {
            $extension = $requestVideo->getClientOriginalExtension();
            $randomNameVideo = uniqid() . '.' . $extension;
            $file1Path2 = $requestVideo->storeAs('public/announcement', $randomNameVideo);
        }


        $file1 = $request->file('photo2');
        $randomName2 = '';
        if ($file1) {
            $extension = $file1->getClientOriginalExtension();
            $randomName2 = uniqid() . '.' . $extension;
            $file1Path2 = $file1->storeAs('public/announcement', $randomName2);
        }

        $file1 = $request->file('photo');
        if ($file1) {
            $extension = $file1->getClientOriginalExtension();
            $randomName1 = uniqid() . '.' . $extension;
            $file1Path2 = $file1->storeAs('public/announcement', $randomName1);
        }




        $paragraf = [];

        $repeaterArea = $request->input('repeater-group') ?? [];


        foreach ($repeaterArea as $data) {
            if ($data && array_key_exists('area', $data)) {
                $area = $data['area'];
                $paragraf[] = [
                    $area,
                ];
            }
        }
        // $user = Auth::user();

        $userId = Auth::id();

        $announcement = new Announcement();
        $announcement->title = $request->input('title');
        $announcement->slug = Str::slug($request->input('title'));
        $announcement->paragraf1 = $request->input('paragraf1');
        $announcement->paragraf2 = $request->input('paragraf2');
        $announcement->paragraf3 = $request->input('paragraf3');
        $announcement->foto = $randomName2;
        $announcement->photo = $randomName1;
        $announcement->jenis = 'prestasi';
        $announcement->user_id = $userId;
        $announcement->video = $randomNameVideo;
        $announcement->more = $paragraf;
        $announcement->save();

        // dd($class);
        return redirect()->route('prestation.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $prestation = Announcement::findOrFail($id);
        $data = $prestation->more;

        return view('admin.prestation.edit', compact('prestation', 'data'));
    }

    public function update(Request $request, $id)
    {
        $announcement = Announcement::findOrFail($id);

        //pastikan dulu data yang dimbal harus berupa integer atau di jadikan integer
        $userId = (int) Auth::id();
        $UserId = (int) $announcement->user_id;

        if ($UserId === $userId || Auth::user()->role === 'Admin') {

            try {
                $validator = $request->validate([
                    'title' => 'required|string|unique:class_articles,title,' . $id,
                    'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
                    'photo2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                    'paragraf1' => 'required|string',
                    'paragraf2' => 'required|string',
                    'paragraf3' => 'string|required ',
                    'repeater-group.*.area' => 'string|nullable',
                    'video' => 'file|mimes:mp4,avi,wmv,mov|max:35000',
                ], [
                    'title.required' => 'Kolom Judul harus diisi',
                    'title.string' => 'Kolom Judul harus berupa teks',
                    'title.unique' => 'Judul sudah digunakan.',
                    'photo.image' => 'Setiap file foto harus berupa gambar',
                    'photo.mimes' => 'Format setiap file foto harus jpeg, png, atau jpg',
                    'photo.max' => 'Ukuran setiap file foto maksimal 2048 KB',
                    'photo2.image' => 'File foto2 harus berupa gambar',
                    'photo2.mimes' => 'Format setiap file foto harus jpeg, png, atau jpg',
                    'photo2.max' => 'Ukuran setiap file foto maksimal 2048 KB',
                    'paragraf1.required' => 'Kolom Paragraf 1 harus diisi',
                    'paragraf1.string' => 'Kolom Paragraf 1 harus berupa teks',
                    'paragraf2.required' => 'Kolom Paragraf 2 harus diisi',
                    'paragraf2.string' => 'Kolom Paragraf 2 harus berupa teks',
                    'paragraf3.string' => 'Kolom Paragraf 3 harus berupa teks',
                    'paragraf3.required' => 'Kolom Paragraf 3 harus di isi',
                    'repeater-group.*.area.string' => 'Setiap Paragraf Bebas harus berupa teks',
                    'video.file' => 'File video harus diisi',
                    'video.mimes' => 'Format file video harus mp4, avi, wmv, atau mov',
                    'video.max' => 'Ukuran file video maksimal 20480 KB',
                ]);
            } catch (ValidationException $e) {
                $validator = $e->validator;

                return redirect()->back()
                    ->withInput()
                    ->withErrors($validator)
                    ->with('error', 'There are validation errors. Please check the form.');
            }


            $paragraf = [];

            $repeaterArea = $request->input('repeater-group') ?? [];


            foreach ($repeaterArea as $data) {
                if ($data && array_key_exists('area', $data)) {
                    $area = $data['area'];
                    $paragraf[] = [
                        $area,
                    ];
                }
            }

            $announcement->title = $request->input('title');
            $announcement->slug = Str::slug($request->input('title'));
            $announcement->paragraf1 = $request->input('paragraf1');
            $announcement->paragraf2 = $request->input('paragraf2');
            $announcement->paragraf3 = $request->input('paragraf3');
            $announcement->more = $paragraf;

            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $randomName = uniqid() . '.' . $photo->getClientOriginalExtension();
                $photo->storeAs('public/announcement', $randomName);
                $announcement->photo = $randomName;
            }

            if ($request->hasFile('photo2')) {
                $photo2 = $request->file('photo2');
                $randomName2 = uniqid() . '.' . $photo2->getClientOriginalExtension();
                $photo2->storeAs('public/announcement', $randomName2);
                $announcement->photo2 = $randomName2;
            }

            if ($request->hasFile('video')) {
                $video = $request->file('video');
                $randomVideoName = uniqid() . '.' . $video->getClientOriginalExtension();
                $video->storeAs('public/announcement', $randomVideoName);
                $announcement->video = $randomVideoName;
            }

            $announcement->save();

            return redirect()->back()->with('success', 'Berita berhasil ditambahkan!');
        }

        return redirect()->back()
            ->withErrors('Anda tidak memiliki akses untuk menghapus')
            ->with('error', 'Gagal menghapus.');
    }
    public function destroy(string $id)
    {
        $announcement = Announcement::findOrFail($id);

        //pastikan dulu data yang dimbal harus berupa integer atau di jadikan integer
        $userId = (int) Auth::id();
        $classUserId = (int) $announcement->user_id;

        if ($classUserId === $userId || Auth::user()->role === 'Admin') {
            if ($announcement->video) {
                Storage::delete('public/anncouncement/' . $announcement->video);
            }

            if ($announcement->foto) {
                Storage::delete('public/anncouncement/' . $announcement->foto);
            }

            if ($announcement->photo) {
                Storage::delete('public/anncouncement/' . $announcement->photo);
            }

            $announcement->delete();

            return redirect()->back()->with('success', 'Data berhasil dihapus!');
        }

        return redirect()->back()
            ->withErrors('Anda tidak memiliki akses untuk menghapus')
            ->with('error', 'Gagal menghapus.');
    }
}
