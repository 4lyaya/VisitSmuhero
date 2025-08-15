<?php

namespace App\Repositories;

use App\Models\Teacher;

class TeacherRepository
{
    public function getAll($search = null)
    {
        $query = Teacher::latest();

        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('subject', 'like', "%{$search}%");
        }

        return $query->paginate(10);
    }

    public function find($id)
    {
        return Teacher::findOrFail($id);
    }

    public function create(array $data)
    {
        return Teacher::create($data);
    }

    public function update($id, array $data)
    {
        $teacher = $this->find($id);
        $teacher->update($data);
        return $teacher;
    }

    public function delete($id)
    {
        $teacher = $this->find($id);

        if ($teacher->guests()->exists()) {
            throw new \Exception('Guru ini masih memiliki data tamu. Tidak dapat dihapus.');
        }

        return $teacher->delete();
    }

    public function getMostRequested()
    {
        return Teacher::withCount('guestRequests')
            ->orderBy('guest_requests_count', 'desc')
            ->take(5)
            ->get();
    }
}
