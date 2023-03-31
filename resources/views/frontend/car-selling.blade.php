@include('frontend.partials.header')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v10.0&appId=757910758200351&autoLogAppEvents=1" nonce="tcoICXau"></script>
<div class="CarDetailSection">

    <div class="container">

        <div class="bradcrumb">

            <p><a href="{{route('frontend-home')}}">Home </a>

                @if(!empty($detail) && $detail->car_availbilty === "Sell")<i class="fa fa-angle-right"></i><a href="{{route('frontend-classified-cars')}}"> Classified </a>

                @elseif(!empty($detail) && $detail->car_availbilty === "American-Muscle")<i class="fa fa-angle-right"></i><a href="{{route('frontend-american-muscle')}}"> American Muscle </a>

                @elseif(!empty($detail) && $detail->car_availbilty === "Rent")<i class="fa fa-angle-right"></i><a href="{{route('frontend-rental-cars')}}"> Rental </a>

                @elseif(!empty($detail) && $detail->car_availbilty === "Swap")<i class="fa fa-angle-right"></i><a href="{{route('frontend-swap-list')}}"> Swaps </a>

                @elseif(!empty($detail) && $detail->car_availbilty === "Prestige")<i class="fa fa-angle-right"></i><a href="{{route('frontend-Prestige-cars')}}"> Prestige </a>

                @endif  <i class="fa fa-angle-right"></i><span class="pl-2">{{$detail->title}}</span></p>

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

                @if(!empty($detail))

                <div class="row">

                    <div class="col-12 col-sm-12 col-md-8 col-lg-8">

                        <div class=" row m-0 imagecontaner">

                            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 audimainimg" id="newslick">
                                    @if(!empty($detail->pic_url) )

                                        @php $pics=json_decode($detail->pic_url) @endphp

                                        @if(!empty($pics))

                                            @foreach($pics as $pic)

                                                <div class="col-12 col-md-12 p-0   col-lg-12 col-xl-12  imagesliderproduct newimagesliderproduct">

                                                    <img   src='{{$pic}}'  alt="Card image cap" >

                                                </div>



                                            @endforeach

                                        @endif

                                    @endif





                            </div>

                            <div class="col-12 col-sm-12 col-md-12  col-lg-4 col-xl-4 car-in-row">

                                <div class="row sideimg d-flex align-items-center justify-content-center    " id="thumb_img_detail" style="height:100%;">

                                    @if(!empty($detail->pic_url) )

                                        @php $pics=json_decode($detail->pic_url) @endphp

                                            @if(!empty($pics))

                                                @foreach($pics as $pic)

                                                <div class="col-12 col-md-12 col-lg-12 col-xl-12  imagesliderproduct" >

                                                    <img   src='{{$pic}}'  alt="Card image cap" >

                                                </div>



                                                @endforeach

                                        @endif

                                    @endif



                                </div>

                            </div>



                        </div>

                        <div class="row sharediv">

                            <div class="col-6 col-sm-6 col-md-3 col-lg-2 col-xl-2 mb-0 hearshareicon">

                        @if(!empty($like) && $like->car_id === $detail->id) <i class="fa fa-heart like-car-detail"  @if(!empty($detail)) data-col="{{$detail->id}}" @endif style="color:#fd001e"></i>

                                @else

                                    <i class="fa fa-heart like-car-detail" @if(!empty($detail)) data-col="{{$detail->id}}" @endif ></i>

                                @endif

                                <i class="fa fa-share-alt share_btn_url" onclick="myFunctionurl();"></i>

                            <input type="text" id="car_share_icon" value="{{route('car-details',['id'=>base64_encode($detail->id)])}}" style="opacity:0.00000000000001">

                            </div>

                             </div>

                        <div class="mobileaccordian accordion shadow" id="accordionExample" >

                            <div class="row m-0 name-show-mobile">



                                <div class="col-8 col-sm-8 carname carselling-carNAme carspecs p-0">

                                  @if(!empty($detail->title))  <h2>{{$detail->title}}</h2> @endif

                                    @if(!empty($detail->d_brand['name']) && !empty($detail->year))  <h2>{{$detail->d_brand['name']}} {{$detail->year}}</h2> @endif

                                    @if(!empty($detail->d_model['_value'])) <p> {{$detail->d_model['_value']}} @else {{$detail->modal}} </p>  @endif

                                </div>
                              <div class="col-lg3 col-md-3 col-sm-3 col-xs-12 col-12 carprice carpriceformobile carspecspric p-0" style="display: block;font-size: 30px !important;margin-left:125px;">

                                    £{{$detail->price}}

                                </div>
                                </div>

                            <div class="col-12 mobile-heading-description p-0" id="headingOne">

                                <h2 class="mb-0">

                     <button type="button" data-toggle="collapse" data-target="#collapseOnemobile" aria-expanded="false" aria-controls="collapseOnemobiole" class="btn btn-link text-dark font-weight-bold text-uppercase collapsible-link">Description</button>

                                </h2>

                            </div>

                            <div id="collapseOnemobile" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse ">

                                <div class="col-12 cardescription newcarddescription p-0">

                                    <h3>Description</h3>

                                @if(!empty($detail->advert_text)) <p>{{$detail->advert_text}}</p> @endif

                                </div>
<br>
                                <div class="col-12 techspecs p-0">

                                    <h3>Tech Specs</h3>

                                </div>

                                <div class="row">

                                    <div class="col-12"><hr></div>



                                        <div class="col-12">

                                        <div id="accordion" class="accordion">

                                            <div class="card mb-0">

                                              <div class="card-header collapsed" data-toggle="collapse" href="#collapseOne">



                                                    <img  src="{{ config('app.ui_asset_url').'frontend/img/techspecsIcon/1.png' }}" alt="Card image cap">



                                                    <a class="card-title">



                                                        Safety Feature

                                                    </a>

                                                </div>

                                                <div id="collapseOne" class="card-body collapse" data-parent="#accordion" >

                                                    @if(!empty($detail->AvailabilitySafety) && count($detail->AvailabilitySafety) > 0)

                                                   @foreach($detail->AvailabilitySafety as $saftey)

                                                   @if(!empty($saftey->_value))

                                                    <p>

                                                     {{$saftey->_value}}

                                                    </p>

                                                    @endif

                                                    @endforeach

                                                    @else

                                                        Factory

                                                    @endif

                                                </div>

                                            </div>

                                        </div>

                                        </div>

                                    <div class="col-12"><hr></div>

                                </div>

                                <div class="row">

                                    <div class="col-12">

                                        <div id="accordion1" class="accordion">

                                            <div class="card mb-0">

                                                <div class="card-header collapsed" data-toggle="collapse" href="#collapseTwo1">



                                                    <img  src="{{ config('app.ui_asset_url').'frontend/img/techspecsIcon/2.png' }}" alt="Card image cap">

                                                    <a class="card-title">



                                                        In Car Entertainment Systems

                                                    </a>

                                                </div>

                                                <div id="collapseTwo1" class="card-body collapse" data-parent="#accordion1" >

                                                    @if(!empty($detail->Availability) && count($detail->Availability) > 0)

                                                        @foreach($detail->Availability as $ent)

                                                            @if(!empty($ent->_value))

                                                            <p>

                                                                {{$ent->_value}}

                                                            </p>

                                                            @endif

                                                        @endforeach

                                                    @else

                                                        Factory

                                                    @endif

                                                </div>



                                            </div>

                                        </div>

                                     </div>

                                    <div class="col-12"><hr></div>

                                </div>





                                @if(!empty($detail->video_url))

                                    <iframe id="player" width="100%" height="400px"   src="https://www.youtube.com/embed/{{$detail->video_url}}"></iframe>

                                    <div class="col-12"><hr></div>

                                @endif

                                <div class="row m-0">

                                    @if($detail->user && $detail->user->lat)

                                    <div class="col-12 techspecs p-0">

                                        <h3>TSeller Location</h3>

                                    </div>

                                        <div class="col-12 map" style="width:100%;height:auto;">

                                        <iframe src="https://www.google.com/maps/embed/v1/place?q={{$detail->user->lat}},{{$detail->user->lng}}&amp;key=AIzaSyAddbxUhXJYrPqsX24kbEhFR1cJg37U2vA" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>



                                    </div>

                                        @endif

                                </div>

                                <div class="row commentSection">

                                    <div class="col-12 comments" style="text-align: center">

                                        Comments

                                    </div>

                                    <div class="token_car">

                                        {{ csrf_field() }}

                                    </div>

                                        <div id="car_data"></div>





                                    <div class="col-12"><hr></div>

                                    @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)

                                    <div class="col-12 leavcomment">



                                        Leave a Comment

                                    </div>

                                    <div class="col-12 commentform">



                                            <form action="{{route('create-car-comment')}}" method="post">

                                                @csrf

                                                @if(!empty($detail))

                                                    <input type="hidden" name="car_id" id="car_id" value="{{$detail->id}}">

                                                <input type="hidden" name="car_availbilty" value="{{$detail->car_availbilty}}">



                                                @endif



                                                <div class="row">

                                                    <div class="col">

                                                        <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Message" rows="4" name="comment" required minlength="1" maxlength="255"></textarea>

                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-12 postcomment">

                                                        <button class="btn" type="submit">Post Comment</button>

                                                    </div>

                                                </div>

                                            </form>



                                    </div>

                                    @else

                                        If You Wan to Leave a Comment? <a href="{{route('auction-login',["ac"=>"Auction",'ac_id'=>base64_encode($detail->id)])}}">Please Login</a>

                                        <input type="hidden" name="car_id" id="car_id" value="{{$detail->id}}">

                                    @endif



                                </div>





                            </div>





                        </div>





                    </div>


                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">

                        @if(!empty($detail))

                         <div class="row">

                            <div class="col-12 name-hide-mobile">

                                    <div class="col-8 carname-carselling p-0">

                                        <h2>{{$detail->title}}</h2>

                                        <h2> @if(!empty($detail->d_brand['name'])){{$detail->d_brand['name']}}@endif {{$detail->year}}</h2>

                                    </div>

                                <div class="col-5 p-0 carspecs">

                                      @if(!empty($detail->d_model['_value'])) <p>{{$detail->d_model['_value']}}</p> @else {{$detail->modal}} @endif

                                    </div>

                                <div class="col-6 p-0 carspecspriccarselling" style="margin-left:15px">

                                      £{{$detail->price}}

                                    </div>








                            </div>

                             <div class="col-6 col-sm-6 col-md-6 col-lg-6 mb-0 rating p-0" style="padding-top:10px!important;">

                                @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)

                                <div class="stars">

                                    <form action="" id="container">

                                        <input type="hidden" class="star-car-id" @if(!empty($detail->id))value="{{$detail->id}}"@endif>

                                        <div class="form-row"><div class="commonLable"><div class="form-group col-lg-12">

                                                    @if(!empty($carrate) && $carrate->rating === 1)

                                                        <input type="radio" id="Ad Rating0" data-id="5" class="star star-5 star-dynamic-rating">

                                                        <label class="star star-5" for="Ad Rating0"></label>

                                                        <input type="radio" id="Ad Rating1" data-id="4" class="star star-5 star-dynamic-rating">

                                                        <label class="star star-5" for="Ad Rating1"></label>

                                                        <input type="radio" id="Ad Rating2" data-id="3" class="star star-5 star-dynamic-rating">

                                                        <label class="star star-5" for="Ad Rating2"></label>

                                                        <input type="radio" id="Ad Rating3" data-id="2" class="star star-5 star-dynamic-rating">

                                                        <label class="star star-5" for="Ad Rating3"></label>

                                                        <input type="radio" id="Ad Rating4" data-id="1" class="star star-5 star-dynamic-rating" checked>

                                                        <label class="star star-5" for="Ad Rating4"></label>

                                                        @elseif(!empty($carrate) && $carrate->rating === 2)

                                                        <input type="radio" id="Ad Rating0" data-id="5" class="star star-5 star-dynamic-rating">

                                                        <label class="star star-5" for="Ad Rating0"></label>

                                                        <input type="radio" id="Ad Rating1" data-id="4" class="star star-5 star-dynamic-rating">

                                                        <label class="star star-5" for="Ad Rating1"></label>

                                                        <input type="radio" id="Ad Rating2" data-id="3" class="star star-5 star-dynamic-rating">

                                                        <label class="star star-5" for="Ad Rating2"></label>

                                                        <input type="radio" id="Ad Rating3" data-id="2" class="star star-5 star-dynamic-rating" checked>

                                                        <label class="star star-5" for="Ad Rating3"></label>

                                                        <input type="radio" id="Ad Rating4" data-id="1" class="star star-5 star-dynamic-rating" checked>

                                                        <label class="star star-5" for="Ad Rating4"></label>

                                                    @elseif(!empty($carrate) && $carrate->rating === 3)

                                                        <input type="radio" id="Ad Rating0" data-id="5" class="star star-5 star-dynamic-rating">

                                                        <label class="star star-5" for="Ad Rating0"></label>

                                                        <input type="radio" id="Ad Rating1" data-id="4" class="star star-5 star-dynamic-rating">

                                                        <label class="star star-5" for="Ad Rating1"></label>

                                                        <input type="radio" id="Ad Rating2" data-id="3" class="star star-5 star-dynamic-rating" checked>

                                                        <label class="star star-5" for="Ad Rating2"></label>

                                                        <input type="radio" id="Ad Rating3" data-id="2" class="star star-5 star-dynamic-rating" checked>

                                                        <label class="star star-5" for="Ad Rating3"></label>

                                                        <input type="radio" id="Ad Rating4" data-id="1" class="star star-5 star-dynamic-rating" checked>

                                                        <label class="star star-5" for="Ad Rating4"></label>

                                                    @elseif(!empty($carrate) && $carrate->rating === 4)

                                                        <input type="radio" id="Ad Rating0" data-id="5" class="star star-5 star-dynamic-rating">

                                                        <label class="star star-5" for="Ad Rating0"></label>

                                                        <input type="radio" id="Ad Rating1" data-id="4" class="star star-5 star-dynamic-rating" checked>

                                                        <label class="star star-5" for="Ad Rating1"></label>

                                                        <input type="radio" id="Ad Rating2" data-id="3" class="star star-5 star-dynamic-rating" checked>

                                                        <label class="star star-5" for="Ad Rating2"></label>

                                                        <input type="radio" id="Ad Rating3" data-id="2" class="star star-5 star-dynamic-rating" checked>

                                                        <label class="star star-5" for="Ad Rating3"></label>

                                                        <input type="radio" id="Ad Rating4" data-id="1" class="star star-5 star-dynamic-rating" checked>

                                                        <label class="star star-5" for="Ad Rating4"></label>

                                                    @elseif(!empty($carrate) && $carrate->rating === 5)

                                                        <input type="radio" id="Ad Rating0" data-id="5" class="star star-5 star-dynamic-rating" checked>

                                                        <label class="star star-5" for="Ad Rating0"></label>

                                                        <input type="radio" id="Ad Rating1" data-id="4" class="star star-5 star-dynamic-rating" checked>

                                                        <label class="star star-5" for="Ad Rating1"></label>

                                                        <input type="radio" id="Ad Rating2" data-id="3" class="star star-5 star-dynamic-rating" checked>

                                                        <label class="star star-5" for="Ad Rating2"></label>

                                                        <input type="radio" id="Ad Rating3" data-id="2" class="star star-5 star-dynamic-rating" checked>

                                                        <label class="star star-5" for="Ad Rating3"></label>

                                                        <input type="radio" id="Ad Rating4" data-id="1" class="star star-5 star-dynamic-rating" checked>

                                                        <label class="star star-5" for="Ad Rating4"></label>

                                                        @else

                                                        <input type="radio" id="Ad Rating0" data-id="5" class="star star-5 star-dynamic-rating">

                                                        <label class="star star-5" for="Ad Rating0"></label>

                                                        <input type="radio" id="Ad Rating1" data-id="4" class="star star-5 star-dynamic-rating">

                                                        <label class="star star-5" for="Ad Rating1"></label>

                                                        <input type="radio" id="Ad Rating2" data-id="3" class="star star-5 star-dynamic-rating">

                                                        <label class="star star-5" for="Ad Rating2"></label>

                                                        <input type="radio" id="Ad Rating3" data-id="2" class="star star-5 star-dynamic-rating">

                                                        <label class="star star-5" for="Ad Rating3"></label>

                                                        <input type="radio" id="Ad Rating4" data-id="1" class="star star-5 star-dynamic-rating">

                                                        <label class="star star-5" for="Ad Rating4"></label>

                                                        @endif



                                                </div></div></div></form>

                                </div>

                            @endif

                            </div>


<div class="d-flex justify-content-end col-5 col-sm-6 col-md-6 col-lg-6 mb-0 reviewsnumber mt-2">@if(!empty($rating->rating)){{$rating->rating}}@else 0 @endif Ratings
                                | @if($review !=0){{$review}}@else 0 @endif Reviews  </div>

                             <div class="col-5 col-sm-6 col-md-6 col-lg-6 mb-0 mt-3 "><div class="fb-share-button shareInMobile mr-3" data-href="{{Request::url()}}" data-layout="button_count" data-size="small" style="margin-left:-16px"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.powerperformancecars.co.uk%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore" >Share</a></div></div>

                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-4 col-4 mb-0 reportcar mt-3"><span class="report-car-detail" style="cursor:pointer;"> <i class="fas fa-exclamation-triangle"></i>Report this car</span></div>

                            <!--<div class="col-6 col-sm-6 col-md-6 col-lg-6 mb-0 reviewsnumber">@if(!empty($rating->rating)){{$rating->rating}}@else 0 @endif Ratings <span style=" color: #000000; padding-right: 8px;padding-left: 8px;font-weight:bold "> | </span> @if($review !=0){{$review}}@else 0 @endif Reviews  </div>-->

                            <!-- <div class="col-6 col-sm-6 col-md-6 col-lg-6 mb-0"><div class="fb-share-button" data-href="{{Request::url()}}" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.powerperformancecars.co.uk%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div></div>-->

                            <!--   <div class="col-6  col-md-6 col-lg-6 mb-0 reportcar"><span class="report-car-detail" style="cursor:pointer;"> <i class="fas fa-exclamation-triangle"></i>Report this car</span></div>-->



                            <div class="col-12 powerdiv p-0">

                                <img  src="{{ config('app.ui_asset_url').'frontend/img/clientimages/Path 4361.png' }}" alt="Card image cap">



                               User Profile Detail

                            </div>

                            <div class="col-12">

                            <div class=" row m soldby">

                                <div class="col-6 alignsolddiv">

                                         @if(!empty($detail->user_id))

                                        @php

                                            $pkc_id = App\UserPackage::where('user_id',$detail->user_id)->first();

                                            if (!empty($pkc_id)){

                                            $pk = App\Package::where('id',$pkc_id->package_id)->first();

                                            }

                                        @endphp

                                    @endif

                                    <p class="m-0 text-center" style="font-size:16px;float: left;">@if(isset($detail->user)) Seller Information: @else Info not found @endif</p><br>

                                 @if($detail->user)   <h3 class="m-0">{{$detail->user->username}}</h3>@if(!empty($pk)) @if($pk->name === "Basic")<span class="badge badge-secondary">{{$pk->name}}</span> @elseif($pk->name === "Standard")<span class="badge badge-success">{{$pk->name}}</span> @else <span class="badge badge-danger">{{$pk->name}}</span> @endif @endif

                                     <h4 class="m-0">{{$detail->user->city}}{{$detail->user->Country}}</h4>

                                     @endif

                                </div>

                                <div class="col-6 soldbydiv">

                               <form class="follower-btn" action="{{route('follow-create')}}" method="post">

                                        @csrf

                                        @php

                                         if (!empty(session('userDetails')->id)){

                                        $bbl = [];

                                        }

                                        @endphp

                                        <input type="hidden"  name="follower_1st" value="{{base64_encode($detail->user_id)}}">

                                        @if (!empty($bbl))



                                            <button type="submit"  class="btn btn-primary btn-follower m-auto" id="following-btn" disabled>Followed</button>

                                        @elseif(!empty(session('userDetails')->id) && $detail->user_id != session('userDetails')->id  )

                                            <button type="submit"  class="btn btn-primary btn-follower m-auto" id="following-btn" disabled>Follow</button>

                                        @endif

                                    </form>

                                       @if(!empty(session('userDetails')->id) && $detail->user_id != session('userDetails')->id  )
<a href="#" data-toggle="modal" data-target="#chat_now" class="btn btn-success ml-1" style="color: white">Chat Now</a>
                                       <!--<a href="#" data-toggle="modal" data-target="#chat_now" class="m-auto"><p style="color:green;text-decoration: none;">Chat Now</p></a>-->

                                    @elseif(!empty(session('userDetails')->id) && $detail->user_id = session('userDetails')->id)

                                        My Advertisement

                                    @else



                                    @endif

                                </div>
                              </div>

                            </div>
                         </div>

                        @endif

                        @if(!empty($detail))

                            <div class="row mt-3 mb-3" style="background: #f8f8f8;">

                                <div class="col-4 pt-3 pb-2 car-detail-profile-img">

                                    @if(!empty($detail->user->avatar))  <img src="{{$detail->user['avatar']}}"/> @endif

                                </div>

                                <div class="col-8 contact-detail-cd">

                                    @if(!empty($detail->user->username))    <p>{{$detail->user['username']}}</p> @endif

                                    @if(!empty($detail->contact_number))   <p>{{$detail->contact_number}}</p> @endif

                                </div>



                            </div>

                        <div class="row summarysection">

                            <div class="col-12 summaryheading">

                                <i class="fas fa-file-alt"></i>

                                Deal Summary

                            </div>

                            <div class="col-6 summarybillheading " >Make:</div>

                            @if(!empty($detail->d_brand['name']))

                            <div class="col-6 summarybilldetail">{{$detail->d_brand['name']}}</div>

                            @endif

                            <div class="col-12"><hr></div>

                            <div class="col-6 summarybillheading " >Model:</div>

                            @if(!empty($detail->d_model['_value']))

                            <div class="col-6 summarybilldetail">{{$detail->d_model['_value']}}</div>

                            @endif

                            <div class="col-12"><hr></div>

                            <div class="col-6 summarybillheading " >Colour:</div>

                            <div class="col-6 summarybilldetail">{{$detail->color}}</div>

                            <div class="col-12"><hr></div>

                            <div class="col-6 summarybillheading " >Year:</div>

                            <div class="col-6 summarybilldetail">{{$detail->year}}</div>

                            <div class="col-12"><hr></div>

                            <div class="col-6 summarybillheading " >Fuel:</div>

                            <div class="col-6 summarybilldetail">{{$detail->fuel_type}}</div>

                            <div class="col-12"><hr></div>

                            <div class="col-6 summarybillheading " >Body Type:</div>

                            @if(!empty($detail->cartype->_value))

                            <div class="col-6 summarybilldetail">{{$detail->cartype->_value}}</div>

                            @endif

                            <div class="col-12"><hr></div>

                            <div class="col-6 summarybillheading">Mileage:</div>

                            <div class="col-6 summarybilldetail">{{$detail->mileage}}</div>

                         <div class="col-12"><hr></div>

                            <div class="col-6 summarybillheading">Car Condition:</div>

                            <div class="col-6 summarybilldetail">{{$detail->car_condition}}</div>

                            <div class="col-12"><hr></div>

                            <div class="col-6 summarybillheading " >Engine Type:</div>

                            @if(!empty($detail->enginetype->_value))

                            <div class="col-6 summarybilldetail">{{$detail->enginetype->_value}}</div>

                            @endif
                            <div class="col-12"><hr></div>

                            @if(!empty($detail->variant_rel->_value))

                            <div class="col-6 summarybillheading ">Variant:</div>

                            <div class="col-6 summarybilldetail">{{$detail->variant_rel->_value}}</div>

                            <div class="col-12"><hr></div>

                            @endif

                            <div class="col-9 summarybillheading" style="margin-top: 30px; padding-bottom: 40px;">



                            </div>



                        </div>

                        @endif

                      </div>

                </div>

           @endif

            </div>


    @if(!empty($morecar) && count($morecar) > 0)

        <div class="leasecarsection">

            <div class="container">

                <div class="row headingsection">

                    <div class="col-12 col-md-6 col-xl-4 ">

                        <div class="Leasecarsectionheading">View Similar Product</div>



                        <img  src="{{ config('app.ui_asset_url').'frontend/img/featuredCar/Group 3236.png' }}" alt="Card image cap">



                    </div>

                    <div class="col-0 col-md-6 col-xl-8  p-0 hrsection">

                        <hr >

                    </div>







                </div>

           </div>

           <div class="sliderdiv mobile-slider-div">

            <div class="slickslidercontent ">

                @foreach($morecar as $car)

                    @if(!empty($car))

                        <div class="col-12">

                            <div class="card">

                                <div class="cardimage f-cardimg">

                                    @if($car->car_condition === "New")

                                        @php

                                            $auction_condition = "New";

                                        @endphp

                                    @else

                                        @php

                                            $auction_condition = "Used";

                                        @endphp

                                    @endif

                                    @if($car->featured == '1')

                                        <p style="font-size: 14px;font-weight: 200">Featured</p>

                                    @else

                                        <p>{{$auction_condition}}</p>

                                    @endif

                                    <a href="{{route('car-details',['id'=>base64_encode($car->id)])}}"><img class="card-img-top" src="{{$car->crop_image}}" style="width: 100%; height: 300px;" alt="Card image cap"></a>

                                </div>

                                <div class="card-body  f-card-body d-flex flex-column">

                                    <div class=" row m-0 ">

                                        <div class="col-12  americancardbodyendday justify-content-end "> {{$car->created_at->diffForHumans()}}</div>



                                        <div class="col-8  col-md-7 col-lg-7 pr-0  pb-2 " data-maxlength="12"> <div class=" f-card-name"> {{$car->year}} {{$detail->title}}</div></div>

                                        <div class="col-4  col-md-5 col-lg-5 d-flex align-items-start justify-content-center f-card-price">

                                            @if($car->car_availbilty==="Rent")

                                                <p class="f-card-price" style="text-align: end;">£{{$car->price}}</p>

                                            @else

                                                <p class="f-card-price" style="text-align: end;">£{{$car->price}}</p>

                                            @endif

                                        </div>

                                        <div class="col-12 mt-0 " data-maxlength="70">

                                            <p class="f-card-description mb-0">{{$car->advert_text}}</p>





                                        </div>



                                    </div>

                                    <div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end">

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endif

                @endforeach



            </div>





        </div>

        </div>

    @endif

</div>

{{--detail modal like--}}

<div class="modal fade" id="detailModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">Car Details</h5>

                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}

                {{--<span aria-hidden="true">&times;</span>--}}

                {{--</button>--}}

            </div>

            <div class="modal-body">

               Please Login to like this car.

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <a href="{{route('auction-login',["ac"=>"Auction",'ac_id'=>base64_encode($detail->id)])}}" type="button" class="btn btn-danger">login</a>

            </div>

        </div>

    </div>

</div>

{{--share modal--}}

<div class="modal fade" id="ShareModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">Car Details</h5>

                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}

                {{--<span aria-hidden="true">&times;</span>--}}

                {{--</button>--}}

            </div>

            <div class="modal-body">

                Web Page link Copied.

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>

        </div>

    </div>

</div>



<div class="modal fade loginreportCar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">Car Details</h5>

                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}

                {{--<span aria-hidden="true">&times;</span>--}}

                {{--</button>--}}

            </div>

            <div class="modal-body">

                Please Login to Report this ad.

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <a href="{{route('auction-login',["ac"=>"Auction",'ac_id'=>base64_encode($detail->id)])}}" type="button" class="btn btn-danger">login</a>

            </div>

        </div>

    </div>

</div>

<div class="modal fade loginratingCar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">Ad Details</h5>

                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}

                {{--<span aria-hidden="true">&times;</span>--}}

                {{--</button>--}}

            </div>

            <div class="modal-body">

                Please Login to Rating this ad.

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <a href="{{route('auction-login',["ac"=>"Auction",'ac_id'=>base64_encode($detail->id)])}}" type="button" class="btn btn-danger">login</a>

            </div>

        </div>

    </div>

</div>



{{--modal report this car--}}

<div class="modal fade car-report-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">Report this Ad</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <form class="report-car-confirm" method="post" action="{{route('report-car-detail')}}">

            <div class="modal-body">

                @csrf

                    <input type="hidden" name="car_id" @if(!empty($detail->id))value="{{$detail->id}}"@endif>

                <div class="form-group">

                    <label for="exampleFormControlTextarea1">Reason</label>

                    <textarea class="form-control report-car-textarea" name="reason" id="exampleFormControlTextarea1" rows="3" required></textarea>

                    <span class="span-report-car" style="color:#e4001b">Please fill Reason...</span>

                </div>



            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <button type="submit" class="btn " style="background-color:#e4001b;color: #FFFFFF ">Submit</button>

            </div>

            </form>

        </div>

    </div>

</div>
{{--detail modal comment--}}

<div class="modal fade" id="CarCommentLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">Car Comments</h5>

                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}

                {{--<span aria-hidden="true">&times;</span>--}}

                {{--</button>--}}

            </div>

            <div class="modal-body">

                Please Login to leave a comment.

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <a href="{{route('auction-login',["ac"=>"Auction",'ac_id'=>base64_encode($detail->id)])}}" type="button" class="btn btn-danger">login</a>

            </div>

        </div>

    </div>

</div>

 @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)
<div class="modal fade" id="chat_now" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">Send a Message</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>


            <form action="{{route("chat-wanted")}}" method="post" class="chat" style="width: 100%;">

                <div class="modal-body">



                    @csrf
                                           <input type="hidden" name="car_id" @if(!empty($detail->id))value="{{$detail->id}}"@endif>
                                           <input type="hidden" name="reaciver_id" @if(!empty($detail->user_id))value="{{$detail->user_id}}"@endif>
                                           <input type="hidden" name="type" value="{{}}">


                    <div class="form-group">

                        <label for="exampleFormControlTextarea1">Message</label>

                        <input type="text" name="message" class="form-control" id="query_input" placeholder="Enter Your Query">
</div>



                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    <button type="submit" class="btn " style="background-color:#e4001b;color: #FFFFFF ">Send</button>

                </div>

            </form>


        </div>

    </div>

</div>

@endif



        @include('frontend.partials.footer')

@include('frontend.partials.filters-script')

{{--<script>--}}

{{--    function changeimg(url,e) {--}}

{{--        document.getElementById("img_detail_car").src = url;--}}

{{--        let nodes = document.getElementById("thumb_img_detail");--}}

{{--        let img_child = nodes.children;--}}

{{--        for (i = 0; i < img_child.length; i++) {--}}

{{--            img_child[i].classList.remove('active')--}}

{{--        }--}}

{{--        e.classList.add('active');--}}



{{--    }--}}



{{--</script>--}}




<script>

    const player = new Plyr('#player');

</script>

