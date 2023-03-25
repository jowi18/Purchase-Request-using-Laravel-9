<?php

namespace App\Http\Controllers;

use App\Models\Tbldetail;
use App\Models\Tblheader;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use View;
class PdfController extends Controller
{
    public function index($id) 
    {   
     
        $data = Tblheader::with('detail', 'user')->find($id);
        $itemRequest = Tbldetail::where('tblheader_id', $id)->get();

        PDF::setPageOrientation('portrait');
        PDF::SetTitle('Purchase Request');
        PDF::AddPage();
        $prtxt = 'PURCHASE REQUEST';
        $image_path = public_path().'/wms/img/img/gs1.jpg';
        $image_height = 35;
        $image_width = 46;
        $image_x = 18;
        $image_y = 10.5;
        PDF::SetFont('times', '', 10);
        PDF::Image($image_path, $image_x, $image_y, $image_width, $image_height, '', '', '', false, 300, '', false, false, 0, false, false, false);
        
        $view = View::make('request.pdfrequest', ['data' => $data, 'itemRequest' => $itemRequest]);
    
       
        PDF::writeHTML($view, true, false, true, false, '');

        PDF::SetY(265);
        // Page number
        PDF::Cell(0, 10, 'Page '.PDF::getAliasNumPage().'/'.PDF::getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        PDF::SetFooterMargin(PDF_MARGIN_FOOTER);
        $filename = 'PURCHASE_REQUEST_'. '_' .$data->pr_no. '.pdf';
        $content = PDF::Output($filename);

        return response($content)
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'inline; filename="document.pdf"');
}
    

    public function testpdf($id){
        $data = Tblheader::with('detail', 'user')->find($id);
        $itemRequest = Tbldetail::where('tblheader_id', $id)->get();

        PDF::setPageOrientation('landscape');
        PDF::SetTitle('Purchase Request');
        PDF::AddPage();
        $prtxt = 'PURCHASE REQUEST';
        $image_path = public_path().'/wms/img/img/gs1.jpg';
        $image_height = 37.6;
        $image_width = 60;
        $image_x = 33;
        $image_y = 10.5;

        PDF::Image($image_path, $image_x, $image_y, $image_width, $image_height, '', '', '', false, 300, '', false, false, 0, false, false, false);


       
        $view = View::make('request.pdfrequest', ['data' => $data, 'itemRequest' => $itemRequest]);
    
        PDF::writeHTML($view, true, false, true, false, '');

        
}

    public function viewImage($id){
        $image = Tbldetail::where('tblheader_id', $id)->get();
  
       
        return view('request.imagerequestview', compact('image'));
       
    }
}
