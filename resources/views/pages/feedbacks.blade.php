@php
    $count = 0;
    $columns = ['Id', 'Vehicle', 'Customer', 'Feedback', 'Actions'];
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
                                data-bs-target="#addFeedbacksModal"><i class="fas fa-plus mr-2"></i> Add
                                Feedback</button>
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
                                    @foreach ($feedbacks as $feedback)
                                        @php
                                            $count++;
                                        @endphp
                                        <tr class="odd">
                                            <td class="dtr-control sorting_1" tabindex="0">
                                                <center>{{ $count }}</center>
                                            </td>
                                            <td>
                                                <center>
                                                    <img src="{{ url('/assets/products-images') }}{{ '/' . $feedback->main_img }}"
                                                        style="height: 10rem; width:10rem;" alt="Vehicle"
                                                        class="brand-image mb-2 rounded" style="opacity: .8">
                                                </center>
                                                <center>
                                                    {{ $feedback->brand }}-{{ $feedback->model }}
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <img src="{{ url('/assets/customers') }}{{ '/' . $feedback->customer_image }}"
                                                        style="height: 10rem; width:10rem;" alt="Customer"
                                                        class="brand-image mb-2 rounded-circle" style="opacity: .8">
                                                </center>
                                                <center>
                                                    {{ $feedback->customer }}
                                                </center>
                                            </td>
                                            <td style="max-width: 20rem;">
                                                {{ $feedback->feedback }}
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm mt-1"
                                                    data-bs-toggle="modal" data-bs-target="#editModal"
                                                    onclick="setupFeedbackEdit('{{ $feedback->id }}','{{ $feedback->customer }}','{{ $feedback->feedback }}')">Edit</button>

                                                <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal"
                                                    class="btn btn-danger btn-sm mt-1">Delete</button>

                                                @include('elements.nova-delete-modal', [
                                                    'route' => 'delete-feedback',
                                                    'key' => $feedback->id,
                                                    'lable' => $feedback->customer . ' Feedback',
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


<!-- Add Feedback Modal -->
<div class="modal fade" id="addFeedbacksModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Feedback</h1>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('add-feedback') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="vehicle">Vehicle</label>
                            <select name="vehicle" class="form-control">
                                <option value="" selected>Choose...</option>
                                @foreach ($vehicles as $vehicle)
                                    <option value="{{ $vehicle->id }}">{{ $vehicle->brand }}-{{ $vehicle->model }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="model">Customer Name</label>
                            <input type="text" class="form-control" name="customer">
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="customer_image">Customer Image</label>
                        <div class="form-group col-md-12">
                            <input type="file" class="custom-file-input" name="customer_image">
                            <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="feedback">Feedback</label>
                            <textarea class="form-control" name="feedback" rows="3"></textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Add Feedback</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Feedback Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Feedback</h1>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('edit-feedback') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="updated_vehicle">Vehicle</label>
                            <select name="updated_vehicle" class="form-control">
                                <option value="" selected>Choose...</option>
                                @foreach ($vehicles as $vehicle)
                                    <option value="{{ $vehicle->id }}">{{ $vehicle->brand }}-{{ $vehicle->model }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="model">Customer Name</label>
                            <input type="text" class="form-control" name="updated_customer"
                                id="updated_customer">
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="customer_image">Customer Image</label>
                        <div class="form-group col-md-12">
                            <input type="file" class="custom-file-input" name="updated_customer_image">
                            <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="updated_feedback">Feedback</label>
                            <textarea class="form-control" name="updated_feedback" rows="5" id="updated_feedback"></textarea>
                        </div>
                    </div>

                    <input type="text" class="custom-file-input" name="updated_id" id="updated_id" hidden>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning"><i class="fas fa-sync mr-2"></i>Update
                    Feedback</button>
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
    function setupFeedbackEdit($id, $customer, $feedback) {
        // setup id
        document.getElementById('updated_id').value = $id;

        // setup feedback
        document.getElementById('updated_feedback').value = $feedback;

        // setup customer
        document.getElementById('updated_customer').value = $customer;
    }
</script>
