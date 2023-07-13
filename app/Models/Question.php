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

    public function question()
    {
    return $this->belongsTo(Question::class);
    }

}
