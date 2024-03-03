<?php

namespace App\Http\Controllers;

use App\Models\ClassArticle;
use Illuminate\Http\Request;

class ClassUserController extends Controller
{

    public function class()
    {
        $classes = ClassArticle::where('status', 1)->orderBy('id', 'desc')->paginate(10);
        $recent = ClassArticle::orderBy('id', 'desc')
            ->where('status',1)
            ->take(4)
            ->get();
        return view('user.class.class', compact('classes', 'recent'));
    }
    public function class1()
    {
        $classes = ClassArticle::where('status', 1)->where('class_category_id', 1)->orderBy('id', 'desc')->paginate(10);
        $recent = ClassArticle::orderBy('id', 'desc')
            ->where('status',1)
            ->take(4)
            ->get();
        return view('user.class.class1', compact('classes', 'recent'));
    }

    public function class2()
    {
        $classes = ClassArticle::where('status', 1)->where('class_category_id', 2)->orderBy('id', 'desc')->paginate(10);
        $recent = ClassArticle::orderBy('id', 'desc')
            ->where('status',1)
            ->take(4)
            ->get();
        return view('user.class.class2', compact('classes', 'recent'));
    }
    public function class3()
    {
        $classes = ClassArticle::where('status', 1)->where('class_category_id', 3)->orderBy('id', 'desc')->paginate(10);
        $recent = ClassArticle::orderBy('id', 'desc')
            ->where('status',1)
            ->take(4)
            ->get();
        return view('user.class.class3', compact('classes', 'recent'));
    }
    public function class4()
    {
        $classes = ClassArticle::where('status', 1)->where('class_category_id', 4)->orderBy('id', 'desc')->paginate(10);
        $recent = ClassArticle::orderBy('id', 'desc')
            ->where('status',1)
            ->take(4)
            ->get();
        return view('user.class.class4', compact('classes', 'recent'));
    }
    public function class5()
    {
        $classes = ClassArticle::where('status', 1)->where('class_category_id', 5)->orderBy('id', 'desc')->paginate(10);
        $recent = ClassArticle::orderBy('id', 'desc')
            ->where('status',1)
            ->take(4)
            ->get();
        return view('user.class.class5', compact('classes', 'recent'));
    }
    public function class6()
    {
        $classes = ClassArticle::where('status', 1)->where('class_category_id', 6)->orderBy('id', 'desc')->paginate(10);
        $recent = ClassArticle::orderBy('id', 'desc')
            ->where('status',1)
            ->take(4)
            ->get();
        return view('user.class.class6', compact('classes', 'recent'));
    }



    public function show($id, $slug)
    {
        // dd('das');
        $item = ClassArticle::where('slug', $slug)->firstOrFail();
        $moreParagraf = $item->more;
        $routeId = $item->class_category_id;
        $recent = ClassArticle::orderBy('id', 'desc')
            ->where('status',1)
            ->take(4)
            ->get();
        return view('user.class.detailkelas', compact('item', 'moreParagraf', 'routeId', 'recent'));
    }
}
