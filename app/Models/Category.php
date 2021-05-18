<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'title',
        'category_id',
        'thumbnail',
    ];

    public function categories() 
    {
        return $this->hasMany(self::class);
    }
    
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public static function uploadImage(Request $request, $image = null) 
    {   
        if($request->hasFile('thumbnail')) {
            if($image) {
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            return $request->file('thumbnail')->store("images/categories/{$folder}", 'public');
        }
        return null;
    }

    public function getImage()
    {
        return asset("uploads/{$this->thumbnail}");
    }

    public function sluggable(): array 
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
