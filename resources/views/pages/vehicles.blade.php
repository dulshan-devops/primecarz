@php
    $count = 0;
    $columns = ['Id', 'Make', 'Model', 'Transmission', 'Fuel Type', 'Condition', 'Color', 'Price', 'Actions'];
@endphp



<div class="row">
    <div class="col-12">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">{{ session('status') }}</h4>
                <hr>
                <p class="mb-0">{{ session('msg') }}</p>
            </div>
        @endif

        @if (Session::has('errors'))

            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Data Adding Unsuccessfull !</h4>
                <p>Ensure that these requirements are met:</p>
                <hr>
                <ul class="list-group list-group-flush">
                    @foreach ($errors->all() as $error)
                        <li class="">
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (Session::has('image_errors'))

            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Data Adding Unsuccessfull !</h4>
                <p>Ensure that these requirements are met:</p>
                <hr>
                <ul class="list-group list-group-flush">
                    @foreach (Session::get('image_errors') as $error)
                        <li class="">
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addVehicleModal"><i class="fas fa-plus mr-2"></i> Add Vehicle</button>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-striped dataTable dtr-inline table-hover novaTable"
                                aria-describedby="example1_info">
                                <thead>
                                    <tr>
                                        @foreach ($columns as $column)
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                {{ $column }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vehicles as $row)
                                        @php
                                            $count++;
                                        @endphp
                                        <tr class="odd">
                                            <td class="dtr-control sorting_1" tabindex="0">{{ $count }}</td>
                                            <td>{{ $row->brand }}</td>
                                            <td>{{ $row->model }}</td>
                                            @if ($row->transmission == 0)
                                                <td><span class="badge badge-pill badge-warning">Manual</span></td>
                                            @elseif($row->transmission == 1)
                                                <td><span class="badge badge-pill badge-primary">Automatic</span></td>
                                            @elseif($row->transmission == 2)
                                                <td><span class="badge badge-pill badge-success">Semi Auto</span></td>
                                            @endif

                                            @if ($row->fuel_type == 0)
                                                <td><span class="badge badge-pill badge-primary">Hybrid</span></td>
                                            @elseif($row->fuel_type == 1)
                                                <td><span class="badge badge-pill badge-primary">Petrol</span></td>
                                            @elseif ($row->fuel_type == 2)
                                                <td><span class="badge badge-pill badge-primary">Desel</span></td>
                                            @elseif ($row->fuel_type == 3)
                                                <td><span class="badge badge-pill badge-primary">Electric</span></td>
                                            @elseif ($row->fuel_type == 4)
                                                <td><span class="badge badge-pill badge-primary">Bi-Fuel</span></td>
                                            @elseif ($row->fuel_type == 5)
                                                <td><span class="badge badge-pill badge-primary">LPG</span></td>
                                            @endif

                                            @if ($row->condition == 0)
                                                <td><span class="badge badge-pill badge-warning">Used</span></td>
                                            @else
                                                <td><span class="badge badge-pill badge-success">Brand New</span></td>
                                            @endif
                                            <td>{{ $row->color }}</td>
                                            <td>{{ $row->price }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm mt-1"
                                                    data-bs-toggle="modal" data-bs-target="#viewVehicleModal"
                                                    onclick="setupVehicleView('{{ $row->v_id }}' ,'{{ $row->brand }}' , '{{ $row->model }}' , '{{ $row->transmission }}' ,
                                                     '{{ $row->fuel_type }}' , '{{ $row->millage }}' , '{{ $row->condition }}',
                                                     '{{ $row->color }}','{{ $row->price }}' , '{{ $row->engine_size }}' , '{{ $row->body_style }}' , '{{ $row->first_registered }}' ,
                                                     '{{ $row->power }}' , '{{ $row->co2_emission }}' , '{{ $row->mpg }}','{{ $row->road_tax }}','{{ $row->overview }}' , '{{ $row->status }}')">View
                                                    More</button>

                                                <button type="button" class="btn btn-warning btn-sm mt-1"
                                                    data-bs-toggle="modal" data-bs-target="#editVehicleModal"
                                                    onclick="setupVehicleEdit('{{ $row->v_id }}' ,'{{ $row->brand }}' , '{{ $row->model }}' , '{{ $row->transmission }}' ,
                                                    '{{ $row->fuel_type }}' , '{{ $row->millage }}' , '{{ $row->condition }}',
                                                    '{{ $row->color }}','{{ $row->price }}' , '{{ $row->engine_size }}' , '{{ $row->body_style }}' , '{{ $row->first_registered }}' ,
                                                    '{{ $row->power }}' , '{{ $row->co2_emission }}' , '{{ $row->mpg }}','{{ $row->road_tax }}','{{ $row->overview }}')">Edit</button>

                                                <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal"
                                                    onclick="setupVehiclesDelete('{{$row->v_id}}' , '{{$row->brand}}' , '{{$row->model}}')"
                                                    class="btn btn-danger btn-sm mt-1">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Add Vehicle Modal -->
<div class="modal fade" id="addVehicleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Vehicle</h1>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('add-vehicle') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="brand">Make</label>
                            <select name="brand" class="form-control"
                                onchange="setupModels(this.value , 'model' , '{{ csrf_token() }}')">
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->brand }}">{{ $brand->brand }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="model">Model</label>
                            <select name="model" class="form-control" id="model">

                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="millage">Millage</label>
                            <input type="number" class="form-control" name="millage">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fueltype">Fuel Type</label>
                            <select name="fueltype" class="form-control">
                                <option value="0">Hybrid</option>
                                <option value="1">Petrol</option>
                                <option value="2">Desel</option>
                                <option value="3">Electric</option>
                                <option value="4">Bi-Fuel</option>
                                <option value="5">LPG</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="transmission">Transmission</label>
                            <select name="transmission" class="form-control">
                                <option value="0">Manual</option>
                                <option value="1">Auto</option>
                                <option value="2">Semi Auto</option>
                            </select>

                        </div>
                        <div class="form-group col-md-3">
                            <label for="body_style">Body Style</label>
                            <input type="text" class="form-control" name="body_style">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="mpg">MPG</label>
                            <input type="number" class="form-control" name="mpg">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="power">Power</label>
                            <input type="number" class="form-control" name="power">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="co2_emission">Co2 Emission</label>
                            <input type="number" class="form-control" name="co2_emission">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="condition">Condition</label>
                            <select name="condition" class="form-control">
                                <option value="1">Brand New</option>
                                <option value="0">Used</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="engine_size">Engine Size</label>
                            <input type="text" class="form-control" name="engine_size">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="road_tax">Road Tax</label>
                            <input type="number" class="form-control" name="road_tax">
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="first_registered">First Registered</label>
                            <input type="date" class="form-control" name="first_registered">
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="color">Color</label>
                            <input type="text" class="form-control" name="color">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="main_image">Main Image</label>
                            <div class="form-group col-md-12">
                                <input type="file" class="custom-file-input" name="main_image">
                                <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="image_1">Image 1</label>
                            <div class="form-group col-md-12">
                                <input type="file" class="custom-file-input" name="image_1">
                                <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="image_2">Image 2</label>
                            <div class="form-group col-md-12">
                                <input type="file" class="custom-file-input" name="image_2">
                                <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="image_3">Image 3</label>
                            <div class="form-group col-md-12">
                                <input type="file" class="custom-file-input" name="image_3">
                                <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="image_4">Image 4</label>
                            <div class="form-group col-md-12">
                                <input type="file" class="custom-file-input" name="image_4">
                                <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="image_5">Image 5</label>
                            <div class="form-group col-md-12">
                                <input type="file" class="custom-file-input" name="image_5">
                                <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="image_6">Image 6</label>
                            <div class="form-group col-md-12">
                                <input type="file" class="custom-file-input" name="image_6">
                                <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="image_7">Image 7</label>
                            <div class="form-group col-md-12">
                                <input type="file" class="custom-file-input" name="image_7">
                                <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="image_8">Image 8</label>
                            <div class="form-group col-md-12">
                                <input type="file" class="custom-file-input" name="image_8">
                                <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="overview">Overview</label>
                            <textarea class="form-control" name="overview" rows="3"></textarea>
                        </div>
                    </div>



                    <div class="form-row border rounded">
                        <div class="form-group col-md-4">
                            <label for="overview">Accessories</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="AC" name="AC"
                                    id="AC">
                                <label class="form-check-label" for="AC">
                                    Air Conditioner
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="ABS" id="ABS"
                                    name="ABS">
                                <label class="form-check-label" for="ABS">
                                    AntiLock Braking System
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="PS" id="PS"
                                    name="PS">
                                <label class="form-check-label" for="PS">
                                    Power Steering
                                </label>
                            </div>

                        </div>
                        <div class="form-group col-md-4">
                            <label for="overview"></label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="PW" name="PW"
                                    id="PW">
                                <label class="form-check-label" for="PW">
                                    Power Windows
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="CP" id="CP"
                                    name="CP">
                                <label class="form-check-label" for="CP">
                                    CD Player
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="LS" name="LS"
                                    id="LS">
                                <label class="form-check-label" for="LS">
                                    Leather Seats
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="overview"></label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="CL" id="CL"
                                    name="CL">
                                <label class="form-check-label" for="CL">
                                    Central Locking
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="PDL" id="PDL"
                                    name="PDL">
                                <label class="form-check-label" for="PDL">
                                    Power Door Locks
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="BA" name="BA"
                                    id="BA">
                                <label class="form-check-label" for="BA">
                                    Brake Assist
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="DA" id="DA"
                                    name="DA">
                                <label class="form-check-label" for="DA">
                                    Driver Airbag
                                </label>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Add Vehicle</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Vehicle Modal -->
<div class="modal fade" id="editVehicleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Vehicle</h1>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('update-vehicle') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="updated_brand">Make</label>
                            <select name="updated_brand" class="form-control"
                                onchange="setupModels(this.value , 'updated_model', '{{ csrf_token() }}')">
                                <option value="" selected>Choose...</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->brand }}">{{ $brand->brand }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="updated_model">Model</label>
                            <select name="updated_model" class="form-control" id="updated_model">

                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="updated_price">Price</label>
                            <input type="number" class="form-control" name="updated_price" id="updated_price">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="updated_status">Status</label>
                            <select name="updated_status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="updated_millage">Millage</label>
                            <input type="number" class="form-control" name="updated_millage" id="updated_millage">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="updated_fueltype">Fuel Type</label>
                            <select name="updated_fueltype" class="form-control">
                                <option selected>Choose...</option>
                                <option value="0">Hybrid</option>
                                <option value="1">Petrol</option>
                                <option value="2">Desel</option>
                                <option value="3">Electric</option>
                                <option value="4">Bi-Fuel</option>
                                <option value="5">LPG</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="updated_transmission">Transmission</label>
                            <select name="updated_transmission" class="form-control">
                                <option selected>Choose...</option>
                                <option value="0">Manual</option>
                                <option value="1">Auto</option>
                                <option value="2">Semi Auto</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="updated_body_style">Body Style</label>
                            <input type="text" class="form-control" name="updated_body_style"
                                id="updated_body_style">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="updated_mpg">MPG</label>
                            <input type="text" class="form-control" name="updated_mpg" id="updated_mpg">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="updated_power">Power</label>
                            <input type="text" class="form-control" name="updated_power" id="updated_power">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="updated_co2_emission">Co2 Emission</label>
                            <input type="text" class="form-control" name="updated_co2_emission"
                                id="updated_co2_emission">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="updated_condition">Condition</label>
                            <select name="updated_condition" class="form-control">
                                <option value="" selected>Choose...</option>
                                <option value="1">Brand New</option>
                                <option value="0">Used</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="updated_engine_size">Engine Size</label>
                            <input type="text" class="form-control" name="updated_engine_size"
                                id="updated_engine_size">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="updated_road_tax">Road Tax</label>
                            <input type="text" class="form-control" name="updated_road_tax"
                                id="updated_road_tax">
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="updated_first_registered">First Registered</label>
                            <input type="date" class="form-control" name="updated_first_registered"
                                id="updated_first_registered">
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="updated_color">Color</label>
                            <input type="text" class="form-control" name="updated_color" id="updated_color">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="updated_main_image">Main Image</label>
                            <div class="form-group col-md-12">
                                <input type="file" class="custom-file-input" name="updated_main_image">
                                <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="updated_image_1">Image 1</label>
                            <div class="form-group col-md-12">
                                <input type="file" class="custom-file-input" name="updated_image_1">
                                <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="updated_image_2">Image 2</label>
                            <div class="form-group col-md-12">
                                <input type="file" class="custom-file-input" name="updated_image_2">
                                <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="updated_image_3">Image 3</label>
                            <div class="form-group col-md-12">
                                <input type="file" class="custom-file-input" name="updated_image_3">
                                <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="updated_image_4">Image 4</label>
                            <div class="form-group col-md-12">
                                <input type="file" class="custom-file-input" name="updated_image_4">
                                <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="updated_image_5">Image 5</label>
                            <div class="form-group col-md-12">
                                <input type="file" class="custom-file-input" name="updated_image_5">
                                <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="updated_image_6">Image 6</label>
                            <div class="form-group col-md-12">
                                <input type="file" class="custom-file-input" name="updated_image_6">
                                <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="updated_image_7">Image 7</label>
                            <div class="form-group col-md-12">
                                <input type="file" class="custom-file-input" name="updated_image_7">
                                <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="updated_image_8">Image 8</label>
                            <div class="form-group col-md-12">
                                <input type="file" class="custom-file-input" name="updated_image_8">
                                <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="updated_overview">Overview</label>
                            <textarea class="form-control" name="updated_overview" rows="3" id="updated_overview"></textarea>
                        </div>
                    </div>



                    <div class="form-row border rounded">
                        <div class="form-group col-md-4">
                            <label for="overview">Accessories</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="AC" name="updated_AC"
                                    id="updated_AC">
                                <label class="form-check-label" for="updated_AC">
                                    Air Conditioner
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="ABS" id="updated_ABS"
                                    name="updated_ABS">
                                <label class="form-check-label" for="updated_ABS">
                                    AntiLock Braking System
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="PS" id="updated_PS"
                                    name="updated_PS">
                                <label class="form-check-label" for="updated_PS">
                                    Power Steering
                                </label>
                            </div>

                        </div>
                        <div class="form-group col-md-4">
                            <label for="overview"></label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="PW" name="updated_PW"
                                    id="updated_PW">
                                <label class="form-check-label" for="updated_PW">
                                    Power Windows
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="CP" id="updated_CP"
                                    name="updated_CP">
                                <label class="form-check-label" for="updated_CP">
                                    CD Player
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="LS" name="updated_LS"
                                    id="updated_LS">
                                <label class="form-check-label" for="updated_LS">
                                    Leather Seats
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="overview"></label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="CL" id="updated_CL"
                                    name="updated_CL">
                                <label class="form-check-label" for="updated_CL">
                                    Central Locking
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="PDL" id="updated_PDL"
                                    name="updated_PDL">
                                <label class="form-check-label" for="updated_PDL">
                                    Power Door Locks
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="BA" name="updated_BA"
                                    id="updated_BA">
                                <label class="form-check-label" for="updated_BA">
                                    Brake Assist
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="DA" id="updated_DA"
                                    name="updated_DA">
                                <label class="form-check-label" for="updated_DA">
                                    Driver Airbag
                                </label>
                            </div>

                            {{-- hidden input --}}
                            <input type="text" class="form-control" name="updated_id" id="updated_id" hidden>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-12 table-responsive">
                            <div class="container border p-1 rounded">
                                <div class="col-sm">
                                    <center id="updated_img_container">
                                        {{-- <img src="{{ url('/assets') }}/products-images/car1.jpg"
                                            alt="Brand Logo" class="brand-image" style="opacity: .8"> --}}
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning"><i class="fas fa-sync mr-2"></i>Update
                    Vehicle</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!--View Vehicle Modal -->
<div class="modal fade" id="viewVehicleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">View Vehicle</h1>
            </div>
            <div class="modal-body">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            {{-- <div class="callout callout-info">
                                <h5><i class="fas fa-info"></i> Note:</h5>
                                This page has been enhanced for printing. Click the print button at the bottom of the
                                invoice to test.
                            </div> --}}

                            <div class="invoice p-3 mb-3">

                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <i class="fas fa-globe"></i> <b id="brand"></b>
                                            <small class="float-right"> status : <span
                                                    class="badge badge-pill badge-info"
                                                    id="status">Unavailable</span>

                                            </small>
                                        </h4>
                                    </div>

                                </div>

                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">

                                        model : <strong id="model_lable"></strong>
                                        <address>
                                            Transmission : <b id="transmission"></b><br>
                                            Fuel type : <b id="fuel_type"></b><br>
                                            Power: <b id="power"></b><br>
                                            Millage : <b id="millage"></b>
                                        </address>
                                    </div>

                                    <div class="col-sm-4 invoice-col">
                                        <address>
                                            condition : <b id="condition"></b><br>
                                            Color : <b id="color"></b><br>
                                            Price : <b id="price"></b><br>
                                            Engine Size : <b id="engine_size"></b><br>
                                            Body Style : <b id="body_style"></b>
                                        </address>
                                    </div>

                                    <div class="col-sm-4 invoice-col">
                                        first registered : <b id="first_registered"></b><br>
                                        Co2 Emission : <b id="co2_emission"></b><br>
                                        Road Tax : <b id="road_tax"></b><br>
                                        MPG : <b id="mpg"></b><br>
                                    </div>

                                </div>

                                <div class="row border-top">

                                    <div class="col-6">
                                        <p class="lead"><b>Overview :</b></p>
                                        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;"
                                            id="overview">
                                            The vehicle specification displayed may not be exact for this vehicle.
                                            Please contact us to confirm the precise specifications
                                        </p>
                                    </div>

                                    <div class="col-6 mb-2">
                                        <p class="lead"><b>Accessories :</b> </p>
                                        <ul class="list-group" id="accessories_container">

                                        </ul>
                                    </div>

                                </div>

                                <div class="row mb-2">
                                    <div class="col-12 table-responsive">
                                        <div class="container border p-1 rounded">
                                            <div class="col-sm">
                                                <center id="img_container">
                                                    {{-- <img src="{{ url('/assets') }}/products-images/car1.jpg"
                                                        alt="Brand Logo" class="brand-image" style="opacity: .8"> --}}
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                {{-- <div class="row no-print">
                                    <div class="col-12">
                                        <a href="invoice-print.html" rel="noopener" target="_blank"
                                            class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                        <button type="button" class="btn btn-success float-right"><i
                                                class="far fa-credit-card"></i> Submit
                                            Payment
                                        </button>
                                        <button type="button" class="btn btn-primary float-right"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-download"></i> Generate PDF
                                        </button>
                                    </div>
                                </div> --}}
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>

@include('elements.nova-delete-modal', [
    'route' => 'delete-vehicle',
])


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
    integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

<script>
    function setupVehicleView($id, $brand, $model, $transmission, $fuel_type, $millage, $condition,
        $color, $price, $engine_size, $body_style,
        $first_registered, $power, $co2_emission, $mpg, $road_tax, $overview, $status) {

        //brand
        document.getElementById('brand').innerHTML = $brand;

        //model
        document.getElementById('model_lable').innerHTML = $model;

        //status
        if ($status == 1) {
            document.getElementById('status').innerHTML = "Available";
        } else {
            document.getElementById('status').innerHTML = "Unavailable";
        }


        //transmission
        if ($transmission == 1) {
            document.getElementById('transmission').innerHTML = "Automatic";
        } else {
            document.getElementById('transmission').innerHTML = "Manual";
        }


        //fuel type
        if ($fuel_type == 0) {
            document.getElementById('fuel_type').innerHTML = "Hybrid";
        } else if ($fuel_type == 1) {
            document.getElementById('fuel_type').innerHTML = "Petrol";
        } else if ($fuel_type == 2) {
            document.getElementById('fuel_type').innerHTML = "Desel";
        } else if ($fuel_type == 3) {
            document.getElementById('fuel_type').innerHTML = "Electric";
        } else if ($fuel_type == 4) {
            document.getElementById('fuel_type').innerHTML = "Bi-Fuel";
        } else if ($fuel_type == 5) {
            document.getElementById('fuel_type').innerHTML = "LPG";
        }


        //power
        document.getElementById('power').innerHTML = $power + " BHP";

        //millage
        document.getElementById('millage').innerHTML = $millage + " Kmpl";

        //condition
        if ($transmission == 1) {
            document.getElementById('condition').innerHTML = "Brand New";
        } else {
            document.getElementById('condition').innerHTML = "Used";
        }

        //color
        document.getElementById('color').innerHTML = $color;

        //price
        document.getElementById('price').innerHTML = "£" + $price;

        //engine size
        document.getElementById('engine_size').innerHTML = $engine_size;

        //body style
        document.getElementById('body_style').innerHTML = $body_style;

        //f registered
        document.getElementById('first_registered').innerHTML = $first_registered;

        //co2_emission
        document.getElementById('co2_emission').innerHTML = $co2_emission + " g/km";

        //mpg
        document.getElementById('mpg').innerHTML = $mpg + " Urban";

        //road tax
        document.getElementById('road_tax').innerHTML = "£" + $road_tax;

        //overview
        document.getElementById('overview').innerHTML = $overview;

        var src = "{{ url('/storage/app/public/products-images/') }}"
        console.log(src)

        //images
        $.post("/dashboard/vehicles/get_data", {
                _token: "{{ csrf_token() }}",
                vehicle_id: $id
            })
            .done(function(data) {
                var vehicle_images = data.vehicle_images;
                var vehicle_accessories = data.vehicle_accessories;

                //setup vehicle accessories
                var ul = document.getElementById('accessories_container');
                ul.innerHTML = '';
                for (i = 0; i <= vehicle_accessories.length - 1; i++) {
                    var li = document.createElement('li'); // create li element.
                    var icon = document.createElement('i');

                    li.innerHTML = vehicle_accessories[i].name; // assigning text to li using array value.
                    li.classList.add("list-group-item");
                    li.classList.add("d-flex");
                    li.classList.add("justify-content-between");
                    li.classList.add("align-items-center");

                    li.setAttribute('style', 'display: block;'); // remove the bullets.
                    icon.setAttribute('style', 'color : rgb(41, 192, 41)');

                    icon.classList.add("fa");
                    icon.classList.add("fa-check-circle");

                    ul.appendChild(li);
                    li.appendChild(icon);
                }

                //setup vehicle images
                var img_container = document.getElementById('img_container');
                img_container.innerHTML = '';
                for (i = 0; i <= vehicle_images.length - 1; i++) {
                    var img = document.createElement('img');
                    img.classList.add("brand-image");

                    img.setAttribute('src',
                        '/storage/app/public/products-images/Audi-A3-6844-2023-06-15-320.jpg'
                    );
                    img.setAttribute('style', 'opacity: .8');

                    img_container.appendChild(img);
                }
            });

    }

    function setupVehicleEdit($id, $brand, $model, $transmission, $fuel_type, $millage, $condition,
        $color, $price, $engine_size, $body_style,
        $first_registered, $power, $co2_emission, $mpg, $road_tax, $overview) {

        //id
        document.getElementById('updated_id').value = $id;

        //millage
        document.getElementById('updated_millage').value = $millage;

        //color
        document.getElementById('updated_color').value = $color;

        //price
        document.getElementById('updated_price').value = $price;

        //engine size
        document.getElementById('updated_engine_size').value = $engine_size;

        //body style
        document.getElementById('updated_body_style').value = $body_style;

        //f registered
        document.getElementById('updated_first_registered').value = $first_registered;

        //mpg
        document.getElementById('updated_mpg').value = $mpg;

        //power
        document.getElementById('updated_power').value = $power;

        //co2 emission
        document.getElementById('updated_co2_emission').value = $co2_emission;

        //raod tax
        document.getElementById('updated_road_tax').value = $road_tax;

        //overview
        document.getElementById('updated_overview').value = $overview;

        //accessories 

        //images preview
        $.post("/dashboard/vehicles/get_data", {
                _token: "{{ csrf_token() }}",
                vehicle_id: $id
            })
            .done(function(data) {
                var vehicle_images = data.vehicle_images;
                var vehicle_accessories = data.vehicle_accessories;

                //setup vehicle accessories

                //setup vehicle images
                var img_container = document.getElementById('updated_img_container');
                img_container.innerHTML = '';
                for (i = 0; i <= vehicle_images.length - 1; i++) {
                    var img = document.createElement('img');
                    img.classList.add("brand-image");

                    img.setAttribute('src', "{{ url('/assets') }}" + "/products-images/" + vehicle_images[i]
                        .image);
                    img.setAttribute('style', 'opacity: .8');

                    img_container.appendChild(img);
                }
            });
    } 

    function setupVehiclesDelete($id, $brand , $model) {
        document.getElementById('id_key').value = $id;
        document.getElementById('lable').innerHTML = $brand+" "+$model+ " Vehicle";
    }
</script>