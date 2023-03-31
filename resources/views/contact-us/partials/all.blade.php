<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                {{--<i class="fa fa-align-justify"></i> {{ __('admin/pages/brand_list.card_title') }}--}}
                {{--<a href="{{ route('create-brand') }}" class="btn btn-block btn-primary float-right icon-user-follow add-btn">--}}
                    {{--{{ __('admin/pages/brand_list.add_category') }}--}}
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
                <table class="table table-responsive-sm table-bordered" id="categories-table">
                    <thead>
                        <tr>
                            <th>{{ __('admin/pages/brand_list.id') }}</th>
                            <th>{{ __('admin/pages/brand_list.name') }}</th>
                            <th>Email</th>
                            <th>Message</th>
                        <th>{{ __('admin/pages/brand_list.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->email }}</td>
                            <td>{{$category->message}}</td>


                            <td>
                                <a href="javascript:void(0)" class="btn btn-block btn-danger col action-btn js-del-btn" data-route="contact-us-list" data-model="ContactUs" data-id="{{$category['id']}}">
                                    <i class="fa fa-trash fa-1x-size"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>