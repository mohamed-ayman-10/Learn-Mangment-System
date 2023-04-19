<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Authenticatable
{
    use HasFactory, HasTranslations, SoftDeletes;

    public $translatable = ['name'];
    protected $guarded = [];

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function nationatitie()
    {
        return $this->belongsTo(Nationalitie::class, 'nationalitie_id');
    }

    public function guardian()
    {
        return $this->belongsTo(Guardian::class);
    }

    public function studentAccount()
    {
        return $this->hasMany(StudentAccount::class, 'student_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'student_id');
    }

    public function degrees()
    {
        return $this->hasMany(Degree::class);
    }

    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }
}
