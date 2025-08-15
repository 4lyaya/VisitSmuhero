<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Services\GuestService;
use App\Services\PdfExportService;
use App\Helpers\NotificationHelper;
use App\Http\Requests\StoreGuestRequest;
use App\Http\Requests\UpdateGuestRequest;

class GuestController extends Controller
{
    protected $guestService;
    protected $pdfExportService;

    public function __construct(GuestService $guestService, PdfExportService $pdfExportService)
    {
        $this->guestService = $guestService;
        $this->pdfExportService = $pdfExportService;
    }

    public function create()
    {
        $teachers = Teacher::orderBy('name')->get();
        return view('guests.create_new2', compact('teachers'));
    }

    public function store(StoreGuestRequest $request)
    {
        $validated = $request->validated();

        // Ensure teacher_id is properly set
        if (!isset($validated['teacher_id'])) {
            return back()->withErrors(['teacher_id' => 'Please select a teacher']);
        }

        $this->guestService->createGuest($validated);
        NotificationHelper::success('Guest data has been saved successfully!');
        return redirect()->route('guest.create');
    }

    public function index()
    {
        $guests = $this->guestService->getAllGuests(request('search'));
        return view('guests.index', compact('guests'));
    }

    public function show($id)
    {
        $guest = $this->guestService->getGuestById($id);
        return view('guests.show', compact('guest'));
    }

    public function edit($id)
    {
        $guest = $this->guestService->getGuestById($id);
        $teachers = Teacher::orderBy('name')->get();
        return view('guests.edit', compact('guest', 'teachers'));
    }

    public function update(UpdateGuestRequest $request, $id)
    {
        $validated = $request->validated();

        // Ensure teacher_id is properly set
        if (!isset($validated['teacher_id'])) {
            return back()->withErrors(['teacher_id' => 'Please select a teacher']);
        }

        $this->guestService->updateGuest($id, $validated);
        NotificationHelper::success('Guest data has been updated successfully!');
        return redirect()->route('guests.index');
    }

    public function destroy($id)
    {
        $this->guestService->deleteGuest($id);
        NotificationHelper::success('Guest data has been deleted successfully!');
        return redirect()->route('guests.index');
    }

    public function exportPdf()
    {
        $guests = $this->guestService->getAllGuests(request('search'));
        return $this->pdfExportService->exportGuestsToPdf($guests);
    }
}