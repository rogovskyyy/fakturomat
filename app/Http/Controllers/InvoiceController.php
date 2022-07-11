<?php

namespace App\Http\Controllers;

use App\Models\ContractorModel;
use App\Models\InvoiceModel;
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

}
