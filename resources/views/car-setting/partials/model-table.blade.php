{{--<div class="row">--}}
    {{--<div class="col-lg-8">--}}
        {{--<form action="{{route('model-search-car-settings',['key'=>$key])}}" method="get">--}}
            {{--<div class="input-group">--}}
                {{--<input type="text" class="form-control form-rounded" required="required" name="search"  placeholder="Search by Model name" @if(!empty($srch))value="{{$srch}}"@endif>--}}
                {{--<span class="input-group-btn">--}}
                                    {{--<button type="submit" class="btn btn-default">--}}
                                      {{--<i class="fa fa-search"></i>--}}
                                    {{--</button>--}}
                    {{--@if($key === "model" || $key === "variant")--}}
                        {{--<button class="btn btn-success fa fa-filter" title="{{ __('admin/pages/users_list.filter') }}" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"></button>--}}
                    {{--@endif--}}
                    {{--</span>--}}

            {{--</div>--}}
        {{--</form>--}}
    {{--</div>--}}

{{--</div>--}}
{{--<br>--}}
<table class="table table-responsive-sm table-bordered" id="categories-table">
    <thead>
    <tr>
        <th>{{ __('admin/pages/brand_list.id') }}</th>
        <th>{{ __('admin/pages/brand_list.name') }}</th>
        @if($key === "model" || $key === "variant")
            <th>Brand</th>
        @endif
        <th>Created at</th>

        <th>{{ __('admin/pages/brand_list.action') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($model_tb as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->_value }}</td>
            @if($key === "model" || $key === "variant")
                <td>
                    @if(!empty($post->brand_name))
                        {{ $post->brand_name['name'] }}
                    @else
                        not found
                    @endif
                </td>
            @endif

            <td>
                {{ $post->created_at }}

            </td>
            <td>

                <a class="btn btn-sm btn-primary" href="{{route('show-car-settings',['id'=>$post['id'],'key'=>$key])}}"><i class="fa fa-pencil fa-1x-size"></i></a>
                <button  class="btn btn-block btn-danger col action-btn modal-carsetting-btn"  data-route ='{{route('delete-car-settings',['id'=>$post['id'],'key'=>$key])}}'>
                    <i class="fa fa-trash fa-1x-size"></i>
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<hr>
{{ $model_tb->appends($_GET)->links() }}
@push('script')
    <script>
        $(document).on('click','.page-link' ,function(event) {
            event.preventDefault();
            let baseurl = $('meta[name=baseurl]').attr("content");
            var _url = $(this).attr('href');
            @if(!isset($_GET['key']))
                _url = _url  + "&key=paginate";
            @endif
            axios.get(_url)
                .then(function(response){
                    $("#categories-table").html(response.data);
                })
        });
    </script>
    @endpush