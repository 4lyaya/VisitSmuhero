<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Teacher;

class TeacherPolicy
{
    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Teacher $teacher)
    {
        return true;
    }

    public function create(User $user)
    {
        return $user->isSuperAdmin();
    }

    public function update(User $user, Teacher $teacher)
    {
        return $user->isSuperAdmin();
    }

    public function delete(User $user, Teacher $teacher)
    {
        return $user->isSuperAdmin();
    }
}
