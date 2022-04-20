<?php

namespace App\Http\Controllers;

use App\Models\ProductList;
use Illuminate\Http\Request;
use PDF;

class StockController extends Controller
{
    //

    // Stock Report ########################################################################################################

    public function stockReportShow()
    {
        # code...
        $data = ProductList::orderBy('category', 'asc')->get();
        return view('admin.stock.stock_report', compact('data'));
    }

    public function stockReportShowPdf()
    {
        $data['allData'] = ProductList::orderBy('category', 'asc')->get();
       
        $pdf  = PDF::loadView('admin.pdf.stock-report-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }




    // Stock Report ########################################################################################################
}
