<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;

class Guardian extends User
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'password',
        'job',
        'national_id',
        'passport_id',
        'nationalitie_id',
        'blood_id',
        'religion_id',
    ];

    public $translatable = ['name', 'address', 'job'];

    public function nationalitie()
    {
        return $this->belongsTo(Nationalitie::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
