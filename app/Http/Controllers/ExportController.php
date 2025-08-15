<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;
use App\Models\Teacher;
use App\Models\User;
use Mpdf\Mpdf;
use Carbon\Carbon;

class ExportController extends Controller
{
    public function index()
    {
        return view('exports.index');
    }

    public function generate(Request $request)
    {
        $request->validate([
            'data_type' => 'required|in:guests,teachers,users',
            'format' => 'required|in:pdf,html',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $dataType = $request->input('data_type');
        $format = $request->input('format');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $includePhoto = $request->boolean('include_photo');
        $groupByCategory = $request->boolean('group_by_category');

        // Get data based on type and date range
        $data = $this->getExportData($dataType, $startDate, $endDate, $groupByCategory);

        if ($format === 'html') {
            // Return HTML preview
            return view('exports.preview', [
                'dataType' => $dataType,
                'data' => $data,
                'startDate' => $startDate,
                'endDate' => $endDate,
                'includePhoto' => $includePhoto,
                'groupByCategory' => $groupByCategory,
            ]);
        }

        // Generate PDF
        return $this->generatePdf($dataType, $data, $startDate, $endDate, $includePhoto, $groupByCategory);
    }

    private function getExportData($dataType, $startDate, $endDate, $groupByCategory)
    {
        $query = null;

        switch ($dataType) {
            case 'guests':
                $query = Guest::with('teacher')->orderBy('created_at', 'desc');
                break;
            case 'teachers':
                $query = Teacher::orderBy('name', 'asc');
                break;
            case 'users':
                $query = User::orderBy('name', 'asc');
                break;
        }

        // Apply date filter if dates are provided
        if ($startDate && $endDate) {
            $start = Carbon::parse($startDate)->startOfDay();
            $end = Carbon::parse($endDate)->endOfDay();
            $query->whereBetween('created_at', [$start, $end]);
        }

        $data = $query->get();

        // Group guests by category if requested
        if ($dataType === 'guests' && $groupByCategory) {
            return $data->groupBy('category');
        }

        return $data;
    }

    private function generatePdf($dataType, $data, $startDate, $endDate, $includePhoto, $groupByCategory)
    {
        $html = view('exports.pdf_template', [
            'dataType' => $dataType,
            'data' => $data,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'includePhoto' => $includePhoto,
            'groupByCategory' => $groupByCategory,
        ])->render();

        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 15,
            'margin_bottom' => 15,
            'margin_header' => 10,
            'margin_footer' => 10,
        ]);

        $mpdf->SetTitle(ucfirst($dataType) . ' Report');
        $mpdf->SetAuthor(config('app.name'));
        $mpdf->SetCreator(config('app.name'));
        $mpdf->WriteHTML($html);

        $filename = $dataType . '_report_' . now()->format('Ymd_His') . '.pdf';

        return $mpdf->Output($filename, 'D'); // 'D' for download
    }
}