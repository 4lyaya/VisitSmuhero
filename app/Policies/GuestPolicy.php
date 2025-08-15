<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Guest;

class GuestPolicy
{
    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Guest $guest)
    {
        return true;
    }

    public function create(User $user)
    {
        return false; // Only guests can create via public form
    }

    public function update(User $user, Guest $guest)
    {
        return $user->isSuperAdmin();
    }

    public function delete(User $user, Guest $guest)
    {
        return $user->isSuperAdmin();
    }
}
