<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $table = 'tbl_answers';

    protected $fillable = [
        'question_id',
        'body',
        'upvotes',
        'downvotes',
        'answered_by',
    ];

    public function answers()
    {
    return $this->hasMany(Answer::class);
    }

}
