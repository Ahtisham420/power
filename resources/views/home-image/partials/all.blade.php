<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> All Home Image
                <a href="{{ route('homeImage.create') }}"
                    class="btn btn-block btn-primary float-right icon-user-follow add-btn">
                    Add Home Image
                </a>
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
                            <th>Image</th>
                            <th>Action</th>
                            <th>Created At</th>
                            <th>{{ __('admin/pages/categories_list.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>

                            <td>{{ $post->id }}</td>
                            <td><img style="width: 100px;height: 65px" src="/../../public/home_images/{{$post->image}}" alt="image"></td>
                            <td>
                                @if($post->status == 0)
                                    <span id="currentStatus-{{ $post->id }}">Disabled</span>
                                    <label class="switch">
                                        <input class="brands_top_list" id="{{ $post->id }}" name="status" onclick="location.href='{{route('home-image-status',['id'=>$post->id])}}'" value="0" type="checkbox" />
                                        <span class="slider round"></span>
                                    </label>
                                @elseif($post->status == 1)
                                    <span id="currentStatus-{{ $post->id }}">Enabled</span>
                                    <label class="switch">
                                        <input class="brands_top_list" onclick="location.href='{{route('home-image-status',['id'=>$post->id])}}'" name="status" id="{{ $post->id }}" value="1" type="checkbox" checked />
                                        <span class="slider round"></span>
                                    </label>
                                @endif
                            </td>
                            <td>{{ $post->created_at }}</td>
                            <td>

                                <a class="btn btn-sm btn-primary" href="{{route('homeImage.edit', $post->id)}}"><i
                                        class="fa fa-pencil fa-1x-size"></i></a>
                                <a href="javascript:void(0)" class="btn btn-block btn-danger col action-btn js-del-btn"
                                    data-route="homeImage.index" data-model="HomeImage" data-id="{{$post['id']}}">
                                    <i class="fa fa-trash fa-1x-size"></i>
                                </a>
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
