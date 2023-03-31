@extends('layouts.app')

@section('content')
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/admin/home') }}">{{ __('admin/pages/users_list.bread_crumb_1') }}</a>
        </li>
        <li class="breadcrumb-item active">{{ __('admin/pages/users_list.bread_crumb_2') }}</li>
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>All User Packages
                        {{--<a href="javascript:void(0)" class="btn btn-block btn-primary float-right icon-plus add-popup-btn add-btn">--}}
                        {{--Add Engine--}}
                        {{--</a>--}}
                    </div>
                    @if(session()->has('success'))
                        <div class="alert alert-success m-3" id="SuccessMessage" >
                            <p>{{ session()->get('success') }}</p>
                        </div>
                    @endif
                    @if(session()->has('failure'))
                        <div class="alert alert-danger m-3" id="FailedMessage" style="display:none;">
                            <p>{{ session()->get('failure') }}</p>
                        </div>
                    @endif
                    <div class="card-body">
                        {{--<div class="row">--}}
                            {{--<div class="col-lg-4">--}}
                                {{--<form action="{{route('search-car-sell',['model'=>$model])}}" method="get">--}}
                                    {{--<div class="input-group">--}}

                                        {{--@csrf--}}
                                        {{--<input type="text" class="form-control form-rounded" required="required" name="search"  placeholder="Search here">--}}
                                        {{--<span class="input-group-btn">--}}
                                    {{--<button type="submit" class="btn btn-default">--}}
                                      {{--<i class="fa fa-search"></i>--}}
                                    {{--</button>--}}

                                    {{--<button type="button" class="btn btn-default" onclick="location.href='{{route('all-sell-types',['model'=>$model])}}'">--}}
                                        {{--<i class="fa fa-refresh"></i>--}}
                                    {{--</button>--}}

        {{--</span>--}}

                                    {{--</div>--}}
                                {{--</form>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                        {{--<br>--}}
                        <div id="formMetaSetting-div" style="display: none;">
                            <div class="d-inline-flex">
                                <div id="reportrange">
                                    <i class="fa fa-calendar"></i>&nbsp;
                                    <span></span> <i class="fa fa-caret-down"></i>
                                </div>
                            </div>
                        </div><br>
                        {{--alerts start here--}}
                        @include('partials.validation')
                        {{--alerts ends here--}}
                        <table class="table table-responsive-sm table-bordered" id="posts-table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>Packages</th>
                                {{--<th>Action</th>--}}
                            </tr>
                            </thead>
                            <tbody id="formMetaSetting-tbody">
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>@if(!empty($post->user)) {{ $post->user['username'] }} @else not found @endif</td>
                                    <td>@if(!empty($post->u_package)) {{$post->u_package['name']}} @endif</td>
                                    {{--<td>--}}

                                        {{--<a class="btn btn-sm btn-primary" href="{{route('car-details',['id'=>base64_encode($post['id'])])}}" target="_blank"><i class="fa fa-eye fa-1x-size"></i></a>--}}
                                      {{----}}
                                    {{--</td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>




        {{--delete modal--}}
        <div class="modal fade show" id="deleteConfirmModalCarsetting" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-danger" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Are you sure?</h4>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Once delete! no longer will recover back.</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <a  class="btn btn-danger car-btn-confirm-carsetting-admin" data-id="#" data-model="#" type="button">Delete</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    @include('users.partials.scripts')
@endpush
