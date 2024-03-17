{{-- @extends('layouts.app')

@section('content') --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Add select
                            <a href="{{ url('selects') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('add-select') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="">EasyPaisa Name</label>
                                <input type="text" name="easyPaisa_name" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">EasyPaisa Number</label>
                                <input type="number" name="easyPaisa_number" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Save select</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- @endsection --}}
