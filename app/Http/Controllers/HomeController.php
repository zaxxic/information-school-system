<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\ClassArticle;
use App\Models\EkstraArticle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $announcement = Announcement::where('jenis', 'pengumuman')
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        // dd($announcement);
        $prestation = Announcement::where('jenis', 'prestasi')
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        $ekstra = EkstraArticle ::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();
        $class1 = ClassArticle::where('class_category_id', '1')->where('status', 1)->latest()->first();
        $class2 = ClassArticle::where('class_category_id', '2')->where('status', 1)->latest()->first();
        $class3 = ClassArticle::where('class_category_id', '3')->where('status', 1)->latest()->first();
        $class4 = ClassArticle::where('class_category_id', '4')->where('status', 1)->latest()->first();
        $class5 = ClassArticle::where('class_category_id', '5')->where('status', 1)->latest()->first();
        $class6 = ClassArticle::where('class_category_id', '6')->where('status', 1)->latest()->first();

        return view('user.home', compact('announcement', 'prestation', 'class1', 'class2', 'class3', 'class4', 'class5', 'class6','ekstra'));
    }
}
