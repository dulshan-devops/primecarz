@php
    $count = 0;
    $columns = ['Id', 'Brand', 'Status', 'Actions'];
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
                            {{-- <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search"
                                        class="form-control form-control-sm" placeholder=""
                                        aria-controls="example1"></label></div> --}}
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                data-bs-target="#addBrandsModal"><i class="fas fa-plus mr-2"></i> Add
                                Make</button>
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
                                    @foreach ($brands as $row)
                                        @php
                                            $count++;
                                        @endphp
                                        <tr class="odd">
                                            <td class="dtr-control sorting_1" tabindex="0">{{ $count }}</td>
                                            <td>{{ $row->brand }}</td>
                                            <td>
                                                @if ($row->status == 1)
                                                    <span class="badge badge-pill badge-primary">Available</span>
                                                @else
                                                    <span class="badge badge-pill badge-danger">Unavailable</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm mt-1"
                                                    data-bs-toggle="modal" data-bs-target="#editBrandsModal"
                                                    onclick="setupBrandEdit('{{ $row->id }}' , '{{ $row->brand }}')">Edit</button>

                                                <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal" class="btn btn-danger btn-sm mt-1"
                                                    onclick="setupBrandDelete('{{ $row->id }}' , '{{ $row->brand }}')">Delete</button>
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

<!-- ADD Modal -->
<div class="modal fade" id="addBrandsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Brand</h1>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('add-brand') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="brand">Make</label>
                            <input type="text" class="form-control" name="brand">
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="logo">Status</label>
                        <div class="form-group col-md-12">
                            <select name="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Add Brand</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editBrandsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Make</h1>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('update-brand') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="brand">Make</label>
                            <input type="text" class="form-control" name="updated_brand" id="updated_brand"
                                required>
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="logo">Status</label>
                        <div class="form-group col-md-12">
                            <select name="updated_status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                        </div>
                    </div>

                    {{-- hidden inputs --}}
                    <input type="text" class="form-control" name="id" id="id" hidden required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning"><i class="fas fa-sync mr-2"></i>Save Changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

{{-- Delete Model --}}
@include('elements.nova-delete-modal', [
    'route' => 'delete-brand',
])



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
    integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

<script>
    function setupBrandEdit($id, $brand) {
        document.getElementById('id').value = $id;
        document.getElementById('updated_brand').value = $brand;
    }

    function setupBrandDelete($id, $brand) {
        document.getElementById('id_key').value = $id;
        document.getElementById('lable').innerText = $brand + " Brand";
    }
</script>