<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    public function toSearchableArray()
    {
        $array = [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'price' => $this->price,
            'altro' => 'categorie',
            'category' => $this->category
        ];
        /* $array = [
        *   'id'=> $this->id,
        *   'title'=> $this->title,
        *   'body'=> $this->body,
        *   'altro'=> 'annunci, occasioni',
        *   'annunci' => $annunci
         ];*/

        return $array;
    }

    protected $fillable = [
        'title',
        'body',
        'category_id',
        'user_id',
        'price'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
   }

   public function user() {
       return $this->belongsTo(User::class);
   }

//    public function images() {
//        return $this->hasMany(AnnouncementImage::class);
//    }

   static public function ToBeRevisionedCount() {
       return Announcement::where('is_accepted', null)->count();
   }
}
