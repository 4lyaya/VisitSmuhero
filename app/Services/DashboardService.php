<?php

namespace App\Services;

use App\Models\Guest;
use App\Models\Teacher;
use App\Models\User;
use Carbon\Carbon;
use App\Services\GuestService;

class DashboardService
{
    /**
     * Get all dashboard summary data
     *
     * @return array
     */
    public function getDashboardData()
    {
        return [
            'totalGuests' => $this->getTotalGuests(),
            'totalTeachers' => $this->getTotalTeachers(),
            'totalUsers' => $this->getTotalUsers(),
            'mostRequestedTeacher' => $this->getMostRequestedTeacher(),
        ];
    }

    /**
     * Get total guests count
     *
     * @return int
     */
    protected function getTotalGuests()
    {
        return Guest::count();
    }

    /**
     * Get total teachers count
     *
     * @return int
     */
    protected function getTotalTeachers()
    {
        return Teacher::count();
    }

    /**
     * Get total users count
     *
     * @return int
     */
    protected function getTotalUsers()
    {
        return User::count();
    }

    /**
     * Get the most requested teacher name
     *
     * @return string
     */
    protected function getMostRequestedTeacher()
    {
        $teacher = Teacher::withCount('guestRequests')
            ->orderBy('guest_requests_count', 'desc')
            ->first();

        return $teacher
            ? [
                'name' => $teacher->name,
                'total_requests' => $teacher->guest_requests_count
            ]
            : [
                'name' => 'Tidak ada data',
                'total_requests' => 0
            ];
    }

    /**
     * Get recent guests with limit
     *
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getRecentGuests($limit = 5)
    {
        return $this->guestRepository->getRecent($limit);
    }
}
