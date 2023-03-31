@include('frontend.partials.header')

<div class="container">

    <div class="row">

        <div class="col-12 page-heading-privacy-policy">

            Terms & Conditions

        </div>

        <div class="col-12 page-heading-privacy-policy-detail">

            {!! $result->body !!}


        </div>

    </div>

</div>

@include('frontend.partials.footer')

