<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> All Privacy Policy
                {{--<a href="{{ route('privacy-policy.create') }}"--}}
                    {{--class="btn btn-block btn-primary float-right icon-user-follow add-btn">--}}
                    {{--Add Privacy Policy--}}
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
                            <th>Body</th>
                            <th>Status</th>
                            <th>{{ __('admin/pages/categories_list.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>

                            <td>{{ $post->id }}</td>
                            <td>{{ $post->generate_introduction(50) }}</td>
                            <td>@if($post->status === 1) Published @else Not Published @endif</td>
                        <td>
 <a class="btn btn-sm btn-primary" href="{{route('privacy-policy.edit', $post->id)}}"><i
                                        class="fa fa-pencil fa-1x-size"></i></a>
                                {{--<a href="javascript:void(0)" class="btn btn-block btn-danger col action-btn js-del-btn"--}}
                                    {{--data-route="privacy-policy.index" data-model="PrivacyPolicy" data-id="{{$post['id']}}">--}}
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
