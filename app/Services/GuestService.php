<?php

namespace App\Services;

use App\Models\Guest;
use App\Models\Teacher;
use App\Repositories\GuestRepository;
use Illuminate\Support\Facades\Storage;

class GuestService
{
    protected $guestRepository;

    public function __construct(GuestRepository $guestRepository)
    {
        $this->guestRepository = $guestRepository;
    }

    public function getAllGuests($search = null)
    {
        return $this->guestRepository->getAll($search);
    }

    public function createGuest(array $data)
    {
        // Validate teacher_id exists
        if (isset($data['teacher_id'])) {
            Teacher::findOrFail($data['teacher_id']);
        }

        $photoPath = $this->storePhoto($data['photo']);
        $data['photo'] = $photoPath;

        return $this->guestRepository->create($data);
    }

    public function getGuestById($id)
    {
        return $this->guestRepository->find($id);
    }

    public function updateGuest($id, array $data)
    {
        // Validate teacher_id exists if provided
        if (isset($data['teacher_id'])) {
            Teacher::findOrFail($data['teacher_id']);
        }

        if (isset($data['photo'])) {
            $photoPath = $this->storePhoto($data['photo']);
            $data['photo'] = $photoPath;
        }

        return $this->guestRepository->update($id, $data);
    }

    public function deleteGuest($id)
    {
        return $this->guestRepository->delete($id);
    }

    protected function storePhoto($base64Image)
    {
        $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));
        $fileName = 'guest_photos/' . uniqid() . '.png';
        Storage::disk('public')->put($fileName, $imageData);
        return $fileName;
    }

    public function getRecentGuests($limit = 5)
    {
        return $this->guestRepository->getRecent($limit);
    }
}