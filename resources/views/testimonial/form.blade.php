<div class="card-body">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="form-group">
        <label for="blog_title">User Name:</label>
        <input type="text" class="form-control" placeholder="User Name" required  aria-describedby="blog_title_help" name='user_name'
            value="{{old("event_name",$post->user_name)}}">
        {{--<small id="blog_title_help"--}}
            {{--class="form-text text-muted">{{ __('admin/pages/blog_post_list.post_title_description') }}</small>--}}
    </div>

    {{--<div class="form-group">--}}
        {{--<label for="blog_subtitle">Comment:</label>--}}
        {{--<input type="text" class="form-control" placeholder="Comment" aria-describedby="blog_subtitle_help" name='comment'--}}
            {{--value='{{old("event_host",$post->comment)}}'>--}}
        {{--<small id="blog_subtitle_help"--}}
            {{--class="form-text text-muted">{{ __('admin/pages/blog_post_list.post_subtitle_description') }}</small>--}}
    {{--</div>--}}

        <div class="form-group">
            <label for="blog_post_body">{{ __('admin/pages/blog_post_list.post_body') }}
                @if(config("blogetc.echo_html"))
                    (HTML)
                @else
                (Html will be escaped)
                @endif

            </label>
            <textarea style='min-height:600px;' class="form-control" id="testimonial_post_body"
                      aria-describedby="blog_post_body_help" placeholder="Enter Blog Body" name='post_body'>{{old("body",$post->body)}}</textarea>


            <div class='alert alert-danger'>
                {{ __('admin/pages/blog_post_list.post_body_description') }}
            </div>
        </div>

    <div class="bg-white pt-4 px-4 pb-0 my-2 mb-4 rounded border">
        <div class="float-right m-2" style="max-width:55px;">
     @if(!empty($post->img)) <img style="width: 55px;height: 25.313px;" id="blah3" src="/../../livepowerperformance/public/testimonial_images/{{$post->img}}"/>
            @else
                <img id="blah3" style="width: 55px;height: 25.313px;"  />
            @endif
        </div>
        <h4>Featured Images</h4>
        <div class="form-group mb-4 p-2">
            <label for="blog_feature_img">Image - (required)</label>
            <small id="blog__help" class="form-text text-muted">Upload image -
                {{-- <code>&times;px</code> - it will --}}
                it will show on blog and single post
            </small>
            <input class="form-control" onchange="readURL(this);" type="file" name="image"
                aria-describedby="blog_help">

        </div>
    </div>



</div>
@push('scripts')

<script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"
    integrity="sha384-BpuqJd0Xizmp9PSp/NTwb/RSBCHK+rVdGWTrwcepj1ADQjNYPWT2GDfnfAr6/5dn" crossorigin="anonymous">
</script>
<script src="{{ asset('public/js/jquery.tagsinput-revisited.min.js') }}"></script>
{{--<script>--}}
    {{--CKEDITOR.replace('post_body');--}}
        {{--if( typeof(CKEDITOR) !== "undefined" ) {--}}
                {{--CKEDITOR.replace('post_body');--}}
            {{--}--}}
{{--</script>--}}
<link rel="stylesheet" href="{{ asset('public/css/jquery.tagsinput-revisited.min.css') }}">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
{{-- @foreach ($tags as $tag)
   []
@endforeach --}}

<script>
    $('#datepickeradmin').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minDate: new Date(),
        // maxYear: parseInt(moment().format('YYYY'), 10)
    });
    $('#datepickeradmin2').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minDate: new Date(),
        // maxYear: parseInt(moment().format('YYYY'), 10)
    });
  // map api settings
    function activaTab(hidetab, showtab, tabChanged = null) {
        $('#' + hidetab).hide();
        $('#' + showtab).show();
        if (!tabChanged) {
            $('a[href="#' + showtab + '"]').click();
        }
    }


    function initAutocomplete() {
        let mapLat = Number('{{!empty($post->map_lat) ? $post->map_lat : "40.6971494"}}');
        let mapLng = Number('{{!empty($post->map_lng) ? $post->map_lng : "-74.2598655"}}');

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

                $('#EventMapLat').val(places[0].geometry.location.lat());
                $('#EventMapLng').val(places[0].geometry.location.lng());
                // var addr=places[0].address_components;
                // for (var x in addr){
                //     console.log(addr[x].types);
                //     if(addr[x].types[0]==="country"){
                //         $(".s_country option[value='"+ addr[x].long_name +"']").prop("selected",true);
                //         $(".s_country").prop("disabled",true);
                //         $("#profileCountry").val(addr[x].long_name);
                //     }
                //     else if(addr[x].types[0]==="administrative_area_level_2"){
                //         $("input[name='city']").val(addr[x].long_name);
                //         $("#city").val(addr[x].long_name);
                //
                //     }
                // }



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





    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah3')
                    .attr('src', e.target.result)
                    .width(55)
                    .height(25.313);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
<script type="text/javascript">

    CKEDITOR.replace('testimonial_post_body');

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAddbxUhXJYrPqsX24kbEhFR1cJg37U2vA&libraries=places&callback=initAutocomplete" async defer></script>
@endpush
