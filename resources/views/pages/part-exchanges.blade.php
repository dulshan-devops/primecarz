@php
    $columns = ['Full Name', 'Brand', 'Model', 'Transmission', 'Fuel Type', 'Color', 'Actions'];
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

        <div class="card">
            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            {{-- <div class="dt-buttons btn-group flex-wrap"> <button
                                    class="btn btn-secondary buttons-copy buttons-html5" tabindex="0"
                                    aria-controls="example1" type="button"><span>Copy</span></button> <button
                                    class="btn btn-secondary buttons-csv buttons-html5" tabindex="0"
                                    aria-controls="example1" type="button"><span>CSV</span></button> <button
                                    class="btn btn-secondary buttons-excel buttons-html5" tabindex="0"
                                    aria-controls="example1" type="button"><span>Excel</span></button> <button
                                    class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0"
                                    aria-controls="example1" type="button"><span>PDF</span></button> <button
                                    class="btn btn-secondary buttons-print" tabindex="0" aria-controls="example1"
                                    type="button"><span>Print</span></button>
                                <div class="btn-group"><button
                                        class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis"
                                        tabindex="0" aria-controls="example1" type="button"
                                        aria-haspopup="true"><span>Column visibility</span><span
                                            class="dt-down-arrow"></span></button></div>
                            </div> --}}
                            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addVehicleModal"><i class="fas fa-plus mr-2"></i> Add Vehicle</button> --}}
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
                                    @foreach ($part_exchanges as $row)
                                        <tr class="odd">
                                            <td class="dtr-control sorting_1" tabindex="0">{{ $row->full_name }}</td>
                                            <td>{{ $row->brand }}</td>
                                            <td>{{ $row->model }}</td>
                                            <td>{{ $row->transmission }}</td>
                                            <td>{{ $row->fuel_type }}</td>
                                            <td>{{ $row->color }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm mt-1"
                                                    data-bs-toggle="modal" data-bs-target="#viewPartExModal"
                                                    onclick="setupViewPartEx('{{ $row->full_name }}' , '{{ $row->telephone }}' , '{{ $row->mobile }}' , '{{ $row->email }}',
                                                    '{{ $row->brand }}' , '{{ $row->model }}' ,
                                                    '{{ $row->variant }}' , '{{ $row->color }}' , '{{ $row->fuel_type }}' , '{{ $row->registration }}' ,
                                                    '{{ $row->registration_date }}' , '{{ $row->millage }}' , '{{ $row->last_serviced }}' , '{{ $row->transmission }}' ,
                                                    '{{ $row->full_service_history }}' , '{{ $row->optional }}' , '{{ $row->created_at }}')">View
                                                    More</button>

                                                <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal"
                                                    class="btn btn-danger btn-sm mt-1">Delete</button>

                                                @include('elements.nova-delete-modal', [
                                                    'route' => 'delete-part-ex',
                                                    'key' => $row->id,
                                                    'lable' => ' Exchange Inquiry',
                                                ])
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

<!-- view Modal -->
<div class="modal fade" id="viewPartExModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">View Part Exchange Inqury</h1>
            </div>
            <div class="modal-body">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <div class="invoice p-3 mb-3">

                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <i class="fas fa-globe"></i> <label for="vehicle" id="vehicle"></label>
                                            <small class="float-right">Inquiry Date: <b id="created_at"></b></small>
                                        </h4>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Variant</th>
                                                    <th>Color</th>
                                                    <th>Fuel Type</th>
                                                    <th>Registration</th>
                                                    <th>Registration Date</th>
                                                    <th>Millage</th>
                                                    <th>Last Serviced</th>
                                                    <th>Transmission</th>
                                                    <th>Full Service History</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td id="variant"></td>
                                                    <td id="color"></td>
                                                    <td id="fuel_type"></td>
                                                    <td id="registration"></td>
                                                    <td id="registration_date"></td>
                                                    <td id="millage"></td>
                                                    <td id="last_serviced"></td>
                                                    <td id="transmission"></td>
                                                    <td id="full_service_history"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                                <div class="row border-top">
                                    <div class="col-6 border-right p-1">
                                        <center>
                                            <p class="lead">Customer</p>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th style="width:50%">Full Name:</th>
                                                            <td id="full_name"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Telephone : </th>
                                                            <td id="telephone"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Mobile :</th>
                                                            <td id="mobile"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Email :</th>
                                                            <td id="email"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </center>
                                    </div>


                                    <div class="col-6 p-1">
                                        <center>
                                            <p class="lead">Optional Details</p>
                                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;"
                                                id="optional">

                                            </p>
                                        </center>
                                    </div>
                                </div>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
    integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

<script>
    function setupViewPartEx($full_name, $telephone, $mobile, $email,
        $brand, $model, $variant,
        $color, $fuel_type, $registration, $registration_date, $millage,
        $last_serviced, $transmission, $full_service_history, $optional, $created_at) {
        //setup customer details
        document.getElementById('vehicle').innerHTML = $brand + "-" + $model;
        document.getElementById('full_name').innerHTML = $full_name;
        document.getElementById('telephone').innerHTML = $telephone;
        document.getElementById('mobile').innerHTML = $mobile;
        document.getElementById('email').innerHTML = $email;

        //setup vehicle details
        document.getElementById('variant').innerHTML = $variant;
        document.getElementById('color').innerHTML = $color;
        document.getElementById('fuel_type').innerHTML = $fuel_type;
        document.getElementById('registration').innerHTML = $registration;
        document.getElementById('registration_date').innerHTML = $registration_date;
        document.getElementById('millage').innerHTML = $millage;
        document.getElementById('last_serviced').innerHTML = $last_serviced;
        document.getElementById('transmission').innerHTML = $transmission;
        document.getElementById('full_service_history').innerHTML = $full_service_history;

        document.getElementById('optional').innerHTML = $optional;
        document.getElementById('created_at').innerHTML = $created_at;
    }
</script>
