<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'tbl_blog';

    protected $fillable = [
        'title',
        'content',
        'featured_image',
        'author',
        'publication_date',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author');
    }

    public function tags()
    {
    return $this->belongsToMany(Tag::class, 'tbl_blog_tag');
    }
}
