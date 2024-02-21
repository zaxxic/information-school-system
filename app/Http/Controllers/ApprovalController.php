<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\ClassArticle;
use App\Models\EkstraArticle;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{


    public function class_acc($id)
    {

        $classArticle = ClassArticle::findOrFail($id);
        $classArticle->status = 1;
        $classArticle->save();
        return redirect()->back()->with('success', 'Status berhasil diperbarui');
    }
    public function class_deactivate($id)
    {
        $classArticle = ClassArticle::findOrFail($id);
        $classArticle->status = 0;
        $classArticle->save();
        return redirect()->back()->with('success', 'Status berhasil diperbarui');
    }

    public function announcement_acc($id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->status = 1;
        $announcement->save();
        return redirect()->back()->with('success', 'Status berhasil diperbarui');
    }
    public function announcement_deactivate($id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->status = 0;
        $announcement->save();
        return redirect()->back()->with('success', 'Status berhasil diperbarui');
    }
    public function ekstra_acc($id)
    {
        $announcement = EkstraArticle::findOrFail($id);
        $announcement->status = 1;
        $announcement->save();
        return redirect()->back()->with('success', 'Status berhasil diperbarui');
    }
    public function ekstra_deactivate($id)
    {
        $announcement = EkstraArticle::findOrFail($id);
        $announcement->status = 0;
        $announcement->save();
        return redirect()->back()->with('success', 'Status berhasil diperbarui');
    }
}
