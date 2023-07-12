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
        'group_course',
        'group_link',
        'description',
        'max_members',
    ];

    // public function relatedModel()
    // {
    //     return $this->hasMany(study_group :: class);
    // }
}
