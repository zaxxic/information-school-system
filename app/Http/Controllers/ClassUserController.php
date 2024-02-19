<?php

namespace App\Http\Controllers;

use App\Models\ClassArticle;
use Illuminate\Http\Request;

class ClassUserController extends Controller
{
    public function class1()
    {
        $classes = ClassArticle::where('class_category_id', 1)->paginate(2);
        $recent = ClassArticle::orderBy('id', 'desc')
            ->take(4)
            ->get();
        return view('user.class.class1', compact('classes', 'recent'));
    }

    public function class2()
    {
        $classes = ClassArticle::where('class_category_id', 2)->paginate(2);
        $recent = ClassArticle::orderBy('id', 'desc')
            ->take(4)
            ->get();
        return view('user.class.class2', compact('classes', 'recent'));
    }
    public function class3()
    {
        $classes = ClassArticle::where('class_category_id', 3)->paginate(2);
        $recent = ClassArticle::orderBy('id', 'desc')
            ->take(4)
            ->get();
        return view('user.class.class3', compact('classes', 'recent'));
    }
    public function class4()
    {
        $classes = ClassArticle::where('class_category_id', 4)->paginate(2);
        $recent = ClassArticle::orderBy('id', 'desc')
            ->take(4)
            ->get();
        return view('user.class.class4', compact('classes', 'recent'));
    }
    public function class5()
    {
        $classes = ClassArticle::where('class_category_id', 5)->paginate(2);
        $recent = ClassArticle::orderBy('id', 'desc')
            ->take(4)
            ->get();
        return view('user.class.class5', compact('classes', 'recent'));
    }
    public function class6()
    {
        $classes = ClassArticle::where('class_category_id', 6)->paginate(2);
        $recent = ClassArticle::orderBy('id', 'desc')
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
            ->take(4)
            ->get();
        return view('user.class.detailkelas', compact('item', 'moreParagraf', 'routeId', 'recent'));
    }
}
