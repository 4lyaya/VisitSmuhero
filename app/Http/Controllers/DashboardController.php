<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Services\GuestService;
use App\Services\DashboardService;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $dashboardService;
    protected $guestService;

    public function __construct(DashboardService $dashboardService, GuestService $guestService)
    {
        $this->dashboardService = $dashboardService;
        $this->guestService = $guestService;
    }

    private function getMostRequestedTeacher()
    {
        $teacher = Teacher::withCount('guestRequests')
            ->orderBy('guest_requests_count', 'desc')
            ->first();

        if ($teacher) {
            return [
                'name' => $teacher->name,
                'total' => $teacher->guest_requests_count
            ];
        }

        return [
            'name' => 'No data available',
            'total' => 0
        ];
    }

    public function index()
    {
        // Get dashboard summary data
        $dashboardData = $this->dashboardService->getDashboardData();

        // Get recent guests (last 5)
        $recentGuests = $this->guestService->getRecentGuests(5);

        // Get Most Requested Teacher
        $mostRequestedTeacher = $this->getMostRequestedTeacher();

        return view('dashboard', array_merge($dashboardData, $mostRequestedTeacher, [
            'recentGuests' => $recentGuests,
        ]));
    }
}
