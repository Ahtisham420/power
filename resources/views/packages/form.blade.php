@extends('layouts.app')

@section('content')
<!-- Breadcrumb-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('all-packages') }}">Packages</a>
    </li>
    <li class="breadcrumb-item active">{{ $page_title }}</li>
</ol>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form method="post" action="{{ route('save-packages') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ !empty($results) ? $results->id : 0 }}" name="id">
                    <div class="card-header">
                        <strong>{{ $page_title }} Package</strong>
                        {{--<small>Form</small>--}}
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            {{--alerts start here--}}
                            @include('partials.validation')
                            {{--alerts ends here--}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="name">Name*</label>
                                                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" type="text" placeholder="Enter name" value="{{ !empty($results) ? $results->name : old('name') }}">
                                                @if ($errors->has('name'))
                                                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="tagline">Tagline*</label>
                                                <input class="form-control {{ $errors->has('tagline') ? 'is-invalid' : '' }}" id="tagline" name="tagline" type="text" placeholder="Enter tagline" value="{{ !empty($results) ? $results->tagline : old('tagline') }}">
                                                @if ($errors->has('tagline'))
                                                <div class="invalid-feedback">{{ $errors->first('tagline') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="price">Price*</label>
                                                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" id="price" name="price" type="number" placeholder="Enter price" value="{{ !empty($results) ? $results->price : old('price') }}">
                                                @if ($errors->has('price'))
                                                <div class="invalid-feedback">{{ $errors->first('price') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="duration">Duration*(Per Month)</label>
                                                <select class="form-control" name="duration" id="duration">
                                                  @for($i=0;$i<=100;$i++)
                                                   <option value="{{$i}}">{{$i}}</option>
                                                      @endfor
                                                    {{--<option value="{{ App\Package::per_day }}" {{ (!empty($results) ? $results->duration : old('duration')) == App\Package::per_day ? "selected": "" }}>Per Day</option>--}}
                                                    {{--<option value="{{ App\Package::per_month }}" {{ (!empty($results) ? $results->duration : old('duration')) == App\Package::per_month ? "selected": "" }}>Per Month</option>--}}
                                                    {{--<option value="{{ App\Package::per_year }}" {{ (!empty($results) ? $results->duration : old('duration')) == App\Package::per_year ? "selected": "" }}>Per Year</option>--}}
                                                    {{--<option value="{{ App\Package::per_car }}" {{ (!empty($results) ? $results->duration : old('duration')) == App\Package::per_car ? "selected": "" }}>Per Car</option>--}}
                                                </select>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="duration">Status</label>
                                                <select class="form-control" name="status" id="status">
                                                    <option value="{{ App\Package::true }}" {{ (!empty($results) ? $results->status : old('status')) == App\Package::true ? "selected": "" }}>True</option>
                                                    <option value="{{ App\Package::false }}" {{ (!empty($results) ? $results->status : old('status')) == App\Package::false ? "selected": "" }}>False</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="duration">Auction add</label>
                                                <input class="form-control {{ $errors->has('auction_adds') ? 'is-invalid' : '' }}" id="auction_adds" name="auction_adds" type="number" placeholder="Enter no of Ads" value="{{!empty($results->auction_adds) ? $results->auction_adds : '0'}}">
                                                @if ($errors->has('auction_adds'))
                                                    <div class="invalid-feedback">{{ $errors->first('auction_adds') }}</div>
                                                @endif
                                            </div>

                                            {{--<div class="form-group col-sm-6">--}}
                                                {{--<label for="off_percentage">Off Percentage</label>--}}
                                                {{--<input class="form-control {{ $errors->has('off_percentage') ? 'is-invalid' : '' }}" id="off_percentage" name="off_percentage" type="number" placeholder="Enter Off %" value="{{ !empty($results) ? $results->off_percentage : old('off_percentage') }}">--}}
                                                {{--@if ($errors->has('off_percentage'))--}}
                                                {{--<div class="invalid-feedback">{{ $errors->first('off_percentage') }}</div>--}}
                                                {{--@endif--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group col-sm-6">--}}
                                                {{--<label for="off_bit">Off available</label><br>--}}


                                                {{--<div class="custom-control custom-switch">--}}
                                                    {{--<input type="checkbox" {{ (!empty($results) ? $results->off_bit : old('off_bit')) == 1 ? "checked": "" }} class="custom-control-input" id="off_bit" name="off_bit">--}}
                                                    {{--<label class="custom-control-label" for="off_bit"></label>--}}
                                                {{--</div>--}}
                                                {{--@if ($errors->has('off_bit'))--}}
                                                {{--<div class="invalid-feedback">{{ $errors->first('off_bit') }}</div>--}}
                                                {{--@endif--}}
                                            {{--</div>--}}
                                        </div>
<div class="row">
    <div class="form-group col-sm-6">
        <label for="duration">Wanted add</label>

        <input class="form-control {{ $errors->has('wanted_adds') ? 'is-invalid' : '' }}" id="wanted_adds" name="wanted_adds" type="number" placeholder="Enter no of Ads" value="{{!empty($results->wanted_adds) ? $results->wanted_adds : '0'}}">
        @if ($errors->has('wanted_adds'))
            <div class="invalid-feedback">{{ $errors->first('wanted_adds') }}</div>
        @endif
    </div>
    <div class="form-group col-sm-6">
        <label for="duration">Swap add</label>
        <input class="form-control {{ $errors->has('swap_adds') ? 'is-invalid' : '' }}" id="swap_adds" name="swap_adds" type="number" placeholder="Enter no of Ads" value="{{!empty($results->swap_adds) ? $results->swap_adds : '0'}}">
        @if ($errors->has('swap_adds'))
            <div class="invalid-feedback">{{ $errors->first('swap_adds') }}</div>
        @endif
    </div>
</div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="duration">Prestige add</label>
                                                <input class="form-control {{ $errors->has('pres_adds') ? 'is-invalid' : '' }}" id="pres_adds" name="pres_adds" type="number" placeholder="Enter no of Ads" value="{{!empty($results->pres_adds) ? $results->pres_adds : '0'}}">
                                                @if ($errors->has('pres_adds'))
                                                    <div class="invalid-feedback">{{ $errors->first('pres_adds') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="duration">Miscellaneous add</label>
                                                <input class="form-control {{ $errors->has('misc_adds') ? 'is-invalid' : '' }}" id="misc_adds" name="misc_adds" type="number" placeholder="Enter no of Ads" value="{{!empty($results->misc_adds) ? $results->misc_adds : '0'}}">
                                                @if ($errors->has('misc_adds'))
                                                    <div class="invalid-feedback">{{ $errors->first('misc_adds') }}</div>
                                                @endif

                                            </div>



                                        </div>

                                        <!-- /.row-->

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    @php
                                    $attributes = !empty($results->attributes) ? json_decode($results->attributes) : null;
                                    @endphp
                                    <div class="card-body">
                                        {{--<div class="row">--}}
                                            {{--<div class="form-group col-sm-12">--}}
                                                {{--<label for="adverts">Adverts</label>--}}
                                                {{--<input class="form-control {{ $errors->has('adverts') ? 'is-invalid' : '' }}" id="adverts" name="adverts" type="number" placeholder="Enter no of adverts" value="{{!empty($attributes->adverts) ? $attributes->adverts : ''}}">--}}
                                                {{--@if ($errors->has('adverts'))--}}
                                                {{--<div class="invalid-feedback">{{ $errors->first('adverts') }}</div>--}}
                                                {{--@endif--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="images_per_post">Images Per Post</label>
                                                <input class="form-control {{ $errors->has('images_per_post') ? 'is-invalid' : '' }}" id="images_per_post" name="images_per_post" type="number" placeholder="Enter no of images per post" value="{{!empty($attributes->images_per_post) ? $attributes->images_per_post : ''}}">
                                                @if ($errors->has('images_per_post'))
                                                <div class="invalid-feedback">{{ $errors->first('images_per_post') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="videos_per_post">Videos Per Post</label>
                                                <input class="form-control {{ $errors->has('videos_per_post') ? 'is-invalid' : '' }}" id="videos_per_post" name="videos_per_post" type="number" placeholder="Enter no of videos per post" value="{{!empty($attributes->videos_per_post) ? $attributes->videos_per_post : '0'}}" min="0">
                                                @if ($errors->has('videos_per_post'))
                                                <div class="invalid-feedback">{{ $errors->first('videos_per_post') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="duration">Garage add</label>
                                                <input class="form-control {{ $errors->has('garage_adds') ? 'is-invalid' : '' }}" id="garage_adds" name="garage_adds" type="number" placeholder="Enter no of  Ad" value="{{!empty($results->garage_adds) ? $results->garage_adds : '0'}}">
                                                @if ($errors->has('garage_adds'))
                                                    <div class="invalid-feedback">{{ $errors->first('garage_adds') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="duration">Body Shop add</label>
                                                <input class="form-control {{ $errors->has('body_shop_adds') ? 'is-invalid' : '' }}" id="body_shop_adds" name="body_shop_adds" type="number" placeholder="Enter no of  Ad" value="{{!empty($results->body_shop_adds) ? $results->body_shop_adds : '0'}}">
                                                @if ($errors->has('body_shop_adds'))
                                                    <div class="invalid-feedback">{{ $errors->first('body_shop_adds') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="duration">Rental add</label>
                                                <input class="form-control {{ $errors->has('rental_companie_adds') ? 'is-invalid' : '' }}" id="rental_companie_adds" name="rental_companie_adds" type="number" placeholder="Enter no of  Ad" value="{{!empty($results->rental_companie_adds) ? $results->rental_companie_adds : '0'}}">
                                                @if ($errors->has('rental_companie_adds'))
                                                    <div class="invalid-feedback">{{ $errors->first('rental_companie_adds') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="post_per_package">Post Per Package</label>
                                                <input class="form-control {{ $errors->has('post_per_package') ? 'is-invalid' : '' }}" id="post_per_package" name="post_per_package" type="number" placeholder="Enter no of  post per Package" value="{{!empty($results->post_per_package) ? $results->post_per_package : '0'}}">
                                                @if ($errors->has('post_per_package'))
                                                    <div class="invalid-feedback">{{ $errors->first('post_per_package') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="free_post">Free Post</label>
                                                <select class="form-control" name="free_post" id="free_post">
                                                    <option value="{{ App\Package::true }}" {{ (!empty($results) ? $results->free_post : old('free_post')) == App\Package::true ? "selected": "" }}>True</option>
                                                    <option value="{{ App\Package::false }}" {{ (!empty($results) ? $results->free_post : old('free_post')) == App\Package::false ? "selected": "" }}>False</option>
                                                </select> @if ($errors->has('free_post'))
                                                    <div class="invalid-feedback">{{ $errors->first('free_post') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="free_post_per_package">Free Post Per Package</label>
                                                <input class="form-control {{ $errors->has('free_post_per_package') ? 'is-invalid' : '' }}" id="free_post_per_package" name="free_post_per_package" type="number" placeholder="Enter no of  free post per Package" value="{{!empty($results->free_post_per_package) ? $results->free_post_per_package : '0'}}">
                                                @if ($errors->has('free_post_per_package'))
                                                    <div class="invalid-feedback">{{ $errors->first('free_post_per_package') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="free_post">American Muscle</label>
                                                <input class="form-control {{ $errors->has('amr_add') ? 'is-invalid' : '' }}" id="amr_add" name="amr_add" type="number" placeholder="Enter no of  Ad" value="{{!empty($results->amr_add) ? $results->amr_add : '0'}}">
                                                @if ($errors->has('amr_add'))
                                                    <div class="invalid-feedback">{{ $errors->first('amr_add') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="free_post">Classified</label>
                                                <input class="form-control {{ $errors->has('class_add') ? 'is-invalid' : '' }}" id="class_add" name="class_add" type="number" placeholder="Enter no of  Ad" value="{{!empty($results->class_add) ? $results->class_add : '0'}}">
                                                @if ($errors->has('class_add'))
                                                    <div class="invalid-feedback">{{ $errors->first('class_add') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                           <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="free_post">Featured</label>
                                                <input class="form-control {{ $errors->has('featured') ? 'is-invalid' : '' }}" id="featured" name="featured" type="number" placeholder="Enter no of  Ad" value="{{!empty($results->featured) ? $results->featured : '0'}}">
                                                @if ($errors->has('featured'))
                                                    <div class="invalid-feedback">{{ $errors->first('featured') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <a class="btn btn-sm btn-danger" type="reset" href="{{route('all-packages')}}">
                            <i class="fa fa-ban"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection