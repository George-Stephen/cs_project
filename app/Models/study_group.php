<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class study_group extends Model
{
    use HasFactory;

    protected $table = 'tbl_study_group';

    protected $fillable = [
        'group_name',
        'group_link',
        'category_id',
        'start_date',
        'end_date',
        'description',
        'max_members',
        'creator_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function isCreatedBy(User $user)
    {
        return $this->creator_id === $user->id;
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'tbl_members', 'study_group_id', 'user_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }


    
}
