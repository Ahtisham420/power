<!doctype html>

<html lang="en">



<head>

  <!-- Required meta tags -->

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="csrf-token" content="{{ csrf_token() }}" />

    <meta name="google-signin-client_id" content="959506192501-6rjnep6o3v60jshin1rb5l7j191as4rk.apps.googleusercontent.com">



    <link rel="icon" href="{{ config('app.ui_asset_url').'images/favicon.png' }}" type="image/gif" sizes="16x16">
    @if(Request::Segment(1)==="Car-details")
<meta property="og:url"           content="{{Request::url()}}" />
<meta property="og:type"          content="{{$detail->title}}" />
<meta property="og:title"         content="{{$detail->title}}" />
<meta property="og:description"   content="Your description" />
<meta property="og:image"         content="{{$detail->crop_image}}" />
@endif
  <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/index.css' }}">

  <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/slick.css' }}">

  <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/slick-theme.css' }}">

  <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/login.css' }}">

  <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/emojionearea.min.css' }}">

  <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/misecellinousCarPage.css' }}">
  
      <link href="{{ config('app.ui_asset_url').'frontend/fontawesome-free-5.15.3-web/css/all.css' }}" rel="stylesheet"> 
      
  <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/audisellingPage.css' }}">

  <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/blog.css' }}">

  <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/changePassword.css' }}">

  <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/audisellingAuctionPage.css' }}">

  <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/garageServices.css' }}">

  <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/americanMusclesCarPage.css' }}">

  <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/auctionCarPage.css' }}">

  <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/searchLeaseCarpage.css' }}">

  <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/rentalCarPage.css' }}">

  <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/swapcarPage.css' }}">

  <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/dashboard.css' }}">

    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.3/plyr.css" />



  {{-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

<!-- Add the slick-theme.css if you want default styling -->

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/> --}}

<!--ck editor cdn-->

<!--<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>-->





  <!-- fontawsome kit -->

  <script src="https://kit.fontawesome.com/f105d44546.js" crossorigin="anonymous"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAddbxUhXJYrPqsX24kbEhFR1cJg37U2vA&libraries=places&callback" async defer></script>

  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

  <!-- google fonts -->

  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet">

  <title>{{ config('app.name') }}</title>

</head>



<body>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

  <div>

      <!--<div id="bar"></div>-->

@php $flag=null; @endphp



    @if(@isset($_COOKIE["powerperformance_cookie"]))

    @php



      $flag=App\Cookie::where("c_name","=",$_COOKIE["powerperformance_cookie"])->first();





      @endphp

    @endif

    @if(!$flag)

    <form class="form-cookie" action="{{route("add-cookie")}}" method="post">

      @csrf

      <div class="row coockies-show" id="div-cookie" style="display:none">

          <div class="col-12 col-sm-6">

                <p>This websites uses cookies to improve visitor experience.</p>

          </div>

          <div class="col-12 col-sm-6 cookies-show-btn"> <input type="hidden" name="cookie_n"  id="cookie" value="{{time()}}">

            <input type="hidden" value="submit" name="submit">

            <button value="submit"  >Continue</button><a href="{{url('/cookies-policies')}}" target="_blank">Learn More</a> <a class="cancel-cookies">Cancel</a></div>

      </div>

    </form>

    @endif

    <div class=" topbar" style="align-content: right">

      <ul>

      <li><a href="{{route('frontend-blog')}}">Blog</a></li>

      <li><a href="{{route('wanted')}}">Wanted</a> </li>

      <li><a href="{{route('event-frontend') }}">Events</a></li>

      <li><a href="{{route('garage')}}">Garage Service </a> </li>
       <li><a href="{{route('body-shop')}}">Body Shop Services </a> </li>
       <li><a href="{{route('frontend-misecellinous')}}">Miscellaneous</a></li>
       
      

        <!-- <li><a href="{{route('frontend-car-selling-lease')}}">Car Selling Lease</a></li> -->

        @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)
         <!--<li><a><img style="max-width: 0vh;" src="{{ config('app.ui_asset_url').'frontend/img/messenger.png' }}" alt=""> Message </a></li>-->

        {{--<li><a href="{{route('user-logout')}}">Logout </a></li>--}}

        {{--<li><a href="{{route('user-change-password')}}">Change Password </a></li>--}}

        @else

        <!-- <li><a href="{{route('user-login')}}">Login </a></li> -->

        @endif

        <!-- <li><a href="{{route('frontend-car-selling-auction')}}">Car Selling Auction</a></li> -->

      </ul>
      
    </div>



    <header>

      <div class="header">

        <nav class="navbar navbar-expand-lg headerbackground">

          <a class="navbar-brand " href="{{route('frontend-home')}}"><img src="{{ config('app.ui_asset_url').'frontend/img/logo/logo.png' }}"></a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

            <i class="fa fa-bars" style="color: #fff;"></i>

          </button>



          <div class="collapse navbar-collapse newheaderdiv" id="navbarSupportedContent">

            <ul class="navbar-nav  custom-navbar" >

              <div class="closeiconnav" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

                <img src="{{ config('app.ui_asset_url').'frontend/img/logo/close.png' }}" alt="">

              </div>

              <li class="nav-item active">

                <a class="nav-link" href="{{route('frontend-home')}}">Home <span class="sr-only">(current)</span></a>

              </li>

              <hr class="hr">

              <li class="nav-item">

                <a class="nav-link" href="{{route('frontend-american-muscle')}}">American Muscle</a>

              </li>

              <hr class="hr">

              <li class="nav-item">

                <a class="nav-link" href="{{route('frontend-auction-cars')}}">Auction </a>



              </li>

              <hr class="hr">

              <li class="nav-item">



                <a class="nav-link" href="{{route('frontend-classified-cars')}}">Classified</a>

              </li>



              <hr class="hr">

              <li class="nav-item">

              <a class="nav-link" href="{{route('featured-car')}}">Featured Cars</a>

              </li>

              {{--<hr class="hr">--}}

              {{--<li class="nav-item">--}}

                {{--<a class="nav-link" href="{{route('frontend-search-lease-cars')}}">Lease Cars</a>--}}

              {{--</li>--}}

                <hr class="hr">

                <li class="nav-item">

                    <a class="nav-link" href="{{route('frontend-Prestige-cars')}}">Prestige</a>

                </li>

              <hr class="hr">

              <li class="nav-item">

                <a class="nav-link" href="{{route('frontend-rental-cars')}}">Rental</a>

              </li>

                <hr class="hr">

              <li class="nav-item">

                <a class="nav-link" href="{{route('frontend-swap-list')}}">Swaps</a>

              </li>

              <div class="topbar-mobile">

                <li class="nav-item"><a class="nav-link" href="{{route('frontend-blog')}}">Blog</a></li>

                {{--<li class="nav-item"><a class="nav-link" href="{{route('frontend-car-selling')}}">Car Selling </a> </li>--}}

                <li class="nav-item"><a class="nav-link" href="{{route('event-frontend')}}">Events</a></li>

{{--                <li class="nav-item"><a class="nav-link" href="{{route('frontend-events') }}">Events</a></li>--}}

                <li class="nav-item"><a class="nav-link" href="{{route('garage')}}">Garage Service </a> </li>

                  <li class="nav-item"><a class="nav-link" href="{{route('frontend-misecellinous')}}">Miscellaneous</a></li>

                  <li  class="nav-item"><a class="nav-link" href="{{route('wanted')}}">Wanted</a> </li>
                 



                  <!-- <li><a href="{{route('frontend-car-selling-lease')}}">Car Selling Lease</a></li> -->

                  @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)

              

{{--                  <li class="nav-item"><a class="nav-link" href="{{route('user-change-password')}}">Change Password </a></li>--}}

                  @else

                  <!-- <li><a href="{{route('user-login')}}">Login </a></li> -->

                  @endif

                  <!-- <li><a href="{{route('frontend-car-selling-auction')}}">Car Selling Auction</a></li> -->



              </div>





              <div class=" buttongroup new-buttongroup" >

                @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)

                @php

                $route = route("user-logout");

                @endphp

                <button onclick="location.href='{{$route}}'" class="signinbtn" style="cursor: pointer;"> <span style="padding-right: 5px;"><img src="{{ config('app.ui_asset_url').'frontend/img/logo/Path 4266.png' }}" alt=""></span>sign out</button>
                <!--<a  style="cursor: pointer;"> </a>-->

                @else

                @php

                $route = route("user-login");

                @endphp

                <button onclick="javascript:location.href='{{$route}}'" class="signinbtn" style="cursor: pointer;"> <span style="padding-right: 5px;"><img src="{{ config('app.ui_asset_url').'frontend/img/logo/Path 4266.png' }}" alt=""></span>sign in</button>

                @endif



                @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)

                @php

                $route = route("my-advert");

                @endphp

                {{--<button class="createadbtn" style="cursor: pointer;" onclick="location.href='{{$route}}'">My Portal</button>--}}
                <button class="createadbtn" style="cursor: pointer;" onclick="location.href='{{$route}}'">My Portal</button>
                 @php $count=App\Chat::where(["to"=>session('userDetails')->id,"read_status"=>0])->count(); 
                 @endphp
<a class="createadbtn  messageBtn mt-2" style="cursor: pointer;
padding-left:12px;
width: 65px;
border: unset;" onclick="location.href='{{route("chat-view")}}'"><img style="max-width: 5vh;" src="{{ config('app.ui_asset_url').'frontend/img/chat.png' }}" alt="">
@if($count > 0)
@php
if($count > 99){
$count="99+";
}
@endphp
@else
@php $count=""; @endphp
@endif
<span class="badge badge-in-mobile" id="chat_count" style="background: red;
color: white;
border-radius: 50%;
position: relative;
left: -14px;
top: 15px;
z-index: 10000;">{{$count}}</span>

</a>

                @else

                <button class="createadbtn" style="cursor: pointer;" data-toggle="modal" data-target=".bd-example-modal-lg" id="packagemodal"> Sell My Car</button>

                @endif
                
                





              </div>

          </div>

        </nav>

      </div>

    </header>

    @php

       $packages = App\Package::all();

    @endphp

    <!--Package  Modal-->

    <div class="modal fade bd-example-modal-lg newpackagemodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

      <div class="modal-dialog modal-lg">

        <div class="modal-content" style="background: transparent">

          <div class="row profilesection">

            <img class="badge" src="{{ config('app.ui_asset_url').'frontend/img/carselling/badge.png' }}">

            <div class="col-12">

              <div class="row">

                <div class="col-12 ">

                  <div class="container">

                    <div class="row  packagediv">

                      <div class=" col-10 offset-2 PackageDetail">

                        <div class="PackageDetailHeading">Package Details</div>

                        <div class="style"> </div>

                      </div>



                    </div>

                    <div class="row packagedivdetail newbasicpackagedetail" id="pksl" style="padding-left:20px; padding-right:20px;padding-bottom: 40px;">

                      @if(!empty($packages) && count($packages))

                      @foreach($packages as $package)

                      @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)

                     @if(!empty($user_packge_id) &&  $package->id >= $user_packge_id)

                     <div class="col-12 col-sm-4 mb-2  basic">

                        <div class="card">

                          <div class="heading">{{ $package->name}}</div>

                         

                          <div class="moneyDetail">£{{number_format($package->price, 2)}} <span>per<br>



                              @php

                              $attributes = !empty($package->attributes) ? json_decode($package->attributes) : null;

                              $package_duration = "";

                              switch($package->duration){

                              case 1:

                              $package_duration = "Day";

                              break;

                              case 2:

                              $package_duration = "Month";

                              break;

                              case 3:

                              $package_duration = "Year";

                              break;

                              default:

                              $package_duration = "N/A";

                              break;

                              }

                              if(!empty(session('userDetails')->id)){

                              $user_package = \App\UserPackage::where('user_id',session('userDetails')->id)->first();

                              }

                              @endphp

                              {{$package_duration}}

                            </span></div>

                          <div class="pckgshow">{{(!empty($user_package->package_id) && $user_package->package_id == $package->id) ? 'You are on this package':((!empty($package->off_bit) && $package->off_bit == 1) ? $package->off_percentage."% Off" : 'No offer')}}</div>



                          <div class="card-body">

                            <div class="price">Price: £{{$package->price}}</div>

                            <hr>

                            <div class="price">Limit: {{$package_duration}}</div>

                            <hr>

                            <div class="price">Adverts: {{!empty($attributes->adverts) ? $attributes->adverts : ''}} Posts</div>

                            <hr>

                            <div class="price">Image per post: {{!empty($attributes->images_per_post) ? $attributes->images_per_post : ''}} Images</div>

                            <hr>

                            <div class="price">Video per post: {{!empty($attributes->videos_per_post) ? $attributes->videos_per_post : ''}}</div>



                            <div class="takethisbutton">





                              <!-- <button class="btn" id="packagepurchase">  Take this</button>  -->



                              <button class="btn" onclick="purchasePkg('{{base64_encode(base64_encode($package->id)) }}')" {{!empty($user_package->package_id) && $user_package->package_id == $package->id ? 'disabled':''}}> Take this</button>



                            </div>

                          </div>

                        </div>

                      </div>

                       @endif

                      @else

                      @if(!empty($package) && $package->name === "Rental")
                                        <div class="col-12 col-sm-4 mb-2 basic ">

                                            <div class="card">

                                                <div class="heading">{{ $package->name}}</div>



                                                <div class="moneyDetail">£{{number_format($package->price, 2)}} <span>per<br>



                                                        @php

                                                            $attributes = !empty($package->attributes) ? json_decode($package->attributes) : null;

                                                            $package_duration = "";

                                                            switch($package->duration){

                                                            case 1:

                                                            $package_duration = "Day";

                                                            break;

                                                            case 2:

                                                            $package_duration = "Month";

                                                            break;

                                                            case 3:

                                                            $package_duration = "Year";

                                                            break;

                                                            default:

                                                            $package_duration = "N/A";

                                                            break;

                                                            }

                                                            if(!empty(session('userDetails')->id)){

                                                            $user_package = \App\UserPackage::where('user_id',session('userDetails')->id)->first();

                                                            }

                                                        @endphp

                                                        {{$package_duration}}

                            </span></div>

                                                <div class="pckgshow">{{(!empty($user_package->package_id) && $user_package->package_id == $package->id) ? 'You are on this package':((!empty($package->off_bit) && $package->off_bit == 1) ? $package->off_percentage."% Off" : 'No offer')}}</div>



                                                <div class="card-body">

                                                    <div class="price">Price: £{{$package->price}}</div>

                                                    <hr>

                                                    <div class="price">Limit: {{$package_duration}}</div>

                                                    <hr>

                                                    <div class="price">Adverts: {{!empty($attributes->adverts) ? $attributes->adverts : ''}} Posts</div>

                                                    <hr>

                                                    <div class="price">Image per post: {{!empty($attributes->images_per_post) ? $attributes->images_per_post : ''}} Images</div>

                                                    <hr>

                                                    <div class="price">Video per post: {{!empty($attributes->videos_per_post) ? $attributes->videos_per_post : ''}}</div>



                                                    <div class="takethisbutton">





                                                        <!-- <button class="btn" id="packagepurchase">  Take this</button>  -->



                                                        <button class="btn" onclick="purchasePkg('{{base64_encode(base64_encode($package->id)) }}')" {{!empty($user_package->package_id) && $user_package->package_id == $package->id ? 'disabled':''}}> Take this</button>



                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    @endif
                                    
                                    
                                    
                                    
                                          @if(!empty($package) && $package->name === "Basic")
                                        <div class="col-12 col-sm-4 mb-2 basic ">

                                            <div class="card">

                                                <div class="heading">{{ $package->name}}</div>



                                                <div class="moneyDetail">£{{number_format($package->price, 2)}} <span>per<br>



                                                        @php

                                                            $attributes = !empty($package->attributes) ? json_decode($package->attributes) : null;

                                                            $package_duration = "";

                                                            switch($package->duration){

                                                            case 1:

                                                            $package_duration = "Day";

                                                            break;

                                                            case 2:

                                                            $package_duration = "Month";

                                                            break;

                                                            case 3:

                                                            $package_duration = "Year";

                                                            break;

                                                            default:

                                                            $package_duration = "N/A";

                                                            break;

                                                            }

                                                            if(!empty(session('userDetails')->id)){

                                                            $user_package = \App\UserPackage::where('user_id',session('userDetails')->id)->first();

                                                            }

                                                        @endphp

                                                        {{$package_duration}}

                            </span></div>

                                                <div class="pckgshow">{{(!empty($user_package->package_id) && $user_package->package_id == $package->id) ? 'You are on this package':((!empty($package->off_bit) && $package->off_bit == 1) ? $package->off_percentage."% Off" : 'No offer')}}</div>



                                                <div class="card-body">

                                                    <div class="price">Price: £{{$package->price}}</div>

                                                    <hr>

                                                    <div class="price">Limit: {{$package_duration}}</div>

                                                    <hr>

                                                    <div class="price">Adverts: {{!empty($attributes->adverts) ? $attributes->adverts : ''}} Posts</div>

                                                    <hr>

                                                    <div class="price">Image per post: {{!empty($attributes->images_per_post) ? $attributes->images_per_post : ''}} Images</div>

                                                    <hr>

                                                    <div class="price">Video per post: {{!empty($attributes->videos_per_post) ? $attributes->videos_per_post : ''}}</div>



                                                    <div class="takethisbutton">





                                                        <!-- <button class="btn" id="packagepurchase">  Take this</button>  -->



                                                        <button class="btn" onclick="purchasePkg('{{base64_encode(base64_encode($package->id)) }}')" {{!empty($user_package->package_id) && $user_package->package_id == $package->id ? 'disabled':''}}> Take this</button>



                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    @endif

                                        @if(!empty($package) && $package->name === "Standard")
                                            <div class="col-12 col-sm-4 mb-2 basic ">

                                                <div class="card">

                                                    <div class="heading">{{ $package->name}}</div>



                                                    <div class="moneyDetail">£{{number_format($package->price, 2)}} <span>per<br>



                                                            @php

                                                                $attributes = !empty($package->attributes) ? json_decode($package->attributes) : null;

                                                                $package_duration = "";

                                                                switch($package->duration){

                                                                case 1:

                                                                $package_duration = "Day";

                                                                break;

                                                                case 2:

                                                                $package_duration = "Month";

                                                                break;

                                                                case 3:

                                                                $package_duration = "Year";

                                                                break;

                                                                default:

                                                                $package_duration = "N/A";

                                                                break;

                                                                }

                                                                if(!empty(session('userDetails')->id)){

                                                                $user_package = \App\UserPackage::where('user_id',session('userDetails')->id)->first();

                                                                }

                                                            @endphp

                                                            {{$package_duration}}

                            </span></div>

                                                    <div class="pckgshow">{{(!empty($user_package->package_id) && $user_package->package_id == $package->id) ? 'You are on this package':((!empty($package->off_bit) && $package->off_bit == 1) ? $package->off_percentage."% Off" : 'No offer')}}</div>



                                                    <div class="card-body">

                                                        <div class="price">Price: £{{$package->price}}</div>

                                                        <hr>

                                                        <div class="price">Limit: {{$package_duration}}</div>

                                                        <hr>

                                                        <div class="price">Adverts: {{!empty($attributes->adverts) ? $attributes->adverts : ''}} Posts</div>

                                                        <hr>

                                                        <div class="price">Image per post: {{!empty($attributes->images_per_post) ? $attributes->images_per_post : ''}} Images</div>

                                                        <hr>

                                                        <div class="price">Video per post: {{!empty($attributes->videos_per_post) ? $attributes->videos_per_post : ''}}</div>



                                                        <div class="takethisbutton">





                                                            <!-- <button class="btn" id="packagepurchase">  Take this</button>  -->



                                                            <button class="btn" onclick="purchasePkg('{{base64_encode(base64_encode($package->id)) }}')" {{!empty($user_package->package_id) && $user_package->package_id == $package->id ? 'disabled':''}}> Take this</button>



                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                        @endif

                                        @if(!empty($package) && $package->name === "Trade")
                                            <div class="col-12 col-sm-4 mb-2 basic ">

                                                <div class="card">

                                                    <div class="heading">{{ $package->name}}</div>



                                                    <div class="moneyDetail">£{{number_format($package->price, 2)}} <span>per<br>



                                                            @php

                                                                $attributes = !empty($package->attributes) ? json_decode($package->attributes) : null;

                                                                $package_duration = "";

                                                                switch($package->duration){

                                                                case 1:

                                                                $package_duration = "Day";

                                                                break;

                                                                case 2:

                                                                $package_duration = "Month";

                                                                break;

                                                                case 3:

                                                                $package_duration = "Year";

                                                                break;

                                                                default:

                                                                $package_duration = "N/A";

                                                                break;

                                                                }

                                                                if(!empty(session('userDetails')->id)){

                                                                $user_package = \App\UserPackage::where('user_id',session('userDetails')->id)->first();

                                                                }

                                                            @endphp

                                                            {{$package_duration}}

                            </span></div>

                                                    <div class="pckgshow">{{(!empty($user_package->package_id) && $user_package->package_id == $package->id) ? 'You are on this package':((!empty($package->off_bit) && $package->off_bit == 1) ? $package->off_percentage."% Off" : 'No offer')}}</div>



                                                    <div class="card-body">

                                                        <div class="price">Price: £{{$package->price}}</div>

                                                        <hr>

                                                        <div class="price">Limit: {{$package_duration}}</div>

                                                        <hr>

                                                        <div class="price">Adverts: {{!empty($attributes->adverts) ? $attributes->adverts : ''}} Posts</div>

                                                        <hr>

                                                        <div class="price">Image per post: {{!empty($attributes->images_per_post) ? $attributes->images_per_post : ''}} Images</div>

                                                        <hr>

                                                        <div class="price">Video per post: {{!empty($attributes->videos_per_post) ? $attributes->videos_per_post : ''}}</div>



                                                        <div class="takethisbutton">





                                                            <!-- <button class="btn" id="packagepurchase">  Take this</button>  -->



                                                            <button class="btn" onclick="purchasePkg('{{base64_encode(base64_encode($package->id)) }}')" {{!empty($user_package->package_id) && $user_package->package_id == $package->id ? 'disabled':''}}> Take this</button>



                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                        @endif
                                    
                                    

                             @if(!empty($package) && $package->name === "Body Shop Services")
                                 <div class="col-12 col-sm-4 mb-2 basic ">

                                     <div class="card">

                                         <div class="heading">{{ $package->name}}</div>



                                         <div class="moneyDetail">£{{number_format($package->price, 2)}} <span>per<br>



                                                 @php

                                                     $attributes = !empty($package->attributes) ? json_decode($package->attributes) : null;

                                                     $package_duration = "";

                                                     switch($package->duration){

                                                     case 1:

                                                     $package_duration = "Day";

                                                     break;

                                                     case 2:

                                                     $package_duration = "Month";

                                                     break;

                                                     case 3:

                                                     $package_duration = "Year";

                                                     break;

                                                     default:

                                                     $package_duration = "N/A";

                                                     break;

                                                     }

                                                     if(!empty(session('userDetails')->id)){

                                                     $user_package = \App\UserPackage::where('user_id',session('userDetails')->id)->first();

                                                     }

                                                 @endphp

                                                 {{$package_duration}}

                            </span></div>

                                         <div class="pckgshow">{{(!empty($user_package->package_id) && $user_package->package_id == $package->id) ? 'You are on this package':((!empty($package->off_bit) && $package->off_bit == 1) ? $package->off_percentage."% Off" : 'No offer')}}</div>



                                         <div class="card-body">

                                             <div class="price">Price: £{{$package->price}}</div>

                                             <hr>

                                             <div class="price">Limit: {{$package_duration}}</div>

                                             <hr>

                                             <div class="price">Adverts: {{!empty($attributes->adverts) ? $attributes->adverts : ''}} Posts</div>

                                             <hr>

                                             <div class="price">Image per post: {{!empty($attributes->images_per_post) ? $attributes->images_per_post : ''}} Images</div>

                                             <hr>

                                             <div class="price">Video per post: {{!empty($attributes->videos_per_post) ? $attributes->videos_per_post : ''}}</div>



                                             <div class="takethisbutton">





                                                 <!-- <button class="btn" id="packagepurchase">  Take this</button>  -->



                                                 <button class="btn" onclick="purchasePkg('{{base64_encode(base64_encode($package->id)) }}')" {{!empty($user_package->package_id) && $user_package->package_id == $package->id ? 'disabled':''}}> Take this</button>



                                             </div>

                                         </div>

                                     </div>

                                 </div>
                     @endif


                             @if(!empty($package) && $package->name === "GarageServices")
                                 <div class="col-12 col-sm-4 mb-2 basic ">

                                     <div class="card">

                                         <div class="heading">{{ $package->name}}</div>



                                         <div class="moneyDetail">£{{number_format($package->price, 2)}} <span>per<br>



                                                 @php

                                                     $attributes = !empty($package->attributes) ? json_decode($package->attributes) : null;

                                                     $package_duration = "";

                                                     switch($package->duration){

                                                     case 1:

                                                     $package_duration = "Day";

                                                     break;

                                                     case 2:

                                                     $package_duration = "Month";

                                                     break;

                                                     case 3:

                                                     $package_duration = "Year";

                                                     break;

                                                     default:

                                                     $package_duration = "N/A";

                                                     break;

                                                     }

                                                     if(!empty(session('userDetails')->id)){

                                                     $user_package = \App\UserPackage::where('user_id',session('userDetails')->id)->first();

                                                     }

                                                 @endphp

                                                 {{$package_duration}}

                            </span></div>

                                         <div class="pckgshow">{{(!empty($user_package->package_id) && $user_package->package_id == $package->id) ? 'You are on this package':((!empty($package->off_bit) && $package->off_bit == 1) ? $package->off_percentage."% Off" : 'No offer')}}</div>



                                         <div class="card-body">

                                             <div class="price">Price: £{{$package->price}}</div>

                                             <hr>

                                             <div class="price">Limit: {{$package_duration}}</div>

                                             <hr>

                                             <div class="price">Adverts: {{!empty($attributes->adverts) ? $attributes->adverts : ''}} Posts</div>

                                             <hr>

                                             <div class="price">Image per post: {{!empty($attributes->images_per_post) ? $attributes->images_per_post : ''}} Images</div>

                                             <hr>

                                             <div class="price">Video per post: {{!empty($attributes->videos_per_post) ? $attributes->videos_per_post : ''}}</div>



                                             <div class="takethisbutton">





                                                 <!-- <button class="btn" id="packagepurchase">  Take this</button>  -->



                                                 <button class="btn" onclick="purchasePkg('{{base64_encode(base64_encode($package->id)) }}')" {{!empty($user_package->package_id) && $user_package->package_id == $package->id ? 'disabled':''}}> Take this</button>



                                             </div>

                                         </div>

                                     </div>

                                 </div>
                             @endif

                     



                    @endif

                    

                      @endforeach

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




    <div class="modal fade bd-pkg-modal-lg-select " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

      <div class="modal-dialog modal-lg">

        <div class="modal-content" style="background: transparent">

          <div class="row profilesection">

            <img class="badge" src="{{ config('app.ui_asset_url').'frontend/img/carselling/badge.png' }}">

            <div class="col-12">

              <div class="row">

                <div class="col-12 ">

                  <div class="container">

                    <div class="row  packagediv">

                      <div class=" col-10 offset-2 PackageDetail">

                        <div class="PackageDetailHeading">Package Details</div>

                        <div class="style"> </div>

                      </div>



                    </div>

                    <div class="row packagedivdetail newbasicpackagedetail" id="pksl" style="padding-left:20px; padding-right:20px;padding-bottom: 40px;">

                      @if(!empty($packages) && count($packages))

                      @foreach($packages as $package)

                      @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)

                     @if(!empty($user_packge_id) &&  $package->id >= $user_packge_id)

                     <div class="col-12 col-sm-4 mb-2  basic">

                        <div class="card">

                          <div class="heading">{{ $package->name}}</div>

                         

                          <div class="moneyDetail">£{{number_format($package->price, 2)}} <span>per<br>



                              @php

                              $attributes = !empty($package->attributes) ? json_decode($package->attributes) : null;

                              $package_duration = "";

                              switch($package->duration){

                              case 1:

                              $package_duration = "Day";

                              break;

                              case 2:

                              $package_duration = "Month";

                              break;

                              case 3:

                              $package_duration = "Year";

                              break;

                              default:

                              $package_duration = "N/A";

                              break;

                              }

                              if(!empty(session('userDetails')->id)){

                              $user_package = \App\UserPackage::where('user_id',session('userDetails')->id)->first();

                              }

                              @endphp

                              {{$package_duration}}

                            </span></div>

                          <div class="pckgshow">{{(!empty($user_package->package_id) && $user_package->package_id == $package->id) ? 'You are on this package':((!empty($package->off_bit) && $package->off_bit == 1) ? $package->off_percentage."% Off" : 'No offer')}}</div>



                          <div class="card-body">

                            <div class="price">Price: £{{$package->price}}</div>

                            <hr>

                            <div class="price">Limit: {{$package_duration}}</div>

                            <hr>

                            <div class="price">Adverts: {{!empty($attributes->adverts) ? $attributes->adverts : ''}} Posts</div>

                            <hr>

                            <div class="price">Image per post: {{!empty($attributes->images_per_post) ? $attributes->images_per_post : ''}} Images</div>

                            <hr>

                            <div class="price">Video per post: {{!empty($attributes->videos_per_post) ? $attributes->videos_per_post : ''}}</div>



                            <div class="takethisbutton">





                              <!-- <button class="btn" id="packagepurchase">  Take this</button>  -->



                              <button class="btn" onclick="purchasePkg('{{base64_encode(base64_encode($package->id)) }}')" {{!empty($user_package->package_id) && $user_package->package_id == $package->id ? 'disabled':''}}> Take this</button>



                            </div>

                          </div>

                        </div>

                      </div>

                       @endif

                      @else

                      @if(!empty($package) && $package->name === "Rental")
                                        <div class="col-12 col-sm-4 mb-2 basic ">

                                            <div class="card">

                                                <div class="heading">{{ $package->name}}</div>



                                                <div class="moneyDetail">£{{number_format($package->price, 2)}} <span>per<br>



                                                        @php

                                                            $attributes = !empty($package->attributes) ? json_decode($package->attributes) : null;

                                                            $package_duration = "";

                                                            switch($package->duration){

                                                            case 1:

                                                            $package_duration = "Day";

                                                            break;

                                                            case 2:

                                                            $package_duration = "Month";

                                                            break;

                                                            case 3:

                                                            $package_duration = "Year";

                                                            break;

                                                            default:

                                                            $package_duration = "N/A";

                                                            break;

                                                            }

                                                            if(!empty(session('userDetails')->id)){

                                                            $user_package = \App\UserPackage::where('user_id',session('userDetails')->id)->first();

                                                            }

                                                        @endphp

                                                        {{$package_duration}}

                            </span></div>

                                                <div class="pckgshow">{{(!empty($user_package->package_id) && $user_package->package_id == $package->id) ? 'You are on this package':((!empty($package->off_bit) && $package->off_bit == 1) ? $package->off_percentage."% Off" : 'No offer')}}</div>



                                                <div class="card-body">

                                                    <div class="price">Price: £{{$package->price}}</div>

                                                    <hr>

                                                    <div class="price">Limit: {{$package_duration}}</div>

                                                    <hr>

                                                    <div class="price">Adverts: {{!empty($attributes->adverts) ? $attributes->adverts : ''}} Posts</div>

                                                    <hr>

                                                    <div class="price">Image per post: {{!empty($attributes->images_per_post) ? $attributes->images_per_post : ''}} Images</div>

                                                    <hr>

                                                    <div class="price">Video per post: {{!empty($attributes->videos_per_post) ? $attributes->videos_per_post : ''}}</div>



                                                    <div class="takethisbutton">





                                                        <!-- <button class="btn" id="packagepurchase">  Take this</button>  -->



                                                        <button class="btn" onclick="purchasePkg('{{base64_encode(base64_encode($package->id)) }}')" {{!empty($user_package->package_id) && $user_package->package_id == $package->id ? 'disabled':''}}> Take this</button>



                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    @endif
                                    
                                    
                                    
                                    
                                          @if(!empty($package) && $package->name === "Basic")
                                        <div class="col-12 col-sm-4 mb-2 basic ">

                                            <div class="card">

                                                <div class="heading">{{ $package->name}}</div>



                                                <div class="moneyDetail">£{{number_format($package->price, 2)}} <span>per<br>



                                                        @php

                                                            $attributes = !empty($package->attributes) ? json_decode($package->attributes) : null;

                                                            $package_duration = "";

                                                            switch($package->duration){

                                                            case 1:

                                                            $package_duration = "Day";

                                                            break;

                                                            case 2:

                                                            $package_duration = "Month";

                                                            break;

                                                            case 3:

                                                            $package_duration = "Year";

                                                            break;

                                                            default:

                                                            $package_duration = "N/A";

                                                            break;

                                                            }

                                                            if(!empty(session('userDetails')->id)){

                                                            $user_package = \App\UserPackage::where('user_id',session('userDetails')->id)->first();

                                                            }

                                                        @endphp

                                                        {{$package_duration}}

                            </span></div>

                                                <div class="pckgshow">{{(!empty($user_package->package_id) && $user_package->package_id == $package->id) ? 'You are on this package':((!empty($package->off_bit) && $package->off_bit == 1) ? $package->off_percentage."% Off" : 'No offer')}}</div>



                                                <div class="card-body">

                                                    <div class="price">Price: £{{$package->price}}</div>

                                                    <hr>

                                                    <div class="price">Limit: {{$package_duration}}</div>

                                                    <hr>

                                                    <div class="price">Adverts: {{!empty($attributes->adverts) ? $attributes->adverts : ''}} Posts</div>

                                                    <hr>

                                                    <div class="price">Image per post: {{!empty($attributes->images_per_post) ? $attributes->images_per_post : ''}} Images</div>

                                                    <hr>

                                                    <div class="price">Video per post: {{!empty($attributes->videos_per_post) ? $attributes->videos_per_post : ''}}</div>



                                                    <div class="takethisbutton">





                                                        <!-- <button class="btn" id="packagepurchase">  Take this</button>  -->



                                                        <button class="btn" onclick="purchasePkg('{{base64_encode(base64_encode($package->id)) }}')" {{!empty($user_package->package_id) && $user_package->package_id == $package->id ? 'disabled':''}}> Take this</button>



                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    @endif

                                        @if(!empty($package) && $package->name === "Standard")
                                            <div class="col-12 col-sm-4 mb-2 basic ">

                                                <div class="card">

                                                    <div class="heading">{{ $package->name}}</div>



                                                    <div class="moneyDetail">£{{number_format($package->price, 2)}} <span>per<br>



                                                            @php

                                                                $attributes = !empty($package->attributes) ? json_decode($package->attributes) : null;

                                                                $package_duration = "";

                                                                switch($package->duration){

                                                                case 1:

                                                                $package_duration = "Day";

                                                                break;

                                                                case 2:

                                                                $package_duration = "Month";

                                                                break;

                                                                case 3:

                                                                $package_duration = "Year";

                                                                break;

                                                                default:

                                                                $package_duration = "N/A";

                                                                break;

                                                                }

                                                                if(!empty(session('userDetails')->id)){

                                                                $user_package = \App\UserPackage::where('user_id',session('userDetails')->id)->first();

                                                                }

                                                            @endphp

                                                            {{$package_duration}}

                            </span></div>

                                                    <div class="pckgshow">{{(!empty($user_package->package_id) && $user_package->package_id == $package->id) ? 'You are on this package':((!empty($package->off_bit) && $package->off_bit == 1) ? $package->off_percentage."% Off" : 'No offer')}}</div>



                                                    <div class="card-body">

                                                        <div class="price">Price: £{{$package->price}}</div>

                                                        <hr>

                                                        <div class="price">Limit: {{$package_duration}}</div>

                                                        <hr>

                                                        <div class="price">Adverts: {{!empty($attributes->adverts) ? $attributes->adverts : ''}} Posts</div>

                                                        <hr>

                                                        <div class="price">Image per post: {{!empty($attributes->images_per_post) ? $attributes->images_per_post : ''}} Images</div>

                                                        <hr>

                                                        <div class="price">Video per post: {{!empty($attributes->videos_per_post) ? $attributes->videos_per_post : ''}}</div>



                                                        <div class="takethisbutton">





                                                            <!-- <button class="btn" id="packagepurchase">  Take this</button>  -->



                                                            <button class="btn" onclick="purchasePkg('{{base64_encode(base64_encode($package->id)) }}')" {{!empty($user_package->package_id) && $user_package->package_id == $package->id ? 'disabled':''}}> Take this</button>



                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                        @endif

                                        @if(!empty($package) && $package->name === "Trade")
                                            <div class="col-12 col-sm-4 mb-2 basic ">

                                                <div class="card">

                                                    <div class="heading">{{ $package->name}}</div>



                                                    <div class="moneyDetail">£{{number_format($package->price, 2)}} <span>per<br>



                                                            @php

                                                                $attributes = !empty($package->attributes) ? json_decode($package->attributes) : null;

                                                                $package_duration = "";

                                                                switch($package->duration){

                                                                case 1:

                                                                $package_duration = "Day";

                                                                break;

                                                                case 2:

                                                                $package_duration = "Month";

                                                                break;

                                                                case 3:

                                                                $package_duration = "Year";

                                                                break;

                                                                default:

                                                                $package_duration = "N/A";

                                                                break;

                                                                }

                                                                if(!empty(session('userDetails')->id)){

                                                                $user_package = \App\UserPackage::where('user_id',session('userDetails')->id)->first();

                                                                }

                                                            @endphp

                                                            {{$package_duration}}

                            </span></div>

                                                    <div class="pckgshow">{{(!empty($user_package->package_id) && $user_package->package_id == $package->id) ? 'You are on this package':((!empty($package->off_bit) && $package->off_bit == 1) ? $package->off_percentage."% Off" : 'No offer')}}</div>



                                                    <div class="card-body">

                                                        <div class="price">Price: £{{$package->price}}</div>

                                                        <hr>

                                                        <div class="price">Limit: {{$package_duration}}</div>

                                                        <hr>

                                                        <div class="price">Adverts: {{!empty($attributes->adverts) ? $attributes->adverts : ''}} Posts</div>

                                                        <hr>

                                                        <div class="price">Image per post: {{!empty($attributes->images_per_post) ? $attributes->images_per_post : ''}} Images</div>

                                                        <hr>

                                                        <div class="price">Video per post: {{!empty($attributes->videos_per_post) ? $attributes->videos_per_post : ''}}</div>



                                                        <div class="takethisbutton">





                                                            <!-- <button class="btn" id="packagepurchase">  Take this</button>  -->



                                                            <button class="btn" onclick="purchasePkg('{{base64_encode(base64_encode($package->id)) }}')" {{!empty($user_package->package_id) && $user_package->package_id == $package->id ? 'disabled':''}}> Take this</button>



                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                        @endif
                                    
                                    

                             @if(!empty($package) && $package->name === "Body Shop Services")
                                 <div class="col-12 col-sm-4 mb-2 basic ">

                                     <div class="card">

                                         <div class="heading">{{ $package->name}}</div>



                                         <div class="moneyDetail">£{{number_format($package->price, 2)}} <span>per<br>



                                                 @php

                                                     $attributes = !empty($package->attributes) ? json_decode($package->attributes) : null;

                                                     $package_duration = "";

                                                     switch($package->duration){

                                                     case 1:

                                                     $package_duration = "Day";

                                                     break;

                                                     case 2:

                                                     $package_duration = "Month";

                                                     break;

                                                     case 3:

                                                     $package_duration = "Year";

                                                     break;

                                                     default:

                                                     $package_duration = "N/A";

                                                     break;

                                                     }

                                                     if(!empty(session('userDetails')->id)){

                                                     $user_package = \App\UserPackage::where('user_id',session('userDetails')->id)->first();

                                                     }

                                                 @endphp

                                                 {{$package_duration}}

                            </span></div>

                                         <div class="pckgshow">{{(!empty($user_package->package_id) && $user_package->package_id == $package->id) ? 'You are on this package':((!empty($package->off_bit) && $package->off_bit == 1) ? $package->off_percentage."% Off" : 'No offer')}}</div>



                                         <div class="card-body">

                                             <div class="price">Price: £{{$package->price}}</div>

                                             <hr>

                                             <div class="price">Limit: {{$package_duration}}</div>

                                             <hr>

                                             <div class="price">Adverts: {{!empty($attributes->adverts) ? $attributes->adverts : ''}} Posts</div>

                                             <hr>

                                             <div class="price">Image per post: {{!empty($attributes->images_per_post) ? $attributes->images_per_post : ''}} Images</div>

                                             <hr>

                                             <div class="price">Video per post: {{!empty($attributes->videos_per_post) ? $attributes->videos_per_post : ''}}</div>



                                             <div class="takethisbutton">





                                                 <!-- <button class="btn" id="packagepurchase">  Take this</button>  -->



                                                 <button class="btn" onclick="purchasePkg('{{base64_encode(base64_encode($package->id)) }}')" {{!empty($user_package->package_id) && $user_package->package_id == $package->id ? 'disabled':''}}> Take this</button>



                                             </div>

                                         </div>

                                     </div>

                                 </div>
                     @endif


                             @if(!empty($package) && $package->name === "GarageServices")
                                 <div class="col-12 col-sm-4 mb-2 basic ">

                                     <div class="card">

                                         <div class="heading">{{ $package->name}}</div>



                                         <div class="moneyDetail">£{{number_format($package->price, 2)}} <span>per<br>



                                                 @php

                                                     $attributes = !empty($package->attributes) ? json_decode($package->attributes) : null;

                                                     $package_duration = "";

                                                     switch($package->duration){

                                                     case 1:

                                                     $package_duration = "Day";

                                                     break;

                                                     case 2:

                                                     $package_duration = "Month";

                                                     break;

                                                     case 3:

                                                     $package_duration = "Year";

                                                     break;

                                                     default:

                                                     $package_duration = "N/A";

                                                     break;

                                                     }

                                                     if(!empty(session('userDetails')->id)){

                                                     $user_package = \App\UserPackage::where('user_id',session('userDetails')->id)->first();

                                                     }

                                                 @endphp

                                                 {{$package_duration}}

                            </span></div>

                                         <div class="pckgshow">{{(!empty($user_package->package_id) && $user_package->package_id == $package->id) ? 'You are on this package':((!empty($package->off_bit) && $package->off_bit == 1) ? $package->off_percentage."% Off" : 'No offer')}}</div>



                                         <div class="card-body">

                                             <div class="price">Price: £{{$package->price}}</div>

                                             <hr>

                                             <div class="price">Limit: {{$package_duration}}</div>

                                             <hr>

                                             <div class="price">Adverts: {{!empty($attributes->adverts) ? $attributes->adverts : ''}} Posts</div>

                                             <hr>

                                             <div class="price">Image per post: {{!empty($attributes->images_per_post) ? $attributes->images_per_post : ''}} Images</div>

                                             <hr>

                                             <div class="price">Video per post: {{!empty($attributes->videos_per_post) ? $attributes->videos_per_post : ''}}</div>



                                             <div class="takethisbutton">





                                                 <!-- <button class="btn" id="packagepurchase">  Take this</button>  -->



                                                 <button class="btn" onclick="purchasePkg('{{base64_encode(base64_encode($package->id)) }}')" {{!empty($user_package->package_id) && $user_package->package_id == $package->id ? 'disabled':''}}> Take this</button>



                                             </div>

                                         </div>

                                     </div>

                                 </div>
                             @endif

                     



                    @endif

                    

                      @endforeach

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

{{--new cropper modal--}}

      <div class="modal fade" id="cropImagePop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

          <div class="modal-dialog">

              <div class="modal-content">

                  <div class="modal-header">

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                      <h4 class="modal-title" id="myModalLabel">



                      </h4>

                  </div>

                  <div class="modal-body">

                      <div id="upload-demo" class="center-block"></div>

                  </div>

                  <div class="modal-footer">

                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                      <button type="button" id="cropImageBtn" class="btn btn-primary">Crop</button>

                  </div>

              </div>

          </div>

      </div>



{{--   image preview Modal  --}}



<!--      <div class="modal fade " id="preview-detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->

<!--          <div class="modal-dialog modal-lg">-->

<!--              <div class="modal-content">-->

<!--                  <div class="modal-body">-->

<!--                      <form>-->

<!--                          <div class="image-preview">-->



<!--                          </div>-->

<!--                          <div class="form-row image-preview-modal-dash mt-5">-->



<!--                              {{--<div class="form-group col-md-4">--}}-->

<!--                                  {{--<label for="inputEmail4">Email</label>--}}-->

<!--                                  {{--<input type="text" class="form-control" >--}}-->

<!--                              {{--</div>--}}-->

<!--                              {{--<div class="form-group col-md-4">--}}-->

<!--                                  {{--<label for="inputEmail4">Email</label>--}}-->

<!--                                  {{--<input type="text" class="form-control" >--}}-->

<!--                              {{--</div>--}}-->

<!--                              {{--<div class="form-group col-md-4">--}}-->

<!--                                  {{--<label for="inputPassword4">Password</label>--}}-->

<!--                                  {{--<input type="text" class="form-control" >--}}-->

<!--                              {{--</div>--}}-->

<!--                          </div>-->

<!--                          <div class="row">-->



<!--                              <div class="col-12 col-sm-6 form-group">-->

<!--                                  <label id="safety_feature_dashboard" style="display:none" for="inputEmail4">Safety Feature</label>-->

<!--{{--                                      <h4 class="m-auto" id="safety_feature_dashboard" style="display:none">Safety Feature</h4>--}}-->

<!--                                  <div class="safety-feature-preview-modal-dash feature-li-dashboard">-->

<!--                                  </div>-->

<!--                              </div>-->

<!--                                  <div class="col-12 form-group col-sm-6">-->

<!--                                      <label class="m-auto" id="entertainment_feature_dashboard" style="display:none;">Entertainment Feature</label>-->

<!--                                      <div class="enter-feature-preview-modal-dash feature-li-dashboard">-->

<!--                                      </div>-->

<!--                                  </div>-->

<!--                          </div>-->

<!--                      </form>-->



<!--                  </div>-->

<!--                  <div class="modal-footer">-->

<!--                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->

<!--                  </div>-->

<!--              </div>-->

<!--          </div>-->

<!--      </div>-->

  </div>

{{--modal dashboard error--}}

  <div class="modal fade SelectModalCenterDashboard" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

      <div class="modal-dialog modal-dialog-centered" role="document">

          <div class="modal-content">

              <div class="modal-header">

                  <h5 class="modal-title" id="exampleModalLongTitle">About Form</h5>

                  {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}

                  {{--<span aria-hidden="true">&times;</span>--}}

                  {{--</button>--}}

              </div>

              <div class="modal-body">

                  Please Fill or Select required Fields.

              </div>

              <div class="modal-footer">

                  <button type="button" class="btn" style="background-color: #e4001b;color:#FFFFFF" data-dismiss="modal">OK</button>

              </div>

          </div>

      </div>

  </div>

  <div class="modal fade EmailModalSuccessSwap" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

      <div class="modal-dialog modal-dialog-centered" role="document">

          <div class="modal-content">

              <div class="modal-header">

                  <h5 class="modal-title" id="exampleModalLongTitle">About Email</h5>

                  {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}

                  {{--<span aria-hidden="true">&times;</span>--}}

                  {{--</button>--}}

              </div>

              <div class="modal-body" id="email_body_swap">

                  Your email has been sent.

              </div>

              <div class="modal-footer">

                  <button type="button" class="btn" style="background-color: #e4001b;color:#FFFFFF" data-dismiss="modal">OK</button>

              </div>

          </div>

      </div>

  </div>

{{--misc + garage  mail modal--}}

  <div class="modal fade EmailModalSuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

      <div class="modal-dialog modal-dialog-centered" role="document">

          <div class="modal-content">

              <div class="modal-header">

                  <h5 class="modal-title" id="exampleModalLongTitle">About Email</h5>

                  {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}

                  {{--<span aria-hidden="true">&times;</span>--}}

                  {{--</button>--}}

              </div>

              <div class="modal-body">

                  Your email has been sent.

              </div>

              <div class="modal-footer">

                  <button type="button" class="btn" style="background-color: #e4001b;color:#FFFFFF" data-dismiss="modal">OK</button>

              </div>

          </div>

      </div>

  </div>

  <div class="modal fade SelectModalCategoryDashboard" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

      <div class="modal-dialog modal-dialog-centered" role="document">

          <div class="modal-content">

              <div class="modal-header">

                  <h5 class="modal-title" id="exampleModalLongTitle">About Form</h5>

                  {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}

                  {{--<span aria-hidden="true">&times;</span>--}}

                  {{--</button>--}}

              </div>

              <div class="modal-body">

                  Please Select Category.

              </div>

              <div class="modal-footer">

                  <button type="button" class="btn" style="background-color: #e4001b;color:#FFFFFF" data-dismiss="modal">OK</button>

              </div>

          </div>

      </div>

  </div>

  <div class="modal fade SelectWantedImageDashboard" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

      <div class="modal-dialog modal-dialog-centered" role="document">

          <div class="modal-content">

              <div class="modal-header">

                  <h5 class="modal-title" id="exampleModalLongTitle">About Form</h5>

                  {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}

                  {{--<span aria-hidden="true">&times;</span>--}}

                  {{--</button>--}}

              </div>

              <div class="modal-body">

                  Please add image.

              </div>

              <div class="modal-footer">

                  <button type="button" class="btn" style="background-color: #e4001b;color:#FFFFFF" data-dismiss="modal">OK</button>

              </div>

          </div>

      </div>

  </div>

  <div class="modal fade SelectWantedContactDashboard" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

      <div class="modal-dialog modal-dialog-centered" role="document">

          <div class="modal-content">

              <div class="modal-header">

                  <h5 class="modal-title" id="exampleModalLongTitle">About Form</h5>

                  {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}

                  {{--<span aria-hidden="true">&times;</span>--}}

                  {{--</button>--}}

              </div>

              <div class="modal-body">

                  Please add Contact Number.

              </div>

              <div class="modal-footer">

                  <button type="button" class="btn" style="background-color: #e4001b;color:#FFFFFF" data-dismiss="modal">OK</button>

              </div>

          </div>

      </div>

  </div>

  <div class="modal fade aftreformfillmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

      <div class="modal-dialog modal-dialog-centered" role="document">

          <div class="modal-content">

              <div class="modal-header">

                  <h5 class="modal-title" id="exampleModalLongTitle">About Ad</h5>

                  {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}

                  {{--<span aria-hidden="true">&times;</span>--}}

                  {{--</button>--}}

              </div>

              <div class="modal-body">

                 Your ad has been placed.

              </div>

              <div class="modal-footer">

                  <button type="button" class="btn" style="background-color: #e4001b;color:#FFFFFF" data-dismiss="modal">OK</button>

              </div>

          </div>

      </div>

  </div>

  <div class="modal fade DataFetchFail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

      <div class="modal-dialog modal-dialog-centered" role="document">

          <div class="modal-content">

              <div class="modal-header">

                  <h5 class="modal-title" id="exampleModalLongTitle">About My adverts</h5>

                  {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}

                  {{--<span aria-hidden="true">&times;</span>--}}

                  {{--</button>--}}

              </div>

              <div class="modal-body">

               Something was wrong.

              </div>

              <div class="modal-footer">

                  <button type="button" class="btn" style="background-color: #e4001b;color:#FFFFFF" data-dismiss="modal">OK</button>

              </div>

          </div>

      </div>

  </div>

  

    <div class="modal fade" id="modalAuctionTime" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

      <div class="modal-dialog" role="document">

          <div class="modal-content">

              <div class="modal-header">

                  <h5 class="modal-title" id="exampleModalLabel">Auction Timing</h5>

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                      <span aria-hidden="true">&times;</span>

                  </button>

              </div>

              <div class="modal-body">

              Please Select Time Between 90 days.

              </div>

              <div class="modal-footer">



                  <button type="button" class="btn btn-primary" data-dismiss="modal">Okay</button>

              </div>

          </div>

      </div>

  </div>

<div class="modal fade" id="CarImageDashboard" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

      <div class="modal-dialog" role="document">

          <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Images Validation</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                      <span aria-hidden="true">&times;</span>

                  </button>

              </div>

              <div class="modal-body" id="DashboardImageValidation">

              Please Select Time Between 90 days.

              </div>

              <div class="modal-footer">



                  <button type="button" class="btn btn-primary" data-dismiss="modal">Okay</button>

              </div>

          </div>

      </div>

  </div>

<div class="modal fade" id="CarImagesDashboard30" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

      <div class="modal-dialog" role="document">

          <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Images Validation</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                      <span aria-hidden="true">&times;</span>

                  </button>

              </div>

              <div class="modal-body" id="DashboardImageValidation">

              Please add pictures.

              </div>

              <div class="modal-footer">



                  <button type="button" class="btn btn-primary" data-dismiss="modal">Okay</button>

              </div>

          </div>

      </div>

  </div>
  <div class="modal fade" id="CarImagesDashboardFeatured" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

      <div class="modal-dialog" role="document">

          <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Images Validation</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                      <span aria-hidden="true">&times;</span>

                  </button>

              </div>

              <div class="modal-body" id="DashboardImageValidation">

              Please add Featured Image.

              </div>

              <div class="modal-footer">



                  <button type="button" class="btn btn-primary" data-dismiss="modal">Okay</button>

              </div>

          </div>

      </div>

  </div>
  <div class="modal fade" id="5MBlimitImGE" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

      <div class="modal-dialog" role="document">

          <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Images Validation</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                      <span aria-hidden="true">&times;</span>

                  </button>

              </div>

              <div class="modal-body" id="DashboardImageValidation">

                  Image size is less than 5MB!.

              </div>

              <div class="modal-footer">



                  <button type="button" class="btn btn-primary" data-dismiss="modal">Okay</button>

              </div>

          </div>

      </div>

  </div>
