{{-- @extends('layouts.app')

@section('content') --}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            <a href="{{ url('add-select') }}" class="btn btn-primary float-end">Add select</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>EasyPaisa Name</th>
                                    <th>EasyPaisa Number</th>

                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($select as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->easyPaisa_name }}</td>
                                        <td>{{ $item->easyPaisa_number }}</td>

                                        <td>
                                            <a href="{{ url('edit-select/' . $item->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                        </td>
                                        <td>
                                            {{-- <a href="{{ url('delete-select/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
                                            <form action="{{ url('delete-select/' . $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
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
{{-- @endsection --}}
