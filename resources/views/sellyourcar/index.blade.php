@extends('layouts.app')

@section('content')
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/admin/home') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">All {{$model}}</li>
    </ol>
    <div class="container-fluid">
        @include('sellyourcar.partials.all')
        @include('sellyourcar.partials.scripts')
        @include('sellyourcar.partials.modal')
    </div>
@endsection
