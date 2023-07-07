<?php

namespace App\Http\Controllers;

use App\Models\Models;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModelsController extends Controller
{
    public function addModel(Request $req)
    {
        // validate data
        $this->validate($req, [
            'brand' => ['required'],
            'model' => ['required'],
        ],);

        Models::create([
            "b_id" => $req->brand,
            "model" => $req->model,
        ]);

        return redirect('/dashboard/models')->with('status', 'Vehicle Model Added Successfull !')->with('msg', 'Vehicle Model is added to gurage..');
    }

    public function updateModel(Request $req)
    {
        $this->validate($req, [
            'updated_brand' => ['required'],
            'updated_model' => ['required'],
        ],);

        //upadate in models
        DB::table('models')
        ->where('id', $req->updated_id)
        ->update([
            "b_id" => $req->updated_brand,
            "model" => $req->updated_model,
        ]);

        return redirect('/dashboard/models')->with('status', 'Vehicle Model Updaing Successfull !')->with('msg', 'Vehicle Model is updated in gurage..');
    }

    public function deleteModel(Request $req)
    {
        //remove from DB
        DB::table('models')->where('id', $req->id_key)->delete();

        return redirect('/dashboard/models')->with('status', 'Vehicle Model Deleting Successfull !')->with('msg', 'Vehicle Model is deleted in gurage..');
    }
}
