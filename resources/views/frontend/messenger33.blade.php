@include('frontend.partials.header')

<div class="container careers-body  messengerscreen">
    <div class="row messenger pt-2 mt-3">
        <div class="col-12 col-sm-4 leftsidebar " id="leftsidebar">
            <div class="row">

                <div class="col-12 allconeversationdiv">
                    <div class="input-group  m-0" id="chat" style="padding-top: 15px;">
                        <input type="text" id="search_username" class="form-control" placeholder=" Search  username" aria-label="Search  username" aria-describedby="basic-addon2">
                        <div class="input-group-append" style="background: transparent;">
                            <span class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-4 serchbtn">
                    <button type="submit"></button>
                </div> -->
                <div class="col-12 p-0">
                    <hr>
                </div>
            </div>


            <div class="row user-message-list" id="userprofile">
                @if(!empty($result) && count($result) > 0)
                    @foreach($result as $r)
                        @if($r->from->id==session('userDetails')->id)
                            @php $pic=$r->to->avatar @endphp
                           @if($pic==null)
                                @php $pic="https://www.google.com/imgres?imgurl=https%3A%2F%2Faui.atlassian.com%2Faui%2F8.6%2Fdocs%2Fimages%2Favatar-person.svg&imgrefurl=https%3A%2F%2Faui.atlassian.com%2Faui%2F8.6%2Fdocs%2Favatars.html&tbnid=_tfY4jaB-Ufo8M&vet=12ahUKEwibsPjSzsjuAhWM_4UKHSS9CVAQMygAegUIARDVAQ..i&docid=KVh5CcJRidka2M&w=800&h=800&q=user%20avatar&ved=2ahUKEwibsPjSzsjuAhWM_4UKHSS9CVAQMygAegUIARDVAQ" @endphp
                            @endif
                            @php $id=$r->to->id; @endphp
                            @php $name=$r->to->username @endphp
                        @else
                            @php $pic=$r->from->avatar @endphp
                            @if($pic==null)
                                @php "https://www.google.com/imgres?imgurl=https%3A%2F%2Faui.atlassian.com%2Faui%2F8.6%2Fdocs%2Fimages%2Favatar-person.svg&imgrefurl=https%3A%2F%2Faui.atlassian.com%2Faui%2F8.6%2Fdocs%2Favatars.html&tbnid=_tfY4jaB-Ufo8M&vet=12ahUKEwibsPjSzsjuAhWM_4UKHSS9CVAQMygAegUIARDVAQ..i&docid=KVh5CcJRidka2M&w=800&h=800&q=user%20avatar&ved=2ahUKEwibsPjSzsjuAhWM_4UKHSS9CVAQMygAegUIARDVAQ" @endphp
                            @endif
                            @php $id=$r->from->id; @endphp
                            @php $name=$r->from->username @endphp
                        @endif
                <div class="col-12  single-userchat" id="mess_{{$r->id}}" data-id="{{$r->id}}">
                    <div class="row m-0">
                        <div class="col-12 p-0">
                            <div class="row m-0 profilenameandpic " style="cursor: pointer;">
                                <div class="col-2 col-sm-2 pimgdiv pl-0 npimgdiv">
                                    <div class="pimg1" style="position: relative;">

                                        <img src="" alt="Card image cap">


                                        <div class="offlineuser"></div>

                                    </div>
                                </div>
                                <div class="col-10 mymessage newmymessage p-0">
                                    <div class="row">
                                        <div class="col-8 col-sm-12 col-md-12 col-lg-8 mymessage ">
                                            <h3 class="username">{{$name}}</h3>
                                        </div>
                                        <div class="col-4 col-sm-12 col-md-12 col-lg-4 messagetime pr-0" style="margin-left: 0; float:right;">
                                            <p>
                                                {{\Carbon\Carbon::parse($r->created_at)->diffForHumans()}}
                                                </p>
                                        </div>
                                        <div class="col-12 mymessage" style="padding-right: 0;">
                                            <p class="m-0">{{(!empty($r->Lastmsg->message)?$r->Lastmsg->message:'')}}</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <hr>

                </div>
                    @endforeach
                @endif
                {{-- <div class="col-12">
                    <div class="row m-0">
                        <div class="col-12 p-0">
                            <div class="row m-0 profilenameandpic " style="cursor: pointer;">
                                <div class="col-2 col-sm-2 pimgdiv npimgdiv">
                                    <div class="pimg1" style="position: relative;">
                                        <img src="{{config('app.ui_asset_url').'frontend/images/teacher3.png'}}" alt="Card image cap">
                <div class="activeuser"></div>

            </div>
        </div>
        <div class="col-10 mymessage p-0">
            <div class="row">
                <div class="col-8 mymessage ">
                    <h3> Rentmoe User </h3>
                </div>
                <div class="col-4  messagetime p-0" style="margin-left: 0;">
                    <p>2 weeks ago</p>
                </div>
                <div class="col-12 mymessage" style="padding-right: 0;">
                    <p class="m-0">Me: i am rentmoe user and here for.....</p>
                </div>
            </div>

        </div>
    </div>
</div>

</div>
<hr>

</div>
--}}


</div>
</div>
<div class="col-12 col-sm-8 leftsidebar mbleftsidebar chat_content" id="chat_append" >
    @if($result[0]->from->id==session('userDetails')->id)
        @php $pic=$result[0]->to->avatar @endphp
        @if($pic==null)
            @php $pic="https://www.google.com/imgres?imgurl=https%3A%2F%2Faui.atlassian.com%2Faui%2F8.6%2Fdocs%2Fimages%2Favatar-person.svg&imgrefurl=https%3A%2F%2Faui.atlassian.com%2Faui%2F8.6%2Fdocs%2Favatars.html&tbnid=_tfY4jaB-Ufo8M&vet=12ahUKEwibsPjSzsjuAhWM_4UKHSS9CVAQMygAegUIARDVAQ..i&docid=KVh5CcJRidka2M&w=800&h=800&q=user%20avatar&ved=2ahUKEwibsPjSzsjuAhWM_4UKHSS9CVAQMygAegUIARDVAQ" @endphp
        @endif
        @php $name=$result[0]->to->first_name @endphp

    @else
        @php $pic=$result[0]->from->avatar @endphp
        @if($pic==null)
            @php $pic="https://www.google.com/imgres?imgurl=https%3A%2F%2Faui.atlassian.com%2Faui%2F8.6%2Fdocs%2Fimages%2Favatar-person.svg&imgrefurl=https%3A%2F%2Faui.atlassian.com%2Faui%2F8.6%2Fdocs%2Favatars.html&tbnid=_tfY4jaB-Ufo8M&vet=12ahUKEwibsPjSzsjuAhWM_4UKHSS9CVAQMygAegUIARDVAQ..i&docid=KVh5CcJRidka2M&w=800&h=800&q=user%20avatar&ved=2ahUKEwibsPjSzsjuAhWM_4UKHSS9CVAQMygAegUIARDVAQ" @endphp
        @endif
        @php $name=$result[0]->from->first_name @endphp

    @endif

    @if(!empty($result) && count($result) > 0)
    <div class="col-12">
        <div class="row">
            <div class=" backarrowdiv"><i class="fa fa-arrow-left" id="backarrow"></i></div>
            <div class="col-12 messengerusername newmessagetime messagetime" style="position: relative;">
                <div class="online" ></div>
                <h3 class="m-0 username">{{$name}}</h3>
                <p class="m-0 offline"> <span>5 minutes ago</span></p>
                {{-- <div>
                    <a class="btn createanoffer" data-toggle="modal" data-target="#createoffermodal"> Create an offer</a>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="col-12 p-0 line-hr-chat">
        <hr>
    </div>
    <div class="col-12 singleMessagesDiv" id="msg_app_{{!empty($result[0]->id)?$result[0]->id:''}}" style="overflow-y: auto;max-height:45vh;min-height:45vh;overflow-x:hidden;">
        @if(!empty($result[0]->Allmsg) && count($result[0]->Allmsg) > 0)
            @foreach($result[0]->Allmsg as $m)
                @if($m->from!=session('userDetails')->id)
        <div class="row messageshow">
                    <div class=" col-12 col-sm-8" style="margin-top: 25px;">
                        <div class="row m-0">
                            <div class="col-12 p-0">
                                <div class="row profilenameandpic">
                                    <div class="col-2  otherchatimgdiv">
                                        <div class="pimgother">
                                            <img src="{{$m->to_user->avatar}}" alt="Card image cap">
    </div>
</div>
<div class="col-8  othermessage ">
    <div class="othr-cntnt">
    <p>j{{$m->message}}</p>
{{--        <div class="row p-2 m-0 requestmessage" style="background: #ededed;">--}}
{{--        <div class="col-6 p-0 pr-0 imagesection">--}}
{{--            <img src="{{config('app.ui_asset_url').'frontend/img/coverevents.jpg'}}" alt="Card image cap">--}}
{{--        </div>--}}
{{--        <div class="col-6 p-0 content">User Friendly Ui</div>--}}
{{--    </div>--}}
    </div>



</div>
</div>
</div>

</div>
</div>
</div>
                @else
<div class="row d-flex flex-row-reverse">
    <div class="col-12 col-sm-8" style="margin-top: 25px;">
        <div class="row m-0">

            <div class="col-sm-10 col-12 myMessage p-0">
                <p>{{$m->message}}


                </p>

            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-2  otherchatimgdiv otherchatimgdivmbl">
                <div class="pimgother">
                    <img src="{{$m->from_user->avatar}}" alt="Card image cap">

                </div>
            </div>

        </div>
    </div>

</div>
                @endif
            @endforeach
        @endif
        @if($result[0]->_to==session('userDetails')->id)
            @php $idd=$result[0]->_from @endphp

        @else
            @php $idd=$result[0]->_to @endphp

        @endif
            <div class="col-6" style="margin-top: 16px;font-size: 11px;" id="ty_{{$idd}}"> </div>
</div>
<div class="col-12 p-0 messagarea">
    <div class="col-12 s1t typing" style="display: none">
        <p></p>
    </div>
    <div class="row m-0">
        <div class="col-12 mobilepdnig">
            <form>
                <div class="form-row">
                    <div class="form-group col-9 col-sm-9 msgtxtarea  col-md-10 col-lg-11">
                        <input type="hidden" name="reaciver_id" id="reaciver_id" value="{{$result[0]->_from==session("userDetails")->id ? $result[0]->_to : $result[0]->_from}}">
                        <input type="hidden" name="type" id="type" value="{{!empty($result[0]->Lastmsg->car_type)?$result[0]->Lastmsg->car_type:''}}">
                        <input type="hidden" name="car_id" id="car_id" value="{{!empty($result[0]->Lastmsg->id)?$result[0]->Lastmsg->id:''}}">
                        <textarea class="form-control" id="emojitext" name="message" rows="1" style="resize: none;"></textarea>
                    </div>

                    <div class="form-group col-3 msgsndarea col-sm-3 col-md-2 col-lg-1 sendbtndiv"> <button type="submit" class="btn createofferbtn">Send</button></div>
                </div>
            </form>

        </div>
        <div class="col-12">

        </div>
    </div>

</div>
        @endif
</div>
</div>
</div>
@include('frontend.partials.footer')
