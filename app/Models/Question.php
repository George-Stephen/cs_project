<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'tbl_questions';

    protected $fillable = [
        'title',
        'body',
        'upvotes',
        'downvotes',
        'asked_by',
    ];

    public function answers()
    {
    return $this->hasMany(Answer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'asked_by');
    }

    public function tags()
{
    return $this->belongsToMany(Tag::class, 'tbl_question_tag');
}

}
