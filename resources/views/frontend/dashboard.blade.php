@include('frontend.partials.header')

<style>

    .misc_numbr_display {

        display: block !important;

    }

    .error {

        border: 1px solid red;

    }

    .place_your_ad {

        width: 100% !important;

        display: flex !important;

        align-items: center !important;

        justify-content: center !important;

    }


</style>

@php

  $md_sh = false;
    $modal_p = App\UserPackage::with('package')->where('package_id','!=',2)->where('user_id',session('userDetails')->id)->where("status",1)->where('paid_status',0)->where('post_per_package','>',0)->where('free_post_per_package','=',0)->first();
 
    if ($modal_p){
    $md_sh = true;
    }
    
    $auc_tab=true;
    $swp_tab=true;
    $pre_tab=true;
    $amr_tab=true;
    $wanted_tab=true;
            $rent_tab  = true;
    $misc_tab=true;
    $t_auc=0;
    $t_swp=0;
    $t_want=0;
    $t_pre=0;
    $t_misc=0;
    $t_rent=0;
      $garage_img = 1;
      $images=10 ;
    $auc_c=false;
    $swp_c=false;
    $want_c=false;
    $misc_c=false;
    $pre_c=false;
    $garage_c=false;
    $body_c = false;
    $amr_c=false;
    $rent_c=false;
        $featured_c = false;
             $f_pkg  = App\UserPackage::with('package')->where('user_id',session('userDetails')->id)->where("status",1)->where('package_id',15)->where('featured','>',0)->first();
        if (!empty($f_pkg) &&  $f_pkg->package['name'] === "Feature"){

                if ($f_pkg->paid_status === 1){
            $featured_c = true;
            }

            }
  $package  = App\UserPackage::with('package')->where('user_id',session('userDetails')->id)->where("status",1)->where("post_per_package",">",0)->get();

  if(!empty($package) && count($package) > 0){
        foreach($package as $p){
        //Rental Package
            if($p->package['name'] === "Rental"){
  $im = json_decode($p->package['attributes']);
   $images = $im->images_per_post;
   if ($im->videos_per_post != 0){
    $a_video_c = true;
    }
if(!empty($update) && $update->car_availbilty==="Prestige"){

           $pre_c=true;

           }else{

    if($p->pres_adds != 0){

        $pre_c=true;

            }

            }
            if(!empty($update) && $update->car_availbilty==="American-Muscle"){

           $amr_c=true;

           }else{

    if($p->amr_add != 0){

        $amr_c=true;

            }

            }
             if(!empty($update) && $update->car_availbilty==="Sell"){

           $cls_c=true;

           }else{

    if($p->class_add != 0){

        $cls_c =true;

            }

            }

            if(!empty($update) && $update->car_availbilty==="Rent"){

           $rent_c=true;

           }else{

    if($p->rental_companie_adds != 0){

        $rent_c=true;

            }

            }

            if(!empty($update) && $update->car_availbilty==="Auction"){

           $auc_c=true;

           }else{

    if($p->auction_adds != 0){

        $auc_c=true;

            }

            }
                        if(!empty($update) && $update->car_availbilty==="Swap"){

           $swp_c=true;

           }else{

    if($p->swap_adds != 0 ){

        $swp_c=true;

            }

            }

if (!empty($misc_edit)){

 $misc_c = true;

}else{

    if($p->misc_adds != 0 ){

       $misc_c = true;

       }

       }



           if(!empty($w_edit)){

           $want_c=true;

           }else{

    if($p->wanted_adds != 0 ){

        $want_c=true;

            }

            }
           if(!empty($g_edit) && $g_edit->category === "Garage"){

           $garage_c=true;

           }else{

    if($p->garage_adds != 0 ){

        $garage_c=true;

            }

            }
               if(!empty($g_edit) && $g_edit->category === "body-shop"){

           $body_c=true;

           }else{

    if($p->body_shop_adds != 0 ){

        $body_c=true;

            }

            }


 }


     if($p->package['name'] === "GarageServices"){

  $im = json_decode($p->package['attributes']);
   $garage_img = $im->images_per_post;

if(!empty($update) && $update->car_availbilty==="Prestige"){

     $pre_c=true;

           }else{

    if($p->pres_adds != 0 ){

        $pre_c=true;

            }

            }

            if(!empty($update) && $update->car_availbilty==="Rent"){

           $rent_c=true;

           }else{

    if($p->rental_companie_adds != 0){

        $rent_c=true;

            }

            }

            if(!empty($update) && $update->car_availbilty==="Auction"){

           $auc_c=true;

           }else{

    if($p->auction_adds != 0 ){

        $auc_c=true;

            }

            }
                        if(!empty($update) && $update->car_availbilty==="Swap"){

           $swp_c=true;

            }else{

    if($p->swap_adds != 0){

        $swp_c=true;

            }

            }


    if (!empty($misc_edit)){

 $misc_c = true;

}else{

    if($p->misc_adds != 0){

       $misc_c = true;

       }
}



           if(!empty($w_edit)){

           $want_c=true;

           }else{

    if($p->wanted_adds != 0){

        $want_c=true;

            }

            }
          if(!empty($g_edit) && $g_edit->category === "Garage"){

           $garage_c=true;

           }else{

    if($p->garage_adds != 0 ){

        $garage_c=true;

            }

            }
               if(!empty($g_edit) && $g_edit->category === "body-shop"){

           $body_c=true;

           }else{

    if($p->body_shop_adds != 0 ){

        $body_c=true;

            }

            }

  if(!empty($update) && $update->car_availbilty==="American-Muscle"){

           $amr_c=true;

           }else{

    if($p->amr_add != 0){

        $amr_c=true;

            }

            }
             if(!empty($update) && $update->car_availbilty==="Sell"){

           $cls_c=true;

           }else{

    if($p->class_add != 0){

        $cls_c =true;

            }

            }
 }




          if($p->package['name']==="Prestige"){
  $im = json_decode($p->package['attributes']);
   $images = $im->images_per_post;
   if ($im->videos_per_post != 0){
    $a_video_c = true;
    }
if(!empty($update) && $update->car_availbilty==="Prestige"){

           $pre_c=true;

           }else{

    if($p->pres_adds != 0 ){

        $pre_c=true;

            }

            }

            if(!empty($update) && $update->car_availbilty==="Rent"){

           $rent_c=true;

           }else{

    if($p->rental_companie_adds != 0 ){

        $rent_c=true;

            }

            }

            if(!empty($update) && $update->car_availbilty==="Auction"){

           $auc_c=true;

           }else{

    if($p->auction_adds != 0 ){

        $auc_c=true;

            }

            }
                        if(!empty($update) && $update->car_availbilty==="Swap"){

           $swp_c=true;

           }else{

    if($p->swap_adds != 0 ){

        $swp_c=true;

            }

            }

if (!empty($misc_edit)){
 $misc_c = true;
}else{
    if($p->misc_adds != 0 ){
       $misc_c = true;
       }
}



           if(!empty($w_edit)){

           $want_c=true;

           }else{

    if($p->wanted_adds != 0 ){

        $want_c=true;

            }

            }
     if(!empty($g_edit) && $g_edit->category === "Garage"){

           $garage_c=true;

           }else{

    if($p->garage_adds != 0 ){

        $garage_c=true;

            }

            }
               if(!empty($g_edit) && $g_edit->category === "body-shop"){

           $body_c=true;

           }else{

    if($p->body_shop_adds != 0 ){

        $body_c=true;

            }

            }


              if(!empty($update) && $update->car_availbilty==="American-Muscle"){

           $amr_c=true;

           }else{

    if($p->amr_add != 0){

        $amr_c=true;

            }

            }
             if(!empty($update) && $update->car_availbilty==="Sell"){

           $cls_c=true;

           }else{

    if($p->class_add != 0){

        $cls_c =true;

            }

            }

 }

 if($p->package['name']==="Basic"){
  $im = json_decode($p->package['attributes']);
   $images = $im->images_per_post;
   if ($im->videos_per_post != 0){
    $a_video_c = true;
    }
if(!empty($update) && $update->video_url){


 $a_video_c = true;

}else{

    $v_ac =  json_decode($p->attributes);

if (!empty($v_ac) && $v_ac->videos_per_post != 0){

 $a_video_c = true;

}else{

 $a_video_c = false;

 }

}

 if(!empty($update) && $update->car_availbilty==="Prestige"){
           $pre_c=true;
           }else{
    if($p->pres_adds != 0 ){
        $pre_c=true;
            }
            }

            if(!empty($update) && $update->car_availbilty==="Rent"){
           $rent_c=true;
           }else{
    if($p->rental_companie_adds != 0 ){
        $rent_c=true;
            }
            }

            if(!empty($update) && $update->car_availbilty==="Auction"){

           $auc_c=true;

           }else{

    if($p->auction_adds != 0 ){

        $auc_c=true;

            }

            }
                        if(!empty($update) && $update->car_availbilty==="Swap"){

           $swp_c=true;

           }else{

    if($p->swap_adds != 0 ){

        $swp_c=true;

            }

            }

if (!empty($misc_edit)){
 $misc_c = true;
}else{
    if($p->misc_adds != 0 ){
       $misc_c = true;
       }
}



           if(!empty($w_edit)){

           $want_c=true;

           }else{

    if($p->wanted_adds != 0){

        $want_c=true;

            }

            }

        if(!empty($g_edit) && $g_edit->category === "Garage"){

           $garage_c=true;

           }else{

    if($p->garage_adds != 0 ){

        $garage_c=true;

            }

            }
               if(!empty($g_edit) && $g_edit->category === "body-shop"){

           $body_c=true;

           }else{

    if($p->body_shop_adds != 0 ){

        $body_c=true;

            }

            }
  if(!empty($update) && $update->car_availbilty==="American-Muscle"){

           $amr_c=true;

           }else{

    if($p->amr_add != 0){

        $amr_c=true;

            }

            }
             if(!empty($update) && $update->car_availbilty==="Sell"){

           $cls_c=true;

           }else{

    if($p->class_add != 0){

        $cls_c =true;

            }

            }


 }



 if($p->package['name']==="Standard"){
  $im = json_decode($p->package['attributes']);
   $images = $im->images_per_post;
   if ($im->videos_per_post != 0){
    $a_video_c = true;
    }
if(!empty($update) && $update->video_url){
 $a_video_c = true;
}else{
    $v_ac =  json_decode($p->attributes);
if (!empty($v_ac) && $v_ac->videos_per_post != 0){
 $a_video_c = true;
}else{
 $a_video_c = false;
 }
}


      if(!empty($update) && $update->car_availbilty==="Prestige"){
           $pre_c=true;
           }else{
    if($p->pres_adds != 0){
        $pre_c=true;
            }
            }

            if(!empty($update) && $update->car_availbilty==="Rent"){
           $rent_c=true;
           }else{
    if($p->rental_companie_adds != 0 ){
        $rent_c=true;
            }
            }

            if(!empty($update) && $update->car_availbilty==="Auction"){

           $auc_c=true;

           }else{

    if($p->auction_adds != 0){

        $auc_c=true;

            }

            }
                        if(!empty($update) && $update->car_availbilty==="Swap"){

           $swp_c=true;

           }else{

    if($p->swap_adds != 0){

        $swp_c=true;

            }

            }
if (!empty($misc_edit)){
 $misc_c = true;
}else{
    if($p->misc_adds != 0){
       $misc_c = true;
       }
}



           if(!empty($w_edit)){

           $want_c=true;

           }else{

    if($p->wanted_adds != 0){

        $want_c=true;

            }

            }

      if(!empty($g_edit) && $g_edit->category === "Garage"){

           $garage_c=true;

           }else{

    if($p->garage_adds != 0 ){

        $garage_c=true;

            }

            }
               if(!empty($g_edit) && $g_edit->category === "body-shop"){

           $body_c=true;

           }else{

    if($p->body_shop_adds != 0 ){

        $body_c=true;

            }

            }



              if(!empty($update) && $update->car_availbilty==="American-Muscle"){

           $amr_c=true;

           }else{

    if($p->amr_add != 0){

        $amr_c=true;

            }

            }
             if(!empty($update) && $update->car_availbilty==="Sell"){

           $cls_c=true;

           }else{

    if($p->class_add != 0){

        $cls_c =true;

            }

            }

           }
           if($p->package['name']==="Trader"){
  $im = json_decode($p->package['attributes']);
   $images = $im->images_per_post;
   if ($im->videos_per_post != 0){
    $a_video_c = true;
    }
if (!empty($update) && $update->car_availbilty==="American-Muscle"){
$amr_c = true;
}else{
$amr_c = true;
}

if(!empty($update) && $update->video_url){
 $a_video_c = true;
}else{
    $v_ac =  json_decode($p->attributes);
if (!empty($v_ac) && $v_ac->videos_per_post != 0){
 $a_video_c = true;
}else{
 $a_video_c = false;
 }
}



       if(!empty($update) && $update->car_availbilty==="Prestige"){
           $pre_c=true;
           }else{
    if($p->pres_adds != 0){
        $pre_c=true;
            }
            }

            if(!empty($update) && $update->car_availbilty==="Rent"){
           $rent_c=true;
           }else{
    if($p->rental_companie_adds != 0){
        $rent_c=true;
            }
            }

            if(!empty($update) && $update->car_availbilty==="Auction"){

           $auc_c=true;

           }else{

    if($p->auction_adds != 0){

        $auc_c=true;

            }

            }
                        if(!empty($update) && $update->car_availbilty==="Swap"){

           $swp_c=true;

           }else{

    if($p->swap_adds != 0){

        $swp_c=true;

            }

            }

if (!empty($misc_edit)){
 $misc_c = true;
}else{
    if($p->misc_adds != 0){
       $misc_c = true;
       }
}



           if(!empty($w_edit)){

           $want_c=true;

           }else{

    if($p->wanted_adds != 0){

        $want_c=true;

            }

            }
    if(!empty($g_edit) && $g_edit->category === "Garage"){

           $garage_c=true;

           }else{

    if($p->garage_adds != 0 ){

        $garage_c=true;

            }

            }
               if(!empty($g_edit) && $g_edit->category === "body-shop"){

           $body_c=true;

           }else{

    if($p->body_shop_adds != 0 ){

        $body_c=true;

            }

            }

              if(!empty($update) && $update->car_availbilty==="American-Muscle"){

           $amr_c=true;

           }else{

    if($p->amr_add != 0){

        $amr_c=true;

            }

            }
             if(!empty($update) && $update->car_availbilty==="Sell"){

           $cls_c=true;

           }else{

    if($p->class_add != 0){

        $cls_c =true;

            }

            }


           }

             if($p->package['name']==="Body Shop Services"){
 $im = json_decode($p->package['attributes']);
   $garage_img = $im->images_per_post;
  
       if(!empty($update) && $update->car_availbilty==="Prestige"){
           $pre_c=true;
           }else{
    if($p->pres_adds != 0 ){
        $pre_c=true;
            }
            }

            if(!empty($update) && $update->car_availbilty==="Rent"){
           $rent_c=true;
           }else{
    if($p->rental_companie_adds != 0 ){
        $rent_c=true;
            }
            }

            if(!empty($update) && $update->car_availbilty==="Auction"){

           $auc_c=true;

           }else{

    if($p->auction_adds != 0){

        $auc_c=true;

            }

            }
                        if(!empty($update) && $update->car_availbilty==="Swap"){

           $swp_c=true;

           }else{

    if($p->swap_adds != 0){

        $swp_c=true;

            }

            }

if (!empty($misc_edit)){
 $misc_c = true;
}else{
    if($p->misc_adds != 0){
       $misc_c = true;
       }
}



           if(!empty($w_edit)){

           $want_c=true;

           }else{

    if($p->wanted_adds != 0){

        $want_c=true;

            }

            }
      if(!empty($g_edit) && $g_edit->category === "Garage"){

           $garage_c=true;

           }else{

    if($p->garage_adds != 0 ){

        $garage_c=true;

            }

            }
               if(!empty($g_edit) && $g_edit->category === "body-shop"){

           $body_c=true;

           }else{

    if($p->body_shop_adds != 0 ){

        $body_c=true;

            }

            }

              if(!empty($update) && $update->car_availbilty==="American-Muscle"){

           $amr_c=true;

           }else{

    if($p->amr_add != 0){

        $amr_c=true;

            }

            }
             if(!empty($update) && $update->car_availbilty==="Sell"){

           $cls_c=true;

           }else{

    if($p->class_add != 0){

        $cls_c =true;

            }

            }


           }


           if($p->package['name']==="American Muscles"){
$im = json_decode($p->package['attributes']);
   $images = $im->images_per_post;
   if ($im->videos_per_post != 0){
    $a_video_c = true;
    }
      
       if(!empty($update) && $update->car_availbilty==="Prestige"){
           $pre_c=true;
           }else{
    if($p->pres_adds != 0 ){
        $pre_c=true;
            }
            }

            if(!empty($update) && $update->car_availbilty==="Rent"){
           $rent_c=true;
           }else{
    if($p->rental_companie_adds != 0 ){
        $rent_c=true;
            }
            }

            if(!empty($update) && $update->car_availbilty==="Auction"){

           $auc_c=true;

           }else{

    if($p->auction_adds != 0){

        $auc_c=true;

            }

            }
                        if(!empty($update) && $update->car_availbilty==="Swap"){

           $swp_c=true;

           }else{

    if($p->swap_adds != 0){

        $swp_c=true;

            }

            }

if (!empty($misc_edit)){
 $misc_c = true;
}else{
    if($p->misc_adds != 0){
       $misc_c = true;
       }
}



           if(!empty($w_edit)){

           $want_c=true;

           }else{

    if($p->wanted_adds != 0){

        $want_c=true;

            }

            }
      if(!empty($g_edit) && $g_edit->category === "Garage"){

           $garage_c=true;

           }else{

    if($p->garage_adds != 0 ){

        $garage_c=true;

            }

            }
               if(!empty($g_edit) && $g_edit->category === "body-shop"){

           $body_c=true;

           }else{

    if($p->body_shop_adds != 0 ){

        $body_c=true;

            }

            }

              if(!empty($update) && $update->car_availbilty==="American-Muscle"){

           $amr_c=true;

           }else{

    if($p->amr_add != 0){

        $amr_c=true;

            }

            }
             if(!empty($update) && $update->car_availbilty==="Sell"){

           $cls_c=true;

           }else{

    if($p->class_add != 0){

        $cls_c =true;

            }

            }


           }

          }
          }





@endphp
@if(!empty($md_sh))

    <div class="modal fade" id="centerPKGPurachaseModalDashboard" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Purchase Package</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route('pay-now')}}">
                @csrf
                <input type="hidden" name="price" value="{{$modal_p['package']->price}}">
                <input type="hidden" name="packege_id" value="{{$modal_p->package_id}}" >
            <div class="modal-body">
             Pay the {{$modal_p['package']->name}} Package Price.
            </div>
                <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Pay Now</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endif
<div style="background: #f0f2f4;">

    <div class="container">

        <div class="row profilesection">

            <img class="badge1" src="{{ config('app.ui_asset_url') . 'frontend/img/carselling/badge.png' }}">

            <div class="col-5  d-flex align-items-center justify-content-end col-sm-3  col-xl-3 profileimage">

                @php

                    $placeholder = config('app.ui_asset_url').'images/avatars/avatar-placeholder.png';

                @endphp

                @if (empty(session('userDetails')->avatar))

                    <img src="{{ $placeholder }}">

                @else

                    <img onerror="this.src={{ $placeholder }};" src="{{session('userDetails')->avatar}}">

                @endif

            </div>

            <div class="col-7 col-sm-5 col-md-5 col-lg-5 profiledescription p-0">

                <h3>

                    @php

                        if(!empty(session('userDetails')->first_name)){

                        echo session('userDetails')->first_name;

                        }

                        if(!empty(session('userDetails')->first_name) && !empty(session('userDetails')->last_name)){

                        echo " ";

                        }

                        if(!empty(session('userDetails')->last_name)){

                        echo session('userDetails')->last_name;

                        }

                        if(empty(session('userDetails')->first_name) && empty(session('userDetails')->last_name)){

                        if(!empty(session('userDetails')->username)){

                        echo session('userDetails')->username;

                        }else{

                        echo "N/A";

                        }

                        }

                    @endphp

                </h3>

                <p>Member since {{ \Carbon\Carbon::parse(session('userDetails')->created_at)->diffForHumans() }}</p>

                <p><a href="{{ route('profile-dashboard') }}"> Edit Profile </a> | <a

                            href="{{ route('user-change-password') }}"> Change Password </a> | <a

                            href="{{ route('chat-view') }}" target="_blank">Messenger</a></p>

            </div>

            <!--<div class="col-12 p-0">-->

            <!--    <div class="mobil-menu-portal">-->

            <!--        <a>Portal Menu <i class="fa fa-bars" style="color: #707070;" aria-hidden="true"></i></a>-->

            <!--    </div>-->


            <!--</div>-->


            <div class="col-12 p-0">

                <div class="mobil-menu-portal">

                    <!-- <a>Portal Menu <i class="fa fa-bars" style="color: #707070;" aria-hidden="true"></i></a><br><br> -->
                    <div class="pos-f-t p-0">

                        <nav class="justify-content-center" style="background-color: #e0e1ed">
                            <button type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent"
                                    aria-controls="navbarToggleExternalContent" aria-expanded="false"
                                    aria-label="Toggle navigation" style="color:#707070;">Portal Menu
                                <span class="navbar-toggler-icon" style="color:#707070 !important;"><i
                                            class="fas fa-bars"></i></span>
                            </button>
                        </nav>
                        <div class="collapse" id="navbarToggleExternalContent">
                            <div class="p-2" style="background-color:#e0e1ed">
                                @if(!empty($tab) && $tab == "my_advert")
                                    <a href="{{route('my-advert')}}"
                                       class="nav-link select-main-tab active btn btn-block" id="powersCar"
                                       style="border-bottom: 3px solid rgb(228, 0, 27);background-color:white !important;color:#707070 !important">Adverts Menu</a>
                                @else
                                    <a href="{{route('my-advert')}}" class="nav-link select-main-tab" id="powersCar"
                                       style="background-color:white !important;color:#707070 !important">Adverts Menu</a>
                                @endif

                                <hr>
                                @if(!empty($tab) && $tab == "profile_dash")
                                    <a class="nav-link active btn btn-block" id="profilesection"
                                       href="{{route('profile-dashboard')}}"
                                       style="border-bottom: 3px solid rgb(228, 0, 27);background-color:white !important;color:#707070 !important">
                                        Profile</a>
                                @else
                                    <a id="profilesection" href="{{route('profile-dashboard')}}"
                                       class="nav-link select-main-tab"
                                       style="background-color:white !important;color:#707070 !important"> Profile</a>
                                    <hr>
                                @endif
                                @if(!empty($tab) && $tab == "packages_dash")
                                    <a class="nav-link select-main-tab btn btn-block"
                                       href="{{route('package-dashboard')}}"
                                       style="border-bottom: 3px solid rgb(228, 0, 27);background-color:white !important;color:#707070 !important ">Current Packages</a>
                                @else
                                    <a class="nav-link select-main-tab btn btn-block"
                                       href="{{route('package-dashboard')}}" id="currentpackage"
                                       style="background-color:white !important;color:#707070 !important;">Current Packages</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


            </div>


            <div class="col-12  myhr p-0">

                <hr>

            </div>


            <div class="col-12 navsection p-0" id="mobile-my-portal-menu">

                <ul>

                    <li class=" navheading">
                        @if(!empty($tab) && $tab == "my_advert")
                            <a href="{{route('my-advert')}}" class="nav-link select-main-tab active" id="powersCar"
                               style="border-bottom: 3px solid rgb(228, 0, 27);">Adverts Menu</a>
                        @else
                            <a href="{{route('my-advert')}}" class="nav-link select-main-tab" id="powersCar">
                                Adverts Menu</a>
                        @endif
                    </li>

                    <li class=" navheading">
                        @if(!empty($tab) && $tab == "profile_dash")
                            <a class="nav-link active" id="profilesection" href="{{route('profile-dashboard')}}"
                               style="border-bottom: 3px solid rgb(228, 0, 27);"> Profile</a>
                        @else
                            <a id="profilesection" href="{{route('profile-dashboard')}}"> Profile</a>
                        @endif
                    </li>
                    @if(!empty($packages))
                        @foreach ($packages as $package)

                            @if(!empty($user_package->package_id))

                                @php



                                    $package = "Change Package";

                                @endphp

                            @else

                                @php

                                    $package = "Change Package";

                                @endphp

                            @endif

                        @endforeach
                    @endif
                    <li class=" navheading">
                        @if(!empty($tab) && $tab == "packages_dash")
                            <a class="nav-link select-main-tab" href="{{route('package-dashboard')}}"
                               style="border-bottom: 3px solid rgb(228, 0, 27);">Current Packages</a>
                        @else
                            <a class="nav-link select-main-tab" href="{{route('package-dashboard')}}"
                               id="currentpackage">Current Packages</a>
                        @endif
                    </li>


                </ul>

            </div>

        </div>


        <div class="tabsecton " id="power-car">


            @if(!empty($tab) && $tab == "my_advert" ||  $tab == "sell_your_car" || $tab == "change_package" ||  $tab === "wanted_sections_tab" || $tab === "wanted_list" || $tab === "garage_advert" || $tab === "garage" || $tab === "misslenious_create" || $tab === "misslenious_add_tab" || $tab === "my_payments")
                @include("frontend.powercartab")
            @endif
            @if(!empty($tab) && $tab == "packages_dash")
                @include("frontend.currentpack")
            @endif

            @if(!empty($tab) && $tab == "profile_dash")
                @include("frontend.profiletab")
            @endif

        </div>

    </div>

    <!--Modal-->


    <!--new Modal-->

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"

         aria-hidden="true">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                ...

            </div>

        </div>

    </div>

</div>

</div>

@php

    $packages = App\Package::all();

@endphp

{{--modal for featurd car--}}

<div class="modal fade bd-featured-modal-lg newpackagemodal" tabindex="-1" role="dialog"

     aria-labelledby="myLargeModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content" style="background: transparent">

            <div class="row profilesection">

                <img class="badge" src="{{ config('app.ui_asset_url').'frontend/img/carselling/badge.png' }}">

                <div class="col-12">

                    <div class="row">

                        <div class="col-12 ">

                            <div class="container">

                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                <div class="row  packagediv">

                                    <div class=" col-10 offset-2 PackageDetail">

                                        <div class="PackageDetailHeading">Package Details</div>

                                        <div class="style"></div>

                                    </div>


                                </div>


                                <div class="row packagedivdetail" id="pksl"

                                     style="padding-left:20px; padding-right:20px;padding-bottom: 40px;">

                                @if(!empty($packages) && count($packages))

                                    @foreach($packages as $package)

                                        @if($package->name =="Feature")





                                            <!-- <input type="hidden" id="packageid" value=""> -->



                                                <div class="col-12 col-sm-6 mb-2 basic m-auto">

                                                    <div class="card">

                                                        <div class="heading">{{$package->name}}</div>

                                                        <div class="description">{{$package->tagline}}</div>

                                                        <div class="moneyDetail">

                                                            £{{number_format($package->price, 2)}} <span>per<br>


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

                                                                       case 4:

                                                                    $package_duration = "Car";

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

                                                        <div

                                                                class="pckgshow">{{(!empty($user_package->package_id) && $user_package->package_id == $package->id) ? 'You are on this package':((!empty($package->off_bit) && $package->off_bit == 1) ? $package->off_percentage."% Off" : 'No offer')}}</div>


                                                        <div class="card-body">

                                                            <div class="price">Price: £{{$package->price}}</div>

                                                            <hr>

                                                            <div class="price">Renew : {{$package_duration}}</div>

                                                            <hr>

                                                            <div class="price">
                                                                Adverts: {{!empty($attributes->adverts) ? $attributes->adverts : ''}} Posts
                                                            </div>
                                                            <hr>
                                                            <div class="price">Image per post: {{!empty($attributes->images_per_post) ? $attributes->images_per_post : ''}} Images
                                                            </div>
                                                            <hr>
                                                            <div class="price">Video per post: {{!empty($attributes->videos_per_post) ? $attributes->videos_per_post : ''}}</div>
                                                              <form method="post" action="{{route('pay-now')}}">
                                                                @csrf
                                                                <input type="hidden" name="price" value="{{$package->price}}">
                                                                <input type="hidden" name="packege_id" value="{{$package->id}}">
                                                            <div class="takethisbutton">
                                                                {{--id="pkg_featured_car"--}}
                                                                @if(!empty($user_package) && $user_package->free_post_per_package > 0)
                                                                <button class="btn" >Free Adverts ({{$user_package->free_post_per_package}}) </button>
                                                                @else
                                                                <button type="submit" class="btn"> Take this </button>
                                                                @endif
                                                            </div>
                                                           </form>

                                                        </div>

                                                    </div>

                                                </div>



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


@include('frontend.partials.footer')
@if(!empty($user_package))
    @include('frontend.partials.filters-script',["user_package"=>$user_package])
@else
    @include('frontend.partials.filters-script')
@endif


