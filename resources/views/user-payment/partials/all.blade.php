<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i>All Users Payments
              
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
                            <th>Invoice</th>
                            <th>User Name</th>
                            <th>Package</th>
                            <th>Pay id</th>
                            <th>Pay Date</th>
                            {{--<th>{{ __('admin/pages/categories_list.action') }}</th>--}}
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($posts as $post)
                        <tr>

                            <td>{{ $post->invoice_number }}</td>
                            <td>@if(!empty($post->user)) {{ $post->user['username'] }} @else not found @endif</td>
                            <td>@if(!empty($post->pay_id)) @php $pay =  App\UserPackage::where('pay_id',$post->pay_id)->first(); @endphp @if(!empty($pay)) @php $pkg =App\Package::where("id",$pay->package_id)->first(); @endphp @if(!empty($pkg)) {{$pkg->name}} @else N/A @endif  @else N/A @endif @endif</td>
                            <td>@if(!empty($post->pay_id)) {{$post->pay_id}} @endif</td>
                            <td>@if(!empty($post->created_at)) {{date('j F, Y', strtotime($post->created_at))}} @endif</td>

                            {{--<td>--}}
                                {{--<button  class="btn btn-block btn-danger col action-btn modal-carsetting-btn"  data-route ='{{route('delete-report-car',['id'=>$post['id']])}}'>--}}
                                    {{--<i class="fa fa-trash fa-1x-size"></i>--}}
                                {{--</button>--}}
                                {{--<a href="javascript:void(0)" class="btn btn-block btn-danger col action-btn js-del-btn"--}}
                                    {{--data-route="delete-report-car" data-model="car-settings" data-id="{{$post['id']}}">--}}
                                    {{--<i class="fa fa-trash fa-1x-size"></i>--}}
                                {{--</a>--}}
                            {{--</td>--}}
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
