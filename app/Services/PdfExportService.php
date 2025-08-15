<?php

namespace App\Services;

use Mpdf\Mpdf;

class PdfExportService
{
    public function exportGuestsToPdf($guests)
    {
        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'orientation' => 'P',
        ]);

        $html = view('exports.guests', compact('guests'))->render();

        $mpdf->WriteHTML($html);
        return $mpdf->Output('guests-list.pdf', 'D');
    }

    public function exportTeachersToPdf($teachers)
    {
        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'orientation' => 'P',
        ]);

        $html = view('exports.teachers', compact('teachers'))->render();

        $mpdf->WriteHTML($html);
        return $mpdf->Output('teachers-list.pdf', 'D');
    }
}
