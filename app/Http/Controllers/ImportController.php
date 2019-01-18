<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;
use App\Services\ImportCSVService;

class ImportController extends Controller
{

    public function import()
    {
        return view('importCSV.import');
    }
   
    public function importCSV(ImportCSVService $importCSVService, Request $request)
    {    
        $importCSVService->importCSV($request);
        return redirect()->back();
    }
}
