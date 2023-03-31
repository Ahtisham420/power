<table class="table table-responsive-sm table-bordered" id="carsetting-table">
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
    @foreach($posts as $post)
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
{{ $posts->appends($_GET)->links() }}