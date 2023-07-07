<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BrandsController extends Controller
{
    public function addBrand(Request $req)
    {
        //validate data
        $this->validate($req, [
            'brand' => ['required'],
            'status' => ['required'],
        ],);

        //add to brands
        Brands::create([
            "brand" => $req->brand,
            "status" => $req->status,
        ]);

        return redirect('/dashboard/brands')->with('status', 'Vehicle Make Added Successfull !')->with('msg', 'Vehicle Make is Added to gurage..');
    }

    public function updateBrand(Request $req)
    {
        //validate data
        $this->validate($req, [
            'updated_brand' => ['required'],
            'updated_status' => ['required'],
        ],);

        //update new brand name
        DB::table('brands')
            ->where('id', $req->id)
            ->update([
                'brand' => $req->updated_brand,
                'status' => $req->updated_status
            ]);

        return redirect('/dashboard/brands')->with('status', 'Vehicle Make Updating Successfull !')->with('msg', 'Vehicle Make is updated in gurage..');
    }

    public function deleteBrand(Request $req)
    {
        //remove from DB
        DB::table('brands')->where('id', $req->id_key)->delete();

        //remove models related to deleted brandfrom DB
        DB::table('models')->where('b_id', $req->id_key)->delete();

        return redirect('/dashboard/brands')->with('status', 'Vehicle Make Deleting Successfull !')->with('msg', 'Vehicle Make is deleted from gurage..');
    }
}
