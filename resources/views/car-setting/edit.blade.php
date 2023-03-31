@extends('layouts.app')
@section('title','Brand')
@section('content')
<!-- Breadcrumb-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">{{ __('admin/pages/brand_form.bread_crumb_1') }}</a>
    </li>
    <li class="breadcrumb-item">
        <a href="">Edit {{ $key }}</a>
    </li>
</ol>
<!-- Breadcrumb-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form method="post" action="{{route('save-car-settings',['key'=>$key])}}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <input type="hidden" value="{{ !empty($brand) ? $brand->id : 0 }}" name="id">
                    <input type="hidden" value="{{$key}}" name="_key">
                    <div class="card-header">
                        <strong>{{ __('admin/pages/brand_form.card_title_2') }} </strong>
                        {{--<small>Form</small>--}}
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            @if ($errors->any())
                            <div class="alert alert-danger m-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            @if(session('message'))
                            <p class="alert alert-success m-3">{{session('message')}}</p>
                            @endif
                            {{csrf_field()}}
                                @if($key === "model")
                                    @php $brands_up = App\Brand::orderby('name')->get(); @endphp
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-1 text-right mt-2">
                                                            <span for="input"><strong>Brand Name:</strong></span>
                                                        </div>
                                                        <div class="col-md-4">
                                                            @if(!empty($brands_up) && count($brands_up) > 0)
                                                                <select class="form-control brand-select-admin" name="brand" required>
                                                                    <option value="">Select Brand</option>
                                                                    @foreach($brands_up as $b)
                                                                        <option value="{{$b->id}}" @if(!empty($brand->brand) && $brand->brand === $b->id) selected @endif>{{$b->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if(!empty($brand->brand))
                                        @php $model_tb = App\CarSetting::orderby('_value')->where('_key','model')->where('brand',$brand->brand)->paginate(5); @endphp
                                    @else
                                        @php $model_tb = App\CarSetting::orderby('_value')->where('_key','model')->paginate(5); @endphp
                                    @endif
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                @include('car-setting.partials.model-table')
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($key === "variant")
                                    @php $brands_up = App\Brand::orderby('name')->get(); @endphp
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-1 text-right mt-2">
                                                            <span for="input"><strong>Brand Name:</strong></span>
                                                        </div>
                                                        <div class="col-md-4">
                                                            @if(!empty($brands_up) && count($brands_up) > 0)
                                                                <select class="form-control brand-select-admin" name="brand" required>
                                                                    <option value="">Select Brand</option>
                                                                    @foreach($brands_up as $b)
                                                                        <option value="{{$b->id}}" @if(!empty($brand->brand) && $brand->brand === $b->id)  selected @endif>{{$b->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
@if(!empty($brand->brand) )
    @php $model = App\CarSetting::orderby('_value')->where('_key','model')->where('brand',$brand->brand)->get(); @endphp
    @else
                                        @php $model = App\CarSetting::orderby('_value')->where('_key','model')->get(); @endphp
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-1 text-right mt-2">
                            <span for="input"><strong>Model Name:</strong></span>
                        </div>
                        <div class="col-md-4">
                            @if(!empty($model) && count($model) > 0)
                                <select class="form-control make-append-admin" name="model" required>
                                    <option value="">Select Model</option>
                                    @foreach($model as $b)
                                        <option value="{{$b->id}}" @if(!empty($brand->model) && $brand->model === $b->id) selected @endif>{{$b->_value}}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
<div class="row">
<div class="col-md-12">
    <div class="card-body">
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 text-right mt-2">
                    <span for="input"><strong>{{ __('admin/pages/brand_form.name') }}:</strong></span>
                </div>
                <div class="col-md-4">
                    <input name="_value" type="text" value="{{ !empty($brand) ? $brand->_value : '' }}" class="form-control" required />
                </div>
            </div>
        </div>
        @if($key === 'car-type')
            <div class="bg-white pt-4 px-4 pb-0 my-2 mb-4 rounded border">
                <div style='max-width:55px;' class='float-right m-2'>
                    <img  id="blah" style="width: 55px;height: 25.313px" src="/../../livepowerperformance/public/car_icon/{{$brand->icon}}">
                </div>
                <h4>Featured Images</h4>
                <div class="form-group mb-4 p-2">
                    <label for="blog_feature_img">Image - (required)</label>
                    <small id="blog__help" class="form-text text-muted">Upload image -
                        {{-- <code>&times;px</code> - it will --}}
                        it will show on Car Type
                    </small>
                    <input class="form-control"  type="file" name="icon" onchange="readURL(this);" id="blog_feature_img"
                           aria-describedby="blog_help">

                </div>
            </div>
        @endif
        {{--<div class="row">--}}
            {{--<div class="col-md-1 text-right mt-2">--}}
                {{--<span for="input"><strong>{{ __('admin/pages/brand_form.status') }}:</strong></span>--}}
            {{--</div>--}}
            {{--<div class="col-md-4 mt-2">--}}
                {{--@if($brand->status == 0)--}}
                {{--<label class="switch">--}}
                    {{--<input class="brand_status" id="{{ $brand->id }}" name="brand_status" type="checkbox" />--}}
                    {{--<span class="slider round"></span>--}}
                {{--</label>--}}
                {{--@elseif($brand->status == 1)--}}
                {{--<label class="switch">--}}
                    {{--<input class="brand_status" name="brand_status" id="{{ $brand->id }}" type="checkbox" checked />--}}
                    {{--<span class="slider round"></span>--}}
                {{--</label>--}}
                {{--@endif--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
</div>
</div>
</div>
</div>
<div class="card-footer">
<button class="btn btn-sm btn-primary" type="submit">
<i class="fa fa-dot-circle-o"></i> {{ __('admin/pages/brand_form.submit') }}
</button>
<a class="btn btn-sm btn-danger" type="reset" href="{{route('all-car-settings',['key' => $key])}}">
<i class="fa fa-ban"></i> {{ __('admin/pages/brand_form.cancel') }}
</a>
</div>
</form>
</div>
</div>
</div>
</div>
@endsection
@push('scripts')

<script>
$(document).on('change','.brand-select-admin',function (e) {
e.preventDefault();

var value  =   $(this).find(':selected').val();

if(value != ""){

console.log(value);

var url = '{{route('model-brand',['id'=>':id'])}}';

url = url.replace(':id',value);

}else {

return false;

}

$.ajax({

method:"get",

url:url,

DataType:"json",

success:function(data){

console.log(data);

if(data.status==1){

$(".make-append-admin").empty();

$(".make-append-admin").html('<option value="">Select Model</option>');

for(x in data.result){

var apend= '<option value="'+data.result[x]['id']+'" data-val="'+data.result[x]['_value']+'">'+data.result[x]['_value']+'</option>';

$(".make-append-admin").append(apend);

}



}else{

$('.make-append-admin').html('<option selected disabled>No Data Found</option>');

return false;

}





},

error:function(data){

console.log(data);



}



});



});
function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function (e) {
$('#blah')
.attr('src', e.target.result)
.width(55)
.height(25.313);
};

reader.readAsDataURL(input.files[0]);
}
}
</script>
@endpush