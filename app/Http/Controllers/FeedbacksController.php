<?php

namespace App\Http\Controllers;

use App\Models\Feedbacks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeedbacksController extends Controller
{
    public function addFeedback(Request $req)
    {
        // validate data
        $this->validate($req, [
            'vehicle' => ['required'],
            'customer' => ['required'],
            'feedback' => ['required'],
        ],);

        // add customer image to Server
        if ($req->hasFile('customer_image')) {

            //upload logo files to project
            $logoFile = $req->file("customer_image");
            $logoFileSize = $logoFile->getSize();
            $logoFileExtension = $logoFile->getClientOriginalExtension();

            //validate extension
            $allowed = array('jpg', 'jpeg', 'png');
            if (!in_array($logoFileExtension, $allowed))
                return redirect('/dashboard/feedbacks')->with('image_errors', ['File type not allowed.Please use Only JPG , JPEG , PNG files !']);

            //File Name
            $logofileName = $logoFile->getClientOriginalName();
            $logoFileNewName = (string) date('Y-m-d') . '-' . rand(1, 500) . "." . $logoFileExtension;

            //validate file size
            if ($logoFileSize > 7500000)
                return redirect('/dashboard/feedbacks')->with('image_errors', ['File size larger than 7MB !']);

            //Move Uploaded File
            $destinationPath = public_path() . '/assets/customers/';
            $logoFile->move($destinationPath, $logoFileNewName);

            Feedbacks::create([
                "v_id" => $req->vehicle,
                "customer" => $req->customer,
                "feedback" => $req->feedback,
                "customer_image" => $logoFileNewName
            ]);

            return redirect('/dashboard/feedbacks')->with('status', 'Customer Feedback Adding Successfull !')->with('msg', 'Customer Feedback is added to gurage..');
        }
    }

    public function deleteFeedback(Request $req)
    {
        //remove from DB
        DB::table('feedbacks')->where('id', $req->id_key)->delete();
        return redirect('/dashboard/feedbacks')->with('status', 'Customer Feedback Deleting Successfull !')->with('msg', 'Customer Feedback is deleted in gurage..');
    }

    public function updateFeedback(Request $req)
    {
        // validate data
        $this->validate($req, [
            'updated_vehicle' => ['required'],
            'updated_customer' => ['required'],
            'updated_feedback' => ['required'],
            'updated_id' => ['required'],
        ],);

        // dd($req->updated_customer_image);

        if ($req->updated_customer_image != null) {

            //remove old customer images
            $customer_images = DB::table('feedbacks')
                ->select('customer_image')
                ->where('id', $req->updated_id)
                ->get();

            foreach ($customer_images as $img) {
                if ($req->hasFile('updated_customer_image')) {
                    if (file_exists(public_path() . '/assets/customers/') . $img->customer_image) {
                        unlink(public_path() . '/assets/customers/' . $img->customer_image);
                    }
                }
            }

            //upload files to project
            $logoFile = $req->file("updated_customer_image");
            $logoFileSize = $logoFile->getSize();
            $logoFileExtension = $logoFile->getClientOriginalExtension();

            //validate extension
            $allowed = array('jpg', 'jpeg', 'png');
            if (!in_array($logoFileExtension, $allowed))
                return redirect('/dashboard/feedbacks')->with('image_errors', ['File type not allowed.Please use Only JPG , JPEG , PNG files !']);

            //File Name
            $logofileName = $logoFile->getClientOriginalName();
            $logoFileNewName = (string) date('Y-m-d') . '-' . rand(1, 500) . "." . $logoFileExtension;

            //validate file size
            if ($logoFileSize > 7500000)
                return redirect('/dashboard/feedbacks')->with('image_errors', ['File size larger than 7MB !']);

            //Move Uploaded File
            $destinationPath = public_path() . '/assets/customers/';
            $logoFile->move($destinationPath, $logoFileNewName);

            DB::table('feedbacks')
                ->where('id', $req->updated_id)
                ->update([
                    "v_id" => $req->updated_vehicle,
                    "customer" => $req->updated_customer,
                    "feedback" => $req->updated_feedback,
                    "customer_image" => $logoFileNewName
                ]);
        } else {
            DB::table('feedbacks')
                ->where('id', $req->updated_id)
                ->update([
                    "v_id" => $req->updated_vehicle,
                    "customer" => $req->updated_customer,
                    "feedback" => $req->updated_feedback,
                ]);
        }



        return redirect('/dashboard/feedbacks')->with('status', 'Customer Feedback Updating Successfull !')->with('msg', 'Customer Feedback is updated to gurage..');
    }
}
