<?php

namespace App\Http\Controllers;

use App\Models\Vehicles;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //frontend
    public function viewHomePartEx()
    {
        return view('pages.frontend-part-ex');
    }

    public function viewDealerPromises()
    {
        return view('pages.frontend-dealer-promises');
    }

    public function viewAAwarrenty()
    {
        return view('pages.frontend-aa-warrenty');
    }

    public function viewContactUs()
    {
        return view('pages.frontend-contact-us');
    }

    public function viewAllVehicles(Request $req)
    {
        $paginate = empty($req->paginate) ? 5 : $req->paginate;
        $sort = empty($req->sort) ? "brand" : $req->sort;
        $order = empty($req->order) ? "ASC" : $req->order;

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
    }

    public function viewVehicle(Request $req)
    {
        $vehicle = DB::table('vehicles')
            ->select('vehicles.*')
            ->where('v_id', $req->v_id)
            ->get();

        $related_vehicles = DB::table('vehicles')
            ->select('vehicles.*')
            ->where('brand', $vehicle[0]->brand)
            ->get();

        $vehicle_images = DB::table('vehicle_images')->where('v_id', $req->v_id)->get('image');

        $accessories = DB::table('accessories')
            ->join('vehicle_accessories', 'accessories.a_id', '=', 'vehicle_accessories.a_id')
            ->where('vehicle_accessories.v_id', $req->v_id)
            ->select('vehicle_accessories.*', 'accessories.*')
            ->get();

        return view('pages.frontend-vehicle-details', ['vehicle' => $vehicle, 'images' => $vehicle_images, 'accessories' => $accessories, 'related_vehicles' => $related_vehicles]);
    }

    //backend
    public function viewHome()
    {
        $countVehicles = DB::table('vehicles')->count();
        $countBrands = DB::table('brands')->count();
        $countSubs = DB::table('subscribers')->count();
        $countPartEx = DB::table('part_exchanges')->count();

        return view('dashboard', ["route" => "home", "pagename" => "Home", "breadcrumb" => ["Dashboard", "Home"], "countVehicles" => $countVehicles, "countBrands" => $countBrands, "countSubs" => $countSubs, "countPartEx" => $countPartEx]);
    }

    public function viewVehicles()
    {
        $vehicles = DB::table('vehicles')
            ->select('vehicles.*')
            ->orderBy('vehicles.brand', 'ASC')
            ->get();

        $brands = DB::table('brands')
            ->select('brands.*')
            ->orderBy('brands.brand', 'ASC')
            ->get();

        return view('dashboard', ["route" => "vehicles", "pagename" => "Vehicles", "breadcrumb" => ["Dashboard", "Vehicles"], "vehicles" => $vehicles, "brands" => $brands]);
    }
    public function viewBrands()
    {
        $brands = DB::table('brands')
            ->select('brands.*')
            ->orderBy('brands.brand', 'ASC')
            ->get();

        return view('dashboard', ["route" => "brands", "pagename" => "Vehicle Makes", "breadcrumb" => ["Dashboard", "Makes"], "brands" => $brands]);
    }

    public function viewModels()
    {
        $brands = DB::table('brands')
            ->select('brands.*')
            ->orderBy('brands.brand', 'ASC')
            ->get();

        $models = DB::table('models')
            ->join('brands', 'models.b_id', '=', 'brands.id')
            ->select('models.*', 'brands.brand')
            ->orderBy('brands.brand', 'ASC')
            ->get();

        return view('dashboard', ["route" => "models", "pagename" => "Vehicle Models", "breadcrumb" => ["Dashboard", "Models"], "brands" => $brands, "models" => $models]);
    }

    public function viewPartExchanges()
    {
        $part_exchanges = DB::table('part_exchanges')
            ->select('part_exchanges.*')
            ->orderBy('part_exchanges.created_at', 'ASC')
            ->get();

        return view('dashboard', ["route" => "part-ex", "pagename" => "Part Exchanges", "breadcrumb" => ["Dashboard", "Part Exchanges"], "part_exchanges" => $part_exchanges]);
    }

    public function viewSubscribers(Request $req)
    {
        $subs = DB::table('subscribers')
            ->select('subscribers.*')
            ->orderBy('subscribers.created_at', 'ASC')
            ->get();

        return view('dashboard', ["route" => "subscribers", "pagename" => "Newsletters", "breadcrumb" => ["Dashboard", "Inquaries", "Newsletters"], "subscribers" => $subs]);
    }

    public function viewContacts(Request $req)
    {
        $contacts = DB::table('contact_us')
            ->select('contact_us.*')
            ->orderBy('contact_us.created_at', 'ASC')
            ->get();

        return view('dashboard', ["route" => "contacts", "pagename" => "Contact Us", "breadcrumb" => ["Dashboard", "Inquaries", "Contacts"], "contacts" => $contacts]);
    }

    public function viewFeedbacks(Request $req)
    {
        // $feedbacks = DB::table('feedbacks')
        //     ->select('feedbacks.*')
        //     ->orderBy('feedbacks.created_at', 'ASC')
        //     ->get();

        $vehicles = DB::table('vehicles')
            ->select('vehicles.*')
            ->orderBy('vehicles.brand', 'ASC')
            ->get();

        $feedbacks = DB::table('feedbacks')
            ->join('vehicles', 'feedbacks.v_id', '=', 'vehicles.id')
            ->select('feedbacks.*', 'vehicles.main_img', 'vehicles.brand', 'vehicles.model')
            ->get();

        return view('dashboard', ["route" => "feedbacks", "pagename" => "Feedbacks", "breadcrumb" => ["Dashboard", "Feedback"], "feedbacks" => $feedbacks, "vehicles" => $vehicles]);
    }
}
