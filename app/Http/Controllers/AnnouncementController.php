<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AnnouncementRequest;

class AnnouncementController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function showForm () {
        return view('announcements.create');
    }

    public function create(AnnouncementRequest $request){
        
        $announcement = Announcement::create([
            'title'=>$request->input('title'),
            'body'=>$request->input('body'),
            'category_id'=>$request->input('category'),
            'price'=>$request->input('price'),
            'user_id'=>Auth::id()
        ]);

        return redirect(route('home'))->with('message', 'Annuncio inserito corretamente.');
    }
}
