<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index() {
        $randGenerator = rand(0, 6);

        $welcomeText = [
            '¡Bienvenido a', 'Bienvenue en', 'Valkommen in', 'Benvenuto in', '¡Ben-vindo ao', 'Tatakae no', 'Welcome in'
        ];
        $finalText = $welcomeText[$randGenerator];
        
        $announcements = Announcement::where('is_accepted', true)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
            
        return view('index', compact('announcements', 'finalText'));
    }

    public function announcementByCategory($name, $category_id) {
        $category = Category::find($category_id);
        
        $announcements = $category
            ->announcements()
            ->where('is_accepted', true)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('announcements.announcements', compact('category','announcements'));
    }

    public function announcementDetail (Announcement $announcement) {
        return view('announcements.detail', compact('announcement'));
    }
}
