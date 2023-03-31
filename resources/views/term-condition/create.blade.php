@extends("layouts.app")
@section('content')
<!-- Breadcrumb-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">Add Term & condition</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="{{ route('term-condition.create') }}">Term & condition</a>
    </li>
</ol>
<!-- Breadcrumb-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <form method="post" action="{{route('term-condition.store')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-header">
                        <strong>Create Letter</strong>
                        {{--<small>Form</small>--}}
                    </div>


                    @include("term-condition.form", ['post' => new App\TermCondition()])




    <div class="card-footer">
        <button class="btn btn-sm btn-primary" type="submit">
            <i class="fa fa-dot-circle-o"></i> {{ __('admin/pages/categories_form.submit') }}
        </button>
        <a class="btn btn-sm btn-danger" type="reset" href="{{route('term-condition.index')}}">
            <i class="fa fa-ban"></i> {{ __('admin/pages/categories_form.cancel') }}
        </a>
    </div>
    </form>
</div>
</div>
</div>
</div>
@endsection
