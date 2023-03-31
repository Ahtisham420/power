<div class="row sellcar">

    <div class="col-12  col-sm-6 col-md-4  registrationnumber" style="position:relative;">

        <label> * Registration Number</label>

        <div class="input-group swapinput mb-3">

            <div class="input-group-prepend ">

<span class="input-group-text gbswap image_invalid" id="basic-addon1">

<img src="{{ config('app.ui_asset_url').'frontend/img/swapPage/Group 3414.png' }}" alt="">

GB

</span>

            </div>

            <input id="registernumber" type="text" class="form-control validate0 preview-dashboard-input" data-label="Registration Number" name="registration_number" placeholder="LL58 LGK" aria-label="Username" aria-describedby="basic-addon1"

                   value="@if(!empty($update))@if($update->registration_no){{$update->registration_no}}@endif @endif" oninput="this.value = this.value.toUpperCase()">

        </div>

        <span id="registration_invalid_message" style="position:absolute;"></span>





    </div>



    <div class="col-12 col-sm-6 col-md-4 mileage">



        <label> * Mileage</label>

        <input id="mileage" type="number" class="form-control validate0 preview-dashboard-input" data-label="Mileage" name="milage" placeholder="50,000" value="@if(!empty($update) && $update->mileage){{$update->mileage}}@endif" >



        <span id="mileage_invalid_message"></span>

    </div>



    <div class="col-12  col-sm-6 col-md-4 updatebtndiv">



        <a  id="detail" class="btn btn-update text-white" style="

       display: flex;

       align-items: center;

       justify-content: center;

   ">Get Details <div class="loader"></div></a>





    </div>

    <div class="col-12 matterdiv" style="padding-top:20px;">Please make sure the mileage is accurate. <span>Why this matters?</span></div>

       <div class="col-12 matterdiv" style="padding-top:20px;">

                                            <div class="custom-control custom-checkbox ">

                                            <input type="checkbox" class="custom-control-input @if(!empty($featured_c)) checkbox-purchase-class @else checkbox-class-dashboard @endif " value="@if(!empty($update) &&  $update->featured === App\UserPackage::Active) 1 @else 0 @endif"   id="customCheckModel1" @if(!empty($update) &&  $update->featured === App\UserPackage::Active) disabled   checked     @endif>

                                            <label class="custom-control-label matterdiv" for="customCheckModel1">

                                            Do You Want to <span>Feature</span> Your Car ?

                                            </label>

                                            <input type="hidden" value="0" name="feature_checkbox" id="checkbox-featured">

                                            </div>
                                            </div>

</div>

<div class="col-12 formdiv p-0">



    <div class="form-row">

        <div class="col-md-6 mb-3">

            <div class="form-row">

                <div class="col-12 col-sm-6 col-md-6  labelalign">

                    <label for="validationCustom02">*Make :</label>



                </div>

                <div class="col-12 col-sm-6 col-md-6">

                    @php

                        $brand=App\Brand::OrderBy('name')->get();

                    @endphp

                    <select class="form-control validate0 preview-dashboard-input preview-dashboard-input  brand-select-base" data-label="Manufacturer" name="brand"  id="make_manuaf">

                        <option value="">Select Make:</option>



                        @if(!empty($brand)&&count($brand)!=0)

                            @foreach($brand as $t)

                                <option id="{{$t->id}}" value="{{$t->id}}" data-val="{{$t->name}}" data-id="{{$t->id}}"

                                        @if(!empty($update))

                                        @if($update->brand)

                                        @if($update->brand==$t->id)

                                        selected



                                        @endif

                                        @endif

                                        @endif

                                >{{$t->name}}</option>

                            @endforeach

                        @endif

                    </select>







                </div>

            </div>

        </div>

        <div class="col-md-6 mb-3">

            <div class="form-row">

                <div class="col-12 col-sm-4 col-md-6  labelalign">

                    <label for="validationCustom02">*Engine Type :</label>

                </div>

                <div class="col-12 col-sm-8 col-md-6 ">

                    <select class="form-control validate0 preview-dashboard-input" data-label="Engine Type" name="engine_type" >

                        <option value="">Select Engine Type</option>

                        @if(!empty($engine_type)&&count($engine_type)!=0)

                            @foreach($engine_type as $t)

                                <option value="{{$t->id}}"



                                        @if(!empty($update))

                                        @if($update->engine_type)

                                        @if($update->engine_type==$t->id)

                                        selected



                                        @endif

                                        @endif

                                        @endif

                                >{{$t->_value}}</option>

                            @endforeach

                        @endif



                    </select>

                </div>

            </div>

        </div>



    </div>



    <div class="form-row">

        <div class="col-md-6 mb-3">

            <div class="form-row">

                <div class="col-12 col-sm-4 col-md-6 labelalign">

                    <label for="validationCustom02">*Model :</label>



                </div>

                <div class="col-12 col-sm-8 col-md-6 ">

                    {{--<input class="form-control validate0 preview-dashboard-input" data-label="Model" id="model" placeholder="Enter Model" name="modal" value="@if($update) @if($update->modal) {{$update->modal}} @endif @endif" >--}}

                   <select class="form-control validate0 make-brand-append model-base-variant" id="model_api" name="modal">

                    @if(!empty($update) && !empty($update->brand))

                    @php $model_b = App\CarSetting::where('brand','=',$update->brand)->where('_key','model')->get(); @endphp

                    @if(!empty($model_b)&&count($model_b)!=0)

                    @foreach($model_b as $t)

                    @php

                    $val=str_replace(' ','',$t->_value);

                    @endphp

                    <option id="{{$val}}" value="{{$t->id}}" data-val="{{$t->name}}"

                    @if(!empty($update))

                    @if($update->modal)

                    @if($update->modal==$t->id)

                    selected

                    @endif

                    @endif

                    @endif>{{$t->_value}}</option>

                    @endforeach

                    @endif

                    @else

                    {{--<option value="">Select Model:</option>--}}

                    <option value="">Please Select Make 1st</option>

                    @endif

                    </select>

                    {{--<select class="form-control validate0" name="color" >--}}

                    {{--<option value="">Select Color</option>--}}

                    {{--@if(!empty($colors)&&count($colors)!=0)--}}

                    {{--@foreach($colors as $t)--}}

                    {{--<option id="{{ $t->_value }}" value="{{$t->id}}"--}}

                    {{--@if($update)--}}

                    {{--@if($update->color)--}}

                    {{--@if($update->color==$t->id)--}}

                    {{--selected--}}



                    {{--@endif--}}

                    {{--@endif--}}

                    {{--@endif--}}



                    {{-->{{$t->_value}}</option>--}}

                    {{--@endforeach--}}

                    {{--@endif--}}

                    {{--</select>--}}

                </div>

            </div>

        </div>

        <div class="col-md-6 mb-3">

            <div class="form-row">

                <div class="col-12 col-sm-4 col-md-6  labelalign">

                    <label for="validationCustom02">* Body Type:</label>



                </div>

                <div class="col-12 col-sm-8 col-md-6">

                    <select class="form-control validate0 preview-dashboard-input" data-label="Body Type" name="car_type" id="car_type">

                        <option value="">Select Body type</option>

                        @if(!empty($car_type)&&count($car_type)!=0)

                            @foreach($car_type as $t)

                                <option value="{{$t->id}}"

                                        @if(!empty($update))

                                        @if($update->car_type)

                                        @if($update->car_type==$t->id)

                                        selected



                                        @endif

                                        @endif

                                        @endif

                                >{{$t->_value}}</option>

                            @endforeach

                        @endif

                    </select>





                </div>

            </div>

        </div>

        {{--<div class="col-md-6 mb-3">--}}

            {{--<div class="form-row">--}}

                {{--<div class="col-12 col-sm-4 col-md-6 labelalign">--}}

                    {{--<label for="validationCustom02">* Interior :</label>--}}



                {{--</div>--}}

                {{--<div class="col-12 col-sm-6">--}}





                {{--</div>--}}

            {{--</div>--}}

        {{--</div>--}}

    </div>



    <div class="form-row">

        <div class="col-md-6 mb-3">

            <div class="form-row">

                <div class="col-12 col-sm-4 col-md-6 labelalign">

                    <label for="validationCustom02"> * Variant:</label>

                </div>

                <div class="col-12 col-sm-6">

                    <select class="form-control variant-dashboard-brand" name="variant">

                        <option value="">Select Variant</option>

                        @if(!empty($update) && !empty($update->modal))

                            @php $variant_d = App\CarSetting::where('model',$update->modal)->where('_key','variant')->get(); @endphp

                            @if(!empty($variant_d)&&count($variant_d)!=0)

                                @foreach($variant_d as $t)

                                    <option value="{{$t->id}}"

                                            @if(!empty($update))

                                            @if($update->variant)

                                            @if($update->variant==$t->id)

                                            selected



                                            @endif

                                            @endif

                                            @endif

                                    >{{$t->_value}}</option>

                                @endforeach

                            @endif



                        @endif

                    </select>



                </div>

            </div>

        </div>





        <div class="col-md-6 mb-3">

            <div class="form-row">

                <div class="col-12 col-sm-4 col-md-6 labelalign">

                    <label for="validationCustom02">*Matt Paint:</label>



                </div>

                <div class="col-12 col-sm-8 col-md-6 ">

                    <select class="form-control validate0 preview-dashboard-input" data-label="Matt Paint" name="matt_paint"  arial-placeholder="e.g No">

                        <option value="">Select Matt Paint</option>

                        @if(!empty($matt_paint)&&count($matt_paint)!=0)

                            @foreach($matt_paint as $t)

                                <option value="{{$t->id}}"

                                        @if(!empty($update))

                                        @if($update->matt_paint)

                                        @if($update->matt_paint==$t->id)

                                        selected



                                        @endif

                                        @endif

                                        @endif

                                >{{$t->_value}}</option>

                            @endforeach

                        @endif

                    </select>

                </div>

            </div>

        </div>



    </div>













    <div class="form-row">

        <div class="col-md-3 mb-3">

            <div class="form-row">

                <div class="col-12 labelalign">

                    <label for="validationCustom02"> *Number Of Doors:</label>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="form-row">

                <div class="col-12 ">

                    <select class="form-control validate0 preview-dashboard-input" data-label="Number Of Doors" name="car_door"  id="car-door" arial-placeholder="e.g No" required>

                        <option value="" selected >Select Doors</option>

                        <option value="2"

                                @if(!empty($update))

                                @if($update->car_door)

                                @if($update->car_door=="2")

                                selected



                                @endif

                                @endif

                                @endif

                        >2</option>

                        <option value="3"

                                @if(!empty($update))

                                @if($update->car_door)

                                @if($update->car_door=="3")

                                selected



                                @endif

                                @endif

                                @endif

                        >3</option>

                        <option value="4"

                                @if(!empty($update))

                                @if($update->car_door)

                                @if($update->car_door=="4")

                                selected



                                @endif

                                @endif

                                @endif

                        >4</option>

                        <option value="5"

                                @if(!empty($update))

                                @if($update->car_door)

                                @if($update->car_door=="5")

                                selected



                                @endif

                                @endif

                                @endif

                        >5</option>

                    </select>



                </div>



            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="form-row">

                <div class="col-12 labelalign">

                    <label for="validationCustom02"> *Safety Rating :</label>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="form-row">

                <div class="col-12 ">

                    <select class="form-control validate0 preview-dashboard-input" data-label="Safety Rating" name="saftey_rating"  arial-placeholder="e.g No" required>

                        <option value="" selected >Select One</option>

                        <option value="1" @if(!empty($update))

                        @if($update->safety_rating)

                        @if($update->safety_rating==="1")

                        selected



                                @endif

                                @endif

                                @endif >1</option>

                        <option value="2"

                                @if(!empty($update))

                                @if($update->safety_rating)

                                @if($update->safety_rating==="2")

                                selected



                                @endif

                                @endif

                                @endif

                        >2</option>

                        <option value="3"

                                @if(!empty($update))

                                @if($update->safety_rating)

                                @if($update->safety_rating==="3")

                                selected



                                @endif

                                @endif

                                @endif

                        >3</option>

                        <option value="4"

                                @if(!empty($update))

                                @if($update->safety_rating)

                                @if($update->safety_rating==="4")

                                selected



                                @endif

                                @endif

                                @endif

                        >4</option>

                        <option value="5"

                                @if(!empty($update))

                                @if($update->safety_rating)

                                @if($update->safety_rating==="5")

                                selected



                                @endif

                                @endif

                                @endif

                        >5</option>

                    </select>



                </div>



            </div>

        </div>



    </div>

    <div class="form-row">

        <div class="col-md-3 mb-3">

            <div class="form-row">

                <div class="col-12 labelalign">

                    <label for="validationCustom02"> * Interior:</label>



                </div>



            </div>

        </div>

        <div class="col-md-9 mb-3">

            <div class="form-row">

                <div class="col-12 colorinput ">

                    <select class="form-control validate0 preview-dashboard-input" data-label="Interior" name="interior" >

                        <option value="">Select Interior</option>

                        @if(!empty($interior)&&count($interior)!=0)

                            @foreach($interior as $t)

                                <option value="{{$t->id}}"

                                        @if(!empty($update))

                                        @if($update->interior)

                                        @if($update->interior==$t->id)

                                        selected



                                        @endif

                                        @endif

                                        @endif

                                >{{$t->_value}}</option>

                            @endforeach

                        @endif

                    </select>



                </div>



            </div>

        </div>



    </div>

    <div class="form-row">

        <div class="col-md-3 mb-3">

            <div class="form-row">

                <div class="col-12 labelalign">

                    <label for="validationCustom02">*Year:</label>



                </div>



            </div>

        </div>

        <div class="col-md-9 mb-3">

            <div class="form-row">

                <div class="col-12  ">

                    <select class="form-control validate0 preview-dashboard-input" data-label="Year" name="year" id="year_mani">

                        <option value="">Select Year</option>

                        {{ $last= date('Y')-120 }}

                        {{ $now = date('Y') }}

                        @for ($i = $now; $i >= $last; $i--)

                            <option value="{{ $i }}"

                                    @if(!empty($update))

                                    @if($update->year)

                                    @if($update->year==="$i")

                                    selected

                                    @endif

                                    @endif

                                    @endif >{{ $i }}</option>

                        @endfor

                        {{--<option value="2021"--}}

                                {{--@if(!empty($update))--}}

                                {{--@if($update->year)--}}

                                {{--@if($update->year==="2021")--}}

                                {{--selected--}}



                                {{--@endif--}}

                                {{--@endif--}}

                                {{--@endif>2021</option>--}}

                        {{--<option value="2020"--}}

                                {{--@if($update)--}}

                                {{--@if($update->year)--}}

                                {{--@if($update->year==="2020")--}}

                                {{--selected--}}



                                {{--@endif--}}

                                {{--@endif--}}

                                {{--@endif>2020</option>--}}

                        {{--<option value="2019"--}}

                                {{--@if($update)--}}

                                {{--@if($update->year)--}}

                                {{--@if($update->year==="2019")--}}

                                {{--selected--}}



                                {{--@endif--}}

                                {{--@endif--}}

                                {{--@endif>2019</option>--}}

                        {{--<option value="2018"--}}

                                {{--@if($update)--}}

                                {{--@if($update->year)--}}

                                {{--@if($update->year==="2018")--}}

                                {{--selected--}}



                                {{--@endif--}}

                                {{--@endif--}}

                                {{--@endif>2018</option>--}}

                        {{--<option value="2017"--}}

                                {{--@if($update)--}}

                                {{--@if($update->year)--}}

                                {{--@if($update->year==="2017")--}}

                                {{--selected--}}



                                {{--@endif--}}

                                {{--@endif--}}

                                {{--@endif>2017</option>--}}

                        {{--<option value="2016"--}}

                                {{--@if($update)--}}

                                {{--@if($update->year)--}}

                                {{--@if($update->year==="2016")--}}

                                {{--selected--}}



                                {{--@endif--}}

                                {{--@endif--}}

                                {{--@endif>2016</option>--}}

                        {{--<option value="2015"--}}

                                {{--@if($update)--}}

                                {{--@if($update->year)--}}

                                {{--@if($update->year==="2015")--}}

                                {{--selected--}}



                                {{--@endif--}}

                                {{--@endif--}}

                                {{--@endif>2015</option>--}}

                        {{--<option value="2014"--}}

                                {{--@if($update)--}}

                                {{--@if($update->year)--}}

                                {{--@if($update->year==="2014")--}}

                                {{--selected--}}



                                {{--@endif--}}

                                {{--@endif--}}

                                {{--@endif>2014</option>--}}

                        {{--<option value="2013"--}}

                                {{--@if($update)--}}

                                {{--@if($update->year)--}}

                                {{--@if($update->year==="2013")--}}

                                {{--selected--}}



                                {{--@endif--}}

                                {{--@endif--}}

                                {{--@endif>2013</option>--}}

                        {{--<option value="2012"--}}

                                {{--@if($update)--}}

                                {{--@if($update->year)--}}

                                {{--@if($update->year==="2012")--}}

                                {{--selected--}}



                                {{--@endif--}}

                                {{--@endif--}}

                                {{--@endif>2012</option>--}}

                        {{--<option value="2011"--}}

                                {{--@if($update)--}}

                                {{--@if($update->year)--}}

                                {{--@if($update->year==="2011")--}}

                                {{--selected--}}



                                {{--@endif--}}

                                {{--@endif--}}

                                {{--@endif>2011</option>--}}

                        {{--<option value="2010"--}}

                                {{--@if($update)--}}

                                {{--@if($update->year)--}}

                                {{--@if($update->year==="2010")--}}

                                {{--selected--}}



                                {{--@endif--}}

                                {{--@endif--}}

                                {{--@endif>2010</option>--}}

                        {{--<option value="2009"--}}

                                {{--@if($update)--}}

                                {{--@if($update->year)--}}

                                {{--@if($update->year==="2009")--}}

                                {{--selected--}}



                                {{--@endif--}}

                                {{--@endif--}}

                                {{--@endif>2009</option>--}}

                        {{--<option value="2008"--}}

                                {{--@if($update)--}}

                                {{--@if($update->year)--}}

                                {{--@if($update->year==="2008")--}}

                                {{--selected--}}



                                {{--@endif--}}

                                {{--@endif--}}

                                {{--@endif>2008</option>--}}

                        {{--<option value="2007"--}}

                                {{--@if($update)--}}

                                {{--@if($update->year)--}}

                                {{--@if($update->year==="2007")--}}

                                {{--selected--}}



                                {{--@endif--}}

                                {{--@endif--}}

                                {{--@endif>2007</option>--}}

                        {{--<option value="2006"--}}

                                {{--@if($update)--}}

                                {{--@if($update->year)--}}

                                {{--@if($update->year==="2006")--}}

                                {{--selected--}}



                                {{--@endif--}}

                                {{--@endif--}}

                                {{--@endif>2006</option>--}}

                        {{--<option value="2005"--}}

                                {{--@if($update)--}}

                                {{--@if($update->year)--}}

                                {{--@if($update->year==="2005")--}}

                                {{--selected--}}



                                {{--@endif--}}

                                {{--@endif--}}

                                {{--@endif>2005</option>--}}

                        {{--<option value="2004"--}}

                                {{--@if($update)--}}

                                {{--@if($update->year)--}}

                                {{--@if($update->year==="2004")--}}

                                {{--selected--}}



                                {{--@endif--}}

                                {{--@endif--}}

                                {{--@endif--}}



                        {{-->2004</option>--}}

                        {{--<option value="2003"--}}

                                {{--@if($update)--}}

                                {{--@if($update->year)--}}

                                {{--@if($update->year==="2003")--}}

                                {{--selected--}}



                                {{--@endif--}}

                                {{--@endif--}}

                                {{--@endif--}}

                        {{-->2003</option>--}}

                        {{--<option value="2002"--}}

                                {{--@if($update)--}}

                                {{--@if($update->year)--}}

                                {{--@if($update->year==="2000")--}}

                                {{--selected--}}



                                {{--@endif--}}

                                {{--@endif--}}

                                {{--@endif--}}



                        {{-->2002</option>--}}

                        {{--<option value="2001"--}}

                                {{--@if($update)--}}

                                {{--@if($update->year)--}}

                                {{--@if($update->year==="2001")--}}

                                {{--selected--}}



                                {{--@endif--}}

                                {{--@endif--}}

                                {{--@endif--}}



                        {{-->2001</option>--}}

                        {{--<option value="2000"--}}

                                {{--@if($update)--}}

                                {{--@if($update->year)--}}

                                {{--@if($update->year==="2000")--}}

                                {{--selected--}}



                                {{--@endif--}}

                                {{--@endif--}}

                                {{--@endif--}}



                        {{-->2000</option>--}}

                        {{--<option value="1999"--}}

                                {{--@if($update)--}}

                                {{--@if($update->year)--}}

                                {{--@if($update->year==="1999")--}}

                                {{--selected--}}



                                {{--@endif--}}

                                {{--@endif--}}

                                {{--@endif--}}

                        {{-->1999</option>--}}

                    </select>





                </div>



            </div>

        </div>



    </div>

    <div class="form-row">

        <div class="col-md-3 mb-3">

            <div class="form-row">

                <div class="col-12 labelalign">

                    <label for="validationCustom02"> * Transmission:</label>



                </div>



            </div>

        </div>

        <div class="col-md-9 mb-3">

            <div class="form-row">

                <div class="col-12 colorinputType ">

                    <select class="form-control validate0 preview-dashboard-input" data-label="Transmission" name="transmission" id="transmission_api">

                        <option value="">Select Transmission</option>

                        <option value="Mannual"

                                @if(!empty($update))

                                @if($update->transmission)

                                @if($update->transmission==="Mannual")

                                selected



                                @endif

                                @endif

                                @endif>Mannual</option>

                        <option value="Automatic"

                                @if(!empty($update))

                                @if($update->transmission)

                                @if($update->transmission==="Automatic")

                                selected



                                @endif

                                @endif

                                @endif

                        >Automatic</option>

                        <option value="Semi Automatic"

                                @if(!empty($update))

                                @if($update->transmission)

                                @if($update->transmission==="Semi Automatic")

                                selected



                                @endif

                                @endif

                                @endif

                        >Semi Automatic</option>

                        <option value="CVT"

                                @if(!empty($update))

                                @if($update->transmission)

                                @if($update->transmission==="CVT")

                                selected



                                @endif

                                @endif

                                @endif

                        >CVT</option>

                        <option value="DSG"

                                @if(!empty($update))

                                @if($update->transmission)

                                @if($update->transmission==="DSG")

                                selected



                                @endif

                                @endif

                                @endif

                        >DSG</option>

                        <option value="DCT"

                                @if(!empty($update))

                                @if($update->transmission)

                                @if($update->transmission==="DCT")

                                selected



                                @endif

                                @endif

                                @endif

                        >DCT</option>

                        <option value="TIPTRONIC"

                                @if(!empty($update))

                                @if($update->transmission)

                                @if($update->transmission==="TIPTRONIC")

                                selected



                                @endif

                                @endif

                                @endif

                        >TIPTRONIC</option>

                        <option value="Other"

                                @if(!empty($update))

                                @if($update->transmission)

                                @if($update->transmission==="Other")

                                selected



                                @endif

                                @endif

                                @endif

                        >Other</option>

                    </select>





                </div>



            </div>

        </div>



    </div>



    <div class="form-row">

        <div class="col-md-3 mb-3">

            <div class="form-row">

                <div class="col-12 labelalign">

                    <label for="validationCustom02"> * Fuel Type:</label>



                </div>



            </div>

        </div>

        <div class="col-md-9 mb-3">

            <div class="form-row">

                <div class="col-12 colorinputType ">

                    <select class="form-control validate0 preview-dashboard-input" data-label="Fuel Type" name="fuel_type"  id="fuel_type">

                        <option value="">Select Fuel Type</option>



                        <option value="PETROL"

                                @if(!empty($update))

                                @if($update->fuel_type)

                                @if($update->fuel_type==="PETROL")

                                selected



                                @endif

                                @endif

                                @endif

                        >Petrol</option>

                        <option id="Dualfuel" value="Dualfuel"

                                @if(!empty($update))

                                @if($update->fuel_type)

                                @if($update->fuel_type==="Dualfuel")

                                selected



                                @endif

                                @endif

                                @endif

                        >Dualfuel</option>

                        <option id="DIESEL" value="DIESEL"

                                @if(!empty($update))

                                @if($update->fuel_type)

                                @if($update->fuel_type==="DIESEL")

                                selected



                                @endif

                                @endif

                                @endif

                        >Diesel</option>

                        <option id="Biodiesel" value="Biodiesel"

                                @if(!empty($update))

                                @if($update->fuel_type)

                                @if($update->fuel_type==="Biodiesel")

                                selected



                                @endif

                                @endif

                                @endif

                        >Biodiesel</option>

                        <option id="LPG" value="LPG"

                                @if(!empty($update))

                                @if($update->fuel_type)

                                @if($update->fuel_type==="LPG")

                                selected



                                @endif

                                @endif

                                @endif

                        >LPG</option>

                        <option id="Hybrid" value="Hybrid"

                                @if(!empty($update))

                                @if($update->fuel_type)

                                @if($update->fuel_type==="Hybrid")

                                selected



                                @endif

                                @endif

                                @endif

                        >Hybrid</option>

                        <option id="Electric" value="Electric"

                                @if(!empty($update))

                                @if($update->fuel_type)

                                @if($update->fuel_type==="Electric")

                                selected



                                @endif

                                @endif

                                @endif

                        >Electric</option>

                        <option id="Other" value="Other"

                                @if(!empty($update))

                                @if($update->fuel_type)

                                @if($update->fuel_type==="Other")

                                selected



                                @endif

                                @endif

                                @endif

                        >Other</option>

                    </select>





                </div>



            </div>

        </div>



    </div>

    <div class="form-row">

        <div class="col-md-3 mb-3">

            <div class="form-row">

                <div class="col-12 labelalign">

                    <label for="validationCustom02">*Engine Size:</label>



                </div>



            </div>

        </div>

        <div class="col-md-9 mb-3">

            <div class="form-row">

                <div class="col-12">

                    <input id="enginesize" type="text" class="form-control validate0 preview-dashboard-input" data-label="Engine Size" name="engine_size" min="1"  placeholder="e.g.2698"

                           @if(!empty($update))@if($update->engine_size)value="{{$update->engine_size}}"@endif @endif>

                </div>



            </div>

        </div>



    </div>



    <div class="form-row">

        <div class="col-md-3 mb-3">

            <div class="form-row">

                <div class="col-12 labelalign">

                    <label for="validationCustom02">*Metallic Paint</label>



                </div>



            </div>

        </div>

        <div class="col-md-9 mb-3">

            <div class="form-row">

                <div class="col-12 colorinput ">

                    <select class="form-control validate0 preview-dashboard-input" data-label="Metallic Paint" name="metallic_paint"  arial-placeholder="e.g No">

                        <option value="">Yes Or NO?</option>

                        <option value="Yes" @if(!empty($update))

                        @if($update->metallic_paint)

                        @if($update->metallic_paint==="Yes")

                        selected



                                @endif

                                @endif

                                @endif >Yes</option>

                        <option value="No"

                                @if(!empty($update))

                                @if($update->metallic_paint)

                                @if($update->metallic_paint==="No")

                                selected



                                @endif

                                @endif

                                @endif

                        >No</option>

                    </select>



                </div>



            </div>

        </div>



    </div>



    <div class="form-row">

        <div class="col-md-3 mb-3">

            <div class="form-row">

                <div class="col-12 labelalign">

                    <label for="validationCustom02"> * Colour:</label>



                </div>



            </div>

        </div>

        <div class="col-md-9 mb-3">

            <div class="form-row">

                <div class="col-12  ">

                    <input type="text" id="color" class="form-control validate0 preview-dashboard-input" data-label="Colour" name="color" value="@if(!empty($update))@if($update->color){{$update->color}}@endif @endif">



                </div>



            </div>

        </div>



    </div>



    <div class="form-row">

        <div class="col-md-3 mb-3">

            <div class="form-row">

                <div class="col-12 labelalign">

                    <label for="validationCustom02"> Safety Rating Info <span>(Optional)</span>:</label>



                </div>



            </div>

        </div>

        <div class="col-md-9 mb-3">

            <div class="form-row">

                <div class="col-12 ">

                    <textarea placeholder="Describe Safety feature here...like as airbags,Head rests,Antilock Brake System,Head Injury Protection etc." class="form-control preview-dashboard-input" data-label="Safety Rating Info" name="saftey_rating_info"  rows="3"  @if(!empty($update) && !empty($update->safety_rating_info)) value="{{$update->safety_rating_info}}"@endif>@if(!empty($update) && !empty($update->safety_rating_info)){{$update->safety_rating_info}}@endif</textarea>

                    <span class="help-inline" style="color:#6c7c92">Enter information of safety Rating </span>

                </div>



            </div>

        </div>



    </div>

    <div class="form-row">

        <div class="col-md-3 mb-3">

            <div class="form-row">

                <div class="col-12 labelalign">

                    <label for="validationCustom02"> BHP <span>(Optional)</span>:</label>



                </div>



            </div>

        </div>

        <div class="col-md-9 mb-3">

            <div class="form-row">

                <div class="col-12 ">

                    <textarea class="form-control preview-dashboard-input" data-label="BHP" id='bhp' name="bhp"  rows="1" @if(!empty($update) && !empty($update->bhp)) value="{{$update->bhp}}"@endif>@if($update && !empty($update->bhp)){{$update->bhp}}@endif</textarea>

                </div>



            </div>

        </div>



    </div>

    <div class="form-row">

        <div class="col-md-6 mb-3">

            <div class="form-row">

                <div class="col-12 col-sm-4 col-md-6 labelalign">

                    <label for="validationCustom02">* Warranty</label>



                </div>

                <div class="col-12 col-sm-8 col-md-6">

                    <select class="form-control validate0" name="warranty"  arial-placeholder="e.g No">

                        <option value="">Yes Or NO?</option>

                        <option value="Yes" @if(!empty($update))

                        @if($update->warranty)

                        @if($update->warranty==="Yes")

                        selected



                                @endif

                                @endif

                                @endif >Yes</option>

                        <option value="No"

                                @if(!empty($update))

                                @if($update->warranty)

                                @if($update->warranty==="No")

                                selected



                                @endif

                                @endif

                                @endif

                        >No</option>

                    </select>

                </div>

            </div>

        </div>

        <div class="col-md-6 mb-3">

            <div class="form-row">

                <div class="col-12 col-sm-4 col-md-6 labelalign">

                    <label for="validationCustom02">*Drivers Position:</label>



                </div>

                <div class="col-8 col-sm-8 col-md-6 ">

                    <select class="form-control validate0 preview-dashboard-input" data-label="Drivers Position" name="driver_position"  arial-placeholder="e.g No">

                       <option value="">Select Driver Position</option>

                        <option value="Left" @if(!empty($update))

                        @if($update->drivers_position)

                        @if($update->drivers_position==="Left")

                        selected



                                @endif

                                @endif

                                @endif >Left</option>

                        <option value="Middle"

                                @if(!empty($update))

                                @if($update->drivers_position)

                                @if($update->drivers_position==="Middle")

                                selected



                                @endif

                                @endif

                                @endif

                        >Center</option>

                        <option value="Right"

                                @if(!empty($update))

                                @if($update->drivers_position)

                                @if($update->drivers_position==="Right")

                                selected



                                @endif

                                @endif

                                @endif

                        >Right</option>



                    </select>

                </div>

            </div>

        </div>



    </div>

    <div class="form-row">

        <div class="col-md-6 mb-3">

            <div class="form-row">

                <div class="col-12 col-sm-4 col-md-6 labelalign">

                    <label for="validationCustom02">* Wheel Size <span>Optional</span></label>



                </div>

                <div class="col-12 col-sm-8 col-md-6">

                    <input type="text" class="form-control preview-dashboard-input" data-label="Wheel Size" min="1" name="wheel_size"  placeholder="Wheel Size" @if(!empty($update))@if($update->wheel_size)value="{{$update->wheel_size}}"@endif @endif>

                    {{--<select class="form-control" name="wheel_size"  arial-placeholder="e.g No">--}}

                    {{--<option value="">Select Wheel Size</option>--}}

                    {{--@if(!empty($wheel_size)&&count($wheel_size)!=0)--}}

                    {{--@foreach($wheel_size as $t)--}}

                    {{--<option value="{{$t->id}}"--}}

                    {{--@if($update)--}}

                    {{--@if($update->wheel_size)--}}

                    {{--@if($update->wheel_size==$t->id)--}}

                    {{--selected--}}



                    {{--@endif--}}

                    {{--@endif--}}

                    {{--@endif--}}

                    {{-->{{$t->_value}}</option>--}}

                    {{--@endforeach--}}

                    {{--@endif--}}

                    {{--</select>--}}

                </div>

            </div>

        </div>

        <div class="col-md-6 mb-3">

            <div class="form-row">

                <div class="col-12 col-sm-4 col-md-6  labelalign">

                    <label for="validationCustom02">* Alloy wheels:</label>



                </div>

                <div class="col-12 col-sm-8 col-md-6 ">

                    <select class="form-control validate0 preview-dashboard-input" data-label="Alloy wheels" name="alloy_wheel"  arial-placeholder="e.g No">

                        <option value="">Yes Or NO?</option>

                        <option value="Yes" @if(!empty($update))

                        @if($update->alloy_wheel)

                        @if($update->alloy_wheel==="Yes")

                        selected



                                @endif

                                @endif

                                @endif >Yes</option>

                        <option value="No"

                                @if(!empty($update))

                                @if($update->alloy_wheel)

                                @if($update->alloy_wheel==="No")

                                selected



                                @endif

                                @endif

                                @endif

                        >

                            NO </option>



                    </select>

                </div>

            </div>

        </div>



    </div>

    <div class="form-row">

        <div class="col-md-3 mb-3">

            <div class="form-row">

                <div class="col-12 labelalign">

                    <label for="validationCustom02">*Add Features<img style="padding-right: 10px;padding-left: 10px; line-height: 1.30px;" src="{{ config('app.ui_asset_url').'frontend/img/carseelingtabs/Component 27 – 52.png' }}" alt="">:</label>



                </div>



            </div>

        </div>

        <div class="col-md-9 mb-3">

            <div class="form-row">

                <div class="col-12 infoinput">

                    <p>Select your car's Features here, be as specific as you can as this will help buyers

                        to find your car</p>

                    <div class="row">

                        <div class="col-12 labelalign">

                            <select class="form-control newmodalopen preview-dashboard-input" data-label="Features in Car"  arial-placeholder="e.g No">

                                <option  selected disabled>Add Features</option>

                                <option  value="yes">Add Features</option>

                                <option value="no">Remove Features</option>

                            </select>



                        </div>

                    </div>

                    <div id="append_ul"></div>

                    {{-- <div class="addorremove">

                        <p class="btn" data-toggle="modal" data-target=".addfeatureModal"><span><img src="{{ config('app.ui_asset_url').'frontend/img/carseelingtabs/Component 26 – 71.png' }}" alt=""></span> Add / Remove Features</p>

                    </div> --}}



                </div>



            </div>

        </div>



    </div>



    <div class="form-row">

        <div class="col-md-3 mb-3">

            <div class="form-row">

                <div class="col-12 labelalign">

                    <label for="validationCustom02">* Part Exchange:</label>



                </div>



            </div>

        </div>

        <div class="col-md-9 mb-3">

            <div class="form-row">

                <div class="col-12 ">

                    <select class="form-control validate0 preview-dashboard-input" data-label="Part Exchange" name="part_exchange"  arial-placeholder="e.g No">

                        <option value="">Yes Or NO?</option>

                        <option value="Yes" @if(!empty($update))

                        @if($update->part_exchange)

                        @if($update->part_exchange==="Yes")

                        selected



                                @endif

                                @endif

                                @endif >Yes</option>

                        <option value="No"

                                @if(!empty($update))

                                @if($update->part_exchange)

                                @if($update->part_exchange==="No")

                                selected



                                @endif

                                @endif

                                @endif

                        > No </option>

                    </select>





                </div>



            </div>

        </div>



    </div>



    <div class="form-row">

        <div class="col-md-3 mb-3">

            <div class="form-row">

                <div class="col-12 labelalign">

                    <label for="validationCustom02"> 0 to 60MPH <span>(Optional)</span>:</label>



                </div>



            </div>

        </div>

        <div class="col-md-9 mb-3">

            <div class="form-row">

                <div class="col-12 ">

                    <input type="text" class="form-control preview-dashboard-input" data-label="0 to 60MPH" id="speed" min="1"  max="60" value="@if(!empty($update))@if($update->speed){{$update->speed}}@endif @endif" name="speed" placeholder="e.g 0 to 60">

                    {{--<select class="form-control"  name="speed"  arial-placeholder="e.g No">--}}



                    {{--<option value="">Yes Or NO?</option>--}}

                    {{--<option value="Yes" @if($update)--}}

                    {{--@if($update->speed)--}}

                    {{--@if($update->speed==="Yes")--}}

                    {{--selected--}}



                    {{--@endif--}}

                    {{--@endif--}}

                    {{--@endif >Yes</option>--}}

                    {{--<option value="No"--}}

                    {{--@if($update)--}}

                    {{--@if($update->speed)--}}

                    {{--@if($update->speed==="No")--}}

                    {{--selected--}}



                    {{--@endif--}}

                    {{--@endif--}}

                    {{--@endif--}}

                    {{-->NO</option>--}}

                    {{--</select>--}}





                </div>



            </div>

        </div>



    </div>



    <div class="form-row">

        <div class="col-md-3 mb-3">

            <div class="form-row">

                <div class="col-12 labelalign">

                    <label for="validationCustom02"> Top Speed <span>(Optional)</span>:</label>



                </div>



            </div>

        </div>

        <div class="col-md-9 mb-3">

            <div class="form-row">

                <div class="col-12 ">

                    <input type="text" class="form-control preview-dashboard-input" data-label="Top Speed" id="top_speed" name="top_speed" value="@if(!empty($update))@if($update->top_speed){{$update->top_speed}}@endif @endif" placeholder="e.g 100">

                    {{--<select class="form-control" name="top_speed"  arial-placeholder="e.g No">--}}

                    {{--<option value="">Yes Or NO?</option>--}}

                    {{--<option value="Yes" @if(!empty($update))--}}

                    {{--@if($update->top_speed)--}}

                    {{--@if($update->top_speed==="Yes")--}}

                    {{--selected--}}



                    {{--@endif--}}

                    {{--@endif--}}

                    {{--@endif >Yes</option>--}}

                    {{--<option value="No"--}}

                    {{--@if($update)--}}

                    {{--@if($update->top_speed)--}}

                    {{--@if($update->top_speed==="No")--}}

                    {{--selected--}}



                    {{--@endif--}}

                    {{--@endif--}}

                    {{--@endif--}}

                    {{-->No</option>--}}

                    {{--</select>--}}





                </div>



            </div>

        </div>



    </div>

    <div class="form-row">

        <div class="col-md-6 mb-3">

            <div class="form-row">

                <div class="col-12 col-sm-12 col-md-6 labelalign">

                    <label for="validationCustom02"> Driver wheels <span>(Optional)</span>: </label>



                </div>

                <div class="col-12 col-sm-12 col-md-6">

                    <select class="form-control preview-dashboard-input" data-label="Driver wheels" name="driven_wheel"  arial-placeholder="e.g No">

                        <option value="">Select Wheels</option>

                        <option value="Front" @if(!empty($update))

                        @if($update->driven_wheels)

                        @if($update->driven_wheels==="Front")

                        selected



                                @endif

                                @endif

                                @endif >Front</option>

                        <option value="Rear"

                                @if(!empty($update))

                                @if($update->driven_wheels)

                                @if($update->driven_wheels==="Rear")

                                selected



                                @endif

                                @endif

                                @endif

                        >Rear</option>

                        <option value="4X4"

                                @if(!empty($update))

                                @if($update->driven_wheels)

                                @if($update->driven_wheels==="4X4")

                                selected



                                @endif

                                @endif

                                @endif

                        >4X4</option>

                        <option value="All wheel Drive"

                                @if(!empty($update))

                                @if($update->driven_wheels)

                                @if($update->driven_wheels==="All wheel Drive")

                                selected



                                @endif

                                @endif

                                @endif

                        >All wheel Drive</option>

                    </select>



                </div>

            </div>

        </div>

        <div class="col-md-6 mb-3">

            <div class="form-row">

                <div class="col-12 col-sm-4 col-md-6 labelalign">

                    <label for="validationCustom02">*Import :</label>



                </div>

                <div class="col-12 col-sm-8 col-md-6">

                    <select class="form-control validate0 preview-dashboard-input" data-label="Import" name="import"  id="import">

                        <option value="" >Yes/No?</option>

                        {{--@if(!empty($import)&&count($import)!=0)--}}

                        {{--@foreach($import as $t)--}}

                        {{--@endforeach--}}

                        {{--@endif--}}

                        <option value="Yes"

                                @if(!empty($update))

                                @if($update->import)

                                @if($update->import =="Yes")

                                selected

                                @endif

                                @endif

                                @endif

                        >Yes</option>

                        <option value="No"

                                @if(!empty($update))

                                @if($update->import)

                                @if($update->import =="No")

                                selected



                                @endif

                                @endif

                                @endif

                        >No</option>



                    </select>

                </div>

            </div>

        </div>



    </div>

    <div class="form-row">

        <div class="col-md-3 mb-3">

            <div class="form-row">

                <div class="col-12 labelalign">

                    <label for="validationCustom02">* MOT Expiry date: </label>



                </div>



            </div>

        </div>

        <div class="col-md-9 mb-3">

            <div class="form-row">

                <div class="col-12 ">

                    <input type="text" class="form-control validate0 preview-dashboard-input" data-label="MOT Expiry date" name="mot" id="datepicker"  placeholder="e.g. 1-2-2016" value="@if(!empty($update))@if($update->mot_expiry_date){{$update->mot_expiry_date}}@endif @endif" required>





                </div>



            </div>

        </div>



    </div>

    <div class="form-row">

        <div class="col-md-6 mb-3">

            <div class="form-row">

                <div class="col-12 col-sm-4 col-md-6 labelalign">

                    <label for="validationCustom02">*Service history: </label>



                </div>

                <div class="col-12 col-sm-8 col-md-6">

                    <select class="form-control validate0 preview-dashboard-input" data-label="Service history" name="service_history" >

                        <option value="">Select Service History</option>

                        @if(!empty($service_history)&&count($service_history)!=0)

                            @foreach($service_history as $t)

                                <option value="{{$t->id}}"

                                        @if(!empty($update))

                                        @if($update->service_history)

                                        @if($update->service_history==$t->id)

                                        selected



                                        @endif

                                        @endif

                                        @endif

                                >{{$t->_value}}</option>

                            @endforeach

                        @endif

                    </select>

                </div>

            </div>

        </div>

        <div class="col-md-6 mb-3">

            <div class="form-row">

                <div class="col-12 col-sm-4 col-md-6 labelalign">

                    <label for="validationCustom02">* Boot spoiler:

                    </label>



                </div>

                <div class="col-12 col-sm-8 col-md-6 ">

                    <select class="form-control validate0 preview-dashboard-input" data-label="Boot spoiler" name="boot_spoiler" >

                        <option value="">Yes/No ?</option>

                        @if(!empty($boot_spoiler)&&count($boot_spoiler)!=0)

                            @foreach($boot_spoiler as $t)

                                <option value="{{$t->id}}"

                                        @if(!empty($update))

                                        @if($update->boot_spoiler)

                                        @if($update->boot_spoiler==$t->id)

                                        selected



                                        @endif

                                        @endif

                                        @endif

                                >{{$t->_value}}</option>

                            @endforeach

                        @endif

                    </select>

                </div>

            </div>

        </div>



    </div>

    <div class="form-row">

        <div class="col-md-6 mb-3">

            <div class="form-row">

                <div class="col-12 col-sm-4 col-md-6 labelalign">

                    <label for="validationCustom02">* Parking Sensor: </label>



                </div>

                <div class="col-12 col-sm-8 col-md-6">

                    <select class="form-control validate0 preview-dashboard-input" data-label="Parking Sensor" name="parking_sensor" >

                        <option value="">Select Parking Sensor</option>

                        @if(!empty($parking_sensor)&&count($parking_sensor)!=0)

                            @foreach($parking_sensor as $t)

                                <option value="{{$t->id}}"

                                        @if(!empty($update))

                                        @if($update->parking_sensor)

                                        @if($update->parking_sensor==$t->id)

                                        selected



                                        @endif

                                        @endif

                                        @endif

                                >{{$t->_value}}</option>

                            @endforeach

                        @endif

                    </select>

                </div>

            </div>

        </div>

        <div class="col-md-6 mb-3">

            <div class="form-row">

                <div class="col-12 col-sm-4 col-md-6 labelalign">

                    <label for="validationCustom02">* Exhaust:</label>



                </div>



                <div class="col-12 col-sm-8 col-md-6 ">

                    <select class="form-control validate0" name="exhaust" >

                        <option value="">Select Exhaust</option>

                        @if(!empty($exhaust)&&count($exhaust)!=0)

                            @foreach($exhaust as $t)

                                <option value="{{$t->id}}"

                                        @if(!empty($update))

                                        @if($update->exhaust)

                                        @if($update->exhaust==$t->id)

                                        selected



                                        @endif

                                        @endif

                                        @endif

                                >{{$t->_value}}</option>

                            @endforeach

                        @endif

                    </select>

                </div>

            </div>

        </div>



    </div>



</div>



<div class="col-12">

    <div class="form-group row">

        <div class="col-6 col-sm-6 backbtn ">

            <a class="btn btn-back"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i> Back</a>

        </div>

        <div class="col-6 col-sm-6 nextbtn">

            <a class=" btn btn-next" onclick="topFunction()" id="carsellarnext0">Next</a>

        </div>

    </div>



</div>



</div>

<div id="first-next-section">

    <div class="row sellurcarnextsection 1">

        <div class="col-12" id="salenextPage">

            <div class="row">

                <div class="col-12 tabshowing">

                    <img class="badge" src="{{ config('app.ui_asset_url').'frontend/img/carselling/badge.png' }}">





                    <div class="col-12 formdiv">


   <div class="form-row">

                            <div class="col-md-3 mb-3">

                                <div class="form-row">

                                    <div class="col-12 labelalign">

                                        <label for="validationCustom02"> * Post Code:</label>



                                    </div>



                                </div>

                            </div>

                            <div class="col-md-9 mb-3">

                                <div class="form-row">

                                    <div class="col-12">

                                        @php $s =  Session::get('userDetails')['PostalCode'];

                                        @endphp

                                        @if(!empty($s))

                                            <input type="text" class="form-control validate1 preview-dashboard-input" data-label="Post Code"  value="{{$s}}" disabled>

                                            <input type="hidden" name="post_code" value="{{$s}}">

                                        @else

                                            <input type="text" class="form-control validate1 preview-dashboard-input" data-label="Post Code" @if(!empty($update) && !empty($update->post_code))value="{{$update->post_code}}"@endif name="post_code"  placeholder="Enter Post Code" required>

                                        @endif





                                    </div>



                                </div>

                            </div>



                        </div>

                        {{--<div class="form-row">--}}

                        {{--<div class="col-md-3 mb-3">--}}

                        {{--<div class="form-row">--}}

                        {{--<div class="col-12 labelalign">--}}

                        {{--<label for="validationCustom02"> * Body Type:</label>--}}



                        {{--</div>--}}



                        {{--</div>--}}

                        {{--</div>--}}

                        {{--<div class="col-md-9 mb-3">--}}

                        {{--<div class="form-row">--}}

                        {{--<div class="col-12 colorinputType ">--}}

                        {{--<select class="form-control validate1" name="body_type" >--}}

                        {{--<option value="">Select Body type</option>--}}

                        {{--@if(!empty($body_type)&&count($body_type)!=0)--}}

                        {{--@foreach($body_type as $t)--}}

                        {{--<option value="{{$t->id}}"--}}



                        {{--@if($update)--}}

                        {{--@if($update->body_type)--}}

                        {{--@if($update->body_type==$t->id)--}}

                        {{--selected--}}



                        {{--@endif--}}

                        {{--@endif--}}

                        {{--@endif--}}

                        {{-->{{$t->_value}}</option>--}}

                        {{--@endforeach--}}

                        {{--@endif--}}

                        {{--</select>--}}





                        {{--</div>--}}



                        {{--</div>--}}

                        {{--</div>--}}



                        {{--</div>--}}





                        <div class="form-row">

                            <div class="col-md-3 mb-3">

                                <div class="form-row">

                                    <div class="col-12 labelalign">

                                        <label for="validationCustom02"> *Car Condition:</label>



                                    </div>



                                </div>

                            </div>

                            <div class="col-md-9 mb-3">

                                <div class="form-row">

                                    <div class="col-12 colorinput">

                                        <select class="form-control validate1 preview-dashboard-input" data-label="Car Condition" name="condition" >

                                            <option value="">Select Condition</option>

                                            <option value="New"

                                                    @if(!empty($update))

                                                    @if($update->car_condition)

                                                    @if($update->car_condition==="New")

                                                    selected



                                                @endif

                                                @endif

                                                @endif

                                            >New</option>

                                            <option value="Used"

                                                    @if(!empty($update))

                                                    @if($update->car_condition)

                                                    @if($update->car_condition==="Used")

                                                    selected



                                                @endif

                                                @endif

                                                @endif

                                            >Used</option>

                                        </select>



                                    </div>



                                </div>

                            </div>



                        </div>

                        <div class="form-row">

                            <div class="col-md-3 mb-3">

                                <div class="form-row">

                                    <div class="col-12 labelalign">

                                        <label for="validationCustom02"> *Contact Number:</label>



                                    </div>



                                </div>

                            </div>

                            <div class="col-md-9 mb-3">

                                <div class="form-row">

                                    <div class="col-12 colorinput">

                                        <input type="tel" class="form-control new-price-for-car validate1 preview-dashboard-input contact_number_dashboard"  placeholder="Enter Contact Number" data-label="Contact Number" name="contact" @if(!empty($update) && $update->contact_number)value="{{$update->contact_number}}"@endif>

                                    <span class="contact_pattern" style="display: none;color:#e4001b;">Invalid Contact Number</span>

                                    </div>



                                </div>

                            </div>



                        </div>

                        <div class="form-row">

                            <div class="col-md-3 mb-3">

                                <div class="form-row">

                                    <div class="col-12 labelalign">

                                        <label for="validationCustom02">Tags (Optional):</label>



                                    </div>



                                </div>

                            </div>

                            <div class="col-md-9 mb-3">

                                <div class="form-row">

                                    <div class="col-12 colorinput">

                                        @php

                                            if (!empty($update) && !empty($update->tags)){

                                                $sell_tags = json_decode($update->tags);

                                            }

                                        @endphp

                                        @if(!empty($sell_tags) && count($sell_tags)>0)



                                            <div class="bootstrap-tagsinput">

                                                @foreach($sell_tags as $tag)

                                                    <span class="badge badge-info"

                                                          id="badge_remove_div">{{$tag}}<span

                                                                id="badge_remove"

                                                                data-role="remove"></span></span>

                                                @endforeach

                                                <input id="inputTags" type="text"

                                                       class="form-control">

                                            </div>

                                        @else

                                            <input id="inputTags" type="text"

                                                   class="form-control input_tag_garage"

                                                   >

                                        @endif

                                    </div>



                                </div>

                            </div>



                        </div>

                        <div class="form-row">

                            <div class="col-md-3 mb-3">

                                <div class="form-row">

                                    <div class="col-12 labelalign">

                                        <label for="validationCustom02"> Description : <img src="{{ config('app.ui_asset_url').'frontend/img/carseelingtabs/Component 27 – 52.png' }}" alt=""></label>



                                    </div>



                                </div>

                            </div>

                            <div class="col-md-9 mb-3">

                                <div class="form-row">

                                    <div class="col-12 text-area">

                        <textarea class="form-control validate1  preview-dashboard-input" data-label="Description" name="advert_type" id="advert_t"  rows="3" @if(!empty($update))@if($update->advert_text)value="{{$update->advert_text}}"@endif

                                @endif> @if(!empty($update))@if($update->advert_text){{$update->advert_text}}@endif @endif</textarea>

                                    </div>



                                </div>

                            </div>



                        </div>





                    </div>

                </div>





            </div>

        </div>

    </div>

    <div class="row sellurcarnextsection 2 ">

        <div class="col-12" id="salenextPage">

            <div class="row">

                <div class="col-12 tabshowing">

                    <img class="badge" src="{{ config('app.ui_asset_url').'frontend/img/carselling/badge.png' }}">



                    <div class="col-12">

                        <div class="form-group row">

                            <div class="col-6 col-sm-6  backbtn ">

                                <a class="btn btn-back" id="previousbtnTo0"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i> Back</a>

                            </div>

                            <div class="col-6 col-sm-6 nextbtn">

                                <a class=" btn btn-next" id="carsellarnext1" onclick="topFunction()">Next</a>





                            </div>

                        </div>



                    </div>

                </div>





            </div>

        </div>





    </div>



</div>

<div id="second-next-section">

    <div class="row sellurcarnextsection 1">

        <div class="col-12" id="salenextPage">

            <div class="row">

                <div class="col-12 tabshowing">

                    <img class="badge" src="{{ config('app.ui_asset_url').'frontend/img/carselling/badge.png' }}">



                    <div class="col-12 formdiv">



                        <div class="form-row">

                            <div class="col-md-3 mb-3">

                                <div class="form-row">

                                    <div class="col-12 labelalign">

                                        <label for="validationCustom02">Select Category

                                            for <img src="{{ config('app.ui_asset_url').'frontend/img/carseelingtabs/Component 27 – 52.png' }}" alt=""></label>



                                    </div>



                                </div>

                            </div>

                            <div class="col-md-9 mb-3">

                                <div class="form-row">

                                                                    <div class="col-12 checkboxdiv">

                                        @if(!empty($update) && $update->car_availbilty && $update->car_availbilty==="American-Muscle")
                                                <div class="custom-control custom-checkbox">

                                                    <input type="checkbox" class="radio custom-control-input price-show-dashbrd validation-category" data-label="American Muscle" id="customCheck1" name="availibilty[]" value="American-Muscle" checked>

                                                    <label class="custom-control-label " for="customCheck1">American Muscle</label>

                                                </div>
                                                @elseif(!empty($update) && $update->car_availbilty &&  $update->car_availbilty==="Auction")
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="radio custom-control-input auction-checkbox6 validation-category" data-label="Auction" id="customCheck6" name="availibilty[]" value="Auction" checked>
                                                        <label class="custom-control-label " for="customCheck6">Auction</label>
                                                    </div>
                                                  @elseif(!empty($update) && $update->car_availbilty &&  $update->car_availbilty==="Rent")
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="radio custom-control-input rent-show-dashbrd validation-category" data-label="Select Category" id="customCheck4" name="availibilty[]" value="Rent" checked>
                                                        <label class="custom-control-label " for="customCheck4">Rent</label>
                                                    </div>
                                                  @elseif(!empty($update) && $update->car_availbilty &&  $update->car_availbilty==="Prestige")
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="radio custom-control-input price-show-dashbrd validation-category" data-label="Prestige" id="customCheck5" name="availibilty[]" value="Prestige" checked>
                                                        <label class="custom-control-label " for="customCheck5">Prestige</label>
                                                    </div>
                                              @elseif(!empty($update) && $update->car_availbilty &&  $update->car_availbilty==="Swap")
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="radio custom-control-input price-show-dashbrd validation-category" data-label="Swap" id="customCheck7" name="availibilty[]" value="Swap" checked>
                                                        <label class="custom-control-label " for="customCheck7">Swap</label>
                                                    </div>
                                               @else
                                                    @if(!empty($amr_c))
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="radio custom-control-input price-show-dashbrd validation-category" data-label="American Muscle" id="customCheck1" name="availibilty[]" value="American-Muscle">
                                                            <label class="custom-control-label " for="customCheck1">American Muscle</label>
                                                        </div>
                                                    @endif
                                                    @if(!empty($auc_c))
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="radio custom-control-input auction-checkbox6 validation-category" data-label="Auction" id="customCheck6" name="availibilty[]" value="Auction">
                                                            <label class="custom-control-label " for="customCheck6">Auction</label>
                                                        </div>
                                                    @endif
                                                    @if(!empty($rent_c))
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="radio custom-control-input rent-show-dashbrd validation-category" data-label="Select Category" id="customCheck4" name="availibilty[]" value="Rent">
                                                            <label class="custom-control-label " for="customCheck4">Rent</label>
                                                        </div>
                                                    @endif
                                                        @if(!empty($pre_c))
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="radio custom-control-input price-show-dashbrd validation-category" data-label="Prestige" id="customCheck5" name="availibilty[]" value="Prestige">
                                                            <label class="custom-control-label " for="customCheck5">Prestige</label>
                                                        </div>
                                                    @endif
                                                    @if(!empty($swp_c))
                                                            <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="radio custom-control-input price-show-dashbrd validation-category" data-label="Swap" id="customCheck7" name="availibilty[]" value="Swap">
                                                            <label class="custom-control-label " for="customCheck7">Swap</label>
                                                        </div>
                                                    @endif


                                                @endif







                                    </div>




                                </div>

                            </div>



                        </div>



                    </div>

                </div>





            </div>

        </div>

    </div>





    <div class="auction-next-section" style="display: none">

        <div class="row sellurcarnextsection 1">

            <div class="col-12" id="salenextPage">

                <div class="row">

                    <div class="col-12 tabshowing">

                        <div class="form-row">

                            <div class="col-md-6 mb-3">

                                <div class="form-row">

                                    <div class="col-12 col-sm-6 col-md-6  labelalign">

                                        <label for="validationCustom02">* Start Date:</label>

                                    </div>

                                    <div class="col-12 col-sm-6 col-md-6">

                                        <input type="text" class="form-control validate2 datepicker-date-auction preview-dashboard-input validated-select-category" data-label="Start Date" id="Start_Date_Auction" name="startdate_auction"   placeholder="e.g. 1-2-2016" value="@if(!empty($update))@if($update->auction_startdate){{$update->auction_startdate}}@endif @endif" required>

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-6 mb-3">

                                <div class="form-row">

                                    <div class="col-12 col-sm-4 col-md-6  labelalign">

                                        <label for="validationCustom02">*End Date:</label>

                                    </div>

                                    <div class="col-12 col-sm-8 col-md-6 ">

                                        <input type="text" class="form-control validate2 datepicker-date-auction preview-dashboard-input validated-select-category" id="End_Date_Auction" data-label="End Date" name="enddate_auction"   placeholder="e.g. 1-2-2016" value="@if(!empty($update))@if($update->auction_enddate){{$update->auction_enddate}}@endif @endif" required>



                                    </div>

                                </div>

                            </div>



                        </div>

                        <div class="form-row">

                            <div class="col-12 bestprice">

                                <label for="validationCustom02">*Discount Price:</label>

                            </div>

                            <div class="col-12 col-sm-8">

                                {{--<div class="input-group priceaddbtn mb-2" style="width:100%;">--}}

                                {{--<div class="input-group-prepend" style="width: inherit;">--}}

                                {{--<span class="input-group-text">--}}

                                {{--<img src="{{ config('app.ui_asset_url').'frontend/img/carseelingtabs/shopping.png' }}" alt="" />--}}

                                {{--</span>--}}

                                {{--@if($update)--}}

                                {{--@if($update->auction_price)--}}

                                {{--@php $price_auction =(int) $update->auction_price @endphp--}}

                                {{--@endif--}}

                                {{--@else--}}

                                {{--@php $price_auction = "" @endphp--}}

                                {{--@endif--}}

                                {{--<input type="number" class="new-price-for-car" name="auction_price" id="number2" placeholder="0" value=" @if($update  && $update->auction_discountprice) {{ $update->auction_discountprice }} @endif" min="0" required>--}}

                                {{--</div>--}}

                                {{--</div>--}}

                                {{--<div class="input-group priceaddbtn" style="width:100%;">--}}

                                {{--<button id="plus2">+</button>--}}

                                {{--<button id="minus2">-</button>--}}

                                {{--</div>--}}

                            </div>

                        </div>

                        <div class="form-group">

                            <label for="blog_subtitle">Location</label>

                            <input type="text" class="form-control preview-dashboard-input validated-select-category"  data-label="Location" placeholder="Enter Location" aria-describedby="blog_subtitle_help" id="auctionMapInput" name='auction_location'

                                   value='@if(!empty($update) && !empty($update->auction_location)) {{$update->auction_location}} @endif'>

                            <small id="location" class="form-text text-muted">Location</small>

                        </div>







                        <div class="form-row">

                            <input type="hidden" name="auctionmaplat" id="AuctionMapLat" value="@if(!empty($update) && $update->auction_maplat) {{$update->auction_maplat}} @endif">

                            <input type="hidden" name="auctionmaplng" id="AuctionMapLng" value="@if(!empty($update) && $update->auction_maplng) {{$update->auction_maplng}} @endif">

                            <div class="col-xs-12 col-sm-12 Map">

                                <div id="auctionmap" style="height:200px; width:100%;">

                                    Map

                                </div>

                            </div>



                        </div>















                    </div>

                </div>

            </div>

        </div>

    </div>





    <div class="row sellurcarnextsection 2 ">

        <div class="col-12" id="salenextPage">

            <div class="row">

                <div class="col-12 tabshowing">

                    <img class="badge" src="{{ config('app.ui_asset_url').'frontend/img/carselling/badge.png' }}">

                    <div class="form-row rent-feild-check">

                        <div class="col-md-6 mb-3">

                            <div class="form-row">

                                <div class="col-12 col-sm-4 col-md-6 labelalign">

                                    <label for="validationCustom02">Rent Duration</label>



                                </div>

                                <div class="col-12 col-sm-8 col-md-6 ">

                                    <input class="form-control preview-dashboard-input valid-rent-category" data-label="Rent Duration" type="text" id="rent-duration" placeholder="Enter Rent Duration" name="rent_duration" value="@if(!empty($update) && $update->rent_duration){{$update->rent_duration}}@endif">

                                </div>

                            </div>

                        </div>

                        <div class="col-md-6 mb-3">

                            <div class="form-row">

                                <div class="col-12 col-sm-4 col-md-6 labelalign">

                                    <label for="validationCustom02">Enter Price</label>

                                </div>

                                <div class="col-12 col-sm-6">

                                    <input class="form-control preview-dashboard-input valid-rent-category new-price-for-car price-car-six-digit"  data-label="Enter Price" type="number" id="rent-price" name="rent_price"  placeholder="Enter Price" value="@if(!empty($update) && !empty($update->price)){{$update->price}}@endif">

                                </div>

                            </div>

                        </div>





                    </div>

                     <div class="form-row rent-feild-check">

                        <div class="col-md-6 mb-3">

                            <div class="form-row">

                                <div class="col-12 col-sm-4 col-md-6 labelalign">

                                    <label for="validationCustom02">Opening Time</label>



                                </div>

                                <div class="col-12 col-sm-8 col-md-6 ">

                                    <input class="form-control preview-dashboard-input valid-rent-category validated-select-category"  name="open_time" id="open-time" type="time" data-label="Opening Time"   value="@if(!empty($update) && !empty($update->open_timing)){{$update->open_timing}}@endif">

                                </div>

                            </div>

                        </div>

                        <div class="col-md-6 mb-3">

                            <div class="form-row">

                                <div class="col-12 col-sm-4 col-md-6 labelalign">

                                    <label for="validationCustom02">Closing Time</label>



                                </div>

                                <div class="col-12 col-sm-6">

                                    <input class="form-control preview-dashboard-input valid-rent-category validated-select-category"  name="close_time" id="close-time" type="time" data-label="Closing Time"   value="@if(!empty($update) && !empty($update->close_timing)){{$update->close_timing}}@endif">







                                </div>

                            </div>

                        </div>





                    </div>
                        <div class="form-row rent-feild-check">

                        <div class="col-md-6 mb-3">

                            <div class="form-row">

                                <div class="col-12 col-sm-4 col-md-6 labelalign">

                                    <label for="validationCustom02">Opening Day</label>



                                </div>

                                <div class="col-12 col-sm-8 col-md-6 ">
 <select class="form-control preview-dashboard-input valid-rent-category validated-select-category" id="open-day" name="open_day" data-label="Opening Day">
                                        <option value="Monday" @if(!empty($update) && !empty($update->open_day)) @if($update->open_day === "Monday") selected @endif @endif >Monday</option>
                                         <option value="Tuesday"  @if(!empty($update) && !empty($update->open_day)) @if($update->open_day === "Tuesday") selected @endif @endif>Tuesday</option>
                                         <option value="Wednesday"  @if(!empty($update) && !empty($update->open_day)) @if($update->open_day === "Wednesday") selected @endif @endif>Wednesday</option>
                                         <option value="Thurday"  @if(!empty($update) && !empty($update->open_day)) @if($update->open_day === "Thurday") selected @endif @endif>Thurday</option>
                                         <option value="Friday"  @if(!empty($update) && !empty($update->open_day)) @if($update->open_day === "Friday") selected @endif @endif>Friday</option>
                                         <option value="Saturday"  @if(!empty($update) && !empty($update->open_day)) @if($update->open_day === "Saturday") selected @endif @endif>Saturday</option>
                                         <option value="Sunday"  @if(!empty($update) && !empty($update->open_day)) @if($update->open_day === "Sunday") selected @endif @endif>Sunday</option>
                                           </select>
                                    <!--<input class="form-control preview-dashboard-input valid-rent-category"  name="open_time" id="open-time" type="time" data-label="Opening Time"   value="@if(!empty($update) && !empty($update->open_timing)){{$update->open_timing}}@endif">-->

                                </div>

                            </div>

                        </div>

                        <div class="col-md-6 mb-3">

                            <div class="form-row">

                                <div class="col-12 col-sm-4 col-md-6 labelalign">

                                    <label for="validationCustom02">Closing Day</label>



                                </div>

                                <div class="col-12 col-sm-6">
 <select class="form-control preview-dashboard-input valid-rent-category validated-select-category" id="close-day" name="close_day" data-label="Closing Time">
   
                                         <option value="Monday"@if(!empty($update) && !empty($update->close_day)) @if($update->close_day === "Monday") selected @endif @endif>Monday</option>
                                         <option value="Tuesday"@if(!empty($update) && !empty($update->close_day)) @if($update->close_day === "Tuesday") selected @endif @endif>Tuesday</option>
                                         <option value="Wednesday"@if(!empty($update) && !empty($update->close_day)) @if($update->close_day === "Wednesday") selected @endif @endif>Wednesday</option>
                                         <option value="Thurday"@if(!empty($update) && !empty($update->close_day)) @if($update->close_day === "Thurday") selected @endif @endif>Thurday</option>
                                         <option value="Friday"@if(!empty($update) && !empty($update->close_day)) @if($update->close_day === "Friday") selected @endif @endif>Friday</option>
                                         <option value="Saturday"@if(!empty($update) && !empty($update->close_day)) @if($update->close_day === "Saturday") selected @endif @endif>Saturday</option>
                                         <option value="Sunday"@if(!empty($update) && !empty($update->close_day)) @if($update->close_day === "Sunday") selected @endif @endif>Sunday</option>
                                        
                                      
                                           </select>
                                    <!--<input class="form-control preview-dashboard-input valid-rent-category"  name="close_day" id="close-time" type="time" data-label="Closing Time"   value="@if(!empty($update) && !empty($update->close_timing)){{$update->close_timing}}@endif">-->







                                </div>

                            </div>

                        </div>





                    </div>
                    <div class="row m-0 price-feild">

                        <div class="col-12">

                            <div class="row sellcar">

                                <div class="col-9 col-sm-8 col-md-5 advertisementHeading">

                                    <img src="{{ config('app.ui_asset_url').'frontend/img/carseelingtabs/checkmark.png' }}" alt="">

                                    What's your asking price?

                                </div>

                                <div class="col-3 col-sm-4 col-md-7">

                                    <hr>

                                </div>



                            </div>



                        </div>

                        <div class="col-12 formdiv">



                            <div class="form-row">

                                {{--<div class="col-12 pricedescription">--}}

                                {{--We've crunched the numbers for you<br>--}}

                                {{--<span>--}}

                                {{--Our recommended selling price* is:--}}

                                {{--</span>--}}

                                {{--</div>--}}

                                <div class="col-12 bestprice">

                                    *Price

                                </div>

                                <div class="col-12 col-sm-5">

                                    <div class="input-group priceaddbtn mb-2" style="width:100%;">

                                        <div class="input-group-prepend" style="width: inherit;">

<span class="input-group-text">

<img src="{{ config('app.ui_asset_url').'frontend/img/carseelingtabs/shopping.png' }}" alt="">

</span>

                                            {{--@if(!empty($update))--}}

                                            {{--@if(!empty($update->price))--}}

                                            {{--@php $price=(int) $update->price @endphp--}}

                                            {{--@endif--}}

                                            {{--@else--}}

                                            {{--@php $price="" @endphp--}}

                                            {{--@endif--}}



                                            <input type="number" class="new-price-for-car preview-dashboard-input valid-price-category price-car-six-digit" data-label="Best Price" name="price" id="number" placeholder="0" value="@if(!empty($update) && $update->price){{$update->price}}@endif" min="0" style="border-color:#dedee6!important">

                                        </div>



                                    </div>

                                    <div class="input-group priceaddbtn" style="width:100%;">

                                        <button id="plus">+</button>

                                        <button id="minus">-</button>

                                    </div>













                                </div>

                                {{--<div class="col-12 bestprice">--}}

                                {{--Based on our valuation of £6,360.<img src="{{ config('app.ui_asset_url').'frontend/img/carseelingtabs/Component 27 – 52.png' }}">--}}

                                {{--</div>--}}

                                {{--<div class="col-12 addedvalue">--}}

                                {{--* We've added some wiggle room for you.<br>--}}

                                {{--See our:<a href="#">Advertisement prices</a>--}}

                                {{--</div>--}}









                            </div>



                        </div>

                    </div>

                    <div class="col-12">

                        <div class="row sellcar">

                            <div class="col-6 pr-0 col-sm-4 advertisementHeading">

                                <img src="{{ config('app.ui_asset_url').'frontend/img/carseelingtabs/checkmark.png' }}" alt="">

                                Photos of Cars

                            </div>

                            <div class="col-6 col-sm-8 pl-0">

                                <hr>

                            </div>



                        </div>



                    </div>

                    <div class="col-12 formdiv">



                        <div class="form-row">

                            <div class="col-md-3 mb-3">

                                <div class="form-row">

                                    <div class="col-12 labelalign">

                                        <label for="validationCustom02">Add Feature Photos:</label>



                                    </div>



                                </div>

                            </div>

                            <div class="col-md-9 mb-3">

                                <div class="row m-0">

                                    <div class="col-xs-12">

                                        <label class="cabinet center-block">

                                            <figure>

                                                <img src="@if(!empty($update->crop_image)){{$update->crop_image}}@else{{ config('app.ui_asset_url') . 'frontend/img/thumbnail.jpg' }}@endif" class="gambar img-responsive img-thumbnail item-img-output"  id="photo_featured" style="width: 180px;"/>

                                                <figcaption><i class="fa fa-camera"></i></figcaption>

                                            </figure>

                                            <input type="file" class="file center-block" id="image_featured" name="file_photo"/>

                                        </label>

                                    </div>

                                </div>



                            </div>





                            <div class="col-md-3 mb-3">

                                <div class="form-row">

                                    <div class="col-12 labelalign">

                                        <label for="validationCustom02">Photos:</label>



                                    </div>



                                </div>

                            </div>

                            <div class="col-md-9 mb-3">

                                <div class="form-row">

                                    <div class="col-12 audimodel">

                                        <p><input type="file" id="filemy" class="validate2 filemy-class"  style="display: none;" accept="image/*" multiple></p>

                                        <p><label class="addphoto" for="filemy" > <i class="fa fa-camera pr-2"></i>Add Photo</label></p>

                                        <div class="row">
                                             <input type="hidden" name="package_id_update" value="@if(!empty($update) && $update->package_id){{$update->package_id}}@elseif(!empty($update) && $update->package_id === 0) 0 @endif">
                                           
            <input type="hidden" name="c_status" value="0" id="c_status">
                                          
                                               @if(!empty($update) && $update->package_id != 0)
                                                @php
                                                if (!empty($pkg)){

                                                    $im = json_decode($pkg->attributes);
                                                    $images = $im->images_per_post;
                                                    if ($im->videos_per_post != 0){
                                                     $a_video_c = true;
                                                    }

                                                }
                                                @endphp
                                              @elseif(!empty($update) && $update->package_id === 0)
                                                @php $images=10;    $a_video_c = false; @endphp
                                                
                                            @endif
                                            
                                              @for($i=0;$i<$images;$i++)
                                                  @if(!empty($update) && $update->pic_url)
                                                      @php $pics=json_decode($update->pic_url) @endphp

                                                      @if(!empty($pics))
                                              <div class="col-8 m-auto col-sm-4 col-md-4">
                                                  <label class="cabinet center-block">
                                                      <figure>
                                                          <img id="preview_{{$i}}"
                                                               src="@if(!empty($pics[$i])){{$pics[$i]}}@else{{ config('app.ui_asset_url') . 'frontend/img//thumbnail.jpg' }} @endif"
                                                               class="gambar item-img-output img-responsive img-thumbnail"/>
                                                          <figcaption>
                                                              <i class="fa fa-camera"></i>
                                                          </figcaption>
                                                          <input type="file"
                                                                 class="file center-block file_photo_form image_dash" data-id="{{$i}}"
                                                                 name="file_photo"
                                                                 id="image_{{$i}}"
                                                          />
                                                      </figure>
                                                  </label>
                                              </div>

                                                      @endif
                                                  @else
                                                      <div class="col-8 m-auto col-sm-4 col-md-4">
                                                          <label class="cabinet center-block">
                                                              <figure>
                                                                  <img id="preview_{{$i}}"
                                                                       src="{{ config('app.ui_asset_url') . 'frontend/img//thumbnail.jpg' }}"
                                                                       class="gambar item-img-output img-responsive img-thumbnail"/>
                                                                  <figcaption>
                                                                      <i class="fa fa-camera"></i>
                                                                  </figcaption>
                                                                  <input type="file"
                                                                         class="file center-block file_photo_form image_dash" data-id="{{$i}}"
                                                                         name="file_photo"
                                                                         id="image_{{$i}}"
                                                                  />
                                                              </figure>
                                                          </label>
                                                      </div>

                                                  @endif
                                              @endfor

                                       

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
 @if(!empty(session('userDetails')) && !empty($user_package))
                                                  @php
                                                      if (!empty($user_package->package_id)){
                                                      $packages = App\Package::find($user_package->package_id);
                                                      }
                                @endphp 
                                @endif
  @if(!empty($a_video_c))
                        <div class="form-row">

                            <div class="col-md-3 mb-3">

                                <div class="form-row">

                                    <div class="col-12 labelalign">

                                        <label for="validationCustom02">Video:</label>



                                    </div>



                                </div>

                            </div>

                            <div class="col-md-9 mb-3">

                                <div class="form-row">

                                    <div class="col-12 audimodel">

                                  

      <p><label class="addphoto" for="video-upload" style="cursor: pointer;"> <i class="fa fa-video-camera pr-2"></i> Add Video</label><input type="url" class="form-control" name="video_url" value="@if(!empty($update) && $update->video_url){{$update->video_url}}@endif" required></p>





                                   



                                    </div>



                                </div>

                            </div>



                        </div>

@endif



                    </div>

                    <div class="col-12">

                        <div class="form-group row">

                            <div class="col-sm-8 backbtn ">

                                <a class="btn btn-back" id="previousbtnTo1"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i> Back</a>

                            </div>

                            <div class="col-sm-4 nextbtn">

                                @if(!empty($tab) && $tab == 'swap')

                                    <input type="hidden" name="swap" value="Swap">

                                    <input type="hidden" id="swap_id_dashboard" name="swap_id" value="{{$swap_id}}">

                                    <button class=" btn btn-next" id="place_d" type="submit" name="submit" value="submit">Create Swap advertisement<div class="loader"></div></button>

                                @else

                                    <button class=" btn btn-next d-flex" id="place_d" type="submit" name="submit" value="submit">Place Your Advertise <div class="loader m-auto" id="loader-dashboard"></div></button>

                                @endif

                            <div class="input-group previewbtn">
                                        <div class="input-group-prepend preview_add" data-toggle="modal" data-target="#preview-detail" style="cursor: pointer;">
                                        <input type="hidden" name="published_form" class="published_or_not" value="@if(!empty($update)){{$update->published}}@endif">
                                        @if(!empty($update))
                                            <input type="hidden" name="published_form_update" class="published_or_not_update">
                                            <span class="input-group-text preview-img-btn-update">
                                                <img src=" {{ config('app.ui_asset_url').'frontend/img/carseelingtabs/eye.png'}}" alt="">
                                            </span>
                                            <button type="submit" class=" btn preview-img-btn-update">Preview</button>
                                            @else
                                            <span class="input-group-text preview-img-btn">
                                                <img src=" {{ config('app.ui_asset_url').'frontend/img/carseelingtabs/eye.png'}}" alt="">
                                            </span>
                                            <button type="submit" class=" btn preview-img-btn">Preview</button>
                                       @endif
                                    </div>
                                </div>









                            </div>

                        </div>



                    </div>

                </div>





            </div>

        </div>



        <span id="status" style="color:red;font-size:16px;"></span>

    </div>









</div>



</div>



@include('frontend.partials.firebasescript')

<script>

    $(document).on('click','#plus2',function () {

        event.preventDefault();

        var y = parseInt($("#number2").val());

        y+=1;

        $("#number2").val(y);

    });

    $(document).on('click','#minus2',function () {

        event.preventDefault();

        var m =parseInt($("#number2").val());

        m-=1;

        $("#number2").val(m);

    });



  



    function topFunction() {

        document.body.scrollTop = 0;

        document.documentElement.scrollTop = 0;

    }



    //map api setting

    function initAutocomplete() {

        let mapLat = Number('{{!empty($update) && !empty($update->auction_maplat) ? $update->auction_maplat : "40.6971494"}}');

        let mapLng = Number('{{!empty($update) && !empty($update->auction_maplng) ? $update->auction_maplng : "-74.2598655"}}');



        var map = new google.maps.Map(document.getElementById('auctionmap'), {

            center: {

                lat: mapLat,

                lng: mapLng

            },

            draggable: false,

            zoom: 8,

            mapTypeId: 'roadmap'

        });



        // Create the search box and link it to the UI element.

        var input = document.getElementById('auctionMapInput');



        var searchBox = new google.maps.places.SearchBox(input);

        var marker;

        // Bias the SearchBox results towards current map's viewport.

        map.addListener('bounds_changed', function() {

            searchBox.setBounds(map.getBounds());



            if (marker) {

                marker.setMap(null);

            }



            marker = new google.maps.Marker({

                map: map,

                position: map.getCenter(),

                title: "Location"

            });



        });

        searchBox.addListener('places_changed', function() {

            $('#profileMapLat').val('');

            $('#profileMapLng').val('');

            $('#profileMapInput').removeClass('border border-danger');



            var places = searchBox.getPlaces();

            console.log(places[0]);

            if (places.length == 0) {

                $('#profileMapInput').addClass('border border-danger');

                $('#profileMapLat').val('');

                $('#profileMapLng').val('');



                return;

            }



            // For each place, get the icon, name and location.

            var bounds = new google.maps.LatLngBounds();



            if (places.length == 1) {

                if (!places[0].geometry) {

                    $('#profileMapInput').addClass('border border-danger');

                    console.log("Returned place contains no geometry");

                    return;

                }



                $('#AuctionMapLat').val(places[0].geometry.location.lat());

                $('#AuctionMapLng').val(places[0].geometry.location.lng());

                 } else {

                $('#profileMapInput').addClass('border border-danger');

                $('#profileMapLat').val('');

                $('#profileMapLng').val('');





                console.log("error in results");

                return;

            }



            places.forEach(function(place) {

                if (!place.geometry) {

                    console.log("Returned place contains no geometry");

                    return;

                }



                if (place.geometry.viewport) {

                    // Only geocodes have viewport.

                    bounds.union(place.geometry.viewport);

                } else {

                    bounds.extend(place.geometry.location);

                }

            });

            map.fitBounds(bounds);

        });











    }









</script>



<!--<script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"-->

<!--        integrity="sha384-BpuqJd0Xizmp9PSp/NTwb/RSBCHK+rVdGWTrwcepj1ADQjNYPWT2GDfnfAr6/5dn" crossorigin="anonymous"></script>-->

