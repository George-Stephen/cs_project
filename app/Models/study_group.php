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
        'category_id',
        'start_date',
        'end_date',
        'description',
        'max_members',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    
}
