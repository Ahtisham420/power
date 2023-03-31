<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> All {{ $key }}
                <a href="{{ route('create-car-settings',["key" => $key]) }}" class="btn btn-block btn-primary float-right icon-user-follow add-btn">Add {{ $key }} </a>
            </div>
            @include('partials.validation')
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
            <div class="alert alert-danger m-3" id="FailedMessage" style="display:none;">
                <p>Something went wrong!</p>
            </div>
            <div class="alert alert-success m-3" id="SuccessMessage" style="display:none;">
                <p>Operation Successfull!</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                       
                        {{--<form action="{{route('search-car-settings',['key'=>$key])}}" method="get"> </form>--}}
                            <div class="input-group">
                          <input type="text" class="form-control form-rounded js-filter-search" required="required" name="search"  placeholder="Search here" @if(!empty($srch))value="{{$srch}}"@endif>
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default js-filter-search-btn">
                                      <i class="fa fa-search"></i>
                                    </button>
                                    <button type="button" class="btn btn-default" onclick="location.href='{{route('all-car-settings',["key" =>$key ])}}'"><i class="fa fa-refresh"></i></button>
                                    @if($key === "model" || $key === "variant")
                                            <button class="btn btn-success fa fa-filter" title="{{ __('admin/pages/users_list.filter') }}" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"></button>
                                 @endif
                                   </span>

                            </div>

                    </div>

                </div>
                <br>
                @if($key === "model" || $key === "variant")
                <div class="row collapse" id="collapseExample">
                    <div class="col-md-12">
                        <div class="card card-body">
                            <div class="row">
                                @if($key === "variant" )
                                    <div class="col-md-2">
                                        @php $brand=App\Brand::OrderBy('name')->get(); @endphp
                                        <select class="form-control brand-select-admin js-filter-brand" name="brand_filter" required>
                                            @if(!empty($brand)&&count($brand)!=0)
                                                @foreach($brand as $t)
                                                    <option id="{{$t->id}}" value="{{$t->id}}" data-val="{{$t->name}}" data-id="{{$t->id}}">{{$t->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control make-append-admin js-filter-model" required>
                                          <option selected disabled>First Select 'Brand'</option>
                                        </select>
                                    </div>

    @elseif($key === "model")
                                    <div class="col-md-2">
                                        @php $brand=App\Brand::OrderBy('name')->get(); @endphp
                                        <select class="form-control js-filter-brand">
                                            @if(!empty($brand)&&count($brand)!=0)
                                                @foreach($brand as $t)
                                                    <option id="{{$t->id}}" value="{{$t->id}}" data-val="{{$t->name}}" data-id="{{$t->id}}">{{$t->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
    @endif
<div class="col-md-3">
  <label>{{ __('admin/pages/users_list.actions') }}</label>
  <div class="">
      <button type="submit" class="btn btn-success js-filter-apply" title="{{ __('admin/pages/users_list.apply') }}">{{ __('admin/pages/users_list.apply') }}</button>
      <button class="btn btn-primary js-filter-reset" title="{{ __('admin/pages/users_list.reset') }}">{{ __('admin/pages/users_list.reset') }}</button>
  </div>
</div>
</div>
</div>
</div>
</div>
@endif
<div class="js-index-table">
                    @include('car-setting.partials.table')
</div>
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
@push('scripts')
@include('car-setting.partials.scripts')
@endpush