<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use HasFactory;
    protected $fillable = [
       'topicsTitle',
        'content',
        'trending',
        'published',
        'image',
        'no_of_views',
        'category_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
