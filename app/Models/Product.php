<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'title',
        'article',
        'count',
        'cost',
        'thumbnail',
        'category_id',
        'specifications',
        'description',
        'applications',
        'created_at',
    ];

    public static function uploadImage(Request $request, $image = null) 
    {
        if($request->hasFile('thumbnail')) {
            if($image) {
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            return $request->file('thumbnail')->store("images/products/{$folder}");
        }
        return null;
    }

    public function getImage()
    {
        return asset("uploads/{$this->thumbnail}");
    }

    public function category() 
    {
        return $this->belongsTo(Category::class);
    }


    public function sluggable(): array
    {
        return  [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
