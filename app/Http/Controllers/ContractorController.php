<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContractorModel;

class ContractorController extends Controller
{
    public function index(Request $request) {
        $models = ContractorModel::where('active', '=', 1)->get();
        return view('contractor.index')->with(["models" => $models]);
    }

    public function add_view(Request $request) {
        return view('contractor.add');
    }

    public function add(Request $request) {

        $model = new ContractorModel();
        $model->name = $request->get('name');
        $model->address = $request->get('address');
        $model->postcode = $request->get('postcode');
        $model->city = $request->get('city');
        $model->nip = $request->get('nip');
        $model->active = 1;
        $model->save();

        return redirect()->route('contractor.index');

    }

    public function edit(Request $request, $id = 0) {

        if($request->method() == "GET") {
            $model = ContractorModel::where('id', '=', $id)->first();
            return view('contractor.edit')->with(["model" => $model]);
        }

        if($request->method() == "POST") {
            $model = ContractorModel::where('id', '=', $request->get('id'))->first();
            $model->name = $request->get('name');
            $model->address = $request->get('address');
            $model->postcode = $request->get('postcode');
            $model->city = $request->get('city');
            $model->nip = $request->get('nip');
            $model->save();
        }

        return redirect()->route('contractor.index');

    }

    public function delete(Request $request) {

        //TODO

    }
}
