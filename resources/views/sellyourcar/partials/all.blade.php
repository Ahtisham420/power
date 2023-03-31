<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-header">
                <i class="fa fa-align-justify"></i> All {{$model}}
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
                <div class="row">
                    <div class="col-lg-4">
                        <form action="{{route('search-car-sell',['model'=>$model])}}" method="get">
                           <div class="input-group">

                                    @csrf
                                <input type="text" class="form-control form-rounded" required="required" name="search"  placeholder="Search here"  @if(!empty($srch))value="{{ $srch }}"@endif >
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                      <i class="fa fa-search"></i>
                                    </button>

                                    <button type="button" class="btn btn-default" onclick="location.href='{{route('all-sell-types',['model'=>$model])}}'">
                                        <i class="fa fa-refresh"></i>
                                    </button>
                                  
        </span>

                        </div>
                        </form>
                    </div>

                </div>
                <br>
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
                <table class="table table-responsive-sm table-bordered" id="{{ $model }}-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="formMetaSetting-tbody">
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->created_at }}</td>
                            {{--<td>--}}
                                {{--<!-- Default switch -->--}}
                                {{--<div class="custom-control custom-switch">--}}
                                    {{--<input type="checkbox" {{ $post->enabled ? 'checked' : '' }} class="custom-control-input" onclick="postEnable('{{ $post->id }}','formMetaSetting')" id="formMetaSettingEnable{{ $post->id }}">--}}
                                    {{--<label class="custom-control-label" for="formMetaSettingEnable{{ $post->id }}"></label>--}}
                                {{--</div>--}}
                            {{--</td>--}}
                            {{--<td>--}}
                                {{--<div class="btn-group">--}}
                                    {{--<div class="dropdown">--}}
                                        {{--@if(APP\formMetaSetting::active == $post->status)--}}
                                        {{--<button class="btn btn-secondary  badge-success dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                            {{--Active--}}
                                        {{--</button>--}}
                                        {{--@elseif(APP\formMetaSetting::inactive == $post->status)--}}
                                        {{--<button class="btn btn-secondary badge-secondary dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                            {{--Inactive--}}
                                        {{--</button>--}}
                                        {{--@elseif(APP\formMetaSetting::banned == $post->status)--}}
                                        {{--<button class="btn btn-secondary badge-danger dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                            {{--Banned--}}
                                        {{--</button>--}}
                                        {{--@elseif(APP\formMetaSetting::pending == $post->status)--}}
                                        {{--<button class="btn btn-secondary badge-warning dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                            {{--Pending--}}
                                        {{--</button>--}}
                                        {{--@endif--}}
                                        {{--<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
                                            {{--<a class="dropdown-item" data-value="{{ APP\formMetaSetting::active }}" href="{{ route('form-settings-status',['status' => APP\formMetaSetting::active ,'id' => $post->id,'model' => $model]) }}">Active</a>--}}
                                            {{--<a class="dropdown-item" data-value="{{ APP\formMetaSetting::inactive }}" href="{{ route('form-settings-status',['status' => APP\formMetaSetting::inactive ,'id' => $post->id, 'model' => $model]) }}">Inactive</a>--}}
                                            {{--<a class="dropdown-item" data-value="{{ APP\formMetaSetting::banned }}" href="{{ route('form-settings-status',['status' => APP\formMetaSetting::banned ,'id' => $post->id, 'model' => $model]) }}">Banned</a>--}}
                                            {{--<a class="dropdown-item" data-value="{{ APP\formMetaSetting::pending }}" href="{{ route('form-settings-status',['status' => APP\formMetaSetting::pending ,'id' => $post->id,'model' => $model]) }}">Pending</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</td>--}}
                            <td>
                                {{--<a href="{{ route('show-car-settings',['id' => $post->id,'key'=>$key]) }}" class="btn btn-block btn-primary col action-btn">--}}
                                    {{--<i class="fa fa-pencil fa-1x-size"></i>--}}
                                {{--</a>--}}
                                <a class="btn btn-sm btn-primary" href="{{route('car-details',['id'=>base64_encode($post['id'])])}}" target="_blank"><i class="fa fa-eye fa-1x-size"></i></a>
                                <button  class="btn btn-block btn-danger col action-btn modal-carsetting-btn"  data-route ='{{route('delete-car-sell',['id'=>$post['id'],'model'=>$model])}}' >
                                    <i class="fa fa-trash fa-1x-size"></i>
                                </button>
                            </td>
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