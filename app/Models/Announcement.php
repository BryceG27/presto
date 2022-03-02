<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use Searchable;
    
    public function toSearchableArray()
    {
        $array = [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'price' => $this->price,
            'category' => $this->category
        ];
        return $array;
    }

    use HasFactory;

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

    public function images() {
        return $this->hasMany(AnnouncementImage::class);
    }

    static public function ToBeRevisionedCount() {
        return Announcement::where('is_accepted', null)->count();
    }
}