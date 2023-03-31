<table class="table table-responsive-sm table-bordered js-index-table">
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
            <td>
                <a class="btn btn-sm btn-primary" href="{{route('car-details',['id'=>base64_encode($post['id'])])}}" target="_blank"><i class="fa fa-eye fa-1x-size"></i></a>
                <button  class="btn btn-block btn-danger col action-btn modal-carsetting-btn"  data-route ='{{route('delete-car-sell',['id'=>$post['id'],'model'=>$model])}}' >
                    <i class="fa fa-trash fa-1x-size"></i>
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<hr>
{{ $posts->appends($_GET)->links() }}