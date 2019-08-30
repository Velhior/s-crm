<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\OrdersExport;

use App\Imports\OrdersImport;

use Maatwebsite\Excel\Facades\Excel;

class OrderimportController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function importExportView()
    {
       return view('import');
    }

    /**
    * @return \Illuminate\Support\Collection
    */

    public function export() 
    {
        return Excel::download(new OrdersExport, 'orders.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */

    public function import() 
    {
        Excel::import(new OrdersImport,request()->file('file'));
        return back();
    }
}
