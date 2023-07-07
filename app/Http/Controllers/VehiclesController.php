<?php

namespace App\Http\Controllers;

use App\Models\VehicleAccessories;
use App\Models\VehicleImages;
use App\Models\Vehicles;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehiclesController extends Controller
{
    public function addVehicle(Request $req)
    {
        $v_id = $this->genarateId($req->brand, $req->model);

        // validate data
        $this->validate($req, [
            'brand' => ['required'],
            'model' => ['required'],
            'condition' => ['required'],
            'millage' => ['required'],
            'fueltype' => ['required'],
            'transmission' => ['required'],
            'body_style' => ['required'],
            'mpg' => ['required'],
            'engine_size' => ['required'],
            'first_registered' => ['required'],
            'color' => ['required'],
            'price' => ['required'],
            'power' => ['required'],
            'co2_emission' => ['required'],
            'road_tax' => ['required'],
            'overview' => ['required'],
            'status' => ['required'],
        ],);

        //add vehicle images to Server and add to vehicle images
        if ($req->hasFile('main_image')) {

            //upload logo files to project
            $logoFile = $req->file("main_image");
            $logoFileSize = $logoFile->getSize();
            $logoFileExtension = $logoFile->getClientOriginalExtension();

            //validate extension
            $allowed = array('jpg', 'jpeg', 'png');
            if (!in_array($logoFileExtension, $allowed))
                return redirect('/dashboard/vehicles')->with('image_errors', ['File type not allowed.Please use Only JPG , JPEG , PNG files !']);

            //File Name
            $logofileName = $logoFile->getClientOriginalName();
            $logoFileNewName = (string)  $v_id . '-' . date('Y-m-d') . '-' . rand(1, 500) . "." . $logoFileExtension;

            //validate file size
            if ($logoFileSize > 7500000)
                return redirect('/dashboard/vehicles')->with('image_errors', ['File size larger than 7MB !']);

            //Move Uploaded File
            $destinationPath = public_path() . '/assets/products-images/';
            $logoFile->move($destinationPath, $logoFileNewName);


            VehicleImages::create([
                "v_id" => $v_id,
                "image" => $logoFileNewName,
            ]);

            //add to vehicles
            Vehicles::create([
                "v_id" => $v_id,
                "brand" => $req->brand,
                "model" => $req->model,
                "condition" => $req->condition,
                "millage" => $req->millage,
                "fuel_type" => $req->fueltype,
                "transmission" => $req->transmission,
                "body_style" => $req->body_style,
                "mpg" => $req->mpg,
                "engine_size" => $req->engine_size,
                "first_registered" => $req->first_registered,
                "color" => $req->color,
                "price" => $req->price,
                "power" => $req->power,
                "road_tax" => $req->road_tax,
                "co2_emission" => $req->co2_emission,
                "overview" => $req->overview,
                "status" => $req->status,
                "main_img" => $logoFileNewName,
            ]);
        } else {
            //add to vehicles
            Vehicles::create([
                "v_id" => $v_id,
                "brand" => $req->brand,
                "model" => $req->model,
                "condition" => $req->condition,
                "millage" => $req->millage,
                "fuel_type" => $req->fueltype,
                "transmission" => $req->transmission,
                "body_style" => $req->body_style,
                "mpg" => $req->mpg,
                "engine_size" => $req->engine_size,
                "first_registered" => $req->first_registered,
                "color" => $req->color,
                "price" => $req->price,
                "power" => $req->power,
                "road_tax" => $req->road_tax,
                "co2_emission" => $req->co2_emission,
                "overview" => $req->overview,
                "status" => $req->status,
            ]);
        }

        if ($req->hasFile('image_1')) {

            //upload logo files to project
            $logoFile = $req->file("image_1");
            $logoFileSize = $logoFile->getSize();
            $logoFileExtension = $logoFile->getClientOriginalExtension();

            //validate extension
            $allowed = array('jpg', 'jpeg', 'png');
            if (!in_array($logoFileExtension, $allowed))
                return redirect('/dashboard/vehicles')->with('image_errors', ['File type not allowed.Please use Only JPG , JPEG , PNG files !']);

            //File Name
            $logofileName = $logoFile->getClientOriginalName();
            $logoFileNewName = (string)  $v_id . '-' . date('Y-m-d') . '-' . rand(1, 500) . "." . $logoFileExtension;

            //validate file size
            if ($logoFileSize > 7500000)
                return redirect('/dashboard/vehicles')->with('image_errors', ['File size larger than 7MB !']);

            //Move Uploaded File
            $destinationPath = public_path() . '/assets/products-images/';
            $logoFile->move($destinationPath, $logoFileNewName);


            VehicleImages::create([
                "v_id" => $v_id,
                "image" => $logoFileNewName,
            ]);
        }

        if ($req->hasFile('image_2')) {
            //upload logo files to project
            $logoFile = $req->file("image_2");
            $logoFileSize = $logoFile->getSize();
            $logoFileExtension = $logoFile->getClientOriginalExtension();

            //validate extension
            $allowed = array('jpg', 'jpeg', 'png');
            if (!in_array($logoFileExtension, $allowed))
                return redirect('/dashboard/vehicles')->with('image_errors', ['File type not allowed.Please use Only JPG , JPEG , PNG files !']);

            //File Name
            $logofileName = $logoFile->getClientOriginalName();
            $logoFileNewName = (string)  $v_id . '-' . date('Y-m-d') . '-' . rand(1, 500) . "." . $logoFileExtension;

            //validate file size
            if ($logoFileSize > 7500000)
                return redirect('/dashboard/vehicles')->with('image_errors', ['File size larger than 7MB !']);

            //Move Uploaded File
            $destinationPath = public_path() . '/assets/products-images/';
            $logoFile->move($destinationPath, $logoFileNewName);


            VehicleImages::create([
                "v_id" => $v_id,
                "image" => $logoFileNewName,
            ]);
        }

        if ($req->hasFile('image_3')) {
            //upload logo files to project
            $logoFile = $req->file("image_3");
            $logoFileSize = $logoFile->getSize();
            $logoFileExtension = $logoFile->getClientOriginalExtension();

            //validate extension
            $allowed = array('jpg', 'jpeg', 'png');
            if (!in_array($logoFileExtension, $allowed))
                return redirect('/dashboard/vehicles')->with('image_errors', ['File type not allowed.Please use Only JPG , JPEG , PNG files !']);

            //File Name
            $logofileName = $logoFile->getClientOriginalName();
            $logoFileNewName = (string)  $v_id . '-' . date('Y-m-d') . '-' . rand(1, 500) . "." . $logoFileExtension;

            //validate file size
            if ($logoFileSize > 7500000)
                return redirect('/dashboard/vehicles')->with('image_errors', ['File size larger than 7MB !']);

            //Move Uploaded File
            $destinationPath = public_path() . '/assets/products-images/';
            $logoFile->move($destinationPath, $logoFileNewName);


            VehicleImages::create([
                "v_id" => $v_id,
                "image" => $logoFileNewName,
            ]);
        }

        if ($req->hasFile('image_4')) {
            //upload logo files to project
            $logoFile = $req->file("image_4");
            $logoFileSize = $logoFile->getSize();
            $logoFileExtension = $logoFile->getClientOriginalExtension();

            //validate extension
            $allowed = array('jpg', 'jpeg', 'png');
            if (!in_array($logoFileExtension, $allowed))
                return redirect('/dashboard/vehicles')->with('image_errors', ['File type not allowed.Please use Only JPG , JPEG , PNG files !']);

            //File Name
            $logofileName = $logoFile->getClientOriginalName();
            $logoFileNewName = (string)  $v_id . '-' . date('Y-m-d') . '-' . rand(1, 500) . "." . $logoFileExtension;

            //validate file size
            if ($logoFileSize > 7500000)
                return redirect('/dashboard/vehicles')->with('image_errors', ['File size larger than 7MB !']);

            //Move Uploaded File
            $destinationPath = public_path() . '/assets/products-images/';
            $logoFile->move($destinationPath, $logoFileNewName);


            VehicleImages::create([
                "v_id" => $v_id,
                "image" => $logoFileNewName,
            ]);
        }



        if ($req->hasFile('image_5')) {

            //upload logo files to project
            $logoFile = $req->file("image_5");
            $logoFileSize = $logoFile->getSize();
            $logoFileExtension = $logoFile->getClientOriginalExtension();

            //validate extension
            $allowed = array('jpg', 'jpeg', 'png');
            if (!in_array($logoFileExtension, $allowed))
                return redirect('/dashboard/vehicles')->with('image_errors', ['File type not allowed.Please use Only JPG , JPEG , PNG files !']);

            //File Name
            $logofileName = $logoFile->getClientOriginalName();
            $logoFileNewName = (string)  $v_id . '-' . date('Y-m-d') . '-' . rand(1, 500) . "." . $logoFileExtension;

            //validate file size
            if ($logoFileSize > 7500000)
                return redirect('/dashboard/vehicles')->with('image_errors', ['File size larger than 7MB !']);

            //Move Uploaded File
            $destinationPath = public_path() . '/assets/products-images/';
            $logoFile->move($destinationPath, $logoFileNewName);


            VehicleImages::create([
                "v_id" => $v_id,
                "image" => $logoFileNewName,
            ]);
        }

        if ($req->hasFile('image_6')) {

            //upload logo files to project
            $logoFile = $req->file("image_6");
            $logoFileSize = $logoFile->getSize();
            $logoFileExtension = $logoFile->getClientOriginalExtension();

            //validate extension
            $allowed = array('jpg', 'jpeg', 'png');
            if (!in_array($logoFileExtension, $allowed))
                return redirect('/dashboard/vehicles')->with('image_errors', ['File type not allowed.Please use Only JPG , JPEG , PNG files !']);

            //File Name
            $logofileName = $logoFile->getClientOriginalName();
            $logoFileNewName = (string)  $v_id . '-' . date('Y-m-d') . '-' . rand(1, 500) . "." . $logoFileExtension;

            //validate file size
            if ($logoFileSize > 7500000)
                return redirect('/dashboard/vehicles')->with('image_errors', ['File size larger than 7MB !']);

            //Move Uploaded File
            $destinationPath = public_path() . '/assets/products-images/';
            $logoFile->move($destinationPath, $logoFileNewName);


            VehicleImages::create([
                "v_id" => $v_id,
                "image" => $logoFileNewName,
            ]);
        }

        if ($req->hasFile('image_7')) {

            //upload logo files to project
            $logoFile = $req->file("image_7");
            $logoFileSize = $logoFile->getSize();
            $logoFileExtension = $logoFile->getClientOriginalExtension();

            //validate extension
            $allowed = array('jpg', 'jpeg', 'png');
            if (!in_array($logoFileExtension, $allowed))
                return redirect('/dashboard/vehicles')->with('image_errors', ['File type not allowed.Please use Only JPG , JPEG , PNG files !']);

            //File Name
            $logofileName = $logoFile->getClientOriginalName();
            $logoFileNewName = (string)  $v_id . '-' . date('Y-m-d') . '-' . rand(1, 500) . "." . $logoFileExtension;

            //validate file size
            if ($logoFileSize > 7500000)
                return redirect('/dashboard/vehicles')->with('image_errors', ['File size larger than 7MB !']);

            //Move Uploaded File
            $destinationPath = public_path() . '/assets/products-images/';
            $logoFile->move($destinationPath, $logoFileNewName);


            VehicleImages::create([
                "v_id" => $v_id,
                "image" => $logoFileNewName,
            ]);
        }

        if ($req->hasFile('image_8')) {

            //upload logo files to project
            $logoFile = $req->file("image_8");
            $logoFileSize = $logoFile->getSize();
            $logoFileExtension = $logoFile->getClientOriginalExtension();

            //validate extension
            $allowed = array('jpg', 'jpeg', 'png');
            if (!in_array($logoFileExtension, $allowed))
                return redirect('/dashboard/vehicles')->with('image_errors', ['File type not allowed.Please use Only JPG , JPEG , PNG files !']);

            //File Name
            $logofileName = $logoFile->getClientOriginalName();
            $logoFileNewName = (string)  $v_id . '-' . date('Y-m-d') . '-' . rand(1, 500) . "." . $logoFileExtension;

            //validate file size
            if ($logoFileSize > 7500000)
                return redirect('/dashboard/vehicles')->with('image_errors', ['File size larger than 7MB !']);

            //Move Uploaded File
            $destinationPath = public_path() . '/assets/products-images/';
            $logoFile->move($destinationPath, $logoFileNewName);


            VehicleImages::create([
                "v_id" => $v_id,
                "image" => $logoFileNewName,
            ]);
        }

        //add to vehicle_accessories
        $this->addAccessories($v_id, [$req->AC, $req->ABS, $req->PS, $req->PW, $req->CP, $req->LS, $req->CL, $req->PDL, $req->BA, $req->DA]);

        return redirect('/dashboard/vehicles')->with('status', 'Vehicle Added Successfull !')->with('msg', 'Vehicle is added to gurage..');
    }

    public function genarateId($brand, $model)
    {
        //genarate random id : DEPARTMENTID-DEPID+NFL-9876
        $randomLastNumber = random_int(1000, 9999);
        $id = $brand . "-" . $model . "-" . $randomLastNumber;
        return $id;
    }

    public function addAccessories($v_id, $acceessories)
    {
        foreach ($acceessories as $acc) {
            if ($acc != null) {
                VehicleAccessories::create([
                    "v_id" => $v_id,
                    "a_id" => $acc,
                ]);
            }
        }
    }

    public function updateVehicle(Request $req)
    {
        // $v_id = $this->genarateId($req->brand, $req->model);

        // validate data
        $this->validate($req, [
            'updated_brand' => ['required'],
            'updated_model' => ['required'],
            'updated_condition' => ['required'],
            'updated_millage' => ['required'],
            'updated_fueltype' => ['required'],
            'updated_transmission' => ['required'],
            'updated_body_style' => ['required'],
            'updated_mpg' => ['required'],
            'updated_engine_size' => ['required'],
            'updated_first_registered' => ['required'],
            'updated_color' => ['required'],
            'updated_price' => ['required'],
            'updated_power' => ['required'],
            'updated_co2_emission' => ['required'],
            'updated_road_tax' => ['required'],
            'updated_overview' => ['required'],
            'updated_status' => ['required'],
        ],);


        //add vehicle images to Server and add to vehicle images
        if ($req->hasFile('updated_main_image')) {
            //delete all images file in Serve
            $vehicle_images = DB::table('vehicle_images')
                ->select('image')
                ->where('v_id', $req->updated_id)
                ->get();

            foreach ($vehicle_images as $img) {
                if (file_exists(public_path() . '/assets/products-images/') . $img->image) {
                    unlink(public_path() . '/assets/products-images/' . $img->image);
                }
            }

            //delete all images in DB
            DB::table('vehicle_images')->where('v_id', $req->updated_id)->delete();

            //delete all accessories in DB
            DB::table('vehicle_accessories')->where('v_id', $req->updated_id)->delete();

            //upload logo files to project
            $logoFile = $req->file("updated_main_image");
            $logoFileSize = $logoFile->getSize();
            $logoFileExtension = $logoFile->getClientOriginalExtension();

            //validate extension
            $allowed = array('jpg', 'jpeg', 'png');
            if (!in_array($logoFileExtension, $allowed))
                return redirect('/dashboard/vehicles')->with('image_errors', ['File type not allowed.Please use Only JPG , JPEG , PNG files !']);

            //File Name
            $logofileName = $logoFile->getClientOriginalName();
            $logoFileNewName = (string)  $req->updated_id . '-' . date('Y-m-d') . '-' . rand(1, 500) . "." . $logoFileExtension;

            //validate file size
            if ($logoFileSize > 7500000)
                return redirect('/dashboard/vehicles')->with('image_errors', ['File size larger than 7MB !']);

            //Move Uploaded File
            $destinationPath = public_path() . '/assets/products-images/';
            $logoFile->move($destinationPath, $logoFileNewName);

            //upadate in vehicles
            DB::table('vehicles')
                ->where('v_id', $req->updated_id)
                ->update([
                    "brand" => $req->updated_brand,
                    "model" => $req->updated_model,
                    "condition" => $req->updated_condition,
                    "millage" => $req->updated_millage,
                    "fuel_type" => $req->updated_fueltype,
                    "transmission" => $req->updated_transmission,
                    "body_style" => $req->updated_body_style,
                    "mpg" => $req->updated_mpg,
                    "engine_size" => $req->updated_engine_size,
                    "first_registered" => $req->updated_first_registered,
                    "color" => $req->updated_color,
                    "price" => $req->updated_price,
                    "power" => $req->updated_power,
                    "road_tax" => $req->updated_road_tax,
                    "co2_emission" => $req->updated_co2_emission,
                    "overview" => $req->updated_overview,
                    "main_img" => $logoFileNewName,
                    "status" => $req->updated_status,
                ]);


            VehicleImages::create([
                "v_id" => $req->updated_id,
                "image" => $logoFileNewName,
            ]);
        } else {
            //upadate in vehicles
            DB::table('vehicles')
                ->where('v_id', $req->updated_id)
                ->update([
                    "brand" => $req->updated_brand,
                    "model" => $req->updated_model,
                    "condition" => $req->updated_condition,
                    "millage" => $req->updated_millage,
                    "fuel_type" => $req->updated_fueltype,
                    "transmission" => $req->updated_transmission,
                    "body_style" => $req->updated_body_style,
                    "mpg" => $req->updated_mpg,
                    "engine_size" => $req->updated_engine_size,
                    "first_registered" => $req->updated_first_registered,
                    "color" => $req->updated_color,
                    "price" => $req->updated_price,
                    "power" => $req->updated_power,
                    "road_tax" => $req->updated_road_tax,
                    "co2_emission" => $req->updated_co2_emission,
                    "overview" => $req->updated_overview,
                    "status" => $req->updated_status,
                ]);
        }

        if ($req->hasFile('updated_image_1')) {

            //upload logo files to project
            $logoFile = $req->file("updated_image_1");
            $logoFileSize = $logoFile->getSize();
            $logoFileExtension = $logoFile->getClientOriginalExtension();

            //validate extension
            $allowed = array('jpg', 'jpeg', 'png');
            if (!in_array($logoFileExtension, $allowed))
                return redirect('/dashboard/vehicles')->with('image_errors', ['File type not allowed.Please use Only JPG , JPEG , PNG files !']);

            //File Name
            $logofileName = $logoFile->getClientOriginalName();
            $logoFileNewName = (string)  $req->updated_id . '-' . date('Y-m-d') . '-' . rand(1, 500) . "." . $logoFileExtension;

            //validate file size
            if ($logoFileSize > 7500000)
                return redirect('/dashboard/vehicles')->with('image_errors', ['File size larger than 7MB !']);

            //Move Uploaded File
            $destinationPath = public_path() . '/assets/products-images/';
            $logoFile->move($destinationPath, $logoFileNewName);


            VehicleImages::create([
                "v_id" => $req->updated_id,
                "image" => $logoFileNewName,
            ]);
        }

        if ($req->hasFile('updated_image_2')) {
            //upload logo files to project
            $logoFile = $req->file("updated_image_2");
            $logoFileSize = $logoFile->getSize();
            $logoFileExtension = $logoFile->getClientOriginalExtension();

            //validate extension
            $allowed = array('jpg', 'jpeg', 'png');
            if (!in_array($logoFileExtension, $allowed))
                return redirect('/dashboard/vehicles')->with('image_errors', ['File type not allowed.Please use Only JPG , JPEG , PNG files !']);

            //File Name
            $logofileName = $logoFile->getClientOriginalName();
            $logoFileNewName = (string)  $req->updated_id . '-' . date('Y-m-d') . '-' . rand(1, 500) . "." . $logoFileExtension;

            //validate file size
            if ($logoFileSize > 7500000)
                return redirect('/dashboard/vehicles')->with('image_errors', ['File size larger than 7MB !']);

            //Move Uploaded File
            $destinationPath = public_path() . '/assets/products-images/';
            $logoFile->move($destinationPath, $logoFileNewName);


            VehicleImages::create([
                "v_id" => $req->updated_id,
                "image" => $logoFileNewName,
            ]);
        }

        if ($req->hasFile('updated_image_3')) {
            //upload logo files to project
            $logoFile = $req->file("updated_image_3");
            $logoFileSize = $logoFile->getSize();
            $logoFileExtension = $logoFile->getClientOriginalExtension();

            //validate extension
            $allowed = array('jpg', 'jpeg', 'png');
            if (!in_array($logoFileExtension, $allowed))
                return redirect('/dashboard/vehicles')->with('image_errors', ['File type not allowed.Please use Only JPG , JPEG , PNG files !']);

            //File Name
            $logofileName = $logoFile->getClientOriginalName();
            $logoFileNewName = (string)  $req->updated_id . '-' . date('Y-m-d') . '-' . rand(1, 500) . "." . $logoFileExtension;

            //validate file size
            if ($logoFileSize > 7500000)
                return redirect('/dashboard/vehicles')->with('image_errors', ['File size larger than 7MB !']);

            //Move Uploaded File
            $destinationPath = public_path() . '/assets/products-images/';
            $logoFile->move($destinationPath, $logoFileNewName);


            VehicleImages::create([
                "v_id" => $req->updated_id,
                "image" => $logoFileNewName,
            ]);
        }

        if ($req->hasFile('updated_image_4')) {
            //upload logo files to project
            $logoFile = $req->file("updated_image_4");
            $logoFileSize = $logoFile->getSize();
            $logoFileExtension = $logoFile->getClientOriginalExtension();

            //validate extension
            $allowed = array('jpg', 'jpeg', 'png');
            if (!in_array($logoFileExtension, $allowed))
                return redirect('/dashboard/vehicles')->with('image_errors', ['File type not allowed.Please use Only JPG , JPEG , PNG files !']);

            //File Name
            $logofileName = $logoFile->getClientOriginalName();
            $logoFileNewName = (string)  $req->updated_id . '-' . date('Y-m-d') . '-' . rand(1, 500) . "." . $logoFileExtension;

            //validate file size
            if ($logoFileSize > 7500000)
                return redirect('/dashboard/vehicles')->with('image_errors', ['File size larger than 7MB !']);

            //Move Uploaded File
            $destinationPath = public_path() . '/assets/products-images/';
            $logoFile->move($destinationPath, $logoFileNewName);


            VehicleImages::create([
                "v_id" => $req->updated_id,
                "image" => $logoFileNewName,
            ]);
        }

        if ($req->hasFile('updated_image_5')) {

            //upload logo files to project
            $logoFile = $req->file("updated_image_5");
            $logoFileSize = $logoFile->getSize();
            $logoFileExtension = $logoFile->getClientOriginalExtension();

            //validate extension
            $allowed = array('jpg', 'jpeg', 'png');
            if (!in_array($logoFileExtension, $allowed))
                return redirect('/dashboard/vehicles')->with('image_errors', ['File type not allowed.Please use Only JPG , JPEG , PNG files !']);

            //File Name
            $logofileName = $logoFile->getClientOriginalName();
            $logoFileNewName = (string)  $req->updated_id . '-' . date('Y-m-d') . '-' . rand(1, 500) . "." . $logoFileExtension;

            //validate file size
            if ($logoFileSize > 7500000)
                return redirect('/dashboard/vehicles')->with('image_errors', ['File size larger than 7MB !']);

            //Move Uploaded File
            $destinationPath = public_path() . '/assets/products-images/';
            $logoFile->move($destinationPath, $logoFileNewName);


            VehicleImages::create([
                "v_id" => $req->updated_id,
                "image" => $logoFileNewName,
            ]);
        }

        if ($req->hasFile('updated_image_6')) {

            //upload logo files to project
            $logoFile = $req->file("updated_image_6");
            $logoFileSize = $logoFile->getSize();
            $logoFileExtension = $logoFile->getClientOriginalExtension();

            //validate extension
            $allowed = array('jpg', 'jpeg', 'png');
            if (!in_array($logoFileExtension, $allowed))
                return redirect('/dashboard/vehicles')->with('image_errors', ['File type not allowed.Please use Only JPG , JPEG , PNG files !']);

            //File Name
            $logofileName = $logoFile->getClientOriginalName();
            $logoFileNewName = (string)  $req->updated_id . '-' . date('Y-m-d') . '-' . rand(1, 500) . "." . $logoFileExtension;

            //validate file size
            if ($logoFileSize > 7500000)
                return redirect('/dashboard/vehicles')->with('image_errors', ['File size larger than 7MB !']);

            //Move Uploaded File
            $destinationPath = public_path() . '/assets/products-images/';
            $logoFile->move($destinationPath, $logoFileNewName);


            VehicleImages::create([
                "v_id" => $req->updated_id,
                "image" => $logoFileNewName,
            ]);
        }

        if ($req->hasFile('updated_image_7')) {

            //upload logo files to project
            $logoFile = $req->file("updated_image_7");
            $logoFileSize = $logoFile->getSize();
            $logoFileExtension = $logoFile->getClientOriginalExtension();

            //validate extension
            $allowed = array('jpg', 'jpeg', 'png');
            if (!in_array($logoFileExtension, $allowed))
                return redirect('/dashboard/vehicles')->with('image_errors', ['File type not allowed.Please use Only JPG , JPEG , PNG files !']);

            //File Name
            $logofileName = $logoFile->getClientOriginalName();
            $logoFileNewName = (string)  $req->updated_id . '-' . date('Y-m-d') . '-' . rand(1, 500) . "." . $logoFileExtension;

            //validate file size
            if ($logoFileSize > 7500000)
                return redirect('/dashboard/vehicles')->with('image_errors', ['File size larger than 7MB !']);

            //Move Uploaded File
            $destinationPath = public_path() . '/assets/products-images/';
            $logoFile->move($destinationPath, $logoFileNewName);


            VehicleImages::create([
                "v_id" => $req->updated_id,
                "image" => $logoFileNewName,
            ]);
        }

        if ($req->hasFile('updated_image_8')) {

            //upload logo files to project
            $logoFile = $req->file("updated_image_8");
            $logoFileSize = $logoFile->getSize();
            $logoFileExtension = $logoFile->getClientOriginalExtension();

            //validate extension
            $allowed = array('jpg', 'jpeg', 'png');
            if (!in_array($logoFileExtension, $allowed))
                return redirect('/dashboard/vehicles')->with('image_errors', ['File type not allowed.Please use Only JPG , JPEG , PNG files !']);

            //File Name
            $logofileName = $logoFile->getClientOriginalName();
            $logoFileNewName = (string)  $req->updated_id . '-' . date('Y-m-d') . '-' . rand(1, 500) . "." . $logoFileExtension;

            //validate file size
            if ($logoFileSize > 7500000)
                return redirect('/dashboard/vehicles')->with('image_errors', ['File size larger than 7MB !']);

            //Move Uploaded File
            $destinationPath = public_path() . '/assets/products-images/';
            $logoFile->move($destinationPath, $logoFileNewName);


            VehicleImages::create([
                "v_id" => $req->updated_id,
                "image" => $logoFileNewName,
            ]);
        }

        //add to vehicle_accessories
        $this->addAccessories($req->updated_id, [$req->updated_AC, $req->updated_ABS, $req->updated_PS, $req->updated_PW, $req->updated_CP, $req->updated_LS, $req->updated_CL, $req->updated_PDL, $req->updated_BA, $req->updated_DA]);

        return redirect('/dashboard/vehicles')->with('status', 'Vehicle Updating Successfull !')->with('msg', 'Vehicle is updated in gurage..');
    }

    public function deleteVehicle(Request $req)
    {

        //remove images from Server
        $vehicle_images = DB::table('vehicle_images')
            ->select('image')
            ->where('v_id', $req->id_key)
            ->get();

        foreach ($vehicle_images as $img) {
            if (file_exists(public_path() . '/assets/products-images/') . $img->image) {
                unlink(public_path() . '/assets/products-images/' . $img->image);
            }
        }

        //remove from DB
        DB::table('vehicles')->where('v_id', $req->id_key)->delete();

        //remove images from DB
        DB::table('vehicle_images')->where('v_id', $req->id_key)->delete();

        //remove accessiors from DB
        DB::table('vehicle_accessories')->where('v_id', $req->id_key)->delete();

        return redirect('/dashboard/vehicles')->with('status', 'Vehicle Deleting Successfull !')->with('msg', 'Vehicle is deleted from gurage..');
    }

    public function getVehiclesData(Request $req)
    {
        $vehicle_images = DB::table('vehicle_images')->where('v_id', $req->vehicle_id)->get('image');

        $accessories = DB::table('accessories')
            ->join('vehicle_accessories', 'accessories.a_id', '=', 'vehicle_accessories.a_id')
            ->where('vehicle_accessories.v_id', $req->vehicle_id)
            ->select('vehicle_accessories.*', 'accessories.*')
            ->get();

        return ['vehicle_images' => $vehicle_images, 'vehicle_accessories' => $accessories];
    }

    public function getModelsData(Request $req)
    {
        $models = DB::table('brands')
            ->join('models', 'brands.id', '=', 'models.b_id')
            ->where('brands.brand', $req->brand)
            ->select('models.*')
            ->get();

        return ['models' => $models];
    }


    public function filterVehicles(Request $req)
    {
        $brands = DB::table('brands')
            ->select('brands.*')
            ->orderBy('brands.brand', 'ASC')
            ->get();

        $vehicles = DB::table('vehicles')
            ->select('vehicles.*')
            ->orderBy('vehicles.v_id', 'ASC')
            ->get();

        $models = DB::table('models')
            ->select('models.*')
            ->orderBy('models.model', 'ASC')
            ->get();

        // 1 : only brand
        if ($req->brand != null && $req->model == null && $req->min_price == null && $req->transmission == null && $req->fuel_type == null) {
            $vehicles = DB::table('vehicles')
                ->where('brand', '=', $req->brand)
                ->get();

            return view('pages.frontend-vehicles', ['vehicles' => $vehicles, 'brands' => $brands, 'models' => $models]);
        }
        //   1.1 : brand with model
        if ($req->brand != null && $req->model != null && $req->min_price == null && $req->transmission == null && $req->fuel_type == null) {
            // dd('hi');
            $vehicles = DB::table('vehicles')
                ->where('brand', '=', $req->brand)
                ->where('model', '=', $req->model)
                ->get();

            return view('pages.frontend-vehicles', ['vehicles' => $vehicles, 'brands' => $brands, 'models' => $models]);
        }
        //   1.2 : brand with prices
        if ($req->brand != null && $req->min_price != null && $req->max_price != null && $req->model == null &&  $req->transmission == null && $req->fuel_type == null) {

            $vehicles = DB::table('vehicles')
                ->where('brand', '=', $req->brand)
                ->where('model', '=', $req->model)
                ->whereBetween('price', [$req->min_price, $req->max_price])
                ->get();

            return view('pages.frontend-vehicles', ['vehicles' => $vehicles, 'brands' => $brands, 'models' => $models]);
        }

        //   1.2 : brand with transmission
        if ($req->brand != null && $req->model == null &&  $req->transmission != null && $req->fuel_type == null) {

            $vehicles = DB::table('vehicles')
                ->where('brand', '=', $req->brand)
                ->where('transmission', '=', $req->transmission)
                ->get();

            return view('pages.frontend-vehicles', ['vehicles' => $vehicles, 'brands' => $brands, 'models' => $models]);
        }

        //   1.2 : brand with fuel_type 
        if ($req->brand != null && $req->model == null &&  $req->transmission == null && $req->fuel_type != null) {

            $vehicles = DB::table('vehicles')
                ->where('brand', '=', $req->brand)
                ->where('fuel_type', '=', $req->fuel_type)
                ->get();

            return view('pages.frontend-vehicles', ['vehicles' => $vehicles, 'brands' => $brands]);
        }

        //   1.3 : brand , model with transmission
        if ($req->brand != null && $req->model != null &&  $req->transmission != null && $req->fuel_type == null) {

            $vehicles = DB::table('vehicles')
                ->where('brand', '=', $req->brand)
                ->where('model', '=', $req->model)
                ->where('transmission', '=', $req->transmission)
                ->get();

            return view('pages.frontend-vehicles', ['vehicles' => $vehicles, 'brands' => $brands]);
        }
        //   1.4 : brand , model  with fuel_type
        if ($req->brand != null && $req->model != null &&  $req->transmission == null && $req->fuel_type != null) {

            $vehicles = DB::table('vehicles')
                ->where('brand', '=', $req->brand)
                ->where('model', '=', $req->model)
                ->where('fuel_type', '=', $req->fuel_type)
                ->get();

            return view('pages.frontend-vehicles', ['vehicles' => $vehicles, 'brands' => $brands, 'models' => $models]);
        }

        // 2 : only transmission
        if ($req->transmission != null && $req->model == null && $req->min_price == null && $req->brand == null && $req->fuel_type == null) {

            $vehicles = DB::table('vehicles')
                ->where('transmission', '=', $req->transmission)
                ->get();

            return view('pages.frontend-vehicles', ['vehicles' => $vehicles, 'brands' => $brands, 'models' => $models]);
        }

        // 3 : only fuel type
        if ($req->fuel_type != null && $req->model == null && $req->min_price == null && $req->brand == null && $req->transmission == null) {

            $vehicles = DB::table('vehicles')
                ->where('fuel_type', '=', $req->fuel_type)

                ->get();

            return view('pages.frontend-vehicles', ['vehicles' => $vehicles, 'brands' => $brands, 'models' => $models]);
        }

        // 4 : only with max , min prices 
        if ($req->min_price != null && $req->max_price != null && $req->fuel_type == null && $req->model == null &&  $req->brand == null && $req->transmission == null) {

            $vehicles = DB::table('vehicles')
                ->whereBetween('price', [$req->min_price, $req->max_price])
                ->get();

            return view('pages.frontend-vehicles', ['vehicles' => $vehicles, 'brands' => $brands, 'models' => $models]);
        }

        // 4 : only with brand and conditions
        if ($req->brand != null && $req->condition != null && $req->fuel_type == null && $req->model == null &&  $req->min_price == null && $req->transmission == null) {

            $vehicles = DB::table('vehicles')
                ->where('condition', '=', $req->condition)
                ->where('brand', 'LIKE', $req->brand)
                ->get();

            return view('pages.frontend-vehicles', ['vehicles' => $vehicles, 'brands' => $brands, 'models' => $models]);
        }


        return view('pages.frontend-vehicles', ['vehicles' => $vehicles, 'brands' => $brands, 'models' => $models]);
    }

    public function orderVehicles(Request $req)
    {
        $paginate = empty($req->paginate) ? 5 : $req->paginate;
        $sort = empty($req->sort) ? 'ASC' : $req->sort;
        $order = empty($req->order) ? 'brand' : $req->order;

        $vehicles = DB::table('vehicles')
            ->select('vehicles.*')
            ->orderBy($sort, $order)
            // ->get()
            ->paginate($paginate);

        $brands = DB::table('brands')
            ->select('brands.*')
            ->orderBy('brands.brand', 'ASC')
            ->get();


        $models = DB::table('models')
            ->select('models.*')
            ->orderBy('models.model', 'ASC')
            ->get();

        return view('pages.frontend-vehicles', ['vehicles' => $vehicles, 'brands' => $brands, 'models' => $models]);

        // return ['vehicles' => $vehicles, 'brands' => $brands, 'models' => $models];
    }

    // API ------------------------------------------

    public function fetchVehicles()
    {
        $vehicles = Vehicles::all();
        return response()->json($vehicles);
    }
}
