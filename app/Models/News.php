<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path', 
        'category_id', 
        'title', 
        'description'
    ];

    protected $appends = ['news_category'];

    public function getNewsCategoryAttribute()
    {
        return ($this->category_id == 1) ? 'Category 1' : 'Category 2';
    }
}
