<footer>



    <div class="container">

        <div class="row footer1">

            <div class="col-12 col-sm-6 col-md-6 col-lg-4   widget1">



                <div>

                    <img class="footerlogo" src="{{ config('app.ui_asset_url').'frontend/img/logo/logo.png' }}">

                </div>

                <div>

                    <p>

                        Power Performance Cars is an online Digital Showroom that has been designed for the Power Performance industry.

                    </p>

                </div>

            <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
         <!-- <div class=" d-md-block mb-2"> -->

                    <form class="form-inline" method="post" action="{{route('footer-mail')}}" id="footer-mail">

                        @csrf

                        <div class="text-center button-loader " style="width: 100%;">

                            <input type="hidden" name="submit" value="submit">

                            <input type="email" id="footer-mail-input" class="form-control controlWidth" placeholder="Your Email Address" name="mail" required="" style="border-radius:0!important;max-width: 100%;border: 1px solid #FFFFFF;border-right: none;">

                           <button class=" btn btn-block mybtn1  tx-tfm"style="

    border-radius: 0px;

    max-width: 140px;" >Subscribe

                                <div class="loader ml-1" id="mail-loader-footer"></div>

                            </button>

                        </div>

                        <span id="footer-mail-span"></span>

                    </form>

                </div>
    </div>

                <!--<div>-->

                <!--    <h6>Follow Us:</h6>-->

                <!--</div>-->

                <!--<div class="buttongroup socialmediaicongroup">-->

                <!--    <a href="https://twitter.com/ppcarsltd" target="_blank"><i class="fab fa-twitter"></i></a>-->

                <!--    <a href="https://www.instagram.com/powerperformancecars/" target="_blank"><i class="	fab fa-instagram"></i></a>-->

                <!--    <a href="https://www.facebook.com/powerperformancecarsltd/" target="_blank"><i class="	fab fa-facebook-f"></i></a>-->

                <!--    <a href="https://www.youtube.com/channel/UCALG4ZeuaiYESwVu_uuox5Q?view_as=subscriber" target="_blank"><i class='fab fa-youtube'></i></a>-->

                <!--    <a href="https://www.pinterest.co.uk/powerperfor1032/?skipFac=1" target="_blank"><i class="	fab fa-pinterest"></i></a>-->

                <!--    <a href="https://vm.tiktok.com/ZSwAHfYE/" target="_blank"><i class="fab fa-tiktok"></i></a>-->

                <!--    <a href="http://power-performance-cars.tumblr.com" target="_blank"><i class="fab fa-tumblr"></i></a>-->

                <!--    <a href=" https://www.linkedin.com/company/powerperformancecars" target="_blank"><i class="fab fa-linkedin"></i></a>-->

                <!--    <a href="https://www.snapchat.com/add/ppcbhpfootere" target="_blank"><i class="fab fa-snapchat-ghost"></i></a></div>-->

                {{-- <button class="btn btn-store">

                    <i class="	fab fa-google-play"></i>

                    <span class="groupset">

                        <span class="btn-label">GET IT ON </span>

                        <span class="btn-caption">GOOGLE PLAY</span>

                    </span>

                </button>

                <button class="btn btn-store">

                    <i class=" appleicon	fab fa-apple"></i>

                    <span class="groupset">

                        <span class="btn-label">Download on the </span>

                        <span class="btn-caption">APP STORE</span>

                    </span>

                </button> --}}



            </div>



            <div class="col-6  col-sm-6 col-md-6 col-lg-3 widget3">

              <div class="footerheading spaceInMobileView">

                  Quick Links

                </div>

                <div class="description">

                    <a href="{{url('/contact-us')}}">Contact us</a>

                    <a href="{{url('/about-us')}}">About us</a>

                    <a href="{{route('career.view')}}">Careers</a>

                    <a href="{{url('/sitemap')}}">Sitemap</a>

                    <a href="{{route('privacy.policy')}}">Privacy policies</a>

                    <a href="{{route('terms.conditions')}}">Terms & Condition</a>

                    <a href="https://www.powerperformancecars.co.uk/user/dashboard/my%20adverts">Display Advertise</a>

                    <a href="{{url('/cookies-policies')}}">Cookies Policies</a>



                </div>

            </div>

            <div class="col-6  col-sm-6 col-md-6 col-lg-3 mr-auto widget4">

             <div class="footerheading spaceInMobileView" style="margin-left:7px">

                    Contact Info

                </div>

                <div class="description" style="margin-left:7px">

                    {{--<p>Address:</p>--}}

                    {{--<p>Lahore, Pakistan</p>--}}

                    {{--<p>Phone:</p>--}}

                    {{--<p>+92 324 7385 XXX</p>--}}

                    <p>Email:  <a href="mailto:info@powerperfomancecars.co.uk">info@powerperformancecars.co.uk</a></p>



                </div>

                <div class="buttongroup socialmediaicongroup">

                    <a href="https://twitter.com/ppcarsltd" target="_blank"><i class="fab fa-twitter"></i></a>

                    <a href="https://www.instagram.com/powerperformancecars/" target="_blank"><i class="	fab fa-instagram"></i></a>

                    <a href="https://www.facebook.com/powerperformancecarsltd/" target="_blank"><i class="	fab fa-facebook-f"></i></a>

                    <a href="https://www.youtube.com/channel/UCALG4ZeuaiYESwVu_uuox5Q?view_as=subscriber" target="_blank"><i class='fab fa-youtube'></i></a>

                    <a href="https://www.pinterest.co.uk/powerperfor1032/?skipFac=1" target="_blank"><i class="	fab fa-pinterest"></i></a>

                    <a href="https://vm.tiktok.com/ZSwAHfYE/" target="_blank"><i class="fab fa-tiktok"></i></a>

                    <a href="http://power-performance-cars.tumblr.com" target="_blank"><i class="fab fa-tumblr"></i></a>

                    <a href=" https://www.linkedin.com/company/powerperformancecars" target="_blank"><i class="fab fa-linkedin"></i></a>

                    <a href="https://www.snapchat.com/add/ppcbhpfootere" target="_blank"><i class="fab fa-snapchat-ghost"></i></a></div>



            </div>



        </div>

        <div class="footerseparater"></div>

        <div class="absolutefooter">

            © Power Performance Cars 2020 - 2021 | All rights reserved

        </div>

    </div>

</footer>





</div>



<!-- Optional JavaScript -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->



{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



<script src="{{ config('app.ui_asset_url').'frontend/js/slick.js' }}" type="text/javascript"></script>

{{-- <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> --}}

<script src="{{ config('app.ui_asset_url').'frontend/js/coursal.js' }}" type="text/javascript"></script>

<script src="{{ config('app.ui_asset_url').'frontend/js/packageSlider.js' }}" type="text/javascript"></script>

<script src="{{ config('app.ui_asset_url').'frontend/js/timer.js' }}" type="text/javascript"></script>

<script src="{{ config('app.ui_asset_url').'frontend/js/emojionearea.min.js' }}" type="text/javascript"></script>



<script src="{{ config('app.ui_asset_url').'frontend/js/signIn.js' }}" type="text/javascript"></script>

<script src="{{ config('app.ui_asset_url').'frontend/js/americanmuscle.js' }}" type="text/javascript"></script>

<script src="{{ config('app.ui_asset_url').'frontend/js/gridlist.js' }}" type="text/javascript"></script>

<script src="{{ config('app.ui_asset_url').'frontend/js/checkbox.js' }}" type="text/javascript"></script>

<script src="{{ config('app.ui_asset_url').'frontend/js/tagsinput.js' }}" type="text/javascript"></script>





<link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/tagsinput.css' }}">



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>





{{-- date range picker start --}}

{{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> --}}

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">

<script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>

{{--player cdn--}}

<script src="https://cdn.plyr.io/3.6.3/plyr.polyfilled.js"></script>





@if(Request::segment(2)=== 'login')

    @include('frontend.partials.sociallogin')

@endif



{{-- date range picker end --}}

@if(session()->has("userDetails"))

    @include('frontend.partials.firebasescript')

@endif

@if((session()->has("userDetails")))

    @include('frontend.partials.socket')

@endif



<script>

    // CKEDITOR.replace( 'advert_type' );

</script>

<script>
    // $('#centerPKGPurachaseModalDashboard').modal('show');
     
    function activaTab(hidetab, showtab, tabChanged = null) {

        $('#' + hidetab).hide();

        $('#' + showtab).show();

        if (!tabChanged) {

            $('a[href="#' + showtab + '"]').click();

        }

    }

    if ($('#profilemap').length) {

        google.maps.event.addDomListener(window, 'load', initProfileAutocomplete);

    }



    function initProfileAutocomplete() {

        let mapLat = Number('{{!empty(session("userDetails")->lat) ? session("userDetails")->lat : "40.6971494"}}');

        let mapLng = Number('{{!empty(session("userDetails")->lng) ? session("userDetails")->lng : "-74.2598655"}}');



        var map = new google.maps.Map(document.getElementById('profilemap'), {

            center: {

                lat: mapLat,

                lng: mapLng

            },

            draggable: false,

            zoom: 8,

            mapTypeId: 'roadmap'

        });



        // Create the search box and link it to the UI element.

        var input = document.getElementById('profileMapInput');



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



        // Listen for the event fired when the user selects a prediction and retrieve

        // more details for that place.

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



                $('#profileMapLat').val(places[0].geometry.location.lat());

                $('#profileMapLng').val(places[0].geometry.location.lng());

                var addr=places[0].address_components;

                for (var x in addr){

                    console.log(addr[x].types);

                    if(addr[x].types[0]==="country"){

                        $(".s_country option[value='"+ addr[x].long_name +"']").prop("selected",true);

                        $(".s_country").prop("disabled",true);

                        $("#profileCountry").val(addr[x].long_name);

                    }

                    else if(addr[x].types[0]==="administrative_area_level_2"){

                    $("input[name='city']").val(addr[x].long_name);

                    $("#city").val(addr[x].long_name);



                    }

                }







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



    function changeCountry(val) {

        $('#profileCountry').val(val);

    }



    var ckEditor;

    ClassicEditor

        .create(document.querySelector('#descriptionTA'))

        .then(editor => {

            ckEditor = editor;

        })

        .catch(error => {

            console.error(error);

        });





//    Propduct Slider in detail page

//     $('.audimainimg').slick({

//         slidesToShow: 1,

//         slidesToScroll: 1,

//         arrows: false,

//         fade: true,

//         asNavFor: 'imagesliderproduct'

//     });

//     $('.imagesliderproduct').slick({

//         slidesToShow: 3,

//         slidesToScroll: 1,

//         asNavFor: '.slider-for',

//         dots: true,

//         centerMode: true,

//         focusOnSelect: true

//     });

    $("#thumb_img_detail div:first-child img").addClass('active');





</script>

<script>



$(document).on("click","select-main-tab",function(e){

    var tab=$(this).attr("id");

    var url="{{route('get_tab',['tab'=>':tab'])}}";

    url=url.replace(':tab',tab);

    $.ajax({

       url:url,

       success:function(data){

           $("#power-car").html(data);

       },

       

    });

});

    $( window ).on("load", function() {



        // Handler for .load() called.

        $("#wait").prop("disabled",false);

        $("#login-form").prop("disabled",false);

        $(".end-timer-auction").prop("disabled",false);

        $("#following-btn").prop("disabled",false);

          $("#signinbutton").prop("disabled",false);

         $(".forgotten-password-btn").prop("disabled",false);

    });

    //  $(document).on("click",".contact_nmbr_limit",function (){

    //     limitText(this, 11);

    // });

    // function limitText(field, maxChar){

    //     var ref = $(field),

    //         val = ref.val();

    //     if ( val.length >= maxChar ){

    //         ref.val(function() {

    //             console.log(val.substr(0, maxChar));

    //             return val.substr(0, maxChar);

    //         });

    //     }

    // }

    $(document).on("keypress",".price-car-six-digit",function (){

        if ($(this).val().length > 6){

            return false;

        }

    });

    $("#mileage").keypress(function (e){

        if( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)){

            return false;

        }

    });

    $("#speed").keypress(function (e){

        if( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)){

            return false;

        }

    });

    $("#top_speed").keypress(function (e){

        if( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)){

            return false;

        }

    });



    // $(document).on("click",".googlebtn",function (){

    //     console.log("here");

    // $(".g-signin2").click();

    // });



    //     $(window).on('load', function () {

    //  $(".wait").hide();

    //  });

    //  $(".wait").click(function () {

    //  $(".wait").show();

    //  })

    function countDown(secs) {

        //console.log(secs);

        $('#email-rspond').html("Please wait for  "+secs+" seconds");

        if(secs < 1){

            clearTimeout(timer);

            $('#email-rspond').html( "<a  style='color: #e4001b;cursor:pointer;' id='resend_mail'>Resend Email</a>");

        }else{

            secs--;

            var timer = setTimeout('countDown('+secs+')',1000);

        }





    }



    $(document).on("submit",".user-registration",function(e){

        e.preventDefault();

        //alert("okay");

        var url=$(this).attr("action");

        var formdata=new FormData(this);

        var email = $("#email1").val();

        var pass1 = $("#password0").val();

        var pass2 = $("#password1").val();



        //  var pass_length = pass1.length;

        $("#hidden_email").val(email);

        // var goodColor = $("#password1").css("border-color","blue");

        if (pass1 !=null && pass1 != ''){

            if(pass1.length<8 ){

                $("#password-valid").html("Password must be 8 characters.");

                $("#password-valid").css({color:"#e4173e",display:"block"});

                $("#password0").css("border-color","#e4173e");

                $(".span-boorder").css("border-color","#e4173e");

                setTimeout(function(){

                        $(".span-boorder").css('border-color', '#ced4da');

                        $("#password0").css('border-color', '#ced4da');

                        $("#password-valid").css({display:'none',color:'#ced4da'});

                    },

                    5000);

                return false;



            }



        }

        if(pass1 !== pass2){

            $("#password1").css("border-color","#e4173e");

            $(".red-span-red").css("border-color","#e4173e");

            $("#confirm").html("The password is not matched.");

            $("#confirm").css({display:'block',color:'#e4173e'});

            setTimeout(function(){

                    $(".red-span-red").css('border-color', '#ced4da');

                    $("#password1").css('border-color', '#ced4da');

                    $("#confirm").css({display:'none',color:'#ced4da'});

                },

                5000);

            return false;



        }

        if(email === "" || pass1 === "" || pass2 ===""){

            $("#email1").css('border-color', '#e4173e');

            $("#email1").css('border-color', '#e4173e');

            $("#password0").css('border-color', '#e4173e');

            $("#password1").css('border-color', '#e4173e');

            $("#valdid").html("Invalid info.");

            $("#valdid").css({'color':'#e4173e','display':'block' });

            $(".input-red-border-span").css('border', '1px solid #e4173e');



            return false;

        }

        setTimeout(function(){

                $(".input-red-border-span").css('border-color', 'transparent');

                $("#password0").css('border-color', 'transparent');

                $("#password1").css('border-color', 'transparent');

                $("#valdid").css('display', 'none');

                $("#email1").css('border-color', 'transparent'); },

            5000);

        $("#register_loader").show();
$("#registerBTN").prop("disabled",true);

        $.ajax({

            method:"post",

            url:url,

            data:formdata,

            datatype:"json",

            cache: false,

            processData: false,

            contentType: false,

            success:function(data){

                if(data.status==1){

                    swal({

                        title: "Congraluations!",

                        text: data.result,

                        icon: "success",

                        button: "OK",

                    }).then(function(ok){
                        window.location.assign('https://powerperformancecars.co.uk/user/login')
                    });

                    //$("#signinbutton").click();

                    $('#email-rspond button').hide();

                    var sec=30;

                    countDown(sec);

                }

                else{

                    $("#valdid").html(data.result);

                    $("#valdid").css('display', 'block');

                    $("#valdid").css("color","red");

                    $("#email1").css('border-color', '#e4173e');

                    $("#email1").css('border-color', '#e4173e');

                }

                setTimeout(function(){

                        $(".input-red-border-span").css('border-color', 'transparent');

                        $("#password0").css('border-color', 'transparent');

                        $("#password1").css('border-color', 'transparent');

                        $("#valdid").css('display', 'none');

                        $("#email1").css('border-color', 'transparent'); },

                    5000);
     $("#registerBTN").prop("disabled",false);
                $("#register_loader").hide();
            },

            error:function(data){



            }





        });



    });

    $(document).on("click","#resend_mail",function(e){

        e.preventDefault();

        //   alert("okay");

        $("#email-rspond").html('<span>Please Wait...</span>');

        var email = $("#hidden_email").val();

        var url = '{{route('resend-mail',['mail'=>':email'])}}';

        url = url.replace(':email',email);

        $("#loader_resend").show();

        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });

        $.ajax({

            method:"post",

            url:url,

            DataType:"json",

            success:function(data){

                if(data.status==1){

                    swal({

                        title: "Congraluation!",

                        text: data.result,

                        icon: "success",

                        button: "ok",

                    });

                    //$("#signinbutton").click();

                    $('#email-rspond button').hide();

                    var sec=30;

                    countDown(sec);

                }else{



                    $("#email-rspond").html('<span>Something was Wrong</span>');

                }

                $("#loader_resend").hide();

            },

            error:function(data){



            }





        });



    });

    $(document).on("submit",".login_f",function(e){
    
       e.preventDefault();
      
      var email = $("#login-email").val();

        var password = $("#login-password").val();

        var url=$(this).attr("action");

        var formdata=new FormData(this);

            if(password === "" ||  email === ""){

            $("#login-email").css('border-color', '#e4173e');

            $("#login-password").css('border-color', '#e4173e');

            $("#login-form-validation").html("Invalid info.");

            $("#login-form-validation").css('color', '#e4173e');

            $(".red-border-input").css('border', '1px solid #e4173e');

            setTimeout(function(){

                    $(".red-border-input").css('border-color', '#ced4da');

                    $("#login-password").css('border-color', '#ced4da');

                    $("#login-email").css('border-color', '#ced4da'); },

                5000);



            return false;

        }

   $("#loader_sign_in").show();

        $.ajax({

            url:url,

            Datatype:"json",

            data:formdata,

            method:"post",

            cache: false,

            contentType: false,

            processData: false,

            success:function(data){

                console.log(data);

                if(data.status==1){

                    console.log(data);

                    if(data.g_route === "1"){

                        window.location= "{{route("garage")}}";

                    }else if(data.w_route === "swap"){
                      
                      var id =  btoa(data.s_id)  ;

                        var r_url  = "{{route('frontend-swap-cars',['s_id'=>':id'])}}";

                        r_url =    r_url.replace(":id",id);

                        window.location = r_url;

                    }else if(data.blog_route === "blog"){

                        window.location= "{{route("frontend-blog")}}";

                    }else if(data.auction_route === "Auction"){

                        var ac_id = btoa(data.ac_id);

                        var ac_url =  "{{route('car-details',['id'=>':a_id'])}}";

                        ac_url = ac_url.replace(":a_id",ac_id);

                        window.location=ac_url;

                    }else if(data.sell_car === "sell-your-car"){

                        var sell_url = "{{route('sell-your-car')}}";

                        window.location = sell_url;

                    }else if (data.chat_view === "chat_login"){
                    
                        window.location = "{{route('chat-view')}}";
                    }else {

                        window.location=data.result;

                    }



                }

                else{

                    $("#login-email").css('border-color', '#e4173e');

                    $("#login-password").css('border-color', '#e4173e');

                    $("#login-form-validation").html(data.result);

                    $("#login-form-validation").css('color', '#e4173e');

                    $(".red-border-input").css('border', '1px solid #e4173e');

                    setTimeout(function(){

                            $(".red-border-input").css('border-color', '#ced4da');

                            $("#login-password").css('border-color', '#ced4da');

                            $("#login-email").css('border-color', '#ced4da'); },

                        5000);





                }

             $("#loader_sign_in").hide();

            },

            error:function(data){



            }



        });

    });

    $(document).ready(

        setTimeout(function () {

            $("#div-cookie").css('display','flex')

        },10000)



    );



    // this script for cookie

    $(document).on("submit",".form-cookie",function (e) {

        e.preventDefault();

        var col = $("#cookie").val();

        var url=$(this).attr("action");

        var formdata=new FormData(this);

        $.ajax({

            method:"post",

            url:url,

            DataType:"json",

            data:formdata,

            cache: false,

            contentType: false,

            processData: false,



            success:function(data){

                if(data.status==1){

                    document.cookie="powerperformance_cookie="+ $("#cookie").val() +";'expires'='Thu, 18 Dec 2100 12:00:00 UTC; path=/'";

                    $("#div-cookie").css("display","none");

                    console.log("okay");

                    // window.location=location.reload();

                }

                else{

                    $("#div-cookie").css("display","flex");

                }



            },

            error:function(data){

                console.log(data);



            }



        });

    });





    $(document).on("click","#search",function(){

        var input = $("#search-input").val();

        if(input === ""){

            $("#search-input").css("border","1px solid #e4001b");

            $("#search").css("border","1px solid #e4001b");

            $("#search-span-valid").html("Please enter valid info.");

            $("#search-span-valid").css({color:"#e4001b",display:"block"});

            setTimeout(function(){

                    $("#search-input").css("border","1px solid #ced4da");

                    $("#search").css("border","1px solid #ced4da");

                    $("#search-span-valid").html("");

                    $("#search-span-valid").css({color:"#ced4da",display:"none"});



                },



                5000);

            //alert("please fill in the blank");

            return false;

        }



        var url="{{ route('search-post-index',['search_query'=>':query']) }}";

        url=url.replace(":query",input);

        window.location=url;

    });





    $(document).ready(function(data){

        $(document).on("submit",".a_search",function(e){

            e.preventDefault();

            var reg=$("#reg").val();

            var milage=$("#milage").val();

            if(reg == "" || milage == ""){



                $("#valid").html("Please enter full information.");

                $("#valid").css({"color":"#e4001b","font-size":"14px"});

                $("#valid").css("display","block");

                $("#reg").css("border-color","red");

                $("#milage").css("border-color","#e4173e");

                setTimeout(function(){

                        $("#valid").css("display","none");

                        $("#reg").css("border-color","#b3b3b3");

                        $("#milage").css("border-color","#b3b3b3");

                    },

                    5000);

                //alert("please fill all the field");

                return false;

            }



            $(".api_loader").show();

            var formdata=new FormData(this);

            var url=$(this).attr("action");

            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });

            $.ajax({

                method:"post",

                url:url,

                DataType:"json",

                data:formdata,

                cache: false,

                contentType: false,

                processData: false,

                success:function(data){

                    console.log(data);

                    if(data.status==1){

                        $(".api_loader").hide();

                        if(data.result['GetVehicleDataResult']){

                            window.location=data.url;

                        }else{

                            $("#valid").html("Please enter full information");

                            $("#valid").css("color","#e4173e");

                            $("#valid").css("display","block");

                            $("#reg").css("border-color","#e4173e");

                            $("#milage").css("border-color","#e4173e");



                            setTimeout(function(){

                                $("#valid").css("display","none");

                                $("#reg").css("border-color","#b3b3b3");

                                $("#milage").css("border-color","#b3b3b3");

                            },5000);

                        }

                    }else{

                        $(".api_loader").hide();

                        $("#valid").html("Please enter full information");

                        $("#valid").css("color","#e4173e");

                        $("#valid").css("display","block");

                        $("#reg").css("border-color","#e4173e");

                        $("#milage").css("border-color","#e4173e");



                        setTimeout(function(){

                                $("#valid").css("display","none");

                                $("#reg").css("border-color","#b3b3b3");

                                $("#milage").css("border-color","#b3b3b3");

                            },

                            5000);



                        //alert(data.result);

                    }



                },

                error:function(data){

                    console.log(data);



                }



            });

        });



    });



</script>



<script>

    var loadFilevideo = function(event) {

        var video1 = document.getElementById('vide1');

        video1.src = URL.createObjectURL(event.target.files[0]);

        var video2 = document.getElementById('vide2');

        video2.src = URL.createObjectURL(event.target.files[0]);

    };

</script>



<script>

    $(document).ready(function(e){

            // $resize = $('#image-preview').croppie({

            //     enableExif: true,

            //     enableOrientation: true,

            //     viewport: { // Default { width: 100, height: 100, type: 'square' }

            //         x:169,

            //         y:-11,

            //         width: 200,

            //         height: 140,

            //         type: 'square' //square



            //     },

            //     boundary: {

            //         x:169,

            //         y:-11,

            //         width: 300,

            //         height: 300

            //     }

            // });

            // this for garage croppersssss

        $resize_garage = $('#garage-image-preview').croppie({

            enableExif: true,

            enableOrientation: true,

            viewport: { // Default { width: 100, height: 100, type: 'square' }

                x:169,

                y:-11,

                width: 200,

                height: 200,

                type: 'square' //square

            },

            boundary: {

                x:169,

                y:-11,

                width: 300,

                height: 300

            }

        });

        // miscellaneous cropper

        $resize_misc = $('#misc-image-preview').croppie({

            enableExif: true,

            enableOrientation: true,

            viewport: { // Default { width: 100, height: 100, type: 'square' }

                x:169,

                y:-11,

                width: 200,

                height: 200,

                type: 'square' //square

            },

            boundary: {

                x:169,

                y:-11,

                width: 300,

                height: 300

            }

        });

//  swap cropper



        $resize_swap = $('#swap-image-preview').croppie({

            enableExif: true,

            enableOrientation: true,

            viewport: { // Default { width: 100, height: 100, type: 'square' }

                x:169,

                y:-11,

                width: 200,

                height: 200,

                type: 'square' //square

            },

            boundary: {

                x:169,

                y:-11,

                width: 300,

                height: 300

            }

        });







// this fo miscellanous



// this for swap

        $("#swap_file").change(function (e){

            $("#swap-image-preview").show();

            var reader = new FileReader();

            reader.onload = function (e) {

                $resize_swap.croppie('bind',{

                    url: e.target.result

                }).then(function(){

                    console.log('jQuery bind complete');

                });

            };

            reader.readAsDataURL(this.files[0]);

            var c=1;

            $("#s_p_1").removeAttr("src");

            $("#s_p_2").removeAttr("src");

            $("#s_p_3").removeAttr("src");

            for (var i = 0; i < 3; i++) {

                var image = document.getElementById('s_p_'+c);

                image.src = URL.createObjectURL(e.target.files[i]);

                c++;

            }

        });















        $("#wanted_image").click(function (e){

            e.preventDefault();

            $("#w_image").click();

        });

        $("#w_image").change(function (e){

            var image = document.getElementById('wanted_s_i');

            image.src = URL.createObjectURL(e.target.files[0]);

            $(".delete_w_p").show();

        });

        $(".delete_w_p").click(function (){

            $(this).hide();

            $("#w_image").val("");

            $("#wanted_s_i").removeAttr("src");

        });

 $(document).on("focus",".validate1",function(){

            $(this).removeClass("error");

        });
 
 $(document).on('click','.preview-img-btn',function(e){
            e.preventDefault();
            var publish = $(".published_or_not").val();

if (publish == 1){
    $(".published_or_not").val("1");
}else {
    $(".published_or_not").val("0");
}
            $("#user_car_s").trigger("submit");
        });
        $(document).on('click','#place_d',function(e){
            e.preventDefault();
$(".published_or_not").val("1");
            $(".published_or_not_update").val('');
            $("#user_car_s").trigger("submit");
        });
        $(document).on('click','.preview-img-btn-update',function(e){
            e.preventDefault();
            $(".published_or_not_update").val('3');
            var publish = $(".published_or_not").val();

            if (publish == 1){
                $(".published_or_not").val("1");
            }else {
                $(".published_or_not").val("0");
            }

            $("#user_car_s").trigger("submit");
        });
        

        $("#user_car_s").submit(function(e){

            e.preventDefault();

            var sell_deal_item=[];

            if($(this).find(".badge-info") !=0){

                $(this).find(".badge-info").each(function (){

                    sell_deal_item.push($(this).text());

                });

            }else{

            }

            var start_ac_tm = $("#Start_Date_Auction").val();

            var end_ac_tm = $("#End_Date_Auction").val();



           var daysBetween =   Math.round((new Date(end_ac_tm).getTime()-new Date(start_ac_tm).getTime())/86400000);



            if (daysBetween > 90){

                $("#modalAuctionTime").modal("show");

                return false

            }

            var t=this;

            var url=$(this).attr("action");

            var valid_v = '';

            $(".validation-category").each(function () {

                if ($(this).prop('checked') == true){

                    valid_v = $(this).val();

                    return;

                }

            });

            console.log(valid_v);

            if (valid_v == "Auction"){

                if ($('.validated-select-category').val() === "" ){

                    $('.validated-select-category').addClass("error");

                    $(".SelectModalCenterDashboard").modal("show");

                    return false;

                }



            }else if (valid_v == "Rent"){

                if ($('.valid-rent-category').val() === ""){

                    $('.valid-rent-category').addClass("error");

                    $(".SelectModalCenterDashboard").modal("show");

                    return false;

                }

            }else if (valid_v === ''){

                $(".SelectModalCategoryDashboard").modal("show");

                return false;

            }else {

                if ($('.valid-price-category').val() === ""){

                    $('.valid-price-category').addClass("error");

                    $(".SelectModalCenterDashboard").modal("show");

                    return false;

                }

            }

     

            var ent_array =[];

            $(".ent-modal-form").each(function () {

                if($(this).prop('checked') === true){

                    var ent = $(this).val();

                    ent_array.push(JSON.stringify(ent));

                }

            });

            var saf_array =[];

            $(".safe-modal-form").each(function () {

                if($(this).prop('checked') === true){

                    var safe = $(this).val();

                    saf_array.push(JSON.stringify(safe));

                }

            });
 var formdata=new FormData(t);



                formdata.append("tags",JSON.stringify(sell_deal_item));

                formdata.append("img",featured_image);

                formdata.append("en_f",ent_array);

                formdata.append("saf_f",saf_array);

          

                if(user_car_pic.length==0){

                   $("#CarImagesDashboard30").modal("show");
                   

                    return false;

                }
   if (featured_image === null){
       $("#CarImagesDashboardFeatured").modal("show");
           return false;
        }
                // if(user_video!=null){

                //     formdata.append("video",user_video);

                // }
console.log(JSON.stringify(user_car_pic));
                formdata.append("pic",JSON.stringify(user_car_pic));

                      $("#place_d").prop("disabled",true);

                $("#place_d").addClass("place_your_ad");

                $("#loader-dashboard").show();

                $.ajaxSetup({

                    headers: {

                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                    }

                });
                $.ajax({

                    url:url,

                    method:"post",

                    DataType:"json",

                    data:formdata,

                    cache: false,

                    contentType: false,

                    processData: false,

                    success:function(data){

                        if(data.status==1){

                            $(".aftreformfillmodal").modal('show');

                            $("#loader-dashboard").hide();

                            if(data.swap_route === "Swap"){

                                var id = $("#swap_id_dashboard").val();

                                id =  btoa(id);

                                var s_url = "{{route('frontend-swap-cars',['s_id'=>':id'])}}";

                                s_url = s_url.replace(":id",id);

                                setTimeout(function () {

                                    window.location = s_url;

                                },5000);



                            }else{

                                $("#status").css("color","green");

                                $("#status").html(data.msg);

                                setTimeout(function () {

                                    window.location=data.url;

                                },5000);



                            }

                        }else if (data.status==2){
                            // window.location.replace();
                            window.open(data.url, '_blank');
                            $("#id_form_change").val(data.id);
                            $('#user_car_s').attr('action', data.update);
                            $("#place_d").prop("disabled",false);
                            $(".preview-img-btn-update").prop("disabled",false);
                            $(".preview-img-btn").prop("disabled",false);
                            $("#loader-dashboard").hide();
                            $("#place_d").removeClass("place_your_ad");
                        }else if(data.status == 3){
                            //modal
             $(".ErrorMsgDashboardForm").modal('show');
             $("#error_msg_body_form").html(data.msg);

                        }else{

                            $("#loader-dashboard").hide();

                            $("#status").css("color","red");
    // $(".ErrorMsgDashboardForm").modal('show');
    //          $("#error_msg_body_form").html(data.msg);
                            $("#status").html(data.msg);

                            $("#place_d").prop("disabled",false);

                            $("#place_d").removeClass("place_your_ad");

                        }

                    }

                });





        });





    });







</script>

<script>

    $(document).ready(function (e) {

        $(document).on("click",".car_del",function (e) {

            var del=$(this).data("delete");

            swal({

                title: "Are you sure?",

                text: "Once deleted, you will not be able to recover this imaginary file!",

                icon: "warning",

                buttons: true,

                dangerMode: true,

            }).then((willDelete) => {

                if (willDelete) {

                    var url='{{route("del_car",["id"=>":id"])}}';

                    url=url.replace(":id",del);

                    var cur=$(this);

                    $.ajax({

                        url:url,

                        method:"get",

                        DataType:"json",

                        success:function(data){

                            console.log(data);

                            if(data.status==1){

                                cur.closest(".cardetail").remove();

                            }

                            else{

                                swal({

                                    icon: "error",

                                    text:data.msg,

                                });

                            }

                        }

                    });



                }

            });

        });



    });



    {{-- delet form garage advert --}}

    $(document).ready(function (e){

        $(document).on("click",".garage_del",function (e) {

            // $(".garage_del").click(function (e) {

            var del=$(this).data("delete");

            swal({

                title: "Are you sure?",

                text: "Once deleted, you will not be able to recover this imaginary file!",

                icon: "warning",

                buttons: true,

                dangerMode: true,

            }).then((willDelete) => {

                if (willDelete) {

                    var url='{{route("del_garage",["id"=>":id"])}}';

                    url=url.replace(":id",del);

                    var cur=$(this);

                    $.ajax({

                        url:url,

                        method:"get",

                        DataType:"json",

                        success:function(data){

                            console.log(data);

                            if(data.status==1){

                                cur.closest(".cardetail").remove();

                            }

                            else{

                                swal({

                                    icon: "error",

                                    text:data.msg,

                                });

                            }

                        }

                    });



                }

            });

        });



    });



    // this is for wanted section

    $(document).ready(function (e){

        $(document).on("click",".wanted_del",function (e) {

            // $(".wanted_del").click(function (e) {

            var del=$(this).data("delete");

            swal({

                title: "Are you sure?",

                text: "Once deleted, you will not be able to recover this imaginary file!",

                icon: "warning",

                buttons: true,

                dangerMode: true,

            }).then((willDelete) => {

                if (willDelete) {

                    var url='{{route("del_wanted",["id"=>":id"])}}';

                    url=url.replace(":id",del);

                    var cur=$(this);

                    $.ajax({

                        url:url,

                        method:"get",

                        DataType:"json",

                        success:function(data){

                            console.log(data);

                            if(data.status==1){

                                cur.closest(".cardetail").remove();

                            }

                            else{

                                swal({

                                    icon: "error",

                                    text:data.msg,

                                });

                            }

                        }

                    });



                }

            });

        });



    });

    // this for misc delete

    $(document).ready(function (e){

        $(document).on("click",".misecellinous_del",function (e) {

            // $(".misecellinous_del").click(function (e) {

            var del=$(this).data("delete");

            swal({

                title: "Are you sure?",

                text: "Once deleted, you will not be able to recover this imaginary file!",

                icon: "warning",

                buttons: true,

                dangerMode: true,

            }).then((willDelete) => {

                if (willDelete) {

                    var url='{{route("del_misc",["id"=>":id"])}}';

                    url=url.replace(":id",del);

                    var cur=$(this);

                    $.ajax({

                        url:url,

                        method:"get",

                        DataType:"json",

                        success:function(data){

                            console.log(data);

                            if(data.status==1){

                                cur.closest(".cardetail").remove();

                            }

                            else{

                                swal({

                                    icon: "error",

                                    text:data.msg,

                                });

                            }

                        }

                    });



                }

            });

        });



    });



    $("#plus").click(function() {

        event.preventDefault();

        if($("#number").val()===""){

            var y = 0

        }

        else{

            var y=$("#number").val();

        }

        y=parseInt(y);

        y += 1;

        $("#number").val(y);

    });

    $("#minus").click(function() {

        event.preventDefault();

        if($("#number").val()!==""){

            var m = parseInt($("#number").val());

            if(m!=0){

                m -= 1;

                $("#number").val(m);

            }



        }



    });

    $(document).on("click",".indicator_color,.carousel-control-next",function(e){

        var id;

        if($(this).data("slide")==="next"){

            $(".indicator_color").each(function(e){

                if($(this).hasClass("active")){

                    id=$(this).data("slide-to");

                    return false;

                }

            });

            $(".indicator_color").each(function (e){

                $(this).removeClass("active");

            });

            if($(".indicator_color").length-1 === id){

                id=0;

            }

            else{

                id=parseInt(id)+1;

            }

        }

        else{

            $(".indicator_color").each(function (e){

                $(this).removeClass("active");

            });

            id=$(this).data("slide-to");

        }

        $("#indicator_"+id).addClass("active");

    });





</script>

<script>

    var countChecked = function() {

        var n = $(".checkedchechkbox input:checked").length;

        $("#shownumber").text(n + (n === 1 ? " is" : " are"));

    };

    countChecked();

    $(".checkedchechkbox input[type=checkbox]").on("click", countChecked);

</script>

<script>

    function loadStepImg() {

        var image = document.getElementById('profilephoto1');

        image.src = URL.createObjectURL(event.target.files[0]);



    };

</script>

{{-- ajax for calling api --}}

<script>

    var model_api="";

    $("#detail").click(function(){

        var reg =$("#registernumber").val();

        var mileage =$("#mileage").val();

        //var color =$(#).val();

        if (reg === "") {

            $('#registernumber').css('border','1px solid #e4001b');

            $('.image_invalid').css('border','1px solid #e4001b');

            $('#registration_invalid_message').html("Please enter reg number.");

            $('#registration_invalid_message').css({color:"#e4001b",display:"block",bottom:"-1px"});

            setTimeout(function(){

                    $('#registernumber').css('border-color','#ced4da');

                    $('.image_invalid').css('border','transparent');

                    $('#registration_invalid_message').css("display","none"); },

                5000);

            return false;

        }

        if (mileage === ""){

            $('#mileage').css('border','1px solid #e4001b');

            $('#mileage_invalid_message').html("Please enter Mileage.");

            $('#mileage_invalid_message').css({color:"#e4001b",display:"block",fontSize:"15px"});

            setTimeout(function(){

                    $('#mileage').css('border-color','#ced4da');

                    $('#mileage_invalid_message').css("display","none"); },

                5000);

            return false;

        }

        $(".loader").show();

        $.ajax({



            method:"get",

            url:"{{ route("api.findcar")  }}"+"?reg="+reg+"&mileage="+mileage,

            DataType:"json",

            success:function(data){

//console.log(data.result['GetVehicleDataResult']['VehicleRegistration']['VRM']);

                if(data.status==1){



                    if(data.result){

                        var r_s=data.result['GetVehicleDataResult']['VehicleRegistration']['Model'];

                        r_s=r_s.replace(/\s/g, "");

                        console.log(r_s);

                        //console.log(data.result['GetVehicleDataResult']['VehicleRegistration']['Model']);

                        $("#"+r_s).prop("selected",true);

                        $("#"+data.result['GetVehicleDataResult']['VehicleRegistration']['Colour']).prop("selected",true);

                        $("#registernumber").val(data.result['GetVehicleDataResult']['VehicleRegistration']['VRM']);

//$("#title-api").val(data.result['GetVehicleDataResult']['VehicleRegistration']['MakeModel']);



//$("#DIESEL").val(data.result['GetVehicleDataResult']['VehicleRegistration']['Fuel']).prop("selected",true);

//$("#mileage").val(data.result['GetVehicleDataResult']['MileageDetails']['InputMileage']);

                        $("#enginesize").val(data.result['GetVehicleDataResult']['VehicleRegistration']['EngineCapacity']);

                        $("#fuel_type option[value='"+data.result['GetVehicleDataResult']['VehicleRegistration']['Fuel'] +"']").prop("selected",true);

                        $("#year_mani option[value='"+data.result['GetVehicleDataResult']['VehicleRegistration']['YearOfManufacture'] +"']").prop("selected",true);

                        console.log(data.result['GetVehicleDataResult']['VehicleRegistration']['Transmission']);

                        if (data.result['GetVehicleDataResult']['VehicleRegistration']['Transmission'] === "UNKNOWN"){

                            $("#transmission_api option[value='Other']").prop("selected",true);

                        }else{

                            $("#transmission_api option[value='"+data.result['GetVehicleDataResult']['VehicleRegistration']['Transmission'] +"']").prop("selected",true);

                        }

                        var brand =data.result['GetVehicleDataResult']['VehicleRegistration']['Make'];

                        brand = brand.toLowerCase().replace(/\b[a-z]/g, function(letter) {

                            return letter.toUpperCase();

                        });

                        $("#make_manuaf option[data-val='"+brand+"']").prop("selected",true);

                        if ($("#make_manuaf option[data-val='"+brand+"']").prop("selected")===true) {

                            $(".brand-select-base").trigger("change");

                        }

                        model_api =data.result['GetVehicleDataResult']['VehicleRegistration']['Model'];

                        // model = model.toLowerCase().replace(/\b[a-z]/g, function(letter) {

                        //     return letter.toUpperCase();

                        // });

                        // console.log(model,$("#model_api option[data-val='"+model+"']"));

                        // $("#model_api option[data-val='"+model+"']").prop("selected",true);

                        // if ($("#model_api option[data-val='"+model+"']").prop("selected")===true){

                        //

                        // }



                        //$("#model").val(data.result['GetVehicleDataResult']['VehicleRegistration']['Model']);

                        $("#car_type option[value='"+data.result['GetVehicleDataResult']['MCIAMotorcycleData']['VehicleType'] +"']").prop("selected",true);

// if (data.result['GetVehicleDataResult']['MCIAMotorcycleData']['VehicleType'] === "UNKNOWN"){

//             $("#car_type option[value='Other']").prop("selected",true);

//         }else{

//             $("#transmission_api option[value='"+data.result['GetVehicleDataResult']['VehicleRegistration']['Transmission'] +"']").prop("selected",true);

//         }

                        // Imported

                        //  $("#transmission_api option[value='"+data.result['GetVehicleDataResult']['VehicleRegistration']['Transmission'] +"']").prop("selected",true);

                        if (data.result['GetVehicleDataResult']['VehicleRegistration']['Imported'] === 'NotImported'){

                            $("#import option[value='No']").prop("selected",true);

                        }else{

                            $("#import option[value='Yes']").prop("selected",true);

                        }

                        $("#car-door option[value='"+data.result['GetVehicleDataResult']['VehicleRegistration']['SeatingCapacity'] +"']").prop("selected",true);

                        $("#color").val(data.result['GetVehicleDataResult']['VehicleRegistration']['Colour']);

//$("#bhp").val(data.result['GetVehicleDataResult']['VehicleRegistration']['EngineCapacity']);



                    }

                    else{

                        $('#registernumber').css('border','1px solid #e4001b');

                        $('.image_invalid').css('border','1px solid #e4001b');

                        $('#registration_invalid_message').html("Reg num not found enter manually.");

                        $('#registration_invalid_message').css({color:"red",display:"block",bottom:"-1px",fontSize:"15px"});

                        setTimeout(function(){

                                $('#registernumber').css('border-color','#ced4da');

                                $('.image_invalid').css('border','transparent');

                                $('#registration_invalid_message').css("display","none"); },

                            5000);

                        $('#mileage').css('border','1px solid #e4001b');

                        $('#mileage_invalid_message').html("Mileage not found.");

                        $('#mileage_invalid_message').css({color:"#e4001b",display:"block",bottom:"-11px",fontSize:"15px"});

                        setTimeout(function(){

                                $('#mileage').css('border-color','#ced4da');

                                $('#mileage_invalid_message').css("display","none"); },

                            5000);







                    }

                }

                else{

                    if (mileage === ""){

                        $('#mileage').css('border','1px solid #e4001b');

                        $('#mileage_invalid_message').html("Please enter Mileage.");

                        $('#mileage_invalid_message').css({color:"#e4001b",display:"block",bottom:"-11px",fontSize:"15px"});

                        setTimeout(function(){

                                $('#mileage').css('border-color','#ced4da');

                                $('#mileage_invalid_message').css("display","none"); },

                            5000);

                        return false;

                    }else {

                        $('#mileage').css('border','1px solid #e4001b');

                        $('#mileage_invalid_message').html("Mileage not found.");

                        $('#mileage_invalid_message').css({color:"#e4001b",display:"block",bottom:"-11px",fontSize:"15px"});

                        setTimeout(function(){

                                $('#mileage').css('border-color','#ced4da');

                                $('#mileage_invalid_message').css("display","none"); },

                            5000);

                    }

                    if (reg === "") {

                        $('#registernumber').css('border','1px solid #e4001b');

                        $('.image_invalid').css('border','1px solid #e4001b');

                        $('#registration_invalid_message').html("Please enter reg number.");

                        $('#registration_invalid_message').css({color:"#e4001b",display:"block",bottom:"-1px"});

                        setTimeout(function(){

                                $('#registernumber').css('border-color','#ced4da');

                                $('.image_invalid').css('border','transparent');

                                $('#registration_invalid_message').css("display","none"); },

                            5000);

                    }else {

                        $('#registernumber').css('border','1px solid #e4001b');

                        $('.image_invalid').css('border','1px solid #e4001b');

                        $('#registration_invalid_message').html("Reg num not found enter manually.");

                        $('#registration_invalid_message').css({color:"#e4001b",display:"block",bottom:"-1px",fontSize:"15px"});

                        setTimeout(function(){

                                $('#registernumber').css('border-color','#ced4da');

                                $('.image_invalid').css('border','transparent');

                                $('#registration_invalid_message').css("display","none"); },

                            5000);

                    }





                }

                $(".loader").hide();

            },

            error:function(data){



            }



        });

    });

    $("#speed").change(function (e){

        if( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)){

            var val = $("#speed").val();

            if(val.length < 10) {

                alert("Value must contain 10 characters.");

                $(this).focus();

            }

            return false;

        }





    });

    $("#carsellarnext1").click(function() {

        var val = $("#number").val();

        if (val === ""){

            $("#number").css("borderColor","#e4001b");

        }



    });

    $(document).on("submit","#add_garage_advert",function (e){

        e.preventDefault();

        var formdata=new FormData(this);

        var url=$(this).attr("action");

        var img = $("#garage_image").val();

        var c_mail = $("#company_mail").val();

        var tags = $("#inputTags").val();

        var descr = $("#des_garage").val();

        var c_name = $("#company_name").val();

        var c_numb = $("#company_numb").val();

        var deal_item=[];

        if($(this).find(".badge-info") !=0){

            $(this).find(".badge-info").each(function (){

                deal_item.push($(this).text());

            });

        }else{



        }
             if ($(".contact_number_dashboard3").val().length === 11){

                $(".contact_pattern1").show();

                $(".contact_pattern1").html('Valid Contact Number');

                $(".contact_pattern1").css('color','green');

                setTimeout(function () {

                    $(".contact_pattern1").hide();

                },5000);



            }else{

                $(".contact_pattern1").show();

                $(".contact_number_dashboard3").addClass('error');

                $(".contact_pattern1").html('InValid Contact Number');

                $(".contact_pattern1").css('color','#e4001b');

                setTimeout(function () {

                    $(".contact_pattern1").hide();

                },5000);

                return false;

            }

        var t=this;

        // $resize_garage.croppie('result', {

        //     type: 'canvas',

        //     size: 'viewport'

        // }).then(function (img) {  });

            var formdata = new FormData(t);

            // if ($("#file1").val() !== ""){

            //     formdata.append("img",img);

            // }

            if(garage_car_pic.length==0){

                $(".SelectWantedImageDashboard").modal("show");

                // alert("please add picture");

                return false;

            }
if (cover_image.length==0){
                $(".SelectWantedImageDashboard").modal("show");
                return false;
            }
            formdata.append("image",JSON.stringify(garage_car_pic));
  formdata.append("img",cover_image);
            formdata.append("tags",JSON.stringify(deal_item));

            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });

             $('#garage_btn_advert').prop("disabled",true);

            $("#garage_loader").show();

            $.ajax({

                url:url,

                method:"post",

                DataType:"json",

                data:formdata,

                cache: false,

                contentType: false,

                processData: false,

                success:function(data){

                    if(data.status==1){

                        $("#garage_loader").hide();

                        $("#garage_status").css({backgroundColor:"#d4edda",textAlign:"center",display:"block"});

                        $("#garage_status").html(data.msg);

                        window.location="{{route("garage-list")}}";



                    }else{

                         $('#garage_btn_advert').prop("disabled",false);

                        $("#garage_loader").hide();

                        $("#status_g").css({backgroundColor:"#f8d7da",textAlign:"center",display:"block "});

                        $("#status_g").html(data.msg);

                        //  console.log(data.msg);

                        $("#place_d").prop("disabled",false);

                        $("#place_d").removeClass("place_your_ad");



                    }



                }

            });

      

    });

    $(document).on("submit","#add_wanted",function (e){

        e.preventDefault();

        var w_deal_item=[];

        if($(this).find(".badge-info") !=0){

            $(this).find(".badge-info").each(function (){

                w_deal_item.push($(this).text());

            });

        }else{

        }

        if ($("#contact_Checkbox").prop("checked") === true){

            // var valid_phone = /([4]{2}-[0-9]{2}-[0-9]{4}-[0-9]{4})/;

            // if (valid_phone.test($("#input_contact").val()) === false){

            //     $(".contact_pattern").show();

            //     $("#input_contact").addClass("error");

            //     return false;

            // }

            if ($("#input_contact").val().length === 11){

                $(".contact_pattern").show();

                $(".contact_pattern").html('Valid Contact Number');

                $(".contact_pattern").css('color','green');

                setTimeout(function () {

                    $(".contact_pattern").hide();

                },5000);



            }else{

                $(".contact_pattern").show();

                $("#input_contact").addClass('error');

                $(".contact_pattern").html('Invalid Contact Number');

                $(".contact_pattern").css('color','#e4001b');

                setTimeout(function () {

                    $(".contact_pattern").hide();

                },5000);

                return false;

            }

            // var contact = $("#input_contact").val();

            // if(contact === ""){

            //   $(".SelectWantedImageDashboard").modal('show');

            //     $("#input_contact").css("border","1px solid red");

            //     return false;

            // }

        }else {

            $("#input_contact").val("");

        }

        var formdata=new FormData(this);

        var url=$(this).attr("action");

        if(wanted_car_pic==null){

            $(".SelectWantedImageDashboard").modal('show');

            return false;

        }

        formdata.append("w_image",wanted_car_pic);

        formdata.append("tags",JSON.stringify(w_deal_item));

        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });

        $("#wanted_loader").show();



        $.ajax({

            url:url,

            method:"post",

            DataType:"json",

            data:formdata,

            cache: false,

            contentType: false,

            processData: false,

            success:function(data){

                console.log(data.url);

                if(data.status==1){

                    $("#status").css({backgroundColor:"#d4edda",textAlign:"center",display:"block"});

                    $("#status").html(data.msg);

                    $("#wanted_loader").hide();

                    //$("#add_wanted").trigger("reset");

                    // document.getElementById("powersCar").click();

                    // document.getElementById("v-pills-wanted-section-tab").click();

                    window.location="{{route("wanted-list")}}";

                    //  alert("okay");

                    //    window.location=data.url;



                }

                else{

                    $("#wanted_loader").hide();

                    $("#status_wanted").css({backgroundColor:"#f8d7da",textAlign:"center",display:"block"});

                    $("#status_wanted").html(data.msg);

                    $("#place_d").prop("disabled",false);

                    $("#place_d").removeClass("place_your_ad");

                }

            }

        });

    });





    //this for badge delete

    $(document).on("click", "#badge_remove",function (e){

        e.preventDefault();

        $(e.currentTarget.parentElement).remove();

    });







    //miscellanous add

    $(document).on("submit","#add_misc_advert",function (e){

        e.preventDefault();

        var m_deal_item=[];

        if($(this).find(".badge-info") !=0){

            $(this).find(".badge-info").each(function (){

                m_deal_item.push($(this).text());

            });

        }else{

        }

        if($("#misc_Checkbox").prop("checked")=== true){

            // var valid_phone = /([4]{2}-[0-9]{2}-[0-9]{4}-[0-9]{4})/;

            // console.log(valid_phone.test($(".contact_number_dashboard1").val()));

            //valid_phone.test($(".contact_number_dashboard1").val()) === false

            if ($(".contact_number_dashboard1").val().length === 11){

                $(".contact_pattern").show();

                $(".contact_pattern").html('Valid Contact Number');

                $(".contact_pattern").css('color','green');

                setTimeout(function () {

                    $(".contact_pattern").hide();

                },5000);



            }else{

                $(".contact_pattern").show();

                $(".contact_number_dashboard1").addClass('error');

                $(".contact_pattern").html('InValid Contact Number');

                $(".contact_pattern").css('color','#e4001b');

                setTimeout(function () {

                    $(".contact_pattern").hide();

                },5000);

                return false;

            }

        }

        var formdata=new FormData(this);

        var url=$(this).attr("action");

        var t=this;

            
        $resize_misc.croppie('result', {

            type: 'canvas',

            size: 'viewport'

        }).then(function (img) {

            var formdata = new FormData(t);

            if ($("#file_misc").val() !== ""){

                formdata.append("img",img);

            }

         
   formdata.append("image",JSON.stringify(mis_car_pic));

   formdata.append("tags",JSON.stringify(m_deal_item));
   console.log(mis_car_pic);
            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });

            $("#misc_loader").show();
            $("#misc_create_btn").prop("disabled",true);

            $.ajax({

                url:url,

                method:"post",

                DataType:"json",

                data:formdata,

                cache: false,

                contentType: false,

                processData: false,

                success:function(data){

                    if(data.status==1){

                        $("#misc_loader").hide();

                        // $("#garage_status").css({backgroundColor:"#d4edda",textAlign:"center",display:"block"});

                        // $("#garage_status").html(data.msg);

                        window.location="{{route("misc-list")}}";

 $("#misc_create_btn").prop("disabled",false);

                    }else{
 $("#misc_create_btn").prop("disabled",false);
                        $("#misc_loader").hide();

                        $("#status_m").css({backgroundColor:"#f8d7da",textAlign:"center",display:"block "});

                        $("#status_m").html(data.msg);

                        //  console.log(data.msg);

                        $("#place_d").prop("disabled",false);

                        $("#place_d").removeClass("place_your_ad");



                    }



                }

            });

        });

    });



    // swap create

    $(document).on("submit","#add_swap_car",function (e){

        e.preventDefault();

        var t= this;

        var formdata=new FormData(this);

        var url=$(this).attr("action");



        $resize_swap.croppie('result', {

            type: 'canvas',

            size: 'viewport'

        }).then(function (img) {

            var formdata = new FormData(t);

            formdata.append("img",img);

            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });

            $("#loader-dashboard").show();



            $.ajax({

                url:url,

                method:"post",

                DataType:"json",

                data:formdata,

                cache: false,

                contentType: false,

                processData: false,

                success:function(data){

                    if(data.status==1){

                        $("#loader-dashboard").hide();

                        $("#swap_err").css({display:"none"});

                        $("#swap_pricing_tab").click();

                        $("#append_swap").remove();

                        $("#swap_id").val(data.result['id']);

                        var c_img = data.result["featured_img"];

                        var img =        '{{asset("/public/crop_images/".":image")}}';

                        img = img.replace(":image",c_img);

                        var apend = '<div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 p-0" id="append_swap">' +

                            '<div class="card" >' +

                            '<div class="card-header p-0">' +

                            '<h3>'+data.result["model"]+'</h3>' +

                            '<p>'+data.result["manufacture"]+','+data.result["car_type"]+','+data.result["engine_type"]+'</p>' +

                            '</div>' +

                            '<div class="cardimageswap-car">' +

                            '<img class="card-img-top" src="'+img+'" alt="Card image cap">' +

                            '</div>' +

                            '<div class="card-body p-0">' +

                            '<div class="row">' +

                            '<div class="col-12 carworth">Your Car Worth</div>' +

                            '<div class="col-12">' +

                            '<div class="  carspecspric">' +

                            data.result['price'] +

                            '</div></div>' +

                            '<div class="col-12"><hr></div>' +

                            '<div class="col-12 summarybilldetail edit" id="swap_edit"> Edit</div>' +

                            '</div>' +

                            '<div class="row summarysection">' +

                            '<div class="col-12 summaryheading">' +

                            '<i class="fas fa-file-alt"></i>Car Summary' +

                            '</div>' +

                            '<div class="col-6 summarybillheading " >Model:</div>' +

                            '<div class="col-6 summarybilldetail">'+data.result["model"]+'</div>' +

                            '<div class="col-12"><hr></div>' +

                            '<div class="col-6 summarybillheading " >Car Condition:</div>' +

                            '<div class="col-6 summarybilldetail">'+data.result["car_condition"]+'</div>' +

                            '<div class="col-12"><hr></div>' +

                            '<div class="col-6 summarybillheading " >Car Make:</div>' +

                            '<div class="col-6 summarybilldetail">'+data.result["car_make"]+'</div>' +

                            '<div class="col-12"><hr></div>' +

                            '<div class="col-6 summarybillheading " >Car Type:</div>' +

                            '<div class="col-6 summarybilldetail">'+data.result["car_type"]+'</div>' +

                            '<div class="col-12"><hr></div>' +

                            '<div class="col-6 summarybillheading " >Color:</div>' +

                            '<div class="col-6 summarybilldetail">'+data.result["color"]+'</div>' +

                            '<div class="col-12"><hr></div>' +

                            '<div class="col-6 summarybillheading " >Engine Type:</div>' +

                            '<div class="col-6 summarybilldetail">'+data.result["engine_type"]+'</div>' +

                            '<div class="col-12"><hr></div>' +

                            '<div class="col-6 summarybillheading " >Fuel type:</div>' +

                            '<div class="col-6 summarybilldetail">'+data.result["fuel_type"]+'</div>' +

                            '<div class="col-12"><hr></div>' +

                            '<div class="col-6 summarybillheading " >Manifacture:</div>' +

                            '<div class="col-6 summarybilldetail">'+data.result["manufacture"]+'</div>' +

                            '<div class="col-12"><hr></div>' +

                            '</div>' +

                            '</div>' +

                            '</div>' +

                            '</div>';

                        $(".append_Swap_class").prepend(apend);









                    }else if(data.status==2){

                        $('#LoginModalSwap').trigger('focus');

                        $('#LoginModalSwap').modal({backdrop: 'static', keyboard: false});

                        $('#LoginModalSwap').modal('show');



                        $("#loader-dashboard").hide();

                    }else{

                        $("#swap_err").css({backgroundColor:"#f8d7da",textAlign:"center",display:"block "});

                        $("#swap_err").html(data.msg);

                        $("#loader-dashboard").hide();

                    }

                }

            });

        });

    });

    $(document).on("submit","#footer-mail",function (e){

        e.preventDefault();



        var url = $(this).attr('action');

       var formdata = new FormData(this);

        $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });

        $("#mail-loader-footer").show();



            $.ajax({

                url:url,

                method:"post",

                DataType:"json",

                data:formdata,

                cache: false,

                contentType: false,

                processData: false,

                success:function(data){

                    if(data.status==1){

                        $("#mail-loader-footer").hide();

                        $("#footer-mail-input").css("border","green");

                        $("#footer-mail-span").css('color','green');

                        $("#footer-mail-span").html(data.result);

                    }else if (data.status==2){

                        $("#footer-mail-input").css("border","1px solid #e4001b");

                        $("#mail-loader-footer").hide();

                        $("#footer-mail-span").css('color','#FFFFFF');

                        $("#footer-mail-span").html(data.result);

                    }else{

                        $("#footer-mail-input").css("border","1px solid #e4001b");

                        $("#footer-mail-span").css('color','#FFFFFF');

                        $("#footer-mail-span").html(data.result);

                        $("#mail-loader-footer").hide();



                    }

                    setTimeout(function () {

                        $("#footer-mail-input").css("border","transparent");

                        $("#footer-mail-span").html('');

                    },5000);

                }

            });



    });

    $(document).on("click","#swap_edit",function (e) {

        e.preventDefault();

        $("#swap_car_details").click();

    });

    // wanted page lght box

    $(".wanted-img-lightbox").click(function(){

        var image_store=$(this).attr('src');

        $(".show12").fadeIn();

        $(".img-show img").attr("src", image_store);

    })



     $(".wanted-img-lightbox-a").click(function(){

        //   var image_store_a=$(this).closest("row .wanted-img-lightbox").attr('src');

            var image_store_a=$(this).children("img").attr('src');

            console.log(image_store_a);

            $(".show12").fadeIn();

            $(".img-show img").attr("src", image_store_a);

        });



    //Light box Custom Made

    $(".newimagesliderproduct").on("click" ,function(e) {

        if ($(window).width() > 580) {



            var src = $(this).find("img").attr("src");

            console.log(src);

            $(".show12").fadeIn();

            $(".img-show img").attr("src", src);

            $("body").css("overflow-y","hidden");

            if($(".show12").fadeIn()){

                $(window).keydown(function (e){



                    var keyCode = e.keyCode || e.which;

                    if(e.keyCode == 37 ){

                        $(".back-prev-arrow").trigger('click');

                    }

                    if(e.keyCode == 39 ){

                        $(".next-next-arrow").trigger('click');

                    }



                });



            }









        }

    });







    $('#newslick').on('afterChange', function(e) {

        var dataId = $('.slick-current').attr("data-slick-index");

        var newsrc = $('div[data-slick-index="' + dataId + '"] img').attr("src");

        $(".img-show img").attr("src", newsrc);

        console.log(dataId);

    });



    $(".closewindow,.overlay").click(function() {

        if ($(window).width() > 580) {



            $(".show12").fadeOut();

            $("body").css("overflow-y","visible");

        }

    });





    $(".leftnewarrow").on("click ",function(e) {



        $(".back-prev-arrow").trigger('click');

        e.preventDefault();

    });



    $(".rightnewarrow").click(function(e) {

        $(".next-next-arrow").trigger('click');

        e.preventDefault();



    });

    // $(document).on("click","#video-upload",function (e) {

    //

    //     $("#video2").css("display","block");

    //

    // });

    $(document).on("submit","#new-password-register",function (e){

        e.preventDefault();

        var formdata=new FormData(this);

        var url=$(this).attr("action");

        var pass1 = $("#rpassword0").val();

        var pass2 = $("#rpassword1").val();

        console.log(pass1,pass2);

        //  var pass_length = pass1.length;

        // var goodColor = $("#password1").css("border-color","blue");

        if (pass1 !=null && pass1 != ''){

            if(pass1.length<8 ){

                $("#password-valid").html("Password must be 8 characters.");

                $("#password-valid").css({color:"#e4173e",display:"block"});

                $("#rpassword0").css("border-color","#e4173e");

                $(".span-boorder").css("border-color","#e4173e");

                setTimeout(function(){

                        $(".span-boorder").css('border-color', '#ced4da');

                        $("#rpassword0").css('border-color', '#ced4da');

                        $("#password-valid").css({display:'none',color:'#ced4da'});

                    },

                    5000);

                return false;



            }

        }

        if(pass1 !== pass2){

            $("#rpassword1").css("border-color","#e4173e");

            $(".red-span-red").css("border-color","#e4173e");

            $("#confirm").html("The password is not matched.");

            $("#confirm").css({display:'block',color:'#e4173e'});

            setTimeout(function(){

                    $(".red-span-red").css('border-color', '#ced4da');

                    $("#rpassword1").css('border-color', '#ced4da');

                    $("#confirm").css({display:'none',color:'#ced4da'});

                },

                5000);

            return false;



        }

        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });

        $("#new-password-loader").show();

        $.ajax({

            url:url,

            method:"post",

            DataType:"json",

            data:formdata,

            cache: false,

            contentType: false,

            processData: false,

            success:function(data){

                if(data.status==1){

                    $("#new-password-loader").hide();

                    // $("#garage_status").css({backgroundColor:"#d4edda",textAlign:"center",display:"block"});

                    // $("#garage_status").html(data.msg);

                    $("#confirm").html(data.msg);

                    $("#confirm").css({display:'block',color:'green'});

                    window.location =data.result;



                }else{

                    $("#new-password-loader").hide();

                    $("#confirm").html(data.msg);

                    $("#confirm").css({display:'block',color:'#e4173e'});



                }



            }

        });



    });
    $(document).on("click",".delete_dash_pics",function (e){
        e.preventDefault();

        var img =   $(this).data('pic');
        var id = $(this).data('index');
        document.getElementById(img).remove();

        console.log(id);
        delete user_car_pic[id];
        // array.splice(user_car_pic,id);
        console.log(user_car_pic);
        $(this).remove();
    });
    function fixStepIndicator(n){
        if (n === 0){
            $(".step1").addClass("active");
            $(".step2").removeClass("active");
            $(".step3").removeClass("active");
        }else if (n === 2){
            $(".step1").removeClass("active");
            $(".step2").addClass("active");
            $(".step3").removeClass("active");
        }else if (n === 3){
            $(".step1").removeClass("active");
            $(".step2").removeClass("active");
            $(".step3").addClass("active");
        }

    }

</script>
<script>

    var newcropimg;

    // $(".gambar").attr("src", "https://user.gadjian.com/static/images/personnel_boy.png");

    var $uploadCrop,

        tempFilename,

        rawImg,

        imageId;

    function readFile(input) {
        if (input) {

            var reader = new FileReader();

            reader.onload = function (e) {

                $('.upload-demo').addClass('ready');

                $('#cropImagePop').modal('show');

                rawImg = e.target.result;

            }

            reader.readAsDataURL(input.files[0]);

        }else{

            swal("Sorry - you're browser doesn't support the FileReader API");

        }

    }



    $uploadCrop = $('#upload-demo').croppie({

        viewport: {

            width: 200,

            height: 250,

        },

        enforceBoundary: false,

        enableExif: true

    });

    $('#cropImagePop').on('shown.bs.modal', function(){

        // alert('Shown pop');

        $uploadCrop.croppie('bind', {

            url: rawImg

        }).then(function(){

            console.log('jQuery bind complete');

        });

    });

 

    $('.item-img').on('change', function () {



        imageId = $(this).data('id');

        newcropimg = $(this);

        tempFilename = $(this).val();

        $('#cancelCropBtn').data('id', imageId); readFile(this); });

    $('#cropImageBtn').on('click',function (ev) {
        $("#place_d").prop("disabled",true);
        $("#loader-dashboard").show();
        var cur=$(this);
        $uploadCrop.croppie('result', {

            type: 'base64',

            format: 'jpeg',

            size: {width: 150, height: 200}

        }).then(function (resp){

            newcropimg.closest(".cabinet").find('img').attr('src',resp);
            var byteString = atob(resp.split(',')[1]);
            var ab = new ArrayBuffer(byteString.length);
            var ia = new Uint8Array(ab);

            for (var i = 0; i < byteString.length; i++) {
                ia[i] = byteString.charCodeAt(i);
            }
            blob=new Blob([ab], { type: 'image/jpeg' });
            upload(blob,cur,"featured_photo");
            console.log(resp);
            $('#cropImagePop').modal('hide');

        });

    });

</script>
{{--<script>--}}
    {{--function openModal() {--}}
        {{--document.getElementById("myModal").style.display = "block";--}}
    {{--}--}}

    {{--function closeModal() {--}}
        {{--document.getElementById("myModal").style.display = "none";--}}
    {{--}--}}

    {{--var slideIndex = 1;--}}
    {{--showSlides1(slideIndex);--}}

    {{--function plusSlides1(n) {--}}
        {{--showSlides1(slideIndex += n);--}}
    {{--}--}}

    {{--function currentSlide1(n) {--}}
        {{--showSlides1(slideIndex = n);--}}
    {{--}--}}

    {{--function showSlides1(n) {--}}
        {{--var i;--}}
        {{--var slides1 = document.getElementsByClassName("mySlides_modal");--}}
        {{--if (n > slides1.length) {slideIndex = 1}--}}
        {{--if (n < 1) {slideIndex = slides1.length}--}}
        {{--for (i = 0; i < slides1.length; i++) {--}}
            {{--slides1[i].style.display = "none";--}}
        {{--}--}}
        {{--slides1[slideIndex-1].style.display = "block";--}}

    {{--}--}}
{{--</script>--}}

{{--<script>--}}
    {{--var slideIndex1 = 1;--}}
    {{--showSlides(slideIndex1);--}}

    {{--function plusSlides(n) {--}}
        {{--showSlides(slideIndex1 += n);--}}
    {{--}--}}

    {{--function currentSlide(n) {--}}
        {{--showSlides(slideIndex1 = n);--}}
    {{--}--}}

    {{--function showSlides(n) {--}}
        {{--var i;--}}
        {{--var slides = document.getElementsByClassName("mySlides");--}}
        {{--if (n > slides.length) {slideIndex1 = 1}--}}
        {{--if (n < 1) {slideIndex1 = slides.length}--}}
        {{--for (i = 0; i < slides.length; i++) {--}}
            {{--slides[i].style.display = "none";--}}
        {{--}--}}

        {{--slides[slideIndex1-1].style.display = "block";--}}

    {{--}--}}
{{--</script>--}}



<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAddbxUhXJYrPqsX24kbEhFR1cJg37U2vA&libraries=places&callback=initAutocomplete" async defer></script>
<script src="{{ config('app.ui_asset_url').'frontend/js/axios.js' }}"></script>

@include('frontend.partials.axios')

@include('frontend.partials.scripts')



</body>



</html>

