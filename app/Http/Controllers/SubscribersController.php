<?php

namespace App\Http\Controllers;

use App\Models\Subscribers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscribersController extends Controller
{
    public function addSubscribers(Request $req)
    {
        //add to DB
        Subscribers::create([
            "email" => $req->email,
        ]);

        return redirect('/')->with('status', 'Newsletter Sending Successfull !');
    }

    public function deleteSubscribers(Request $req)
    {
        //remove from DB
        DB::table('subscribers')->where('id', $req->id_key)->delete();

        return redirect('/dashboard/inquries/subscribers')->with('status', 'Newsletter Deleting Successfull !')->with('msg', 'Newsletter is deleted from documents..');
    }
}
