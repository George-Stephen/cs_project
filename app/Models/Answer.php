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

    public function question()
    {
    return $this->belongsTo(Question::class);
    }

    public function user()
    {
    return $this->belongsTo(User::class, 'answered_by');
    }

    public function isAnsweredBy(User $user)
    {
        return $this->answered_by === $user->id;
    }

}
