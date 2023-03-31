@extends('layouts.app')
@section('title','Comments')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/admin/home') }}">{{ __('admin/pages/categories_list.bread_crumb_1') }}</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{ route('posts.index') }}">All Comments</a>
        </li>
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> All Comments
                    </div>

                    @include('partials.validation')

                    <div class="alert alert-danger m-3" id="FailedMessage" style="display:none;">
                        <p>Something went wrong!</p>
                    </div>
                    <div class="alert alert-success m-3" id="SuccessMessage" style="display:none;">
                        <p>Operation Successfull!</p>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-bordered" id="posts-table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>User Name</th>
                                <th>Car Title</th>
                                <th>Car Category</th>
                                <th>Comment</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($comments as $comment)
                                <tr>

                                    <td>{{ $comment->id }}</td>
                                    <td>{{$comment->user->username}}</td>
                                    <td>
                                        @if($comment->car)
                                        <a href='{{route("car-details",["id"=>base64_encode($comment->car_id)])}}' target="_blank">{{$comment->car->title}}</a>
                                        @else
                                            Unknown Car
                                        @endif
                                    </td>
                                    <td>{{$comment->car_availbilty}}</td>
                                    <td>{{$comment->comment}}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-block btn-danger col action-btn js-del-btn"
                                           data-route="comments.index" data-model="comment" data-id="{{$comment['id']}}">
                                            <i class="fa fa-trash fa-1x-size"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <hr>
                        {{ $comments->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
