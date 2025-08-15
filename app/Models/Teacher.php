<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'subject',
    ];

    public function guestRequests()
    {
        return $this->hasMany(Guest::class, 'teacher_id');
    }

    public function guests()
    {
        return $this->hasMany(Guest::class);
    }
}
