<?php

namespace App\Http\Controllers;

use App\Exports\StudentExport;
use App\Imports\StudentImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    public function export()
    {
        return Excel::download(new StudentExport,'students.xlsx');
    }

    public function import(Request $request)
    {
        Excel::import(new StudentImport,$request->file('excel')->store('files'));
        return Redirect::back();
    }
}
