<script>
    function filters(_export = false){
        var _string = queryString("filter_search", $(".js-filter-search").val());
        if($(".js-filter-country").val() != undefined) {
            _string = queryString("filter_country", $(".js-filter-country").val(), _string);
        }
        if($(".js-filter-age").val() != undefined) {
            _string = queryString("filter_age", $(".js-filter-age").val(), _string);
        }
        if($(".js-filter-id-type").val() != undefined) {
            _string = queryString("filter_id_type", $(".js-filter-id-type").val(), _string);
        }
        if($(".js-filter-id-verification").val() != undefined) {
            _string = queryString("filter_id_verification", $(".js-filter-id-verification").val(), _string);
        }
        if($(".js-filter-user-types").val() != undefined) {
            _string = queryString("filter_user_types", $(".js-filter-user-types").val(), _string);
        }
        if($(".js-filter-gender").val() != undefined) {
            _string = queryString("filter_gender", $(".js-filter-gender").val(), _string);
        }
        if($(".js-filter-status").val()) {
            _string = queryString("filter_status", $(".js-filter-status").val(), _string);
        }
        if($(".js-filter-from-date").val() != undefined){
            _string = queryString("filter_from_date", $(".js-filter-from-date").val(),_string);
        }
        if($(".js-filter-to-date").val() != undefined) {
            _string = queryString("filter_to_date", $(".js-filter-to-date").val(), _string);
        }
        if($(".js-filter-brand").val() != undefined){
            _string = queryString("filter_brand", $(".js-filter-brand").val(), _string);
        }
        if($(".js-filter-model").val() != undefined){
            _string = queryString("filter_model", $(".js-filter-model").val(), _string);
        }
        if(_export){
            _string = queryString("filter_csv_export", true, _string);
        }
        return _string;
    }

    function queryString(key, dataString, string = ''){
        var _qString = "";
        if(string === ''){
            _qString = "?key=filters&"+key + "=" +dataString +"&typ={{$key}}";
        }else{
            _qString = string  +"&" + key + "=" + dataString +"&typ={{$key}}";
        }
        return _qString;
    }

    $(document).on('click','.js-filter-export' ,function() {
        let baseurl = $('meta[name=baseurl]').attr("content");
        var _string = filters(true);
        window.open(baseurl + '/users/all'+_string, '_blank');
    });
    $(document).on('click','.js-filter-apply' ,function() {
            let baseurl = $('meta[name=baseurl]').attr("content");
            var _string = filters();
            console.log(_string);
            axios.get(baseurl + '/car-settings/all/{{$key}}'+_string).then(function(response){
                    console.log(_string);
                    $(".js-index-table").html(response.data);
                })
        });
    $(document).on('click','.js-filter-search-btn' ,function() {
        let baseurl = $('meta[name=baseurl]').attr("content");
        var _string = queryString("filter_search", $(".js-filter-search").val());
        axios.get(baseurl + '/car-settings/all/{{$key}}'+_string)
            .then(function(response) {
                $(".js-index-table").html(response.data);
            });
    });
    $(document).on('click','.page-link' ,function(event) {
        event.preventDefault();
        let baseurl = $('meta[name=baseurl]').attr("content");
        var _url = $(this).attr('href');
        @if(!isset($_GET['key']))
            _url = _url  + "&typ={{$key}}&key=paginate";
        @endif
        axios.get(_url)
            .then(function(response){
                $(".js-index-table").html(response.data);
            })
    });
    $(document).on('change','.brand-select-admin',function (e) {
        e.preventDefault();

        var value  =   $(this).find(':selected').val();

        if(value != ""){

            console.log(value);

            var url = '{{route('model-brand',['id'=>':id'])}}';

            url = url.replace(':id',value);

        }else {

            return false;

        }

        $.ajax({

            method:"get",

            url:url,

            DataType:"json",

            success:function(data){

                console.log(data);

                if(data.status==1){

                    $(".make-append-admin").empty();

                    $(".make-append-admin").html('<option value="">Select Model</option>');

                    for(x in data.result){

                        var apend= '<option value="'+data.result[x]['id']+'" data-val="'+data.result[x]['_value']+'">'+data.result[x]['_value']+'</option>';

                        $(".make-append-admin").append(apend);

                    }



                }else{

                    $('.make-append-admin').html('<option selected disabled>No Data Found</option>');

                    return false;

                }





            },

            error:function(data){

                console.log(data);



            }



        });



    });

    $(document).on('click','.js-filter-reset' ,function() {
        let baseurl = $('meta[name=baseurl]').attr("content");
        window.location.assign(baseurl + '/car-settings/all/{{$key}}');
    });
</script>