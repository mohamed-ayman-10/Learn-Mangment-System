<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'section_name',
        'status',
        'grade_id',
        'classroom_id',
    ];

    public $translatable = ['section_name'];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_section');
    }
}
