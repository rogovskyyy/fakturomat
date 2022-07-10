<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContractorModel;

class ContractorController extends Controller
{
    public function index(Request $request) {
        $models = ContractorModel::all();
        return view('contructor.index')->with(["models" => $models]);
    }

    public function add_view(Request $request) {
        return view('contructor.add');
    }

    public function add(Request $request) {

        $model = new ContractorModel();
        $model->name = $request->get('name');
        $model->address = $request->get('address');
        $model->postcode = $request->get('postcode');
        $model->city = $request->get('city');
        $model->nip = $request->get('nip');
        $model->save();

        return redirect('/');

    }
}
