<?php

use App\Http\Controllers\BrandsController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedbacksController;
use App\Http\Controllers\ModelsController;
use App\Http\Controllers\PartExchangesController;
use App\Http\Controllers\SubscribersController;
use App\Http\Controllers\VehiclesController;
use App\Models\Vehicles;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $recent_vehicles = Vehicles::latest()->get();

    $brands = DB::table('brands')
        ->select('brands.*')
        ->where('brands.status' , 1)
        ->orderBy('brands.brand', 'ASC')
        ->get();

    // $models = DB::table('models')
    //     ->select('models.*')
    //     ->where('models.status' , 1)
    //     ->orderBy('models.model', 'ASC')
    //     ->get();

    $feedbacks = DB::table('feedbacks')
        ->join('vehicles', 'feedbacks.v_id', '=', 'vehicles.id')
        ->select('feedbacks.*', 'vehicles.main_img')
        ->get();

    $used_vehicles = DB::table('vehicles')
        ->select('vehicles.*')
        ->where('condition' , '=' , 0)
        ->where('vehicles.status' , 1)
        ->orderBy('vehicles.brand', 'ASC')
        ->get();

    return view('welcome', ['recent_vehicles' => $recent_vehicles, 'brands' => $brands, 'feedbacks' => $feedbacks , 'used_vehicles' => $used_vehicles]);
});

//fetch data via JS POST
Route::post('/dashboard/vehicles/get_data', [VehiclesController::class, 'getVehiclesData'])->name('vehicles.get_data');
Route::post('/dashboard/models/get_data', [VehiclesController::class, 'getModelsData'])->name('models.get_data');
Route::get('model/{name}', [VehiclesController::class, 'getModelByBrand']);

//frontend pages
Route::get('/part-exchanges', [DashboardController::class, 'viewHomePartEx'])->name('frontend-part-ex');
Route::get('/dealer-promises', [DashboardController::class, 'viewDealerPromises'])->name('dealer-promises');
Route::get('/aa-warrenty', [DashboardController::class, 'viewAAwarrenty'])->name('aa-warrenty');
Route::get('/contact-us', [DashboardController::class, 'viewContactUs'])->name('contact-us');
Route::get('/vehicles', [DashboardController::class, 'viewAllVehicles'])->name('vehicles');
Route::get('/vehicle-details', [DashboardController::class, 'viewVehicle'])->name('vehicle.details');

//add newsletter
Route::post('/subscribers/send', [SubscribersController::class, 'addSubscribers'])->name('add-subscriber');

//add part ex inqurry
Route::post('/part-exchanges/send', [PartExchangesController::class, 'addPartEx'])->name('add-part-ex');

//add contact-us inqurry
Route::post('/contact-us/send', [ContactsController::class, 'addContactUs'])->name('send-contact-us');

//adding product-inquiry
Route::post('/dashboard/add-product-inquiry', [ContactsController::class, 'addProductInquiry'])->name('send-product-inquiry');

//filter
Route::get('/vehicles/filter', [VehiclesController::class, 'filterVehicles'])->name('filter-vehicles');

//order by
Route::post('/order/filter', [VehiclesController::class, 'orderVehicles'])->name('set-order');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $countVehicles = DB::table('vehicles')->count();
        $countBrands = DB::table('brands')->count();
        $countSubs = DB::table('subscribers')->count();
        $countPartEx = DB::table('part_exchanges')->count();

        return view('dashboard', ["route" => "home", "pagename" => "Home", "breadcrumb" => ["Dashboard", "Home"], "countVehicles" => $countVehicles, "countBrands" => $countBrands, "countSubs" => $countSubs, "countPartEx" => $countPartEx]);
    })->name('dashboard');

    //backend pages
    Route::get('/dashboard/home', [DashboardController::class, 'viewHome'])->name('dashboard.home');
    Route::get('/dashboard/vehicles', [DashboardController::class, 'viewVehicles'])->name('dashboard.vehicles');
    Route::get('/dashboard/models', [DashboardController::class, 'viewModels'])->name('dashboard.models');
    Route::get('/dashboard/brands', [DashboardController::class, 'viewBrands'])->name('dashboard.brands');
    Route::get('/dashboard/part-exchanges', [DashboardController::class, 'viewPartExchanges'])->name('dashboard.part-exchanges');
    Route::get('/dashboard/inquries/subscribers', [DashboardController::class, 'viewSubscribers'])->name('dashboard.subscribers');
    Route::get('/dashboard/inquries/contact', [DashboardController::class, 'viewContacts'])->name('dashboard.contacts');
    Route::get('/dashboard/feedbacks', [DashboardController::class, 'viewFeedbacks'])->name('dashboard.feedbacks');

    //adding vehicle
    Route::post('/dashboard/add-vehicle', [VehiclesController::class, 'addVehicle'])->name('add-vehicle');

    //adding brand
    Route::post('/dashboard/add-brand', [BrandsController::class, 'addBrand'])->name('add-brand');

    //adding model
    Route::post('/dashboard/add-model', [ModelsController::class, 'addModel'])->name('add-model');

    //adding feedback
    Route::post('/dashboard/add-feedback', [FeedbacksController::class, 'addFeedback'])->name('add-feedback');

    //update brand
    Route::post('/dashboard/update-brand', [BrandsController::class, 'updateBrand'])->name('update-brand');

    //update model
    Route::post('/dashboard/update-model', [ModelsController::class, 'updateModel'])->name('edit-model');

    //update vehicle
    Route::post('/dashboard/update-vehicle', [VehiclesController::class, 'updateVehicle'])->name('update-vehicle');

    //update feedback
    Route::post('/dashboard/update-feedback', [FeedbacksController::class, 'updateFeedback'])->name('edit-feedback');

    //delete brand
    Route::post('/dashboard/delete-brand', [BrandsController::class, 'deleteBrand'])->name('delete-brand');

    //delete subscriber
    Route::post('/dashboard/delete-sub', [SubscribersController::class, 'deleteSubscribers'])->name('delete-sub');

    //delete contact-us 
    Route::post('/dashboard/delete-contacts', [ContactsController::class, 'deleteContacts'])->name('delete-contacts');

    //delete vehicle
    Route::post('/dashboard/delete-vehicle', [VehiclesController::class, 'deleteVehicle'])->name('delete-vehicle');

    //delete model
    Route::post('/dashboard/delete-model', [ModelsController::class, 'deleteModel'])->name('delete-model');

    //delete feedback
    Route::post('/dashboard/delete-feedback', [FeedbacksController::class, 'deleteFeedback'])->name('delete-feedback');

    //delete part exchange
    Route::post('/dashboard/delete-part-exchange', [PartExchangesController::class, 'deletePartEx'])->name('delete-part-ex');

});
