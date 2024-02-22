<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\ClassArticle;
use App\Models\Ekstra;
use App\Models\EkstraArticle;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EkstraController extends Controller
{
    public function ekstra_index()
    {
        $ekstras = Ekstra::get();
        return view('admin.ekstra', compact('ekstras'));
    }

    public function index_ekstra()
    {
        $data_from_table2 = EkstraArticle::where('status', '1')->orderBy('created_at', 'desc')->take(1)->get();
        $prestation = Announcement::where('status', '1')->where('jenis', 'prestasi')->orderBy('created_at', 'desc')->take(1)->get();
        $announcement = Announcement::where('status', '1')->where('jenis', 'pengumuman')->orderBy('created_at', 'desc')->take(1)->get();

        $recents = $data_from_table2
            ->concat($prestation)
            ->concat($announcement);
        $ekstra = Ekstra::get();

        $ekstras = EkstraArticle::where('status', '1')->paginate(12);

        return view('user.ekstra.ekstra', compact('ekstras', 'recents', 'ekstra'));
    }

    public function show_index($name)
    {
        $data_from_table2 = EkstraArticle::where('status', '1')->orderBy('created_at', 'desc')->take(1)->get();
        $prestation = Announcement::where('status', '1')->where('jenis', 'prestasi')->orderBy('created_at', 'desc')->take(1)->get();
        $announcement = Announcement::where('status', '1')->where('jenis', 'pengumuman')->orderBy('created_at', 'desc')->take(1)->get();

        $recents = $data_from_table2
            ->concat($prestation)
            ->concat($announcement);
        $ekstra = Ekstra::get();
        $ekstras = EkstraArticle::where('status', '1')
            ->whereHas('name_ekstra', function ($query) use ($name) {
                $query->where('name', $name);
            })
            ->paginate(12);
        return view('user.ekstra.ekstra', compact('ekstras', 'recents', 'ekstra'));
    }
    public function shows($slug)
    {
        $item = EkstraArticle::where('slug', $slug)->firstOrFail();
        $moreParagraf = $item->more;

        $data_from_table1 = ClassArticle::where('status', '1')->orderBy('created_at', 'desc')->take(1)->get();
        $data_from_table2 = EkstraArticle::where('status', '1')->orderBy('created_at', 'desc')->take(1)->get();
        $prestation = Announcement::where('status', '1')->where('jenis', 'prestasi')->orderBy('created_at', 'desc')->take(1)->get();
        $announcement = Announcement::where('status', '1')->where('jenis', 'pengumuman')->orderBy('created_at', 'desc')->take(1)->get();

        $recents = $data_from_table1
            ->concat($data_from_table2)
            ->concat($prestation)
            ->concat($announcement);


        return   view('user.ekstra.show', compact('item', 'moreParagraf', 'recents'));
    }
    public function ekstra_create(Request $request)
    {
        try {
            $validator = $request->validate([
                'name' => 'required|string|max:255|unique:ekstras',
            ], [
                'name.required' => 'Nama harus diisi.',
                'name.string' => 'Nama harus berupa teks.',
                'name.max' => 'Nama tidak boleh lebih dari :max karakter.',
                'name.unique' => 'Nama sudah ada dalam basis data.',
            ]);
        } catch (ValidationException $e) {
            $validator = $e->validator;

            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', 'There are validation errors. Please check the form.');
        }

        $user = new Ekstra;
        $user->name = $request->name;

        $user->save();

        return redirect()->back()->with('success', 'Ekstra berhasil ditambahkan.');
    }


    public function ekstra_edit(Request $request, $id)
    {
        try {
            $ekstra = Ekstra::findOrFail($id);
            $validator = $request->validate([
                'name' => 'required|string|max:255',
            ], [
                'name.required' => 'Nama harus diisi.',
                'name.string' => 'Nama harus berupa teks.',
                'name.max' => 'Nama tidak boleh lebih dari :max karakter.',
            ]);
        } catch (ValidationException $e) {
            $validator = $e->validator;
            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', 'Error chek lagi form yang anda isi.');
        }
        $ekstra->name = $request->name;
        $ekstra->save();

        return redirect()->back()->with('success', 'User berhasil di perbarui.');
    }

    public function ekstra_destroy(string $id)
    {
        $ekstra = Ekstra::findOrFail($id);
        $isUsed = EkstraArticle::where('ekstra_id', $id)->exists();

        if ($isUsed) {
            return redirect()->back()->with('error', 'Data tidak bisa dihapus karena sedang digunakan!');
        }

        $ekstra->delete();
        return redirect()->back()->with('success', 'Pengguna berhasil dihapus!');
    }

    public function index(Request $request)
    {
        $ekstra = EkstraArticle::query();

        if ($request->has('ekstra')) {
            $ekstraId = $request->ekstra;
            if ($ekstraId != null) {
                $ekstra->where('ekstra_id', $ekstraId);
            } else {
                if ($request->has('filter')) {
                    $dates = explode(' - ', $request->filter);
                    if (count($dates) === 2) {
                        $startDate = \Carbon\Carbon::createFromFormat('m/d/Y', $dates[0])->startOfDay();
                        $endDate = \Carbon\Carbon::createFromFormat('m/d/Y', $dates[1])->endOfDay();

                        $ekstra->whereBetween('created_at', [$startDate, $endDate]);
                    }
                }

                if ($request->has('title')) {
                    $query = $request->title;
                    if ($query != null) {
                        $ekstra->where('title', 'like', "%$query%");
                    }
                }
            }
        }

        $ekstra = $ekstra->paginate(12);

        $ekstras = Ekstra::get();

        return view('admin.ekstra.index', compact('ekstra', 'ekstras'));
    }
    public function create()
    {
        $ekstras = Ekstra::get();
        return view('admin.ekstra.create', compact('ekstras'));
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
                'ekstra_id' => ['required', 'exists:ekstras,id'],
                'video' => 'file|mimes:mp4,avi,wmv,mov|max:35000',
            ], [
                'title.required' => 'Kolom Judul harus diisi',
                'title.string' => 'Kolom Judul harus berupa teks',
                'photo.required' => 'Setiap file foto harus diisi',
                'ekstra_id.required' => 'Ekstra harus di isi',
                'ekstra_id.exists' => 'Ekstra tidak ada',
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
            $file1Path2 = $requestVideo->storeAs('public/ekstra', $randomNameVideo);
        }


        $file1 = $request->file('photo2');
        $randomName2 = '';
        if ($file1) {
            $extension = $file1->getClientOriginalExtension();
            $randomName2 = uniqid() . '.' . $extension;
            $file1Path2 = $file1->storeAs('public/ekstra', $randomName2);
        }

        $file1 = $request->file('photo');
        if ($file1) {
            $extension = $file1->getClientOriginalExtension();
            $randomName1 = uniqid() . '.' . $extension;
            $file1Path2 = $file1->storeAs('public/ekstra', $randomName1);
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

        $ekstra = new EkstraArticle();
        $ekstra->title = $request->input('title');
        $ekstra->slug = Str::slug($request->input('title'));
        $ekstra->paragraf1 = $request->input('paragraf1');
        $ekstra->paragraf2 = $request->input('paragraf2');
        $ekstra->paragraf3 = $request->input('paragraf3');
        $ekstra->ekstra_id = $request->input('ekstra_id');
        $ekstra->foto = $randomName2;
        $ekstra->photo = $randomName1;
        $ekstra->user_id = $userId;
        $ekstra->video = $randomNameVideo;
        $ekstra->more = $paragraf;
        $ekstra->save();

        // dd($class);
        return redirect()->route('ekstra.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $ekstrakurikuler = EkstraArticle::findOrFail($id);
        $ekstras = Ekstra::get();
        $data = $ekstrakurikuler->more;

        return view('admin.ekstra.edit', compact('ekstrakurikuler', 'data', 'ekstras'));
    }

    public function update(Request $request, $id)
    {
        $ekstra = EkstraArticle::findOrFail($id);

        //pastikan dulu data yang dimbal harus berupa integer atau di jadikan integer
        $userId = (int) Auth::id();
        $UserId = (int) $ekstra->user_id;

        if ($UserId === $userId || Auth::user()->role === 'Admin') {

            try {
                $validator = $request->validate([
                    'title' => 'required|string|unique:class_articles,title,' . $id,
                    'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
                    'photo2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                    'paragraf1' => 'required|string',
                    'paragraf2' => 'required|string',
                    'paragraf3' => 'string|required ',
                    'ekstra_id' => ['required', 'exists:ekstras,id'],
                    'repeater-group.*.area' => 'string|nullable',
                    'video' => 'file|mimes:mp4,avi,wmv,mov|max:35000',
                ], [
                    'title.required' => 'Kolom Judul harus diisi',
                    'title.string' => 'Kolom Judul harus berupa teks',
                    'title.unique' => 'Judul sudah digunakan.',
                    'ekstra_id.required' => 'Ekstra harus di isi',
                    'ekstra_id.exists' => 'Ekstra tidak ada',
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

            $ekstra->title = $request->input('title');
            $ekstra->slug = Str::slug($request->input('title'));
            $ekstra->paragraf1 = $request->input('paragraf1');
            $ekstra->paragraf2 = $request->input('paragraf2');
            $ekstra->paragraf3 = $request->input('paragraf3');
            $ekstra->ekstra_id = $request->input('ekstra_id');
            $ekstra->more = $paragraf;

            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $randomName = uniqid() . '.' . $photo->getClientOriginalExtension();
                $photo->storeAs('public/ekstra', $randomName);
                $ekstra->photo = $randomName;
            }

            if ($request->hasFile('photo2')) {
                $photo2 = $request->file('photo2');
                $randomName2 = uniqid() . '.' . $photo2->getClientOriginalExtension();
                $photo2->storeAs('public/ekstra', $randomName2);
                $ekstra->photo2 = $randomName2;
            }

            if ($request->hasFile('video')) {
                $video = $request->file('video');
                $randomVideoName = uniqid() . '.' . $video->getClientOriginalExtension();
                $video->storeAs('public/ekstra', $randomVideoName);
                $ekstra->video = $randomVideoName;
            }

            $ekstra->save();

            return redirect()->route('ekstra.index')->with('success', 'Berita berhasil ditambahkan!');
        }

        return redirect()->back()
            ->withErrors('Anda tidak memiliki akses untuk menghapus')
            ->with('error', 'Gagal menghapus.');
    }
    public function destroy(string $id)
    {
        $ekstra = Ekstra::findOrFail($id);

        //pastikan dulu data yang dimbal harus berupa integer atau di jadikan integer
        $userId = (int) Auth::id();
        $classUserId = (int) $ekstra->user_id;

        if ($classUserId === $userId || Auth::user()->role === 'Admin') {
            if ($ekstra->video) {
                Storage::delete('public/anncouncement/' . $ekstra->video);
            }

            if ($ekstra->foto) {
                Storage::delete('public/anncouncement/' . $ekstra->foto);
            }

            if ($ekstra->photo) {
                Storage::delete('public/anncouncement/' . $ekstra->photo);
            }

            $ekstra->delete();

            return redirect()->back()->with('success', 'Data berhasil dihapus!');
        }

        return redirect()->back()
            ->withErrors('Anda tidak memiliki akses untuk menghapus')
            ->with('error', 'Gagal menghapus.');
    }
}
