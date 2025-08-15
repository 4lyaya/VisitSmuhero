<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'institution',
        'teacher_id',
        'category',
        'appointment_datetime',
        'description',
        'photo',
        'created_at', // ditambahkan
    ];

    protected $casts = [
        'appointment_datetime' => 'datetime',
        'created_at' => 'datetime', // biar otomatis jadi instance Carbon
    ];

    public function requestedTeachers()
    {
        return $this->hasMany(GuestTeacherRequest::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
