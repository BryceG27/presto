<?php

namespace App\Http\Controllers;

use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\AnnouncementImage;
use App\Http\Controllers\Controller;
use App\Jobs\GoogleVisionLabelImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Jobs\GoogleVisionRemoveFaces;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GoogleVisionSafeSearchImage;
use App\Http\Requests\AnnouncementRequest;

class AnnouncementController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function showForm (Request $request) {
        $uniqueSecret = $request->old(
            'uniqueSecret',
            base_convert(sha1(uniqid(mt_rand())), 16, 36)
        );

        return view('announcements.create', compact('uniqueSecret'));
    }

    public function create(AnnouncementRequest $request){
        
        $announcement = Announcement::create([
            'title'=>$request->input('title'),
            'body'=>$request->input('body'),
            'category_id'=>$request->input('category'),
            'price'=>$request->input('price'),
            'user_id'=>Auth::id()
        ]);

        $uniqueSecret = $request->input('uniqueSecret');

        $images = session()->get("images.{$uniqueSecret}", []);
        $removedImages = session()->get("removedimages.{$uniqueSecret}", []);
        $images = array_diff($images, $removedImages);

        foreach ($images as $image) {
            $i = new AnnouncementImage();

            $fileName = basename($image);
            $newFileName = "public/announcements/{$announcement->id}/{$fileName}";
            Storage::move($image, $newFileName);

            $i->file = $newFileName;
            $i->announcement_id = $announcement->id;

            $i->save();
            GoogleVisionRemoveFaces::withChain([
                new GoogleVisionSafeSearchImage($i->id),
                new GoogleVisionLabelImage($i->id),
                new ResizeImage($i->file,300,150),
                new ResizeImage($i->file,400,300)
            ])->dispatch($i->id);

        }

        File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));

        return redirect(route('home'))->with('message', 'Annuncio inserito corretamente.');
    }

    public function uploadImage(Request $request)
    {
        $uniqueSecret = $request->input('uniqueSecret');

        $fileName = $request->file('file')->store("public/temp/{$uniqueSecret}");

        dispatch(new ResizeImage(
            $fileName,
            120,
            120
        ));

        session()->push("images.{$uniqueSecret}", $fileName);

        return response()->json([
            'id'=>$fileName
        ]);
    }

    public function removeImage(Request $request) {

        $uniqueSecret = $request->input('uniqueSecret');
        
        $fileName = $request->input ('id');
        
        session()->push("removedimages.{$uniqueSecret}", $fileName);

        Storage::delete($fileName);

        return response()->json('ok');
    }

    public function getImages(Request $request)
    {
        $uniqueSecret = $request->input('uniqueSecret');
        $images = session()->get("images.{$uniqueSecret}", []);
     
        $removedImages = session()->get("removedimages.{$uniqueSecret}",[]);
       
        $images = array_diff($images, $removedImages);
        $data = [];
        
        foreach ($images as $image){
            $data[] = [
                'id'=> $image,
                'src'=> AnnouncementImage::getUrlByFilePath($image, 120, 120)
            ];
        }
        return response()->json($data);
    }
}
