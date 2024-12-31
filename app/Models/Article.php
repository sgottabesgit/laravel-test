<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'url', 'views'];

    // Optionally, you can define the table if it's not using the default "articles"
    protected $table = 'articles';
}
