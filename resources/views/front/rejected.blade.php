@extends('layouts.app')

@section('content')
    <div class="alert alert-danger">
        Your account has been rejected. Please contact support for further assistance.
    </div>
    <a href="{{ route('login') }}" class="btn btn-primary">Go to Login Page</a>
@endsection
