<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Services\TeacherService;
use App\Services\PdfExportService;
use App\Helpers\NotificationHelper;

class TeacherController extends Controller
{
    protected $teacherService;
    protected $pdfExportService;

    public function __construct(TeacherService $teacherService, PdfExportService $pdfExportService)
    {
        $this->teacherService = $teacherService;
        $this->pdfExportService = $pdfExportService;
    }

    public function index()
    {
        $teachers = $this->teacherService->getAllTeachers(request('search'));
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(StoreTeacherRequest $request)
    {
        $this->teacherService->createTeacher($request->validated());
        NotificationHelper::success('Teacher data has been saved successfully!');
        return redirect()->route('teachers.index');
    }

    public function show($id)
    {
        $teacher = $this->teacherService->getTeacherById($id);
        return view('teachers.show', compact('teacher'));
    }

    public function edit($id)
    {
        $teacher = $this->teacherService->getTeacherById($id);
        return view('teachers.edit', compact('teacher'));
    }

    public function update(UpdateTeacherRequest $request, $id)
    {
        $this->teacherService->updateTeacher($id, $request->validated());
        NotificationHelper::success('Teacher data has been updated successfully!');
        return redirect()->route('teachers.index');
    }

    public function destroy($id)
    {
        $this->teacherService->deleteTeacher($id);
        NotificationHelper::success('Teacher data has been deleted successfully!');
        return redirect()->route('teachers.index');
    }

    public function exportPdf()
    {
        $teachers = $this->teacherService->getAllTeachers(request('search'));
        return $this->pdfExportService->exportTeachersToPdf($teachers);
    }
}
