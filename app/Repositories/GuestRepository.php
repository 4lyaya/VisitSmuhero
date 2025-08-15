<?php

namespace App\Repositories;

use App\Models\Guest;
use Illuminate\Support\Facades\Storage;

class GuestRepository
{
    public function getAll($search = null)
    {
        $query = Guest::with('teacher')->latest();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('institution', 'like', "%{$search}%")
                    ->orWhereHas('teacher', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
            });
        }

        return $query->paginate(10);
    }

    public function find($id)
    {
        return Guest::with('teacher')->findOrFail($id);
    }

    public function create(array $data)
    {
        return Guest::create($data);
    }

    public function update($id, array $data)
    {
        $guest = $this->find($id);
        $guest->update($data);
        return $guest;
    }

    public function delete($id)
    {
        $guest = $this->find($id);

        // Delete photo if exists
        if ($guest->photo && Storage::disk('public')->exists($guest->photo)) {
            Storage::disk('public')->delete($guest->photo);
        }

        return $guest->delete();
    }

    public function getRecent($limit = 5)
    {
        return Guest::with('teacher')
            ->latest('appointment_datetime')
            ->limit($limit)
            ->get();
    }
}