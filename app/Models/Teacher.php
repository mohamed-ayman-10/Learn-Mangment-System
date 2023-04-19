<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;

class Teacher extends User
{
    use HasFactory, HasTranslations;

    public $translatable = ['name', 'address'];
    protected $fillable = [
        'name', 'email', 'password', 'specialization_id', 'gender_id', 'joining_date', 'address'
    ];

    public function sections()
    {
        return $this->belongsToMany(Section::class, 'teacher_section');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }
}
