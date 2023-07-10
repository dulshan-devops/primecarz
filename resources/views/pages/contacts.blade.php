@php
    $count = 0;
    $columns = ['Name', 'Email', 'Mobile', 'Message', 'Contacted', 'Actions'];
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
                                    @foreach ($contacts as $row)
                                        @php
                                            $count++;
                                        @endphp
                                        <tr class="odd">
                                            <td class="dtr-control sorting_1" tabindex="0">{{ $count }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>
                                                {{ $row->mobile }}
                                            </td>
                                            <td>
                                                {{ $row->msg }}
                                            </td>
                                            <td>
                                                {{ $row->created_at }}
                                            </td>
                                            <td>
                                                <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal"
                                                    onclick="setupContactsDelete('{{$row->id}}' , '{{$row->email}}')"
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

{{-- Delete Model --}}
@include('elements.nova-delete-modal', [
    'route' => 'delete-contacts',
])

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
    integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

<script>
    function setupContactsDelete($id, $email) {
        document.getElementById('id_key').value = $id;
        document.getElementById('lable').innerHTML = $email+ " Contact";
    }
</script>