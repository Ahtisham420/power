@include('frontend.partials.header')
<!-- <div class="container-fliud slider">
      <div class="row m-0">
        <div class="col-12 aboutblog">
          <div class="blogHeading">
            Blog Detail
          </div>
          <div class="blogdescription">
            Elementum Libero Hac Leo Integer. Risus Hac Parturient Feugiat Litora<br>
Cursus Hendrerit Bibendum Per
          </div>

        </div>
      </div>



    </div> -->
<div class="container">
    <div class="row">
        @if(!empty($result))
        <div class="col-12 col-sm-12 col-lg-8 blogsection">
            <div class="row m-0">
                <div class="col-12 blogimage p-0">
                    <img src="{{ asset('/public/event_images/'.$result->img) }}" alt="">
                </div>
                <div class="col-12 col-xl-8 blogtitle ">
             {{$result->event_name}}
                </div>
                <div class="col-12 blogwriter p-0">
                    <div class="row m-0">
                        <div class="col-11 writerNAme p-0">
                            <h6 class="m-0">{{ $result->event_host}}</h6>

                            <p class="m-0"><b>start date:</b>{{$result->started_date}}|<b>End Date:</b>{{$result->end_date}}</p>
                        </div>
                        <div class="col-1 picdiv p-0">
                            <div></div>

                        </div>

                    </div>

                </div>
                <div class="col-12 blogdetail">
                    <p>{{$result->event_description}}</p>

                </div>
                <div class="col-12 p-0">
                    <hr>
                </div>

                <iframe src="https://www.google.com/maps/embed/v1/place?q={{$result->map_lat}},{{$result->map_lng}}&amp;key=AIzaSyAddbxUhXJYrPqsX24kbEhFR1cJg37U2vA" width="100%" height="300px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>



            </div>
        </div>
        @endif
        <div class="col-12 col-sm-12 col-lg-4 blogsection">
            <div class="row m-0">
                <div class="col-12 searchitem">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control input-event" placeholder="Search Event By Location" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text event-span-search" id="basic-addon2"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-0  popularblog">
                <div class="col-12">
                    <div class="row headingmargin">
                        <div class="col-12 blogheading" id="event-search-popular">Popular Events</div>
                    </div>
                </div>
                <div id="append_id_event">
                  @foreach($sidevent as $event)
                    <div class="col-12 blogcard">
                        <div class="card">
                         <a href="{{route("event-detail",["id"=>base64_encode($event->id)])}}"><img class="card-img-top" src="{{ asset('/public/event_images/'.$event->img) }}" alt="Card image cap"></a>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 blogcardheading">
                                        {{$event->event_name}}
                                    </div>
                                    <div class="col-12 blogwritername">{{$event->event_host}} | {{$event->started_date}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                      @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
{{--event mpdal--}}


@include('frontend.partials.advertisment-footer')
@include('frontend.partials.footer')
@include('frontend.partials.filters-script')