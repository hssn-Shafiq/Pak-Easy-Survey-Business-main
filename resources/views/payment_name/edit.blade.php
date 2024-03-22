{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Edit select
                            <a href="{{ url('selects') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('update-select/' . $select->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="">EasyPaisa Name</label>
                                <input type="text" name="name" value="{{ $select->easyPaisa_name }}"
                                    class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">EasyPaisa Number</label>
                                <input type="text" name="email" value="{{ $select->easyPaisa_number }}"
                                    class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Update select</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- @endsection --}}
