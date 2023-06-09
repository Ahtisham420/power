@extends('layouts.app')
@section('title','Category')
@section('content')
<!-- Breadcrumb-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">{{ __('admin/pages/categories_form.bread_crumb_1') }}</a>
    </li>
    <li class="breadcrumb-item">
        <a href="">Career Edit</a>
    </li>
</ol>
<!-- Breadcrumb-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form method="post" action='{{route("careers.update",$post->id)}}' enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


                    <div class="card-header">
                        <strong>Career edit</strong>
                        {{--<small>Form</small>--}}
                    </div>
                    @include("careers.form", ['post' => $post])
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit">
                            <i class="fa fa-dot-circle-o"></i> {{ __('admin/pages/categories_form.submit') }}
                        </button>
                         <a class="btn btn-sm btn-danger" type="reset"
                            href="{{route('careers.index')}}">
                        <i class="fa fa-ban"></i> {{ __('admin/pages/categories_form.cancel') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
