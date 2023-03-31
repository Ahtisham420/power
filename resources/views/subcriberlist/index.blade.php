@extends('layouts.app')
@section('title','Brand')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">{{ __('admin/pages/brand_list.bread_crumb_1') }}</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="{{ route('subscriber-list') }}">All Subscribers List</a>
    </li>
</ol>
<div class="container-fluid">
    @include('subcriberlist.partials.all')
</div>
@endsection