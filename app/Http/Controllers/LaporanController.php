<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    public function print()
    {
        $pdf = PDF::loadview('myPDF', $data);
        return $pdf->download('laporan-pdf.pdf');

        $data = ['title' => 'Welcome to belajarphp.net'];

            $pdf = PDF::loadView('myPDF', $data);
            return $pdf->download('laporan-pdf.pdf');
    }
}
