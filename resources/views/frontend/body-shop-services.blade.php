@include('frontend.partials.header')

<div class="gaeaheServices">

    <div class="container">

        <div class="row pagehaeding">

            <!--<div class="col-6 text-center col-md-6 col-xl-5 garageheading">-->
                <div class="text-center garageheading">Body Shop Services</div>

            {{-- <div class="col-6 col-md-6 col-xl-7 p-0">

              <hr>

            </div> --}}

            {{-- <div class="col-12 col-xl-2 availablecarsheading">805 cars available</div> --}}



        </div>
     <div class="show12">

            <div class="leftnewarrow"><img src="{{ config('app.ui_asset_url').'frontend/img/leftnew.png'}}"></div>

            <div class="rightnewarrow"><img src="{{config('app.ui_asset_url').'frontend/img/rightnew.png'}}"></div>

            <div class="closewindow"><img src="{{config('app.ui_asset_url').'frontend/img/x-close.png'}}"></div>



            <div class="overlay"> </div>

            <div class="img-show">

                <img src="">

            </div>

        </div>
        <div class=" row searchbar">

            {{--<div class="col-3 col-sm-3 col-xl-1 buttonpadding">--}}

            {{--<div class="dropdown">--}}

            {{--<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}

            {{--Brands--}}

            {{--</button>--}}

            {{--<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}

            {{--<a class="dropdown-item" href="#">Action</a>--}}

            {{--<a class="dropdown-item" href="#">Another action</a>--}}

            {{--<a class="dropdown-item" href="#">Something else here</a>--}}

            {{--</div>--}}

            {{--</div>--}}



            {{--</div>--}}

            {{-- <div class="col-3 col-sm-3 col-xl-1  buttonborder">

             <div class="dropdown">

               <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                 Parts

               </button>

               <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                 <a class="dropdown-item" href="#">Action</a>

                 <a class="dropdown-item" href="#">Another action</a>

                 <a class="dropdown-item" href="#">Something else here</a>

               </div>

             </div>

            </div> --}}

            <div class="col-12 col-sm-5">

                <div class="input-group mb-3">

                    <input type="text" class="form-control garage-search-input-filter" id="garage-search-input" data-col="c_name" placeholder="Search Shop By Name" aria-label="Recipient's username" aria-describedby="basic-addon2">

                    <div class="input-group-append">

                        <button class="garage-section-search-filter input-group-text" type="submit" id="basic-addon2"><i class='fas fa-search'></i></button>

                    </div>

                </div>



            </div>

            <div class="col-12">

                <hr>

            </div>

        </div>

        <div class="row servicesContainer">

            <div class="col-6"></div>

            <div class="col-6"></div>

        </div>

        <div class="row">

            <span class="garage-section-error"></span>

        </div>

        <div class="row shopsection">

            <div class="row append_class_garage m-0">

                <div class="row m-0" id="apend">

                    @foreach($garages as $garage)

                        <div class="row">

                            <div class="row garage-close-div" style="border: 1px solid #e4e0e0;">

                                @php

                                    $cars = json_decode($garage->pic);

                                    $car = $cars[0];

                                @endphp

                                <div class="col-6 p-0 sidecar newimagesliderproduct">
                                              <div class="row">
                <div class="slideshow-container">
                 
                    @php $i = 1; @endphp
                 
                    @foreach($cars as $c_sl)
                      
                        <div class="mySlides ">
                      
                        <div class="column">
                     
                            <img src="{{$c_sl}}" alt="" style="width:100%" onclick="openModal();currentSlide({{$i}})" class="hover-shadow cursor">
                     
                        </div>
 
                       </div>
                      
                         @php $i++; @endphp
                       
                        @endforeach
                       
                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                       
                         <a class="next" onclick="plusSlides(1)">&#10095;</a>

                                    </div>


                                </div>
                                   
                                
                                </div>
    <div id="myModal" class="modal" style="background-color: transparent">
        <span class="close cursor" onclick="closeModal()">&times;</span>
        <div class="modal-content" style="background: rgba(0, 0, 0, .90);">
               @foreach($cars as $cr)
            <div class="mySlides_modal img-show">
                <img src="{{$cr}}" >
            </div>
@endforeach
            <a class="prev" onclick="plusSlides1(-1)"><img src="{{ config('app.ui_asset_url').'frontend/img/leftnew.png'}}"></a>
            <a class="next" onclick="plusSlides1(1)"><img src="{{config('app.ui_asset_url').'frontend/img/rightnew.png'}}"></a>
        </div>
    </div>
                                <div class="col-6">

                                    <div class="row shopdetailSection">

                                        <div class="col-12 shopName">

                                            <h3>{{$garage->c_name}}</h3>

                                            <img src=" {{ config('app.ui_asset_url').'frontend/img/featuredCar/Group 3236.png' }}" alt="">

                                        </div>

                                        <div class="col-12 shopdescription">

                                            <p class="comment more">{{$garage->description}}</p>

                                        </div>

                                        <div class="col-6">

                                            <label for="opening_time"><b>Opening Time</b></label>

                                        </div>

                                        <div class="col-6"> <label for="close_time"><b>Closing Time</b></label></div>

                                        @if(!empty($garage->open_timing))



                                            <div class="col-6">{{\Carbon\Carbon::createFromFormat('H:i:s',$garage->open_timing)->format('g:i A')}}</div>

                                        @endif

                                        @if(!empty($garage->close_timing))

                                            <div class="col-6"> {{\Carbon\Carbon::createFromFormat('H:i:s',$garage->close_timing)->format('g:i A')}}</div>

                                        @endif

                                        <div class="col-12 formgroup">

                                            @if(!empty($garage->contact_number))
                                                <div class="d-flex"> <label><span>Phone&nbsp;:</span></label>
                                                    <p style="margin-bottom:0px;">&nbsp;&nbsp;&nbsp;{{$garage->contact_number}}</p>
                                                </div>
                                            @endif
                                            <label><span>Your Email:</span> Let us Contact You</label>

                                            <form class="garage_btn_email" action="{{route('garagemail')}}" method="post">

                                                <input type="hidden" name="user_id" value="{{$garage->user_id}}">

                                                <div class="input-group mb-3">

                                                    <input type="hidden" value="{{$garage->user_id}}" name="g_userId" class="g_userId">

                                                    <input type="email" class="form-control g_email" name="email" placeholder="e.g. abc@example.com" aria-label="Recipient's username" aria-describedby="basic-addon2" required>

                                                    <div class="input-group-append">

                                                        <button class="input-group-text garage-btn-mail" id="basic-addon2"><i class='fas fa-paper-plane garage-sign-arrow'></i><div class="loader m-0 garage-email-loader"></div></button>

                                                    </div>

                                                </div>

                                            </form>

                                        </div>

                                        <div class="col-12">

                                            <div class="row">

                                                <!--<div class="col-12 col-sm-6 dealsin">-->

                                                <!-- WE DEALS IN: <span>VIEW LIST</span>-->

                                                <!--</div>-->

                                            </div>

                                        </div>

                                        <div class="col-12 topratedSection">

                                            <div class="row">

                                                @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)

                                                    <div class="col-8 col-sm-6">

                                                        <div class="row">

                                                            <div class="col-4">

                                                                <img src=" {{ config('app.ui_asset_url').'frontend/img/garageicon/badge.png' }}" alt="">

                                                            </div>



                                                            <div class="col-8 p-0 toprated">

                                                                <h3>Top Rated</h3>



                                                                @php

                                                                    $garagerate = App\GarageRating::OrderBy('rating', 'desc')->where('user_id', session('userDetails')->id)->where('car_id',$garage->id)->first();

                                                                @endphp

                                                                <div class="stars">

                                                                    <form action="" id="container">

                                                                        {{--<input type="hidden" class="star-car-id" @if(!empty($garage->id))value=""@endif>--}}

                                                                        <div class="form-row"><div class="commonLable"><div class="form-group col-lg-12">

                                                                                    @if(!empty($garagerate) && $garagerate->rating === 1)

                                                                                        <input type="radio" id="Ad Rating{{$garage->id}}" data-id="5" data-car="{{$garage->id}}" class="star star-5 garage-star-rating">

                                                                                        <label class="star star-5" for="Ad Rating{{$garage->id}}"></label>

                                                                                        <input type="radio" id="Ad Rating1{{$garage->id}}" data-id="4" data-car="{{$garage->id}}" class="star star-5 garage-star-rating">

                                                                                        <label class="star star-5" for="Ad Rating1{{$garage->id}}"></label>

                                                                                        <input type="radio" id="Ad Rating2{{$garage->id}}" data-id="3" data-car="{{$garage->id}}" class="star star-5 garage-star-rating">

                                                                                        <label class="star star-5" for="Ad Rating2{{$garage->id}}"></label>

                                                                                        <input type="radio" id="Ad Rating3{{$garage->id}}" data-id="2" data-car="{{$garage->id}}" class="star star-5 garage-star-rating">

                                                                                        <label class="star star-5" for="Ad Rating3{{$garage->id}}"></label>

                                                                                        <input type="radio" id="Ad Rating4{{$garage->id}}" data-id="1" data-car="{{$garage->id}}" class="star star-5 garage-star-rating" checked>

                                                                                        <label class="star star-5" for="Ad Rating4{{$garage->id}}"></label>

                                                                                    @elseif(!empty($garagerate) && $garagerate->rating === 2)

                                                                                        <input type="radio" id="Ad Rating{{$garage->id}}" data-id="5" data-car="{{$garage->id}}" class="star star-5 garage-star-rating">

                                                                                        <label class="star star-5" for="Ad Rating{{$garage->id}}"></label>

                                                                                        <input type="radio" id="Ad Rating1{{$garage->id}}" data-id="4" data-car="{{$garage->id}}" class="star star-5 garage-star-rating">

                                                                                        <label class="star star-5" for="Ad Rating1{{$garage->id}}"></label>

                                                                                        <input type="radio" id="Ad Rating2{{$garage->id}}" data-id="3" data-car="{{$garage->id}}" class="star star-5 garage-star-rating">

                                                                                        <label class="star star-5" for="Ad Rating2{{$garage->id}}"></label>

                                                                                        <input type="radio" id="Ad Rating3{{$garage->id}}" data-id="2" data-car="{{$garage->id}}" class="star star-5 garage-star-rating" checked>

                                                                                        <label class="star star-5" for="Ad Rating3{{$garage->id}}"></label>

                                                                                        <input type="radio" id="Ad Rating4{{$garage->id}}" data-id="1" data-car="{{$garage->id}}" class="star star-5 garage-star-rating" checked>

                                                                                        <label class="star star-5" for="Ad Rating4{{$garage->id}}"></label>

                                                                                    @elseif(!empty($garagerate) && $garagerate->rating === 3)

                                                                                        <input type="radio" id="Ad Rating{{$garage->id}}" data-id="5" data-car="{{$garage->id}}" class="star star-5 garage-star-rating">

                                                                                        <label class="star star-5" for="Ad Rating{{$garage->id}}"></label>

                                                                                        <input type="radio" id="Ad Rating1{{$garage->id}}" data-id="4" data-car="{{$garage->id}}" class="star star-5 garage-star-rating">

                                                                                        <label class="star star-5" for="Ad Rating1{{$garage->id}}"></label>

                                                                                        <input type="radio" id="Ad Rating2{{$garage->id}}" data-id="3" data-car="{{$garage->id}}" class="star star-5 garage-star-rating" checked>

                                                                                        <label class="star star-5" for="Ad Rating2{{$garage->id}}"></label>

                                                                                        <input type="radio" id="Ad Rating3{{$garage->id}}" data-id="2" data-car="{{$garage->id}}" class="star star-5 garage-star-rating" checked>

                                                                                        <label class="star star-5" for="Ad Rating3{{$garage->id}}"></label>

                                                                                        <input type="radio" id="Ad Rating4{{$garage->id}}" data-id="1" data-car="{{$garage->id}}" class="star star-5 garage-star-rating" checked>

                                                                                        <label class="star star-5" for="Ad Rating4{{$garage->id}}"></label>

                                                                                    @elseif(!empty($garagerate) && $garagerate->rating === 4)

                                                                                        <input type="radio" id="Ad Rating{{$garage->id}}" data-id="5" data-car="{{$garage->id}}" class="star star-5 garage-star-rating">

                                                                                        <label class="star star-5" for="Ad Rating{{$garage->id}}"></label>

                                                                                        <input type="radio" id="Ad Rating1{{$garage->id}}" data-id="4" data-car="{{$garage->id}}" class="star star-5 garage-star-rating" checked>

                                                                                        <label class="star star-5" for="Ad Rating1{{$garage->id}}"></label>

                                                                                        <input type="radio" id="Ad Rating2{{$garage->id}}" data-id="3" data-car="{{$garage->id}}" class="star star-5 garage-star-rating" checked>

                                                                                        <label class="star star-5" for="Ad Rating2{{$garage->id}}"></label>

                                                                                        <input type="radio" id="Ad Rating3{{$garage->id}}" data-id="2" data-car="{{$garage->id}}" class="star star-5 garage-star-rating" checked>

                                                                                        <label class="star star-5" for="Ad Rating3{{$garage->id}}"></label>

                                                                                        <input type="radio" id="Ad Rating4{{$garage->id}}" data-id="1" data-car="{{$garage->id}}" class="star star-5 garage-star-rating" checked>

                                                                                        <label class="star star-5" for="Ad Rating4{{$garage->id}}"></label>

                                                                                    @elseif(!empty($garagerate) && $garagerate->rating === 5)

                                                                                        <input type="radio" id="Ad Rating{{$garage->id}}" data-id="5" data-car="{{$garage->id}}" class="star star-5 garage-star-rating" checked>

                                                                                        <label class="star star-5" for="Ad Rating{{$garage->id}}"></label>

                                                                                        <input type="radio" id="Ad Rating1{{$garage->id}}" data-id="4" data-car="{{$garage->id}}" class="star star-5 garage-star-rating" checked>

                                                                                        <label class="star star-5" for="Ad Rating1{{$garage->id}}"></label>

                                                                                        <input type="radio" id="Ad Rating2{{$garage->id}}" data-id="3" data-car="{{$garage->id}}" class="star star-5 garage-star-rating" checked>

                                                                                        <label class="star star-5" for="Ad Rating2{{$garage->id}}"></label>

                                                                                        <input type="radio" id="Ad Rating3{{$garage->id}}" data-id="2" data-car="{{$garage->id}}" class="star star-5 garage-star-rating" checked>

                                                                                        <label class="star star-5" for="Ad Rating3{{$garage->id}}"></label>

                                                                                        <input type="radio" id="Ad Rating4{{$garage->id}}" data-id="1" data-car="{{$garage->id}}" class="star star-5 garage-star-rating" checked>

                                                                                        <label class="star star-5" for="Ad Rating4{{$garage->id}}"></label>

                                                                                    @else

                                                                                        <input type="radio" id="Ad Rating{{$garage->id}}" data-id="5" data-car="{{$garage->id}}" class="star star-5 garage-star-rating">

                                                                                        <label class="star star-5" for="Ad Rating{{$garage->id}}"></label>

                                                                                        <input type="radio" id="Ad Rating1{{$garage->id}}" data-id="4" data-car="{{$garage->id}}" class="star star-5 garage-star-rating">

                                                                                        <label class="star star-5" for="Ad Rating1{{$garage->id}}"></label>

                                                                                        <input type="radio" id="Ad Rating2{{$garage->id}}" data-id="3" data-car="{{$garage->id}}" class="star star-5 garage-star-rating">

                                                                                        <label class="star star-5" for="Ad Rating2{{$garage->id}}"></label>

                                                                                        <input type="radio" id="Ad Rating3{{$garage->id}}" data-id="2" data-car="{{$garage->id}}" class="star star-5 garage-star-rating">

                                                                                        <label class="star star-5" for="Ad Rating3{{$garage->id}}"></label>

                                                                                        <input type="radio" id="Ad Rating4{{$garage->id}}" data-id="1" data-car="{{$garage->id}}" class="star star-5 garage-star-rating">

                                                                                        <label class="star star-5" for="Ad Rating4{{$garage->id}}"></label>

                                                                                    @endif



                                                                                </div></div></div></form>

                                                                </div>



                                                                {{--<div class="clientRating">--}}

                                                                {{--<i class="fas fa-star"></i>--}}

                                                                {{--<i class="fas fa-star"></i>--}}

                                                                {{--<i class="fas fa-star"></i>--}}

                                                                {{--<i class="fas fa-star"></i>--}}

                                                                {{--<i class="fas fa-star laststarclientration"></i>--}}

                                                                {{--</div>--}}

                                                            </div>

                                                        </div>

                                                    </div>

                                                @endif

                                                <div class="col-12 col-sm-6 visitourwebsitebtn">

                                                    <a class="btn btn-danger" href="{{$garage->user_website}}" target="blank">Visit our website</a>

                                                </div>



                                            </div>

                                        </div>





                                    </div>



                                </div>
                     <div class="col-lg-10 col-md-10 col-sm-10 col-xs-6 col-6"></div>
<div class="row col-lg-2 col-md-2 col-sm-2 col-xs-6 col-6 pt-1 ask-question-wanted Veiw-detail-garage d-flex" data-id="{{$garage->id}}" style="
  
">

<h6 class="mb-0 ml-4" style="float:right">View FeedBack</h6>

<div class="round-question ">

<i class="fas fa-caret-down"></i>

</div>

</div>

                                <div class="col-12 detailDiv-query-garage">

                                    <div class="col-12 p-0">

                                        <hr/>

                                    </div>

                                    <div class="row m-0">

                                        <div class="col-12">

                                            <div class="form-row">



                                                <div class="col-12 garagefeedback1section">





                                                </div>





                                                @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)

                                                    <div class="col-12 commentform">

                                                        <form action="{{route('create-garage-feedback')}}" method="post">

                                                            @csrf

                                                            @if(!empty($garage))

                                                                <input type="hidden" name="garage_id" value="{{$garage->id}}">

                                                            @endif



                                                            <div class="row">

                                                                <div class="col">

                                                                    <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Feed Back" rows="4" name="feedback" required minlength="1" maxlength="255"></textarea>

                                                                </div>

                                                            </div>

                                                            <div class="row">

                                                                <div class="col-12 postcomment">

                                                                    <button class="btn" type="submit">Post FeedBack</button>

                                                                </div>

                                                            </div>

                                                        </form>



                                                    </div>



                                                @endif



                                            </div>



                                        </div>



                                    </div>

                                </div>



                            </div>



                        </div>
                        <br>
                    @endforeach

                </div>

            </div>

            {{-- <div class="col-12 col-md-6 shop" style="border: 1px solid #e4e0e0;">

              <div class="row">

                <div class="col-12 carimage p-0">

                 <img class="carimagemain"  src=" {{ config('app.ui_asset_url').'frontend/img/garageicon/Image.png' }}" alt="">

                 <img class="logoCarimage"  src=" {{ config('app.ui_asset_url').'frontend/img/garageicon/logo.png' }}" alt="">





                  <div class="dreamheading">

                    <h5>We don't Sell cars </h5>

                    <h1> We Sell Dreams</h1>

                  </div>

                </div>



              </div>

            </div> --}}



        </div>

        <div class="row  pagemargin">

            <div class="col-12 col-sm-6">

                <div class="viewalldeals">

                    {{--<p class="m-0"><span class="carsshow"> 805 Cars Availabe</span>  <span class="separater">|</span> View All--}}

                    {{--</p>--}}

                </div>

            </div>

            <div class="col-12 col-sm-6 nextbtngrpdiv red-color-paginate">

                {{$garages->links()}}

            </div>

        </div>



    </div>

</div>



{{--modal for user login--}}

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">Garage Services</h5>

                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}

                {{--<span aria-hidden="true">&times;</span>--}}

                {{--</button>--}}

            </div>

            <div class="modal-body">

                Please Login For Garage Services.

            </div>

            <div class="modal-footer">

                <a href="{{route("frontend-home")}}" type="button" class="btn btn-secondary">Close</a>

                <a href="{{route("garage-login",["gr"=>"1"])}}" type="button" class="btn btn-danger">login</a>

            </div>

        </div>

    </div>

</div>





{{--modal for garage section payment --}}

<div class="modal fade" id="PayModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">Garage Services Payment</h5>

                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}

                {{--<span aria-hidden="true">&times;</span>--}}

                {{--</button>--}}

            </div>

            <div class="modal-body">

                Please Pay for Garage Services.

            </div>

            <div class="modal-footer">

                <a href="{{route("frontend-home")}}" type="button" class="btn btn-secondary">Close</a>

                <a href="{{route("user-login")}}" type="button" class="btn btn-danger">Purchase</a>

            </div>

        </div>

    </div>

</div>



@include('frontend.partials.advertisment-footer')

@include('frontend.partials.footer')

@include('frontend.partials.filters-script')

