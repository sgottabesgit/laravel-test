<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // Add 'user_id' to the fillable property
    protected $fillable = ['title', 'url', 'views', 'user_id'];

    // Optionally, you can define the table if it's not using the default "articles"
    protected $table = 'articles';
}
