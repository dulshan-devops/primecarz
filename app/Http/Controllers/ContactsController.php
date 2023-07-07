<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ContactsController extends Controller
{
    public function deleteContacts(Request $req)
    {
        //remove from DB
        DB::table('contact_us')->where('id', $req->id_key)->delete();

        return redirect('/dashboard/inquries/contact')->with('status', 'Contact Deleting Successfull !')->with('msg', 'Contacted Messages is deleted from documents..');
    }

    public function addContactUs(Request $req)
    {
        //add to DB
        ContactUs::create([
            "name" => $req->name,
            "email" => $req->email,
            "mobile" => $req->telephone,
            "msg" => $req->msg,
        ]);


        return redirect('/contact-us')->with('status', 'Contact Inquiry Sending Successfull !');
    }

    public function addProductInquiry(Request $req)
    {
        //add to DB
        ContactUs::create([
            "name" => $req->name,
            "email" => $req->email,
            "mobile" => $req->telephone,
            "msg" => $req->msg,
        ]);

        return Redirect::back()->with('status', 'Product Inquiry Sending Successfull !');
    }
}
