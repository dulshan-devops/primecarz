@php
    $count = 0;
    $columns = ['Id', 'Make', 'Model', 'Actions'];
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
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addVehicleModal"><i class="fas fa-plus mr-2"></i> Add Model</button>
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
                                    @foreach ($models as $row)
                                        @php
                                            $count++;
                                        @endphp
                                        <tr class="odd">
                                            <td class="dtr-control sorting_1" tabindex="0">{{ $count }}</td>
                                            <td>{{ $row->brand }}</td>
                                            <td>
                                                {{ $row->model }}
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm mt-1"
                                                    data-bs-toggle="modal" data-bs-target="#editModal"
                                                    onclick="setupModelEdit('{{ $row->id }}' , '{{ $row->brand }}' , '{{ $row->model }}')">Edit</button>

                                                <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal"
                                                    class="btn btn-danger btn-sm mt-1">Delete</button>

                                                @include('elements.nova-delete-modal', [
                                                    'route' => 'delete-model',
                                                    'key' => $row->id,
                                                    'lable' => $row->brand.' '.$row->model . ' Model',
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


<!-- Add Vehicle Modal -->
<div class="modal fade" id="addVehicleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Model</h1>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('add-model') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="brand">Make</label>
                            <select name="brand" class="form-control">
                                <option value="" selected>Choose...</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->brand }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="model">Model</label>
                            <input type="text" class="form-control" name="model">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Add Model</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Vehicle Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Model</h1>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('edit-model') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="brand">Make</label>
                            <select name="updated_brand" id="updated_brand" class="form-control">
                                <option value="" selected>Choose...</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->brand }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="model">Model</label>
                            <input type="text" class="form-control" name="updated_model" id="updated_model">
                            <input type="text" class="form-control" name="updated_id" id="updated_id" hidden>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning"><i class="fas fa-sync mr-2"></i>Update Model</button>
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
    function setupModelEdit($id, $brand, $model) {

        //id
        document.getElementById('updated_id').value = $id;

        //brand
        document.getElementById('updated_model').value = $model;

        //images preview
        // $.post("/dashboard/models/get_data", {
        //         _token: "{{ csrf_token() }}",
        //         vehicle_id: $id
        //     })
        //     .done(function(data) {
        //         var vehicle_images = data.vehicle_images;
        //         var vehicle_accessories = data.vehicle_accessories;

        //         //setup vehicle accessories

        //         //setup vehicle images
        //         var img_container = document.getElementById('updated_img_container');
        //         img_container.innerHTML = '';
        //         for (i = 0; i <= vehicle_images.length - 1; i++) {
        //             var img = document.createElement('img');
        //             img.classList.add("brand-image");

        //             img.setAttribute('src', "{{ url('/assets') }}" + "/products-images/" + vehicle_images[i]
        //                 .image);
        //             img.setAttribute('style', 'opacity: .8');

        //             img_container.appendChild(img);
        //         }
        //     });
    }
</script>
