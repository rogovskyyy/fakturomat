<?php

namespace App\Http\Controllers;

use App\Models\ContractorModel;
use App\Models\InvoiceModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(Request $request) {

    }

    public function add_view(Request $request) {
        $contractors = ContractorModel::all();
        return view('invoice.add')->with(['contractors' => $contractors]);
    }

    public function add(Request $request) {



    }

    public function edit(Request $request, $id = 0) {


    }

    public function delete(Request $request) {

        //TODO

    }

    public function test(Request $request) {
        $data = [];
        for($i = 0; $i <= count($request->get('nazwa')) - 1; $i++) {

            if(
                isset($request->get('nazwa')[$i]) &&
                isset($request->get('miara')[$i]) &&
                isset($request->get('ilosc')[$i]) &&
                isset($request->get('cena_netto')[$i]) &&
                isset($request->get('vat')[$i])
            ) {
                $data[] = [
                    "nazwa" => $request->get('nazwa')[$i],
                    "miara" => $request->get('miara')[$i],
                    "ilosc" => $request->get('ilosc')[$i],
                    "cena_netto" => $request->get('cena_netto')[$i],
                    "vat" => $request->get('vat')[$i],
                ];
            }
        }
        //print "<pre>";
        //print_r($data);
        //die();


        $pdf = Pdf::loadView('pdf.invoice', compact('data'));
        return $pdf->download('invoice.pdf');
    }

}
