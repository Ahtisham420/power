<div class="row" id="simplediv">

            <div class="col-12 col-sm-12 col-md-3 tabmenu  p-0">

                <div class="nav flex-column nav-pills tabs-nav-power new-tab-formobile new-flex-row" id="v-pills-tab"

                     role="tablist" aria-orientation="vertical">
                    @if(!empty($tab) && $tab == "my_advert")
                    <a class="nav-link tablink active" href="{{route('my-advert')}}">My Adverts</a>
                  @else
                        <a class="nav-link tablink"  href="{{route('my-advert')}}"
                          >My Adverts</a>
                    @endif
                    {{--id="v-pills-sell-your-car-tab"--}}
                    @if(!empty($tab) && $tab == "sell_your_car")
                    <a class="nav-link tablink active" href="{{route('sell-your-car')}}" >Sell your car</a>
@else
                        <a class="nav-link tablink" href="{{route('sell-your-car')}}" >Sell your car</a>
                    @endif
                    {{-- @php

                        $packages_array= json_decode($package->attributes)

                       $package =   $packages_array->images_per_post

                       dd($package);

                    @endphp --}}

                    {{-- @if()

                    @endif --}}
                        @if(!empty($tab) && $tab == "change_package" )
                    <a class="nav-link tablink active" href="{{route('change-package')}}">Additional Packages</a>
                        @else
                            <a class="nav-link tablink" href="{{route('change-package')}}">Additional Packages</a>
                        @endif
                        @if(!empty($tab) && $tab == "my_payments")
                    <a class="nav-link tablink active" href="{{route('my.payments')}}">My Payments</a>
                @else
                    <a class="nav-link tablink" href="{{route('my.payments')}}">My Payments</a>
                @endif
                         @if(!empty($tab) && $tab === "wanted_sections_tab" || $tab === "wanted_list")
                           <a  class=" nav-link tablink active" data-toggle="collapse" href="#collapse2">Wanted Adverts<i class="fas fa-caret-down ml-2" style="font-size:16px"></i></a>
                         @else
  <a  class=" nav-link tablink " data-toggle="collapse" href="#collapse2">Wanted Adverts<i class="fas fa-caret-down ml-2" style="font-size:16px"></i></a>
                         @endif
                             
      <div id="collapse2" class="collapse inMobileView">
        <ul class="list-group">
          <li class="list-group-item tablink"><a href="{{route('create-wanted-section')}}" class="tablink ">Create Wanted Adverts</a></li>
          <li class="list-group-item tablink"> <a href="{{route('wanted-list')}}" class="tablink">My Wanted Adverts</a> </li>
        </ul>
      </div>
              <!--           @if(!empty($tab) && $tab === "wanted_sections_tab")
                    <a class="nav-link tablink active"  href="{{route('create-wanted-section')}}">Create Wanted Adverts</a>
@else
                            <a class="nav-link tablink"  href="{{route('create-wanted-section')}}">Create Wanted Adverts</a>
                        @endif
                        @if(!empty($tab) && $tab === "wanted_list")
                            <a class="nav-link tablink active" href="{{route('wanted-list')}}">My Wanted Adverts</a>
                            @else
                            <a class="nav-link tablink" href="{{route('wanted-list')}}">My Wanted Adverts</a>
                        @endif -->
    
 
      @if(!empty($tab) && $tab === "garage" || $tab === "garage_advert")
       
          <a  class=" nav-link tablink active" data-toggle="collapse" href="#collapse1">Garage Adverts<i class="fas fa-caret-down ml-2" style="font-size:16px"></i></a>
@else
<a  class=" nav-link tablink" data-toggle="collapse" href="#collapse1">Garage Adverts<i class="fas fa-caret-down ml-2" style="font-size:16px"></i></a>
           @endif
      <div id="collapse1" class="collapse inMobileView">
        <ul class="list-group">
    <li class="list-group-item tablink">
 @if(!empty($tab) && $tab === "garage_advert")
      <a href="{{route('create-garage')}}" class="tablink active">Create Garage Adverts</a>
 @else
  <a href="{{route('create-garage')}}" class="tablink ">Create Garage Adverts</a>
 @endif
    </li>
          
          <li class="list-group-item tablink"> 
@if(!empty($tab) && $tab === "garage")
            <a href="{{route('garage-list')}}" class="tablink active">My Garage Adverts</a>
    @else
     <a href="{{route('garage-list')}}" class="tablink">My Garage Adverts</a>
    @endif
          </li>
        </ul>
      </div>

                <!--   @if(!empty($tab) && $tab === "garage_advert")
                    <a class="nav-link tablink active" href="{{route('create-garage')}}">Create Garage Adverts</a>
                      @else
                            <a class="nav-link tablink" href="{{route('create-garage')}}">Create Garage Adverts</a>
                        @endif -->
             <!--            @if(!empty($tab) && $tab === "garage")
                    <a class="nav-link tablink active" href="{{route('garage-list')}}">My Garage Adverts</a>
                            @else
                            <a class="nav-link tablink " href="{{route('garage-list')}}">My Garage Adverts</a> -->
<!-- @endif -->
                    <!--     @if(!empty($tab) && $tab === "misslenious_create")
                    <a class="nav-link tablink active" href="{{route('create-misc-dashboard')}}">Create Miscellaneous Adverts</a>
                        @else
                           <a class="nav-link tablink" href="{{route('create-misc-dashboard')}}">Create Miscellaneous Adverts</a>
                        @endif
                        @if(!empty($tab) && $tab === "misslenious_add_tab")
                    <a class="nav-link tablink active" href="{{route('misc-list')}}">My Miscellaneous Adverts</a>
                            @else
                             <a class="nav-link tablink" href="{{route('misc-list')}}">My Miscellaneous Adverts</a>
                        @endif -->
                        @if(!empty($tab) && $tab === "misslenious_create" || $tab === "misslenious_add_tab")
                               <a  class=" nav-link tablink active" data-toggle="collapse" href="#collapse3">Miscellaneous Adverts<i class="fas fa-caret-down ml-2" style="font-size:16px"></i></a>
 @else
     <a  class=" nav-link tablink " data-toggle="collapse" href="#collapse3">Miscellaneous Adverts<i class="fas fa-caret-down ml-2" style="font-size:16px"></i></a>
                               @endif
     <div id="collapse3" class="collapse inMobileView">
        <ul class="list-group">
          <li class="list-group-item tablink"><a href="{{route('create-misc-dashboard')}}" class="tablink">Create Miscellaneous Adverts</a></li>
          <li class="list-group-item tablink"> <a href="{{route('misc-list')}}" class="tablink">My Miscellaneous Adverts</a> </li>
        </ul>
      </div>

                </div>



            </div>

             <div class="col-12 col-sm-12 col-md-9  mobile-tab-showing" style="margin-left: 11px;">

                <div class="row " id=" last-open">

                    <div class="col-12 tabshowing ">

                        <img class="badge1"

                             src="{{ config('app.ui_asset_url') . 'frontend/img/carselling/badge.png' }}">

                   <div class="tab-content" id="v-pills-tabContent">

                     @if(!empty($tab) && $tab === "my_advert")

                      @include("frontend.myadvertsubtab")
@elseif(!empty($tab) && $tab === "sell_your_car")
                      @include("frontend.sellyourcar1")
                       @elseif(!empty($tab) && $tab === "change_package")
                      @include("frontend.changepackage")
                       @elseif(!empty($tab) && $tab === "wanted_sections_tab")
                      @include("frontend.wantedsectionsubtab")
                       @elseif(!empty($tab) && $tab === "wanted_list")
                      @include("frontend.wanted_list")
                     @elseif(!empty($tab) && $tab === "my_payments")
                        @include("frontend.my_payments")
                       @elseif(!empty($tab) && $tab === "garage_advert")
                      @include("frontend.garageadvert")
                       @elseif(!empty($tab) && $tab === "garage")
                      @include("frontend.garage")
                       @elseif(!empty($tab) && $tab === "misslenious_create")
                      @include("frontend.misslenioussubtab")
                       @elseif(!empty($tab) && $tab === "misslenious_add_tab")
                      @include("frontend.missleniousaddsubtab")

                      @endif

                      

                      

                   </div>

                   </div>





                </div>



            </div>

 </div>
