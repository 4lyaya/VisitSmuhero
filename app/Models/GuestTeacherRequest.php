<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestTeacherRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'guest_id',
        'teacher_id',
    ];

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
