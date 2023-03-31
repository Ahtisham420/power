@include('frontend.partials.header')

<div class="container">

    <div class="row">

        <div class="col-12 page-heading-privacy-policy">
@if(!empty($career) && !empty($career->title))
            {{$career->title}}
    @else
                Careers
            @endif
        </div>
        <div class="col-12 career-page">
            @if(!empty($career) && !empty($career->img))
                <img src="/../../public/careers_images/{{$career->img}}" alt=""/>
            @else
                <img src="{{ config('app.ui_asset_url').'frontend/img/logo/career.jpg' }}" alt=""/>
    @endif
        </div>


        <div class="col-12 career-page">
            <br>
            @if(!empty($career) && !empty($career->description))
                    {!! $career->description !!}
            @endif
        </div>
        <div class="col-12 career-page">
            @if(!empty($career) && !empty($career->location) )
            <br>
               <h2>Location Name:{{$career->location}}</h2>
            @endif
                <br>

            @if(!empty($career) && !empty($career->map_lat) && !empty($career->map_lng))
                <iframe src="https://www.google.com/maps/embed/v1/place?q={{$career->map_lat}},{{$career->map_lng}}&amp;key=AIzaSyAddbxUhXJYrPqsX24kbEhFR1cJg37U2vA" width="100%" height="300px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            @endif
        </div>

    </div>

</div>

@include('frontend.partials.footer')

