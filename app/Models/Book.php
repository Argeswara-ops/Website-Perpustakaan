<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'author', 'description', 'category', 'cover_image', 'file_path', 'views'])]
class Book extends Model
{
    use HasFactory;

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
