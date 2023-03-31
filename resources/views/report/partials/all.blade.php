<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> All Car Reports
                {{--<a href="{{ route('posts.create') }}"--}}
                    {{--class="btn btn-block btn-primary float-right icon-user-follow add-btn">--}}
                    {{--Add Post--}}
                {{--</a>--}}
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
                            <th>Car title</th>
                            <th>Reason</th>
                            <th>{{ __('admin/pages/categories_list.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>

                            <td>{{ $post->id }}</td>
                            <td>@if(!empty($post->user))
                                {{ $post->user['username']}}
                                @else
                                 {{ $post->user_id }}
                                @endif
                                </td>
                            <td> @if(!empty($post->car)) {{ $post->car['title'] }} @else {{ $post->car_id }}  @endif</td>
                            <td>{{ $post->reason }}<td>
                                 <a class="btn btn-sm btn-primary" href="{{route('car-details',['id'=>base64_encode($post['car_id'])])}}" target="_blank"><i class="fa fa-eye fa-1x-size"></i></a>
                                <button  class="btn btn-block btn-danger col action-btn modal-carsetting-btn"  data-route ='{{route('delete-report-car',['id'=>$post['id']])}}'>
                                    <i class="fa fa-trash fa-1x-size"></i>
                                </button>
                                {{--<a href="javascript:void(0)" class="btn btn-block btn-danger col action-btn js-del-btn"--}}
                                    {{--data-route="delete-report-car" data-model="car-settings" data-id="{{$post['id']}}">--}}
                                    {{--<i class="fa fa-trash fa-1x-size"></i>--}}
                                {{--</a>--}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
