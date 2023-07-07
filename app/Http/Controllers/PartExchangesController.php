<?php

namespace App\Http\Controllers;

use App\Models\PartExchanges;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartExchangesController extends Controller
{
    public function addPartEx(Request $req)
    {
        PartExchanges::create([
            "full_name" => $req->full_name,
            "telephone" => $req->telephone,
            "mobile" => $req->mobile,
            "email" => $req->email,
            "brand" => $req->brand,
            "model" => $req->model,
            "variant" => $req->variant,
            "color" => $req->color,
            "fuel_type" => $req->fuel_type,
            "registration" => $req->vregister,
            "registration_date" => $req->rdate,
            "millage" => $req->millage,
            "last_serviced" => $req->lservice,
            "transmission" => $req->transmission,
            "full_service_history" => $req->full_service_history,
            "optional" => $req->optional,
        ]);

        return redirect('/part-exchanges')->with('status', 'Part Exchange Inqury Send Successfull !');
    }

    public function deletePartEx(Request $req)
    {
        //remove from DB
        DB::table('part_exchanges')->where('id', $req->id_key)->delete();

        return redirect('/dashboard/part-exchanges')->with('status', 'Part Exchange Inquiry Deleting Successfull !')->with('msg', 'Part Exchange Inquiry is deleted from documents..');
    }
}
