<?php

namespace App\Http\Controllers;

use App\Models\ClassArticle;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class Class1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index1(Request $request)
    {

        $clasQuery = ClassArticle::where('class_category_id', 1);

        if ($request->has('filter')) {
            $dates = explode(' - ', $request->filter);
            if (count($dates) === 2) {
                $startDate = \Carbon\Carbon::createFromFormat('m/d/Y', $dates[0])->startOfDay();
                $endDate = \Carbon\Carbon::createFromFormat('m/d/Y', $dates[1])->endOfDay();

                $clasQuery->whereBetween('created_at', [$startDate, $endDate]);
            }
        }

        if ($request->has('title')) {
            $query = $request->title;
            if ($query != null) {
                $clasQuery->where('title', 'like', "%$query%");
            }
        }

        $classes = $clasQuery->orderBy('created_at')->paginate(12);
        return view('admin.kelas.class1', compact('classes'));
    }

    public function teacher(Request $request)
    {
        $userRoles = Auth::user()->role;

        $clasQuery = ClassArticle::where('class_category_id', $userRoles);

        if ($request->has('filter')) {
            $dates = explode(' - ', $request->filter);
            if (count($dates) === 2) {
                $startDate = \Carbon\Carbon::createFromFormat('m/d/Y', $dates[0])->startOfDay();
                $endDate = \Carbon\Carbon::createFromFormat('m/d/Y', $dates[1])->endOfDay();

                $clasQuery->whereBetween('created_at', [$startDate, $endDate]);
            }
        }

        if ($request->has('title')) {
            $query = $request->title;
            if ($query != null) {
                $clasQuery->where('title', 'like', "%$query%");
            }
        }

        $classes = $clasQuery->orderBy('created_at')->paginate(12);
        return view('admin.kelas.kelas', compact('classes'));
    }


    public function index2(Request $request)
    {



        $clasQuery = ClassArticle::where('class_category_id', 2);

        if ($request->has('filter')) {
            $dates = explode(' - ', $request->filter);
            if (count($dates) === 2) {
                $startDate = \Carbon\Carbon::createFromFormat('m/d/Y', $dates[0])->startOfDay();
                $endDate = \Carbon\Carbon::createFromFormat('m/d/Y', $dates[1])->endOfDay();

                $clasQuery->whereBetween('created_at', [$startDate, $endDate]);
            }
        }

        if ($request->has('title')) {
            $query = $request->title;
            if ($query != null) {
                $clasQuery->where('title', 'like', "%$query%");
            }
        }

        $classes = $clasQuery->orderBy('created_at')->paginate(12);

        return view('admin.kelas.class2', compact('classes'));
    }

    public function index3(Request $request)
    {
        $clasQuery = ClassArticle::where('class_category_id', 3);

        if ($request->has('filter')) {
            $dates = explode(' - ', $request->filter);
            if (count($dates) === 2) {
                $startDate = \Carbon\Carbon::createFromFormat('m/d/Y', $dates[0])->startOfDay();
                $endDate = \Carbon\Carbon::createFromFormat('m/d/Y', $dates[1])->endOfDay();

                $clasQuery->whereBetween('created_at', [$startDate, $endDate]);
            }
        }

        if ($request->has('title')) {
            $query = $request->title;
            if ($query != null) {
                $clasQuery->where('title', 'like', "%$query%");
            }
        }

        $classes = $clasQuery->orderBy('created_at')->paginate(12);

        return view('admin.kelas.class3', compact('classes'));
    }

    public function index4(Request $request)
    {
        $clasQuery = ClassArticle::where('class_category_id', 4);

        if ($request->has('filter')) {
            $dates = explode(' - ', $request->filter);
            if (count($dates) === 2) {
                $startDate = \Carbon\Carbon::createFromFormat('m/d/Y', $dates[0])->startOfDay();
                $endDate = \Carbon\Carbon::createFromFormat('m/d/Y', $dates[1])->endOfDay();

                $clasQuery->whereBetween('created_at', [$startDate, $endDate]);
            }
        }

        if ($request->has('title')) {
            $query = $request->title;
            if ($query != null) {
                $clasQuery->where('title', 'like', "%$query%");
            }
        }

        $classes = $clasQuery->orderBy('created_at')->paginate(12);
        return view('admin.kelas.class4', compact('classes'));
    }

    public function index5(Request $request)
    {
        $clasQuery = ClassArticle::where('class_category_id', 5);

        if ($request->has('filter')) {
            $dates = explode(' - ', $request->filter);
            if (count($dates) === 2) {
                $startDate = \Carbon\Carbon::createFromFormat('m/d/Y', $dates[0])->startOfDay();
                $endDate = \Carbon\Carbon::createFromFormat('m/d/Y', $dates[1])->endOfDay();

                $clasQuery->whereBetween('created_at', [$startDate, $endDate]);
            }
        }

        if ($request->has('title')) {
            $query = $request->title;
            if ($query != null) {
                $clasQuery->where('title', 'like', "%$query%");
            }
        }

        $classes = $clasQuery->orderBy('created_at')->paginate(12);
        return view('admin.kelas.class5', compact('classes'));
    }

    public function index6(Request $request)
    {
        $clasQuery = ClassArticle::where('class_category_id', 6);

        if ($request->has('filter')) {
            $dates = explode(' - ', $request->filter);
            if (count($dates) === 2) {
                $startDate = \Carbon\Carbon::createFromFormat('m/d/Y', $dates[0])->startOfDay();
                $endDate = \Carbon\Carbon::createFromFormat('m/d/Y', $dates[1])->endOfDay();

                $clasQuery->whereBetween('created_at', [$startDate, $endDate]);
            }
        }

        if ($request->has('title')) {
            $query = $request->title;
            if ($query != null) {
                $clasQuery->where('title', 'like', "%$query%");
            }
        }

        $classes = $clasQuery->orderBy('created_at')->paginate(12);
        return view('admin.kelas.class6', compact('classes'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kelas.create-clasess');
    }

    public function create_class()
    {
        return view('admin.kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = $request->validate([
                'title' => 'required|string|unique:class_articles',
                'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'photo2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'paragraf1' => 'required|string',
                'class_category_id' => 'required|in:1,2,3,4,5,6',
                'paragraf2' => 'required|string',
                'paragraf3' => 'string|required ',
                'repeater-group.*.area' => 'string|nullable',
                'video' => 'file|mimes:mp4,avi,wmv,mov|max:35000',
            ], [
                'title.required' => 'Kolom Judul harus diisi',
                'title.string' => 'Kolom Judul harus berupa teks',
                'photo.required' => 'Setiap file foto harus diisi',
                'class_category_id.required' => 'Kelas harus di isi',
                'class_category_id.in' => 'Kelas hanya di antara 1,2,3,4,5,6',
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
            $file1Path2 = $requestVideo->storeAs('public/kelas1', $randomNameVideo);
        }


        $file1 = $request->file('photo2');
        $randomName2 = '';
        if ($file1) {
            $extension = $file1->getClientOriginalExtension();
            $randomName2 = uniqid() . '.' . $extension;
            $file1Path2 = $file1->storeAs('public/kelas1', $randomName2);
        }

        $file1 = $request->file('photo');
        if ($file1) {
            $extension = $file1->getClientOriginalExtension();
            $randomName1 = uniqid() . '.' . $extension;
            $file1Path2 = $file1->storeAs('public/kelas1', $randomName1);
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
        $ClassArticle = new ClassArticle();
        $userId = Auth::id();
        // $user = User::find($userId);
        // if ($user->role === 'Admin') {
        //     $ClassArticle->status = 1;
        // }

        $ClassArticle->title = $request->input('title');
        // $ClassArticle->class_category_id = '1';
        $ClassArticle->class_category_id = $request->input('class_category_id');
        $ClassArticle->slug = Str::slug($request->input('title'));
        $ClassArticle->photo = $randomName1;
        $ClassArticle->paragraf1 = $request->input('paragraf1');
        $ClassArticle->paragraf2 = $request->input('paragraf2');
        $ClassArticle->paragraf3 = $request->input('paragraf3');
        $ClassArticle->foto = $randomName2;
        $ClassArticle->status = 1;
        $ClassArticle->user_id = $userId;
        $ClassArticle->video = $randomNameVideo;
        $ClassArticle->more = $paragraf;
        $ClassArticle->save();





        $class = $request->input('class_category_id');
        // dd($class);
        if ($class == 1) {
            $ClassArticle->save();
            return redirect()->route('kelas1.index')->with('success', 'Berita berhasil ditambahkan!');
        } elseif ($class == 2) {
            return redirect()->route('kelas2.index')->with('success', 'Berita berhasil ditambahkan!');
        } elseif ($class == 3) {
            return redirect()->route('kelas3.index')->with('success', 'Berita berhasil ditambahkan!');
        } elseif ($class == 4) {
            return redirect()->route('kelas4.index')->with('success', 'Berita berhasil ditambahkan!');
        } elseif ($class == 5) {
            return redirect()->route('kelas5.index')->with('success', 'Berita berhasil ditambahkan!');
        } elseif ($class == 6) {
            return redirect()->route('kelas6.index')->with('success', 'Berita berhasil ditambahkan!');
        } else {
            return "kok";
        }
    }

    public function create_class_teacher()
    {
        return view('admin.kelas.createGuru');
    }

    public function store_teacher(Request $request)
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
            $file1Path2 = $requestVideo->storeAs('public/kelas1', $randomNameVideo);
        }


        $file1 = $request->file('photo2');
        $randomName2 = '';
        if ($file1) {
            $extension = $file1->getClientOriginalExtension();
            $randomName2 = uniqid() . '.' . $extension;
            $file1Path2 = $file1->storeAs('public/kelas1', $randomName2);
        }

        $file1 = $request->file('photo');
        if ($file1) {
            $extension = $file1->getClientOriginalExtension();
            $randomName1 = uniqid() . '.' . $extension;
            $file1Path2 = $file1->storeAs('public/kelas1', $randomName1);
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
        $ClassArticle = new ClassArticle();
        $userRoles = Auth::user()->role;
        $userId = Auth::id();

        $ClassArticle->title = $request->input('title');
        $ClassArticle->class_category_id = $userRoles;
        $ClassArticle->slug = Str::slug($request->input('title'));
        $ClassArticle->photo = $randomName1;
        $ClassArticle->paragraf1 = $request->input('paragraf1');
        $ClassArticle->paragraf2 = $request->input('paragraf2');
        $ClassArticle->paragraf3 = $request->input('paragraf3');
        $ClassArticle->foto = $randomName2;
        $ClassArticle->user_id = $userId;
        $ClassArticle->video = $randomNameVideo;
        $ClassArticle->more = $paragraf;
        $ClassArticle->save();

        return redirect()->route('teacher.index')->with('success', 'Berita berhasil ditambahkan!');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $class = ClassArticle::findOrFail($id);
        $data = $class->more;

        return view('admin.kelas.edit-kelas', compact('class', 'data'));
    }

    public function edit_teacher(string $id)
    {
        $class = ClassArticle::findOrFail($id);
        $data = $class->more;

        return view('admin.kelas.editGuru', compact('class', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $classArticle = ClassArticle::findOrFail($id);


        //pastikan dulu data yang dimbal harus berupa integer atau di jadikan integer
        $userId = (int) Auth::id();
        $classUserId = (int) $classArticle->user_id;

        if ($classUserId === $userId || Auth::user()->role === 'Admin') {
            try {
                $validator = $request->validate([
                    'title' => 'required|string|unique:class_articles,title,' . $id,
                    'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
                    'photo2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                    'paragraf1' => 'required|string',
                    'class_category_id' => 'required|in:1,2,3,4,5,6',
                    'paragraf2' => 'required|string',
                    'paragraf3' => 'string|required ',
                    'repeater-group.*.area' => 'string|nullable',
                    'video' => 'file|mimes:mp4,avi,wmv,mov|max:35000',
                ], [
                    'title.required' => 'Kolom Judul harus diisi',
                    'title.string' => 'Kolom Judul harus berupa teks',
                    'class_category_id.required' => 'Kelas harus di isi',
                    'class_category_id.in' => 'Kelas hanya di antara 1,2,3,4,5,6',
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

            $classArticle->title = $request->input('title');
            $classArticle->class_category_id = $request->input('class_category_id');
            $classArticle->slug = Str::slug($request->input('title'));
            $classArticle->paragraf1 = $request->input('paragraf1');
            $classArticle->paragraf2 = $request->input('paragraf2');
            $classArticle->paragraf3 = $request->input('paragraf3');
            $classArticle->more = $paragraf;

            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $randomName = uniqid() . '.' . $photo->getClientOriginalExtension();
                $photo->storeAs('public/kelas1', $randomName);
                $classArticle->photo = $randomName;
            }

            if ($request->hasFile('photo2')) {
                $photo2 = $request->file('photo2');
                $randomName2 = uniqid() . '.' . $photo2->getClientOriginalExtension();
                $photo2->storeAs('public/kelas1', $randomName2);
                $classArticle->foto = $randomName2;
            }

            if ($request->hasFile('video')) {
                $video = $request->file('video');
                $randomVideoName = uniqid() . '.' . $video->getClientOriginalExtension();
                $video->storeAs('public/kelas1', $randomVideoName);
                $classArticle->video = $randomVideoName;
            }

            $classArticle->save();

            $class = $request->input('class_category_id');
            // dd($class);
            if ($class == 1) {
                return redirect()->route('kelas1.index')->with('success', 'Berita berhasil ditambahkan!');
            } elseif ($class == 2) {
                return redirect()->route('kelas2.index')->with('success', 'Berita berhasil ditambahkan!');
            } elseif ($class == 3) {
                return redirect()->route('kelas3.index')->with('success', 'Berita berhasil ditambahkan!');
            } elseif ($class == 4) {
                return redirect()->route('kelas4.index')->with('success', 'Berita berhasil ditambahkan!');
            } elseif ($class == 5) {
                return redirect()->route('kelas5.index')->with('success', 'Berita berhasil ditambahkan!');
            } elseif ($class == 6) {
                return redirect()->route('kelas6.index')->with('success', 'Berita berhasil ditambahkan!');
            } else {
                return "kok";
            }
        }

        return redirect()->back()
            ->withErrors('Anda tidak memiliki akses untuk edit data ini')
            ->with('error', 'Gagal edit data ini.');
    }
    public function update_teacher(Request $request, $id)
    {
        $classArticle = ClassArticle::findOrFail($id);

        $userId = (int) Auth::id();
        $classUserId = (int) $classArticle->user_id;

        if ($classUserId === $userId || Auth::user()->role === 'Admin') {
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
            $userRoles = Auth::user()->role;

            $classArticle->title = $request->input('title');
            $classArticle->class_category_id = $userRoles;
            $classArticle->slug = Str::slug($request->input('title'));
            $classArticle->paragraf1 = $request->input('paragraf1');
            $classArticle->paragraf2 = $request->input('paragraf2');
            $classArticle->paragraf3 = $request->input('paragraf3');
            $classArticle->more = $paragraf;

            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $randomName = uniqid() . '.' . $photo->getClientOriginalExtension();
                $photo->storeAs('public/kelas1', $randomName);
                $classArticle->photo = $randomName;
            }

            if ($request->hasFile('photo2')) {
                $photo2 = $request->file('photo2');
                $randomName2 = uniqid() . '.' . $photo2->getClientOriginalExtension();
                $photo2->storeAs('public/kelas1', $randomName2);
                $classArticle->foto = $randomName2;
            }

            if ($request->hasFile('video')) {
                $video = $request->file('video');
                $randomVideoName = uniqid() . '.' . $video->getClientOriginalExtension();
                $video->storeAs('public/kelas1', $randomVideoName);
                $classArticle->video = $randomVideoName;
            }

            $classArticle->save();

            return redirect()->route('teacher.index')->with('success', 'Berita berhasil ditambahkan!');
        }

        return redirect()->back()
            ->withErrors('Anda tidak memiliki akses untuk edit data ini')
            ->with('error', 'Gagal edit data ini.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $classArticle = ClassArticle::findOrFail($id);

        //pastikan dulu data yang dimbal harus berupa integer atau di jadikan integer
        $userId = (int) Auth::id();
        $classUserId = (int) $classArticle->user_id;

        if ($classUserId === $userId || Auth::user()->role === 'Admin') {
            if ($classArticle->video) {
                Storage::delete('public/kelas1/' . $classArticle->video);
            }

            if ($classArticle->foto) {
                Storage::delete('public/kelas1/' . $classArticle->foto);
            }

            if ($classArticle->photo) {
                Storage::delete('public/kelas1/' . $classArticle->photo);
            }

            $classArticle->delete();

            return redirect()->back()->with('success', 'Data berhasil dihapus!');
        }

        return redirect()->back()
            ->withErrors('Anda tidak memiliki akses untuk menghapus')
            ->with('error', 'Gagal menghapus.');
    }
}
