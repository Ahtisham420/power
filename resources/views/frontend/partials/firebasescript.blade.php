@php $images=10 @endphp
@if(!empty(session('userDetails')) && !empty($user_package))
    @php
    if (!empty($user_package->package_id)){
    $packages = App\Package::find($user_package->package_id);
    }

         if (!empty($packages) && $packages->name === "Basic"){
           $images = 10;
        }elseif (!empty($packages) && $packages->name === "Standard"){
  $images = 20;
        }elseif (!empty($packages) && $packages->name === "Trader"){
          $images = 25;
        }elseif (!empty($packages) && $packages->name === "American Muscels"){
          $images = 25;
        }elseif (!empty($packages) && $packages->name === "Garage Services"){
          $images = 30;
        }elseif (!empty($packages) && $packages->name === "Rental"){
          $images = 30;
        }

    @endphp
@endif

<script src="https://www.gstatic.com/firebasejs/8.6.3/firebase-app.js"></script>

<script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-app.js"></script>

<script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-analytics.js"></script>

<script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-storage.js"></script>

<script src="https://www.gstatic.com/firebasejs/7.0.0/firebase-firestore.js"></script>

<script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyCr_8rMS3SijrhfOINnX8Xg4tPn4uy3N3o",
        authDomain: "power-performance-cars.firebaseapp.com",
        projectId: "power-performance-cars",
        storageBucket: "power-performance-cars.appspot.com",
        messagingSenderId: "630697500725",
        appId: "1:630697500725:web:e3fad11d6f766ff6b5517c"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();
</script>

<script>


    var user_car_pic=[];

    var user_video=null;

    var wanted_car_pic=null;

    var profile_photo = null;

    var mis_car_pic=[];

    var garage_car_pic=[];
    var featured_image=null;
  var cover_image =null ;
    @if(!empty($update->pic_url))

            @php $pic_url = json_decode($update->pic_url) @endphp

            @foreach($pic_url as $key => $pic)

        user_car_pic["{{$key}}"]="{{$pic}}";

    @endforeach

            @endif

            @if(!empty($update->video_url))

        user_video="{{$update->video_url}}";

    @endif

            @if(!empty($g_edit->pic))

            @php

                $pic_url = json_decode($g_edit->pic);

            @endphp

            @foreach($pic_url as $key => $pic)

        garage_car_pic["{{$key}}"]="{{$pic}}";

    @endforeach

            @endif

            @if(!empty($misc_edit->pics))

            @php

                $pic_url = json_decode($misc_edit->pics);

            @endphp

            @foreach($pic_url as $key => $pic)

        mis_car_pic["{{$key}}"]="{{$pic}}";

    @endforeach

            @endif

            @if(!empty($w_edit->image))

        wanted_car_pic="{{$w_edit->image}}";

    @endif
            @if(!empty($update->crop_image))

        featured_image="{{$update->crop_image}}";

    @endif
    
      @if(!empty($g_edit->feature_img))

        cover_image = "{{$g_edit->feature_img}}";

    @endif

    {{--@if(!empty($w_edit->image))--}}

    {{--profile_photo="{{$w_edit->image}}";--}}

    {{--@endif--}}



    function upload(file,cur,folder_type,index=null) {

        var seconds = new Date().getTime() / 1000;

        var user_name="{{session('userDetails')->first_name}}" + "{{session('userDetails')->id}}";

        var path="/power/"+user_name+"/"+folder_type+seconds;

        var storageRef = firebase.storage().ref();

        var success = false;

        var iRef = storageRef.child(path);

        var uploadTask= iRef.put(file);

        var che=0;

        uploadTask.on('state_changed', function(snapshot){

            var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;

            $("#loader-dashboard").show();

            $("#profile_loader").show();

            console.log(progress);

            if(progress==100){

                if(folder_type==="user_car" || folder_type==="user_car_video"){

                    $("#place_d").prop("disabled",false);

                    $("#loader-dashboard").hide();

                }



                if(folder_type=="wanted_car_photo") {

                    $("#wanted_create_btn").prop("disabled", false);

                    $("#wanted_loader").hide();

                }

                if(folder_type=="featured_photo"){

                    $("#place_d").prop("disabled",false);

                    $("#loader-dashboard").hide();

                }

                if (folder_type == "profile_pic"){

                   



                }
  if (folder_type=="cover_photo"){

                    $("#garage_loader").hide();
                    $("#garage_btn_advert").prop('disabled',false);

                }
                if(folder_type=="garage_car_photo"){

                    $("#garage_loader").hide();

                    $("#garage_btn_advert").prop('disabled',false);

                }

                if(folder_type=="mis_car_photo"){

                    $("#misc_create_btn").prop("disabled",false);

                    $("#misc_loader").hide();

                }





            }

            switch (snapshot.state) {

                case firebase.storage.TaskState.PAUSED: // or 'paused'

                    console.log('Upload is paused');

                    break;

                case firebase.storage.TaskState.RUNNING: // or 'running'



                    break;

            }

        }, function(error) {



        }, function() {

            uploadTask.snapshot.ref.getDownloadURL().then(function(downloadURL) {



                if(folder_type==="user_car"){

                    user_car_pic[index]=downloadURL;

                }

                if(folder_type==="user_car_video"){

                    user_video=downloadURL;

                }

                if(folder_type=="wanted_car_photo"){

                    wanted_car_pic=downloadURL;

                }
                if(folder_type=="featured_photo"){

                    featured_image=downloadURL;


                }
                  if(folder_type=="cover_photo"){

                    cover_image=downloadURL;


                }

                if (folder_type == "profile_pic"){

                    profile_photo =downloadURL;

                    $("#profile_pic_photo").val(profile_photo);
  $("#pofile_btn").prop("disabled",false);
   $("#profile_loader").hide();
                 

                }

                if(folder_type=="garage_car_photo"){

                    garage_car_pic[index]=downloadURL;

                }

                if(folder_type=="mis_car_photo"){

                    mis_car_pic[index]=downloadURL;

                }





            });



        });



    }



</script>

<script>



    $("#filemy").change(function(e){

        if($(this)[0].files.length >= images_l){
            $('#CarImageDashboard').modal("show");
            // alert("your Package has not feature to add more than "+ images_l +"images! if you wana greater than package please promote your package");
          $("#DashboardImageValidation").empty();
            $("#DashboardImageValidation").html('your Package has not feature to add more than "+ images_l +"images! if you wana greater than package please promote your package');
            return false;
        }

        console.log(this.files[0].size);
console.log(this.length);
        var cur=$(this);

        if(this.files[0].size > 4000000){



            alert('File size is less than 5MB!');

            return false;

        }







        $("#c_status").val(1);

        var reader = new FileReader();

        // reader.onload = function (e) {
        //
        //     $resize.croppie('bind',{
        //
        //         url: e.target.result
        //
        //     }).then(function(){
        //
        //         console.log('jQuery bind complete');
        //
        //     });
        //
        // }
        reader.readAsDataURL(this.files[0]);
        user_car_pic=[];
       $("#place_d").prop("disabled",true);
        $(".imageborder").empty();
        for (var i = 0; i <images_l; i++) {
            var ap =  '<img id="output'+i+'">';
                $(".imageborder").append(ap);
            var image = document.getElementById('output'+i);
             image.src = URL.createObjectURL(e.target.files[i]);
                    upload(this.files[i],cur,"user_car",i);
                //
                // var image = document.getElementById('output1');
                //
                // image.src = URL.createObjectURL(e.target.files[i]);


            // if (i == 0) {
            // } else if (i == 1) {
            //
            //     $("#place_d").prop("disabled",true);
            //
            //     upload(this.files[1],cur,"user_car",1);
            //
            //     var image = document.getElementById('output2');
            //
            //     image.src = URL.createObjectURL(e.target.files[i]);
            //
            //
            //
            // } else if (i == 2) {
            //
            //     $("#place_d").prop("disabled",true);
            //
            //     upload(this.files[2],cur,"user_car",2);
            //
            //     var image1 = document.getElementById('output3');
            //
            //     image1.src = URL.createObjectURL(e.target.files[i]);
            //
            // } else {
            //
            //     $("#place_d").prop("disabled",true);
            //
            //     upload(this.files[0],cur,"user_car",0);
            //
            //     var image = document.getElementById('output1');
            //
            //     image.src = URL.createObjectURL(e.target.files[0]);
            //
            //
            //
            // }



        }



    });
    $("#image_featured").change(function (e){

        if(this.files[0].size > 4000000){
            $("#5MBlimitImGE").modal("show");
            return false;
        }

        var cur=$(this);
        $("#place_d").prop("disabled",true);
        var reader = new FileReader();
        var image = document.getElementById('photo_featured');
        image.src = URL.createObjectURL(e.target.files[0]);
        reader.readAsDataURL(this.files[0]);
        upload(this.files[0],cur,"featured_photo");
        console.log(featured_image);


    });
    
      $("#image_garage").change(function (e){

        if(this.files[0].size > 4000000){
            $("#5MBlimitImGE").modal("show");
            return false;
        }
        var cur=$(this);
        $("#garage_loader").show();
        $("#garage_btn_advert").prop('disabled',true);
        var reader = new FileReader();
        var image = document.getElementById('photo_cover_garage');
        image.src = URL.createObjectURL(e.target.files[0]);
        reader.readAsDataURL(this.files[0]);
        upload(this.files[0],cur,"cover_photo");
        console.log(cover_image);


    });
    
    $(".image_dash").change(function (e){
        if(this.files[0].size > 4000000){
            $("#5MBlimitImGE").modal("show");
            // alert('File size is less than 5MB!');
            return false;

        }
        var cur=$(this);
        var id =$(this).data("id");
        $("#place_d").prop("disabled",true);
        var reader = new FileReader();
        var image = document.getElementById('preview_'+id);
        image.src = URL.createObjectURL(e.target.files[0]);
        reader.readAsDataURL(this.files[0]);
        upload(this.files[0],cur,"user_car",id);
        console.log(user_car_pic);

    });
    
      $(".image_dash_garage").change(function (e){
        if(this.files[0].size > 4000000){
            $("#5MBlimitImGE").modal("show");
            // alert('File size is less than 5MB!');
            return false;

        }
        var cur=$(this);
        var id =$(this).data("id");
        $("#garage_loader").show();
        $("#garage_btn_advert").prop('disabled',true);
        var reader = new FileReader();
        var image = document.getElementById('garage_preview_'+id);
        image.src = URL.createObjectURL(e.target.files[0]);
        reader.readAsDataURL(this.files[0]);
        upload(this.files[0],cur,"garage_car_photo",id);
        console.log(garage_car_pic);

    });
    
    $("#video-upload").change(function(e){

        if(this.files[0].size > (1000000 * 15)){

            alert('File size is less than 16MB!');

            return false;

        }

        var cur=$(this);

        $("#videos_err").show();

        $("#place_d").prop("disabled",true);

        var reader = new FileReader();

        reader.onload = function (e) {

        };

        reader.readAsDataURL(this.files[0]);

        user_video=null;

        upload(this.files[0],cur,"user_car_video",2);

        console.log(user_video);

        $("video1").removeAttr("src");

        var image = document.getElementById('video1');

        $("#video1").show();

        image.src = URL.createObjectURL(e.target.files[0]);

    });

    $("#file_misc").change(function (e){

        $("#misc-image-preview").show();

        $("#misc_loader").show();

        var cur=$(this);

        var reader = new FileReader();

        reader.onload = function (e) {

            $resize_misc.croppie('bind',{

                url: e.target.result

            }).then(function(){

                console.log('jQuery bind complete');

            });

        };

        reader.readAsDataURL(this.files[0]);

        var c=1;

        $("#m_p_1").removeAttr("src");

        $("#m_p_2").removeAttr("src");

        $("#m_p_3").removeAttr("src");

        for (var i = 0; i < 3; i++) {

            // if (i == 0) {

            //     $("#misc_loader").show();

            //     $("#misc_create_btn").prop("disabled",true);

            //     upload(this.files[0],cur,"mis_car_photo",0);

            //     var image = document.getElementById('m_p_1');

            //     image.src = URL.createObjectURL(e.target.files[i]);

            //

            // } else if (i == 1) {

            //     $("#misc_loader").show();

            //     $("#misc_create_btn").prop("disabled",true);

            //     upload(this.files[1],cur,"mis_car_photo",1);

            //     var image = document.getElementById('m_p_2');

            //     image.src = URL.createObjectURL(e.target.files[i]);

            //

            // } else if (i == 2) {

            //     $("#misc_loader").show();

            //     $("#misc_create_btn").prop("disabled",true);

            //     upload(this.files[1],cur,"mis_car_photo",1);

            //     var image = document.getElementById('m_p_2');

            //     image.src = URL.createObjectURL(e.target.files[i]);

            // } else {

            //     $("#misc_loader").show();

            //     $("#misc_create_btn").prop("disabled",true);

            //     upload(this.files[1],cur,"mis_car_photo",1);

            //     var image = document.getElementById('m_p_2');

            //     image.src = URL.createObjectURL(e.target.files[0]);

            //     $("#place_d").prop("disabled",true);

            //     upload(this.files[0],cur,"user_car",0);

            //     var image = document.getElementById('output1');

            //     image.src = URL.createObjectURL(e.target.files[0]);

            //

            // }

            $("#misc_loader").show();

            $("#misc_create_btn").prop("disabled",true);

            upload(this.files[i],cur,"mis_car_photo",i);

            var image = document.getElementById('m_p_'+c);

            image.src = URL.createObjectURL(e.target.files[i]);

            c++;

        }

    });

    $("#file1").change(function (e){

        $("#garage-image-preview").show();

        $("#garage_loader").show();

        $("#garage_btn_advert").prop('disabled',true);

        var cur=$(this);

        var reader = new FileReader();

        reader.onload = function (e) {

            $resize_garage.croppie('bind',{

                url: e.target.result

            }).then(function(){

                console.log('jQuery bind complete');

            });

        };

        reader.readAsDataURL(this.files[0]);

        var c=1;

        $("#g_p_1").removeAttr("src");

        $("#g_p_2").removeAttr("src");

        $("#g_p_3").removeAttr("src");

        for (var i = 0; i < 3; i++) {

            upload(this.files[i],cur,"garage_car_photo",i);

            var image = document.getElementById('g_p_'+c);

            image.src = URL.createObjectURL(e.target.files[i]);

            c++;

        }

    });

    $("#w_image").change(function (e){

        var cur=$(this);

        $("#wanted_create_btn").prop("disabled",true);

        $("#wanted_loader").show();

        upload(this.files[0],cur,"wanted_car_photo");

        var image = document.getElementById('wanted_s_i');

        image.src = URL.createObjectURL(e.target.files[0]);

        console.log(image.src);

        $(".delete_w_p").show();

    });
    $("#featured_dashboard_img").change(function (e){


 var image = document.getElementById('dfeatured_img');

        image.src = URL.createObjectURL(e.target.files[0]);

        console.log(image.src);


    });

    $("#file12").change(function (e){

        var cur=$(this);

        $("#pofile_btn").prop("disabled",true);
        $("#profile_loader").show();

        upload(this.files[0],cur,"profile_pic");

        var image = document.getElementById('profilephoto1');

        image.src = URL.createObjectURL(e.target.files[0]);


    });

</script>

