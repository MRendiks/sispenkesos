<?php

namespace App\Http\Controllers;

use App\Exports\DataPpksExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CetakExcelController extends Controller
{
    public function excel_all()
    {
        return Excel::download(new DataPpksExport, 'PPKS_all.xlsx');
    }
}
