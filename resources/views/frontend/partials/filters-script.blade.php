<script>



  $('.price_space_detect').on('keypress', function(e) {

            if (e.which == 32){

                console.log('Space Detected');

                return false;

            }

        });





    $(document).on("change",".filter-input-class",function(e){
        
        $(".f-card-description").css("display","block");

        e.preventDefault();

        var car_type = $("#type-filters").val();

        var query='';

        var count=0;

      var homequery = $("#home-filter").val();

   var featured_query = $("#featured-filters").val();

        // sort By

console.log(featured_query,car_type);

        $(".custom-control-input").each(function(e){



            if($(this).prop("checked")){



                if(count == 0){

                    query=' (';

                }

                var col=$(this).data("col");

                var val=$(this).val();

                query+= col +" =" +"'"+ val + "'"+ " or ";

                count++;

            }

        });



        if(count==0){
            
         query="car_availbilty='"+ car_type +"'";


              }else{



                query=query.substring(0,query.length-4);

                query= query+ ")"+"and car_availbilty='"+ car_type +"'";







        }

        var fuel = $("#car-fuel").val();

        var year = $("#car-year").val();

        if(year !== null && year !== ""){

            if (fuel === "DESC"){

                query = query +" ORDER BY "+year+" DESC";



            }else{

                query = query +"  ORDER BY "+year+" ASC";

            }

           

        }



          console.log(query);

        var url="{{ route('filter-data',['query'=>':val'])}}";

        url=url.replace(":val",query);

  

        $.ajax({

            method:"get",

            url:url,

            DataType:"json",

            success:function(data){

                  console.log(data);

                $("#apend").remove();

                $(".append_class").append('<div id="apend" class="row m-0" style="width:100%;"></div>');

                if(data.status==1){

                      $(".remove-paginate-filters").remove();

                    $(".error-post-code").css({display:'none'});

                    for(x in data.result){

                        var a_route = '{{route('car-details',['id'=>':id'])}}';

                        var id = btoa(data.result[x]['id']);

                        a_route=a_route.replace(":id",id);

                        if(data.result[x]["car_condition"]==="Used"){

                            var v="Used";

                        }else{

                            var v="new";

                        }

                        if(data.result[x]["featured"]=='1'){

                            var budge = '<p style="font-size: 14px;font-weight: 200">Featured</p>';



                        }else {

                     var budge = '<p>'+v+'</p>';

                        }

                        if(data.result[x]["car_availbilty"]==="Lease"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><button class="bidnowbtn">Bid Now</button></div>';

                        }else if(data.result[x]["car_availbilty"] === "Sell"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if (data.result[x]["car_availbilty"]==="American-Muscle"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if (data.result[x]["car_availbilty"]==="Prestige"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if(data.result[x]["car_availbilty"]==="Auction"){



                            if (data.result[x]["car_auction"] !==null){

                                var price = '<p class="cardPrice">£'+data.result[x]["car_auction"]["bid_amount"]+'</p>';

                            }else {

                                var price = '';

                            }



                            var type = '';

                        }else if(data.result[x]["car_availbilty"]==="Swap"){
                            
                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var id=  data.result[x]["id"] ;

                              var s_id  =  id.toString();

                            if(data.user_car_id.length !== 0 && data.user_car_id.includes(s_id)){

                                var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><label class="mt-2 swap_label">You already request this car</label></div>';

                            }else{

                                var id =  btoa(data.result[x]["id"]) ;

                                var url = '{{route("frontend-swap-cars",["s_id"=>":s_id"])}}';

                                url = url.replace(":s_id",id);

                             var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><a href='+url+'><button class="bidnowbtn">Swap Now</button></a></div>';



                            }





                        }else if (data.result[x]["car_availbilty"]==="Rent"){

                                 if(data.result[x]["price"] != null){

                                       var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                                 }else{

                                     var price = '';

                                 }

                          



                            var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><button class="bidnowbtn">View Now</button></div>';

                        }else{

                            var type = '';

                        }
                                  if(data.result[x]["d_model"] != null){
                                     
                                       var d_model = data.result[x]["d_model"]['_value'];
                                      
                                  }else{
                                      var d_model = '';
                                  }
                                  
                                



                        var apend='';

                        var apend='<div  class="col-12 col-sm-6 col-md-4 colwidth"><div class="card" ><div class="cardimage f-cardimg">'+budge+

                            '<a href="'+a_route+'"><img class="card-img-top imgWidthAndHeight" src="'+data.result[x]["crop_image"]+'" alt="Card image cap"></a></div><div class="card-body f-card-body  d-flex flex-column">' +

                            '<div class="row"><div class="col-12 col-sm-12 col-md-7 col-lg-7 pr-0  pb-1 "  data-maxlength="10"><div class="f-card-name">' +' '+data.result[x]["year"]+' '+d_model+

                            '</div></div><div class="col-12 col-sm-12 col-md-5 col-lg-5 d-flex align-items-start justify-content-center f-card-price"><p class="f-card-price">'+price+'</p></div>' +

                            '<div class="col-12 col-sm-12 col-md-12 col-lg-12" data-maxlength="100">' +

                            '<p class="f-card-description pt-0 m-0" style="text-align:justify;">'+data.result[x]["advert_text"]+'</p>' +

                            '</div></div>' + type +

                            '</div></div></div>';

                        $("#apend").append(apend);





                    }



                    $(".f-card-name").html(function(index, currentText) {



                        var maxLength = $(this).parent().attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        } else {

                            return currentText

                        }

                    });

                    $(".f-card-description").html(function(index, currentText) {



                        var maxLength = $(this).parent().attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        } else {

                            return currentText

                        }

                    });



                }else {
   $(".remove-paginate-filters").remove();
                    $(".error-post-code").html("No Record Match");
$(".error-post-code").css({display:'block'});
                   

                }





            },

            error:function(data){

                console.log(data);



            }



        });

    });

   







    $(document).on("change",".filter-featured-car",function(e){

        $(".f-card-description").css("display","block");

        e.preventDefault();

        var car_type = $("#type-filters").val();

        var query='';

        var count=0;

        var featured_query = $("#featured-filters").val();

        // sort By

        console.log(featured_query,car_type);

        $(".custom-control-input").each(function(e){



            if($(this).prop("checked")){



                if(count == 0){

                    query=' (';

                }

                var col=$(this).data("col");

                var val=$(this).val();

                query+= col +" =" +"'"+ val + "'"+ " or ";

                count++;

            }

        });



        if(count==0){

            query='featured' + "= '" +"1'";



        }else{

                query=query.substring(0,query.length-4);

                query = query+ ")"+ " and " + 'featured' + "= '" +"1'";

        }

        var fuel = $("#car-fuel").val();

        var year = $("#car-year").val();

        if(year !== null && year !== ""){

            console.log(fuel);

            console.log(query);

            if (fuel === "DESC"){

                query = query +"  ORDER BY "+year+" DESC";



            }else{

                query = query +"  ORDER BY "+year+" ASC";

            }

           

        }

      

        console.log(query);

        var url="{{ route('filter-data',['query'=>':val'])}}";

        url=url.replace(":val",query);

       

        $.ajax({

            method:"get",

            url:url,

            DataType:"json",

            success:function(data){

                console.log(data);

                $("#apend").remove();

                $(".append_class").append('<div id="apend" class="row m-0" style="width:100%;"></div>');

                if(data.status==1){
                    
                   $(".remove-paginate-filters").remove();
                   
                    $(".error-post-code").css({display:'none'});

                    for(x in data.result){

                        var a_route = '{{route('car-details',['id'=>':id'])}}';

                        var id = btoa(data.result[x]['id']);

                        a_route=a_route.replace(":id",id);

                        if(data.result[x]["car_condition"]==="Used"){

                            var v="Used";

                        }else{

                            var v="new";

                        }

                        if(data.result[x]["featured"]=='1'){

                            var budge = '<p style="font-size: 14px;font-weight: 200">Featured</p>';



                        }else {

                            var budge = '<p>'+v+'</p>';

                        }

 if(data.result[x]["car_availbilty"]==="Lease"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><button class="bidnowbtn">Bid Now</button></div>';

                        }else if(data.result[x]["car_availbilty"] === "Sell"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if (data.result[x]["car_availbilty"]==="American-Muscle"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if(data.result[x]["car_availbilty"]==="Auction"){



                            if (data.result[x]["car_auction"] !==null){

                                var price = '<p class="cardPrice">£'+data.result[x]["car_auction"]["bid_amount"]+'</p>';

                            }else {

                                var price = '';

                            }



                            var type = '';

                        }else if (data.result[x]["car_availbilty"]==="Prestige"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if(data.result[x]["car_availbilty"]==="Swap"){

                         

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var id=  data.result[x]["id"] ;

                            var s_id  =  id.toString();

                            if(data.user_car_id.length !== 0 && data.user_car_id.includes(s_id)){

                                var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><label class="mt-2 swap_label">You already request this car</label></div>';

                            }else{

                                var id =  btoa(data.result[x]["id"]) ;

                                var url = '{{route("frontend-swap-cars",["s_id"=>":s_id"])}}';

                                url = url.replace(":s_id",id);

                                var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><a href='+url+'><button class="bidnowbtn">Swap Now</button></a></div>';



                            }





                        }else if (data.result[x]["car_availbilty"]==="Rent"){

                            if (data.result[x]["price"] !== null){

                                var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            }else {

                                price = '';

                            }

                            var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><button class="bidnowbtn">View Now</button></div>';

                        }else{

                            var type = '';

                        }
                        
                              if(data.result[x]["d_model"] != null){
                                     
                                       var d_model = data.result[x]["d_model"]['_value'];
                                      
                                  }else{
                                      var d_model = '';
                                  }

                        var apend='';

                        var apend='<div  class="col-12 col-sm-6 col-md-4 colwidth"><div class="card" ><div class="cardimage f-cardimg">'+budge+

                            '<a href="'+a_route+'"><img class="card-img-top imgWidthAndHeight" src="'+data.result[x]["crop_image"]+'" alt="Card image cap"></a></div><div class="card-body f-card-body  d-flex flex-column">' +

                            '<div class="row"><div class="col-12 col-sm-12 col-md-7 col-lg-7 pr-0  pb-1 "  data-maxlength="10"><div class="f-card-name">' +' '+data.result[x]["year"]+' '+d_model+

                            '</div></div><div class="col-12 col-sm-12 col-md-5 col-lg-5 d-flex align-items-start justify-content-center f-card-price"><p class="f-card-price">'+price+'</p></div>' +

                            '<div class="col-12 col-sm-12 col-md-12 col-lg-12" data-maxlength="100">' +

                            '<p class="f-card-description pt-0 m-0" style="text-align:justify;">'+data.result[x]["advert_text"]+'</p>' +

                            '</div></div>' + type +

                            '</div></div></div>';

                        $("#apend").append(apend);





                    }

                    $(".f-card-name").html(function(index, currentText) {



                        var maxLength = $(this).parent().attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        } else {

                            return currentText

                        }

                    });

                    $(".f-card-description").html(function(index, currentText) {



                        var maxLength = $(this).parent().attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        } else {

                            return currentText

                        }

                    });



                }else {

                  
$(".remove-paginate-filters").remove();
                    $(".error-post-code").css({display:'block'});

                }





            },

            error:function(data){

                console.log(data);



            }



        });

    });





    $(document).on("change",".filter-home-class",function(e){

        $(".f-card-description").css("display","block");

        e.preventDefault();

        var car_type = $("#type-filters").val();

        var query='';

        var count=0;

        var home_query = $("#home-filter").val();

        var featured_query = $("#featured-filters").val();

     

        // sort By

        $(".custom-control-input").each(function(e){

            if($(this).prop("checked")){

                
                var col=$(this).data("col");

                var val=$(this).val();

                query+= col +" =" +"'"+ val + "'"+ " or ";

                count++;

            }

        });

        if(count==0){

            query =home_query

        }else {

            if (home_query === "" || home_query === "null") {

                query = query.substring(0, query.length - 4);

            } else {

                query =  query.substring(0, query.length - 4);

                query = query  + "and " + home_query;

            }

        }



        var fuel = $("#car-fuel").val();

        var year = $("#car-year").val();

        if(year !== null && year !== ""){

            if (count == 0 && home_query === "null"){

                query = query.substring(0, query.length - 4);

            }

            if (fuel === "DESC"){

                query = query +"  ORDER BY "+year+" DESC";

            }else{

                query = query +"  ORDER BY "+year+" ASC";

            }

           
        }

       



if (count == 0){

query =   query;

    var url="{{ route('filter-data',['query'=>':val','op'=>'null'])}}";

    url=url.replace(":val",query);



}else{

    var url="{{ route('filter-data',['query'=>':val','op'=>':qr'])}}";

    url=url.replace(":val",query);



}

        console.log(query,count);

      

        $.ajax({

            method:"get",

            url:url,

            DataType:"json",

            success:function(data){

                $("#apend").remove();

                $(".append_class").append('<div id="apend" class="row m-0" style="width:100%;"></div>');

                if(data.status==1){

                    $(".pagination-remove-home").hide();

                    $(".error-post-code").css({display:'none'});

                    $(".h-no-record").css({display:'none'});

                    for(x in data.result){

                        var a_route = '{{route('car-details',['id'=>':id'])}}';

                        var id = btoa(data.result[x]['id']);

                        a_route=a_route.replace(":id",id);

                        if(data.result[x]["car_condition"]==="Used"){

                            var v="Used";

                        }else{

                            var v="new";

                        }

                        if(data.result[x]["featured"]=='1'){

                            var budge = '<p style="font-size: 14px;font-weight: 200">Featured</p>';



                        }else {

                            var budge = '<p>'+v+'</p>';

                        }

                        if(data.result[x]["car_availbilty"]==="Lease"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><button class="bidnowbtn">Bid Now</button></div>';

                        }else if(data.result[x]["car_availbilty"] === "Sell"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if (data.result[x]["car_availbilty"]==="Prestige"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if (data.result[x]["car_availbilty"]==="American-Muscle"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if(data.result[x]["car_availbilty"]==="Auction"){



                            if (data.result[x]["car_auction"] !==null){

                                if (data.result[x]["car_auction"]) {

                                    var price = '<p class="cardPrice">£' + data.result[x]["car_auction"]["bid_amount"] + '</p>';

                                }

                            }else {

                                var price = '';

                            }



                            var type = '';

                        }else if(data.result[x]["car_availbilty"]==="Swap"){

                           

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var id=  data.result[x]["id"] ;

                            var s_id  =  id.toString();

                            if(data.user_car_id.length !== 0 && data.user_car_id.includes(s_id)){

                                var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><label class="mt-2 swap_label">You already request this car</label></div>';

                            }else{

                                var id =  btoa(data.result[x]["id"]) ;

                                var url = '{{route("frontend-swap-cars",["s_id"=>":s_id"])}}';

                                url = url.replace(":s_id",id);

                                var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><a href='+url+'><button class="bidnowbtn">Swap Now</button></a></div>';



                            }





                        }else if (data.result[x]["car_availbilty"]==="Rent"){

                            if (data.result[x]["price"] !== null){

                                var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            }else {

                                price = '';

                            }

                            var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><button class="bidnowbtn">View Now</button></div>';

                        }else{

                            var type = '';

                        }


   if(data.result[x]["d_model"] != null){
                                     
                                       var d_model = data.result[x]["d_model"]['_value'];
                                      
                                  }else{
                                      var d_model = '';
                                  }


                        var apend='';

                        var apend='<div  class="col-12 col-sm-6 col-md-4 colwidth"><div class="card" ><div class="cardimage f-cardimg">'+budge+

                            '<a href="'+a_route+'"><img class="card-img-top imgWidthAndHeight" src="'+data.result[x]["crop_image"]+'" alt="Card image cap"></a></div><div class="card-body f-card-body  d-flex flex-column">' +

                            '<div class="row"><div class="col-12 col-sm-12 col-md-7 col-lg-7 pr-0  pb-1 "  data-maxlength="10"><div class="f-card-name">' +' '+data.result[x]["year"]+' '+d_model+

                            '</div></div><div class="col-12 col-sm-12 col-md-5 col-lg-5 d-flex align-items-start justify-content-center f-card-price"><p class="f-card-price">'+price+'</p></div>' +

                            '<div class="col-12 col-sm-12 col-md-12 col-lg-12" data-maxlength="100">' +

                            '<p class="f-card-description pt-0 m-0" style="text-align:justify;">'+data.result[x]["advert_text"]+'</p>' +

                            '</div></div>' + type +

                            '</div></div></div>';

                        $("#apend").append(apend);





                    }



                    $(".f-card-name").html(function(index, currentText) {



                        var maxLength = $(this).parent().attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        } else {

                            return currentText

                        }

                    });

                    $(".f-card-description").html(function(index, currentText) {



                        var maxLength = $(this).parent().attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        } else {

                            return currentText

                        }

                    });



                }else {

                    $(".error-post-code").html("No Record Match");

                    $(".h-no-record").css({display:'none'});

                    $(".error-post-code").css({display:'block',color:"#e4001b",fontSize:'25px',fontWeight: '500'});

                }





            },

            error:function(data){

                console.log(data);



            }



        });

    });



    $(document).on("keyup",".input-span-db",function(e){

        e.preventDefault();

        var car_type = $("#type-filters").val();

        console.log(car_type);

        var homequery =$("#home-filter").val();

        var featured_query = $("#featured-filters").val();

        var val=$(".custom-control-btn").val();

        var col=$(".custom-control-btn").data("col");

        console.log(col,val,car_type);

        if(val === "") {

            $(".custom-control-btn").css("border", "1px solid #e4001b");

            $(".input-span-db").css("border", "1px solid #e4001b");

            $("#search-span-valid").html("Please enter postal code.");

            $("#search-span-valid").css({color: "#e4001b", display: "block"});

            setTimeout(function () {

                $(".custom-control-btn").css("border", "1px solid #ced4da");

                $(".input-span-db").css("border", "1px solid #ced4da");

                $("#search-span-valid").html("");

                $("#search-span-valid").css({color: "#ced4da", display: "none"});



            },5000);



           // return false;

        }

        if (homequery !== null && homequery !== undefined){

            var url="{{ route('postal-data',['fill'=>'null','col'=>'null','type'=>':type','raw'=>':home'])}}";

            url=url.replace(":home",homequery);

            url=url.replace(":val",val);

            url=url.replace(":col",col);

            url=url.replace(":type",car_type);

        }else if (featured_query !== null && featured_query !== undefined){

            var url="{{ route('postal-data',['fill'=>':val','col'=>':col','type'=>':type'])}}";

            url=url.replace(":home",homequery);

            url=url.replace(":val",val);

            url=url.replace(":col",col);

            url=url.replace(":type",featured_query);

        }else if (val === "") {

            var url="{{ route('postal-data',['fill'=>'null','col'=>'null','type'=>':type'])}}";

            url=url.replace(":type",car_type);

        }else {

            var url="{{ route('postal-data',['fill'=>':val','col'=>':col','type'=>':type'])}}";

            url=url.replace(":val",val);

            url=url.replace(":col",col);

            url=url.replace(":type",car_type);

        }





        console.log(val);

        $.ajax({

            method:"get",

            url:url,

            DataType:"json",

            success:function(data){

           

                $("#apend").remove();

                $(".append_class").append('<div id="apend" class="row" style="width:100%;"></div>');

                if(data.status==1){
$(".remove-paginate-filters").remove();
                    $(".error-post-code").css({display:'none'});

                    for(x in data.result){

                        var a_route = '{{route('car-details',['id'=>':id'])}}'

                        var id = btoa(data.result[x]['id']);

                        a_route=a_route.replace(":id",id);

                        if(data.result[x]["car_condition"]==="Used"){

                            var v="Used";

                        }else{

                            var v="New";

                        }

                        if(data.result[x]["featured"]=='1'){

                            var budge = '<p style="font-size: 14px;font-weight: 200">Featured</p>';



                        }else {

                            var budge = '<p>'+v+'</p>';

                        }

                        if(data.result[x]["car_availbilty"]==="Lease"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><button class="bidnowbtn">Bid Now</button></div>';

                        }else if(data.result[x]["car_availbilty"] === "Sell"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if (data.result[x]["car_availbilty"]==="Prestige"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if (data.result[x]["car_availbilty"]==="American-Muscle"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if(data.result[x]["car_availbilty"]==="Auction"){



                            if (data.result[x]["car_auction"] !==null){

                                var price = '<p class="cardPrice">£'+data.result[x]["car_auction"]["bid_amount"]+'</p>';

                            }else {

                                var price = '';

                            }



                            var type = '';

                        }else if(data.result[x]["car_availbilty"]==="Swap"){

                          

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var id=  data.result[x]["id"] ;

                            var s_id  =  id.toString();

                            if(data.user_car_id.length !== 0 && data.user_car_id.includes(s_id)){

                                var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><label class="mt-2 swap_label">You already request this car</label></div>';

                            }else{

                                var id =  btoa(data.result[x]["id"]) ;

                                var url = '{{route("frontend-swap-cars",["s_id"=>":s_id"])}}';

                                url = url.replace(":s_id",id);

                                var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><a href='+url+'><button class="bidnowbtn">Swap Now</button></a></div>';



                            }





                        }else if (data.result[x]["car_availbilty"]==="Rent"){

                            if (data.result[x]["price"] !== null){

                                var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            }else {

                                price = '';

                            }

                            var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><button class="bidnowbtn">View Now</button></div>';

                        }else{

                            var type = '';

                        }


                                        if(data.result[x]["d_model"] != null){
                                     
                                       var d_model = data.result[x]["d_model"]['_value'];
                                      
                                  }else{
                                      var d_model = '';
                                  }


                        var apend='';

                        var apend='<div  class="col-12 col-sm-6 col-md-4 colwidth"><div class="card" ><div class="cardimage f-cardimg">'+budge+

                            '<a href="'+a_route+'"><img class="card-img-top imgWidthAndHeight" src="'+data.result[x]["crop_image"]+'" alt="Card image cap"></a></div><div class="card-body f-card-body  d-flex flex-column">' +

                            '<div class="row"><div class="col-12 col-sm-12 col-md-7 col-lg-7 pr-0  pb-1 "  data-maxlength="10"><div class="f-card-name">' +' '+data.result[x]["year"]+' '+d_model+

                            '</div></div><div class="col-12 col-sm-12 col-md-5 col-lg-5 d-flex align-items-start justify-content-center f-card-price"><p class="f-card-price">'+price+'</p></div>' +

                            '<div class="col-12 col-sm-12 col-md-12 col-lg-12" data-maxlength="100">' +

                            '<p class="f-card-description pt-0 m-0" style="text-align:justify;">'+data.result[x]["advert_text"]+'</p>' +

                            '</div></div>' + type +

                            '</div></div></div>';

                        $("#apend").append(apend);





                    }

                    $(".f-card-name").html(function(index, currentText) {



                        var maxLength = $(this).parent().attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        } else {

                            return currentText

                        }

                    });

                    $(".f-card-description").html(function(index, currentText) {



                        var maxLength = $(this).parent().attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        } else {

                            return currentText

                        }

                    });



                }else {
$(".remove-paginate-filters").remove();
                   

                    $(".error-post-code").css({display:'block'});

                    return false;

                }





            },

            error:function(data){

                console.log(data);



            }



        });

    });

    $('.featured-car-span').on('keypress', function(e) {

        if (e.which == 32){

            console.log('Space Detected');

            return false;

        }

    });

    $(document).on("keyup",".featured-car-span",function(e){

        e.preventDefault();

        var featured_query = $("#featured-filters").val();

        var val=$(".custom-control-btn").val();

        var col=$(".custom-control-btn").data("col");

        console.log(col,val);

        if(val === "") {

            $(".custom-control-btn").css("border", "1px solid #e4001b");

            $(".input-span-db").css("border", "1px solid #e4001b");

            $("#search-span-valid").html("Please enter postal code.");

            $("#search-span-valid").css({color: "#e4001b", display: "block"});

            setTimeout(function () {

                $(".custom-control-btn").css("border", "1px solid #ced4da");

                $(".input-span-db").css("border", "1px solid #ced4da");

                $("#search-span-valid").html("");

                $("#search-span-valid").css({color: "#ced4da", display: "none"});



            },5000);



        }



        if (featured_query !== null && featured_query !== undefined && val != ""){

            var url="{{ route('postal-data',['fill'=>':val','col'=>':col','type'=>':type'])}}";

            url=url.replace(":val",val);

            url=url.replace(":col",col);

            url=url.replace(":type",featured_query);

        }else if (val === "") {

            var url="{{ route('postal-data',['fill'=>'null','col'=>'null','type'=>':type'])}}";

            url=url.replace(":type",featured_query);

        }

  $.ajax({

            method:"get",

            url:url,

            DataType:"json",

            success:function(data){

                console.log(data);

                $("#apend").remove();

                $(".append_class").append('<div id="apend" class="row" style="width:100%;"></div>');

                if(data.status==1){

                    $(".error-post-code").css({display:'none'});

                    for(x in data.result){

                        var a_route = '{{route('car-details',['id'=>':id'])}}';

                        var id = btoa(data.result[x]['id']);

                        a_route=a_route.replace(":id",id);

                        if(data.result[x]["car_condition"]==="Used"){

                            var v="Used";

                        }else{

                            var v="New";

                        }

                        if(data.result[x]["featured"]=='1'){

                            var budge = '<p style="font-size: 14px;font-weight: 200">Featured</p>';



                        }else {

                            var budge = '<p>'+v+'</p>';

                        }

                   



                        if(data.result[x]["car_availbilty"]==="Lease"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><button class="bidnowbtn">Bid Now</button></div>';

                        }else if(data.result[x]["car_availbilty"] === "Sell"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if (data.result[x]["car_availbilty"]==="American-Muscle"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if (data.result[x]["car_availbilty"]==="Prestige"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if(data.result[x]["car_availbilty"]==="Auction"){



                            if (data.result[x]["car_auction"] !==null){

                                var price = '<p class="cardPrice">£'+data.result[x]["car_auction"]["bid_amount"]+'</p>';

                            }else {

                                var price = '';

                            }



                            var type = '';

                        }else if(data.result[x]["car_availbilty"]==="Swap"){

                            if (data.result[x]["price"] !== null){

                                var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            }else {

                                price = '';

                            }

                        

                                var id =  btoa(data.result[x]["id"]) ;

                                var url = '{{route("frontend-swap-cars",["s_id"=>":s_id"])}}';

                                url = url.replace(":s_id",id);

                                var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><a href='+url+'><button class="bidnowbtn">Swap Now</button></a></div>';



                   





                        }else if (data.result[x]["car_availbilty"]==="Rent"){

                            if (data.result[x]["price"] !== null){

                                var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            }else {

                                price = '';

                            }

                           

                        }else{

                            var type = '';

                        }
                        if(data.result[x]["d_model"] != null){
                                     
                                       var d_model = data.result[x]["d_model"]['_value'];
                                      
                                  }else{
                                      var d_model = '';
                                  }
                        var apend='';

                        var apend='<div  class="col-12 col-sm-6 col-md-4 colwidth"><div class="card" ><div class="cardimage f-cardimg">'+budge+

                            '<a href="'+a_route+'"><img class="card-img-top imgWidthAndHeight" src="'+data.result[x]["crop_image"]+'" alt="Card image cap"></a></div><div class="card-body f-card-body  d-flex flex-column">' +

                            '<div class="row"><div class="col-12 col-sm-12 col-md-7 col-lg-7 pr-0  pb-1 "  data-maxlength="10"><div class="f-card-name">' +' '+data.result[x]["year"]+' '+d_model+

                            '</div></div><div class="col-12 col-sm-12 col-md-5 col-lg-5 d-flex align-items-start justify-content-center f-card-price"><p class="f-card-price">'+price+'</p></div>' +

                            '<div class="col-12 col-sm-12 col-md-12 col-lg-12" data-maxlength="100">' +

                            '<p class="f-card-description pt-0 m-0" style="text-align:justify;">'+data.result[x]["advert_text"]+'</p>' +

                            '</div></div>' + type +

                            '</div></div></div>';

                        $("#apend").append(apend);





                    }



                    $(".f-card-name").html(function(index, currentText) {



                        var maxLength = $(this).parent().attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        } else {

                            return currentText

                        }

                    });

                    $(".f-card-description").html(function(index, currentText) {



                        var maxLength = $(this).parent().attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        } else {

                            return currentText

                        }

                    });



                }else {

                    $(".error-post-code").css({display:'block'});

                    return false;

                }





            },

            error:function(data){

                console.log(data);



            }



        });

    });



    $(document).on("click",".home-car-span",function(e){

        e.preventDefault();

        var homequery = $("#home-filter").val();

        var val=$(".custom-control-btn").val();

        var col=$(".custom-control-btn").data("col");

        console.log(col,val);

        if(val === "") {

            $(".custom-control-btn").css("border", "1px solid #e4001b");

            $(".input-span-db").css("border", "1px solid #e4001b");

            $("#search-span-valid").html("Please enter postal code.");

            $("#search-span-valid").css({color: "#e4001b", display: "block"});

            setTimeout(function () {

                $(".custom-control-btn").css("border", "1px solid #ced4da");

                $(".input-span-db").css("border", "1px solid #ced4da");

                $("#search-span-valid").html("");

                $("#search-span-valid").css({color: "#ced4da", display: "none"});



            },5000);



        }

        if (homequery == "all"){

            if (val === "") {

                var url = "{{ route('postal-data',['fill'=>'null','col'=>'null','type'=>':type','raw'=>':home'])}}";

                url = url.replace(":home", homequery);

            }else{

                var url="{{ route('postal-data',['fill'=>':val','col'=>':col','type'=>':type','raw'=>':home'])}}";

                url=url.replace(":home",homequery);

                url=url.replace(":val",val);

                url=url.replace(":col",col);

            }

        }else if (val === ""){

            var url="{{ route('postal-data',['fill'=>'null','col'=>'null','type'=>':type','raw'=>':home'])}}";

            url=url.replace(":home",homequery);

            console.log(url);

        }else if (homequery !== null && homequery !== undefined && homequery !== "all"){

            var url="{{ route('postal-data',['fill'=>':val','col'=>':col','type'=>':type','raw'=>':home'])}}";

            url=url.replace(":home",homequery);

            url=url.replace(":val",val);

            url=url.replace(":col",col);



        }

      console.log(url);





        $.ajax({

            method:"get",

            url:url,

            DataType:"json",

            success:function(data){

                $("#apend").remove();

                $(".append_class").append('<div id="apend" class="row" style="width:100%;"></div>');

                if(data.status==1){

                    $(".pagination-remove-home").hide();

                    console.log(data.result);

                    $(".error-post-code").css({display:'none'});

                    for(x in data.result){

                        var a_route = '{{route('car-details',['id'=>':id'])}}';

                        var id = btoa(data.result[x]['id']);

                        a_route=a_route.replace(":id",id);

                        if(data.result[x]["car_condition"]==="Used"){

                            var v="Used";

                        }else{

                            var v="New";

                        }

                        if(data.result[x]["featured"]=='1'){

                            var budge = '<p style="font-size: 14px;font-weight: 200">Featured</p>';



                        }else {

                            var budge = '<p>'+v+'</p>';

                        }

                        if(data.result[x]["car_availbilty"]==="Lease"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><button class="bidnowbtn">Bid Now</button></div>';

                        }else if(data.result[x]["car_availbilty"] === "Sell"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if (data.result[x]["car_availbilty"]==="American-Muscle"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if (data.result[x]["car_availbilty"]==="Prestige"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if(data.result[x]["car_availbilty"]==="Auction"){



                            if (data.result[x]["car_auction"] !==null){

                                var price = '<p class="cardPrice">£'+data.result[x]["car_auction"]["bid_amount"]+'</p>';

                            }else {

                                var price = '';

                            }



                            var type = '';

                        }else if(data.result[x]["car_availbilty"]==="Swap"){


                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                        

                                var id =  btoa(data.result[x]["id"]) ;

                                var url = '{{route("frontend-swap-cars",["s_id"=>":s_id"])}}';

                                url = url.replace(":s_id",id);

                                var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><a href='+url+'><button class="bidnowbtn">Swap Now</button></a></div>';









                        }else if (data.result[x]["car_availbilty"]==="Rent"){

                            if (data.result[x]["price"] !== null){

                                var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            }else {

                                price = '';

                            }

                            var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><button class="bidnowbtn">View Now</button></div>';

                        }else{

                            var type = '';

                        }

 if(data.result[x]["d_model"] != null){
                                     
                                       var d_model = data.result[x]["d_model"]['_value'];
                                      
                                  }else{
                                      var d_model = '';
                                  }

                        var apend='';

                        var apend='<div  class="col-12 col-sm-6 col-md-4 colwidth"><div class="card" ><div class="cardimage f-cardimg">'+budge+

                            '<a href="'+a_route+'"><img class="card-img-top imgWidthAndHeight" src="'+data.result[x]["crop_image"]+'" alt="Card image cap"></a></div><div class="card-body f-card-body  d-flex flex-column">' +

                            '<div class="row"><div class="col-12 col-sm-12 col-md-7 col-lg-7 pr-0  pb-1 "  data-maxlength="10"><div class="f-card-name">' +' '+data.result[x]["year"]+' '+d_model+

                            '</div></div><div class="col-12 col-sm-12 col-md-5 col-lg-5 d-flex align-items-start justify-content-center f-card-price"><p class="f-card-price">'+price+'</p></div>' +

                            '<div class="col-12 col-sm-12 col-md-12 col-lg-12" data-maxlength="100">' +

                            '<p class="f-card-description pt-0 m-0" style="text-align:justify;">'+data.result[x]["advert_text"]+'</p>' +

                            '</div></div>' + type +

                            '</div></div></div>';

                        $("#apend").append(apend);





                    }

                    $(".f-card-name").html(function(index, currentText) {



                        var maxLength = $(this).parent().attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        } else {

                            return currentText

                        }

                    });

                    $(".f-card-description").html(function(index, currentText) {



                        var maxLength = $(this).parent().attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        } else {

                            return currentText

                        }

                    });



                }else {

                    $(".error-post-code").html("Please check your postal code");

                    $(".error-post-code").css({display:'block',color:"#e4001b",fontSize:'25px',fontWeight: '500'});

                    return false;

                }





            },

            error:function(data){

                console.log(data);



            }



        });

    });

    

    

    

      $(document).on("keyup",".home-car-input",function(e){

        e.preventDefault();

        



        console.log($(this).val().length);

        if($(this).val().length  != 0){ 

            return false;

        }

        var homequery = $("#home-filter").val();

        var val=$(".custom-control-btn").val();

        var col=$(".custom-control-btn").data("col");

        console.log(col,val);

        if(val === "") {

            $(".custom-control-btn").css("border", "1px solid #e4001b");

            $(".input-span-db").css("border", "1px solid #e4001b");

            $("#search-span-valid").html("Please enter postal code.");

            $("#search-span-valid").css({color: "#e4001b", display: "block"});

            setTimeout(function () {

                $(".custom-control-btn").css("border", "1px solid #ced4da");

                $(".input-span-db").css("border", "1px solid #ced4da");

                $("#search-span-valid").html("");

                $("#search-span-valid").css({color: "#ced4da", display: "none"});



            },5000);



        }

        if (homequery == "all"){

            if (val === "") {

                var url = "{{ route('postal-data',['fill'=>'null','col'=>'null','type'=>':type','raw'=>':home'])}}";

                url = url.replace(":home", homequery);

            

                 console.log(url);

            }

        }else if (val === ""){

            var url="{{ route('postal-data',['fill'=>'null','col'=>'null','type'=>':type','raw'=>':home'])}}";

            url=url.replace(":home",homequery);

            console.log(url);

        }







        $.ajax({

            method:"get",

            url:url,

            DataType:"json",

            success:function(data){

                $("#apend").remove();

                $(".append_class").append('<div id="apend" class="row" style="width:100%;"></div>');

                if(data.status==1){

                    $(".pagination-remove-home").hide();

                    console.log(data.result);

                    $(".error-post-code").css({display:'none'});

                    for(x in data.result){

                        var a_route = '{{route('car-details',['id'=>':id'])}}';

                        var id = btoa(data.result[x]['id']);

                        a_route=a_route.replace(":id",id);

                        if(data.result[x]["car_condition"]==="Used"){

                            var v="Used";

                        }else{

                            var v="New";

                        }

                        if(data.result[x]["featured"]=='1'){

                            var budge = '<p style="font-size: 14px;font-weight: 200">Featured</p>';



                        }else {

                            var budge = '<p>'+v+'</p>';

                        }

                        if(data.result[x]["car_availbilty"]==="Lease"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><button class="bidnowbtn">Bid Now</button></div>';

                        }else if(data.result[x]["car_availbilty"] === "Sell"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if (data.result[x]["car_availbilty"]==="American-Muscle"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if (data.result[x]["car_availbilty"]==="Prestige"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if(data.result[x]["car_availbilty"]==="Auction"){



                            if (data.result[x]["car_auction"] !==null){

                                var price = '<p class="cardPrice">£'+data.result[x]["car_auction"]["bid_amount"]+'</p>';

                            }else {

                                var price = '';

                            }



                            var type = '';

                        }else if(data.result[x]["car_availbilty"]==="Swap"){

                          

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                          

                                var id =  btoa(data.result[x]["id"]) ;

                                var url = '{{route("frontend-swap-cars",["s_id"=>":s_id"])}}';

                                url = url.replace(":s_id",id);

                                var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><a href='+url+'><button class="bidnowbtn">Swap Now</button></a></div>';









                        }else if (data.result[x]["car_availbilty"]==="Rent"){

                            if (data.result[x]["price"] !== null){

                                var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            }else {

                                price = '';

                            }

                            var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><button class="bidnowbtn">View Now</button></div>';

                        }else{

                            var type = '';

                        }



                        var apend='';

                        var apend='<div  class="col-12 col-sm-6 col-md-4 colwidth"><div class="card" ><div class="cardimage f-cardimg">'+budge+

                            '<a href="'+a_route+'"><img class="card-img-top imgWidthAndHeight" src="'+data.result[x]["crop_image"]+'" alt="Card image cap"></a></div><div class="card-body f-card-body  d-flex flex-column">' +

                            '<div class="row"><div class="col-12 col-sm-12 col-md-7 col-lg-7 pr-0  pb-1 "  data-maxlength="10"><div class="f-card-name">' +' '+data.result[x]["year"]+data.result[x]["title"]+

                            '</div></div><div class="col-12 col-sm-12 col-md-5 col-lg-5 d-flex align-items-start justify-content-center f-card-price"><p class="f-card-price">'+price+'</p></div>' +

                            '<div class="col-12 col-sm-12 col-md-12 col-lg-12" data-maxlength="100">' +

                            '<p class="f-card-description pt-0 m-0" style="text-align:justify;">'+data.result[x]["advert_text"]+'</p>' +

                            '</div></div>' + type +

                            '</div></div></div>';

                        $("#apend").append(apend);





                    }

                    $(".f-card-name").html(function(index, currentText) {



                        var maxLength = $(this).parent().attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        } else {

                            return currentText

                        }

                    });

                    $(".f-card-description").html(function(index, currentText) {



                        var maxLength = $(this).parent().attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        } else {

                            return currentText

                        }

                    });



                }else {

                    $(".error-post-code").html("Please check your postal code");

                    $(".error-post-code").css({display:'block',color:"#e4001b",fontSize:'25px',fontWeight: '500'});

                    return false;

                }





            },

            error:function(data){

                console.log(data);



            }



        });

    });

    

    

    

    

    

    // price filter

    $(document).on("keyup","#val2-filter",function(e){

        e.preventDefault();

        var col=$(this).data("col");

        var val1=$("#val1-filter").val();

        var val2=$("#val2-filter").val();

        if(val1 === "" || val2 === ""  ) {



            $("#val1-filter").css("border", "1px solid #e4001b") ;

            $("#val2-filter").css("border", "1px solid #e4001b");



            setTimeout(function () {

                $("#val1-filter").css("border", "transparent");

                $("#val2-filter").css("border", "transparent");

            },5000);



        }

        var featured_query = $("#featured-filters").val();

        var car_type = $("#type-filters").val();

        var query='';

        var count=0;



        // sort By

        if(featured_query !==null  && featured_query !== undefined){

            if(val1 === "" || val2 === "" ){

                query+=" featured" + " = " + "1";

            }else{

                query+= " featured" + " = " + "1" + " AND "  + col +" BETWEEN " +  val1  +  " AND " + val2 +" AND " + "featured" + " = " + "1" ;

            }

        }else {

        if(val1 === "" || val2 === "" ){

                query+=" car_availbilty" + " = " +"'"+car_type+"'";

            }else{

                query+=col +" BETWEEN " +  val1  +  " AND " + val2 +  " AND "  + " car_availbilty" + " = " +"'"+car_type+"'";

            }



        }



        var fuel = $("#car-fuel").val();

        var year = $("#car-year").val();

        if(year !== null && year !== ""){

            if (fuel === "DESC"){

                query = query +"  ORDER BY "+year+" DESC";



            }else{

                query = query +"  ORDER BY "+year+" ASC";

            }

          

        }

   

        console.log(query);

        var url="{{ route('price-filter-data',['query'=>':val'])}}";

        url=url.replace(":val",query);



        $.ajax({

            method:"get",

            url:url,

            DataType:"json",

            success:function(data){

                console.log(data);

                $("#apend").remove();

                $(".append_class").append('<div id="apend" class="row m-0" style="width:100%;"></div>');

                if(data.status==1){
$(".remove-paginate-filters").remove();
                    $(".error-post-code").css({display:'none'});

                    for(x in data.result){

                        var a_route = '{{route('car-details',['id'=>':id'])}}';

                        var id = btoa(data.result[x]['id']);

                        a_route=a_route.replace(":id",id);

                        if(data.result[x]["car_condition"]==="Used"){

                            var v="Used";

                        }else{

                            var v="new";

                        }

                        if(data.result[x]["featured"]=='1'){

                            var budge = '<p style="font-size: 14px;font-weight: 200">Featured</p>';



                        }else{

                            var budge = '<p>'+v+'</p>';

                        }



                        if(data.result[x]["car_availbilty"]==="Lease"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><button class="bidnowbtn">Bid Now</button></div>';

                        }else if(data.result[x]["car_availbilty"] === "Sell"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if (data.result[x]["car_availbilty"]==="American-Muscle"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if (data.result[x]["car_availbilty"]==="Prestige"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if(data.result[x]["car_availbilty"]==="Auction"){



                            if (data.result[x]["car_auction"] !==null && data.result[x]["car_auction"] !== "null"){

                                if (data.result[x]["car_auction"] !== "null"){

                               

                                }



                            }else {

                                var price = '';

                            }



                            var type = '';

                        }else if(data.result[x]["car_availbilty"]==="Swap"){

                          

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var id=  data.result[x]["id"] ;

                            var s_id  =  id.toString();

                            if(data.user_car_id.length !== 0 && data.user_car_id.includes(s_id)){

                                var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><label class="mt-2 swap_label">You already request this car</label></div>';

                            }else{

                                var id =  btoa(data.result[x]["id"]) ;

                                var url = '{{route("frontend-swap-cars",["s_id"=>":s_id"])}}';

                                url = url.replace(":s_id",id);

                                var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><a href='+url+'><button class="bidnowbtn">Swap Now</button></a></div>';



                            }





                        }else if (data.result[x]["car_availbilty"]==="Rent"){

                            if (data.result[x]["price"] !== null){

                                var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            }else {

                                price = '';

                            }

                            var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><button class="bidnowbtn">View Now</button></div>';

                        }else{

                            var type = '';

                        }




                               if(data.result[x]["d_model"] != null){
                                     
                                       var d_model = data.result[x]["d_model"]['_value'];
                                      
                                  }else{
                                      var d_model = '';
                                  }
                   


                        var apend='';

                        var apend='<div  class="col-12 col-sm-6 col-md-4 colwidth"><div class="card" ><div class="cardimage f-cardimg">'+budge+

                            '<a href="'+a_route+'"><img class="card-img-top imgWidthAndHeight" src="'+data.result[x]["crop_image"]+'" alt="Card image cap"></a></div><div class="card-body f-card-body american-f-card-body d-flex flex-column">' +

                            '<div class="row"><div class="col-12 col-sm-12 col-md-7 col-lg-7 pr-0  pb-2 "  data-maxlength="20"><div class="f-card-name">' +' '+data.result[x]["year"]+' '+d_model+

                            '</div></div><div class="col-12 col-sm-12 col-md-5 col-lg-5 d-flex align-items-start justify-content-center f-card-price"><p class="f-card-price">'+price+'</p></div>' +

                            '<div class="col-12 col-sm-12 col-md-12 col-lg-12" data-maxlength="20">' +

                            '<p class="f-card-description" style="display: block!important;text-align:justify;">'+data.result[x]["advert_text"]+'</p>' +

                            '</div></div>' + type +

                            '</div></div></div>';

                        $("#apend").append(apend);





                    }

                    $(".f-card-name").html(function(index, currentText) {



                        var maxLength = $(this).parent().attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        } else {

                            return currentText

                        }

                    });

                    $(".f-card-description").html(function(index, currentText) {



                        var maxLength = $(this).parent().attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        } else {

                            return currentText

                        }

                    });



                }else {
                    
                     $(".remove-paginate-filters").remove();
                     $(".error-post-code").css({display:'block'});

                }





            },

            error:function(data){

                console.log(data);



            }



        });

    });

    // Mileage filter

    $(document).on("keyup","#val2-filter-mileage",function(e){

        e.preventDefault();

        var col=$(this).data("col");

        var val1=$("#val1-filter-mileage").val();

        var val2=$("#val2-filter-mileage").val();

        if(val1 === "" || val2 === ""  ) {



            $("#val1-filter-mileage").css("border", "1px solid #e4001b") ;

            $("#val2-filter-mileage").css("border", "1px solid #e4001b");



            setTimeout(function () {

                $("#val1-filter-mileage").css("border", "transparent");

                $("#val2-filter-mileage").css("border", "transparent");

            },5000);



        }

        var featured_query = $("#featured-filters").val();

        var car_type = $("#type-filters").val();

        var query='';

        var count=0;



        // sort By

        if(featured_query !==null  && featured_query !== undefined){

            if(val1 === "" || val2 === "" ){

                query+=" featured" + " = " + "1";

            }else{

                query+= col +" BETWEEN " +  val1  +  " AND " + val2 +  " AND " +  " featured" + " = " + "1";

            }

        }else {

         if(val1 === "" || val2 === "" ){

                query+=" car_availbilty" + " = " +"'"+car_type+"'";

            }else{

                query+=col +" BETWEEN " +  val1  +  " AND " + val2 +  " AND "  + " car_availbilty" + " = " +"'"+car_type+"'";

            }



        }



        var fuel = $("#car-fuel").val();

        var year = $("#car-year").val();

        if(year !== null && year !== ""){

            if (fuel === "DESC"){

                query = query +"  ORDER BY "+year+" DESC";



            }else{

                query = query +"  ORDER BY "+year+" ASC";

            }

         

      

        }

   

        console.log(query);

        var url="{{ route('mileage-filter-data',['query'=>':val'])}}";

        url=url.replace(":val",query);



        $.ajax({

            method:"get",

            url:url,

            DataType:"json",

            success:function(data){

                console.log(data);

                $("#apend").remove();

                $(".append_class").append('<div id="apend" class="row m-0" style="width:100%;"></div>');

                if(data.status==1){
                    
                    $(".remove-paginate-filters").remove();
                    
                    $(".error-post-code").css({display:'none'});

                    for(x in data.result){

                        var a_route = '{{route('car-details',['id'=>':id'])}}';

                        var id = btoa(data.result[x]['id']);

                        a_route=a_route.replace(":id",id);

                        if(data.result[x]["car_condition"]==="Used"){

                            var v="Used";

                        }else{

                            var v="new";

                        }

                        if(data.result[x]["featured"]=='1'){

                            var budge = '<p style="font-size: 14px;font-weight: 200">Featured</p>';



                        }else{

                            var budge = '<p>'+v+'</p>';

                        }



                        if(data.result[x]["car_availbilty"]==="Lease"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><button class="bidnowbtn">Bid Now</button></div>';

                        }else if(data.result[x]["car_availbilty"] === "Sell"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if (data.result[x]["car_availbilty"]==="American-Muscle"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if (data.result[x]["car_availbilty"]==="Prestige"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if(data.result[x]["car_availbilty"]==="Auction"){



                            if (data.result[x]["car_auction"] !==null && data.result[x]["car_auction"] !== "null"){

                                if (data.result[x]["car_auction"]){

                                    var price = '<p class="cardPrice">£'+data.result[x]["car_auction"]["bid_amount"]+'</p>';

                                }



                            }else {

                                var price = '';

                            }



                            var type = '';

                        }else if(data.result[x]["car_availbilty"]==="Swap"){

                          

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var id=  data.result[x]["id"] ;

                            var s_id  =  id.toString();

                            if(data.user_car_id.length !== 0 && data.user_car_id.includes(s_id)){

                                var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><label class="mt-2 swap_label">You already request this car</label></div>';

                            }else{

                                var id =  btoa(data.result[x]["id"]) ;

                                var url = '{{route("frontend-swap-cars",["s_id"=>":s_id"])}}';

                                url = url.replace(":s_id",id);

                                var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><a href='+url+'><button class="bidnowbtn">Swap Now</button></a></div>';



                            }





                        }else if (data.result[x]["car_availbilty"]==="Rent"){

                            if (data.result[x]["price"] !== null){

                                var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            }else {

                                price = '';

                            }

                            var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><button class="bidnowbtn">View Now</button></div>';

                        }else{

                            var type = '';

                        }
   if(data.result[x]["d_model"] != null){
                                     
                                       var d_model = data.result[x]["d_model"]['_value'];
                                      
                                  }else{
                                      var d_model = '';
                                  }
                        var apend='';

                        var apend='<div  class="col-12 col-sm-6 col-md-4 colwidth"><div class="card" ><div class="cardimage f-cardimg">'+budge+

                            '<a href="'+a_route+'"><img class="card-img-top imgWidthAndHeight" src="'+data.result[x]["crop_image"]+'" alt="Card image cap"></a></div><div class="card-body f-card-body  d-flex flex-column">' +

                            '<div class="row"><div class="col-12 col-sm-12 col-md-7 col-lg-7 pr-0  pb-2 "  data-maxlength="10"><div class="f-card-name">' +' '+data.result[x]["year"]+' '+d_model+

                            '</div></div><div class="col-12 col-sm-12 col-md-5 col-lg-5 d-flex align-items-start justify-content-center f-card-price"><p class="f-card-price">'+price+'</p></div>' +

                            '<div class="col-12 col-sm-12 col-md-12 col-lg-12" data-maxlength="100">' +

                            '<p class="f-card-description" style="display: block!important;">'+data.result[x]["advert_text"]+'</p>' +

                            '</div></div>' + type +

                            '</div></div></div>';

                        $("#apend").append(apend);





                    }

                    $(".f-card-name").html(function(index, currentText) {



                        var maxLength = $(this).parent().attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        } else {

                            return currentText

                        }

                    });

                    $(".f-card-description").html(function(index, currentText) {



                        var maxLength = $(this).parent().attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        } else {

                            return currentText

                        }

                    });



                }else {
                    $(".remove-paginate-filters").remove();
                   $(".error-post-code").css({display:'block'});

                }





            },

            error:function(data){

                console.log(data);



            }



        });

    });



    $(document).on("click",".report-car-detail",function(e){

        e.preventDefault();

        @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)

        $(".car-report-modal").modal("show");

        $(".span-report-car").css('display','none');

        $(".report-car-textarea").css("border", "1px solid #ced4da");

                @else

                $(".loginreportCar").modal('show');

                @endif



    });

    $(document).on("submit",".report-car-confirm",function(e){

        e.preventDefault();

       // alert('ok');

        var val1=$(".report-car-textarea").val();

        if(val1 === "") {

            $(".report-car-textarea").css("border", "1px solid #e4001b");

            $(".span-report-car").css('display','block');

            setTimeout(function () {

                $(".report-car-textarea").css("border", "1px solid #ced4da");

                $(".span-report-car").css('display','none');

            },5000);

            return false;

        }

        var formdata=new FormData(this);

        var url=$(this).attr("action");

       var val = $(".report-car-textarea").val();

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

                    $(".span-report-car").css({'color':'green','display':'block'});

                    $(".span-report-car").html(data.result);

               

                    setTimeout(function () {

                        $(".car-report-modal").modal("hide");

                    },3000);



                }else{

                    $(".report-car-textarea").css("border", "1px solid #e4001b");

                    $(".span-report-car").css({'color':'#e4001b','display':'block'});

                    $(".span-report-car").html(data.result);

                }



            },

            error:function(data){

                console.log(data);



            }



        });

    });

    $(document).on("submit",".follower-btn",function(e){

        e.preventDefault();

        var formdata=new FormData(this);

        var url=$(this).attr("action");

       var val = $(".report-car-textarea").val();

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

                    $("#following-btn").html("Followed");



                    setTimeout(function () {

                        $(".car-report-modal").modal("hide");

                    },3000);



                }else if (data.status==3){

                    $("#following-btn").html("Follow");

                }else{



                }



            },

            error:function(data){

                console.log(data);



            }



        });

    });









    $(document).on("keyup",".home-price-btn",function(e){

        e.preventDefault();

        var col=$(this).data("col");

        var val1=$("#val1-filter").val();

        var val2=$("#val2-filter").val();

        if(val1 === "" || val2 === "" ){



            $("#val1-filter").css("border", "1px solid #e4001b") ;

            $("#val2-filter").css("border", "1px solid #e4001b");



            setTimeout(function () {

                $("#val1-filter").css("border", "transparent");

                $("#val2-filter").css("border", "transparent");

            },5000);



        }



        var home_query = $("#home-filter").val();

        var query='';

        var count=0;



        // sort By

        if (val1 === "" || val2 === ""){

            if (home_query === "null"){

                query = "null"

            } else {

                query+= home_query;

            }



        }else if(home_query !==null  && home_query !== undefined){

            if (home_query === "null"){

                query+=col +" BETWEEN " +  val1  +  " AND " + val2

            }else{

                query+=home_query + " AND " +  col +" BETWEEN " +  val1  +  " AND " + val2 ;

            }



        }

console.log(query);

        var fuel = $("#car-fuel").val();

        var year = $("#car-year").val();

        if(year !== null && year !== ""){

            if (fuel === "DESC"){

                query = query +"  ORDER BY "+year+" DESC";



            }else{

                query = query +"  ORDER BY "+year+" ASC";

            }

       
        }

    

        console.log(query);

        var url="{{ route('price-filter-data',['query'=>':val'])}}";

        url=url.replace(":val",query);



        $.ajax({

            method:"get",

            url:url,

            DataType:"json",

            success:function(data){

                $("#apend").remove();

                $(".append_class").append('<div id="apend" class="row m-0" style="width:100%;"></div>');

                if(data.status==1){

                    $(".pagination-remove-home").hide();

                    $(".error-post-code").css({display:'none'});

                    $(".red-color-paginate").hide();

                    for(x in data.result){

                        var a_route = '{{route('car-details',['id'=>':id'])}}';

                        var id = btoa(data.result[x]['id']);

                        a_route=a_route.replace(":id",id);

                        if(data.result[x]["car_condition"]==="Used"){

                            var v="Used";

                        }else{

                            var v="new";

                        }

                        if(data.result[x]["featured"]=='1'){

                            var budge = '<p style="font-size: 14px;font-weight: 200">Featured</p>';



                        }else{

                            var budge = '<p>'+v+'</p>';

                        }

                   



                        if(data.result[x]["car_availbilty"]==="Lease"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><button class="bidnowbtn">Bid Now</button></div>';

                        }else if (data.result[x]["car_availbilty"]==="Prestige"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if(data.result[x]["car_availbilty"] === "Sell"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if (data.result[x]["car_availbilty"]==="American-Muscle"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if(data.result[x]["car_availbilty"]==="Auction"){



                            if (data.result[x]["car_auction"] !==null){

                                if (data.result[x]["car_auction"]) {

                                    var price = '<p class="cardPrice">£'+ data.result[x]["car_auction"]["bid_amount"] +'</p>';

                                }

                            }else {

                                var price = '';

                            }



                            var type = '';

                        }else if(data.result[x]["car_availbilty"]==="Swap"){

                            // console.log(data.user_car_id.includes("54"));

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var id=  data.result[x]["id"] ;

                            var s_id  =  id.toString();

                            if(data.user_car_id.length !== 0 && data.user_car_id.includes(s_id)){

                                var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><label class="mt-2 swap_label">You already request this car</label></div>';

                            }else{

                                var id =  btoa(data.result[x]["id"]) ;

                                var url = '{{route("frontend-swap-cars",["s_id"=>":s_id"])}}';

                                url = url.replace(":s_id",id);

                                var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><a href='+url+'><button class="bidnowbtn">Swap Now</button></a></div>';



                            }

                        }else if (data.result[x]["car_availbilty"]==="Rent"){

                            if (data.result[x]["price"] !== null){

                                var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            }else {

                                price = '';

                            }

                            var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><button class="bidnowbtn">View Now</button></div>';

                        }else{

                            var type = '';

                        }



                        var apend='';

                        var apend='<div  class="col-12 col-sm-6 col-md-4 colwidth"><div class="card" ><div class="cardimage f-cardimg">'+budge+

                            '<a href="'+a_route+'"><img class="card-img-top imgWidthAndHeight" src="'+data.result[x]["crop_image"]+'" alt="Card image cap"></a></div><div class="card-body f-card-body american-f-card-body d-flex flex-column">' +

                            '<div class="row"><div class="col-12 col-sm-12 col-md-7 col-lg-7 pr-0  pb-2 "  data-maxlength="20"><div class="f-card-name">' +' '+data.result[x]["year"]+data.result[x]["title"]+

                            '</div></div><div class="col-12 col-sm-12 col-md-5 col-lg-5 d-flex align-items-start justify-content-center f-card-price"><p class="f-card-price">'+price+'</p></div>' +

                            '<div class="col-12 col-sm-12 col-md-12 col-lg-12" data-maxlength="20">' +

                            '<p class="f-card-description" style="display: block!important;text-align:justify;" >'+data.result[x]["advert_text"]+'</p>' +

                            '</div></div>' + type +

                            '</div></div></div>';

                        $("#apend").append(apend);





                    }



                    $(".f-card-name").html(function(index, currentText) {



                        var maxLength = $(this).parent().attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        } else {

                            return currentText

                        }

                    });

                    $(".f-card-description").html(function(index, currentText) {



                        var maxLength = $(this).parent().attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        } else {

                            return currentText

                        }

                    });



                }else {

                    $(".error-post-code").html("There is no record against your request");

                    $(".error-post-code").css({display:'block',color:"#e4001b",fontSize:'25px',fontWeight: '500'});

                }





            },

            error:function(data){

                console.log(data);



            }



        });

    });

    $(document).on("keyup","#val2-filter-mileage-home",function(e){

        e.preventDefault();

        var col=$(this).data("col");

        var val1=$("#val1-filter-mileage").val();

        var val2=$("#val2-filter-mileage-home").val();

        if(val1 === "" || val2 === "" ){



            $("#val1-filter-mileage").css("border", "1px solid #e4001b") ;

            $("#val2-filter-mileage-home").css("border", "1px solid #e4001b");



            setTimeout(function () {

                $("#val1-filter-mileage").css("border", "transparent");

                $("#val2-filter-mileage-home").css("border", "transparent");

            },5000);



        }



        var home_query = $("#home-filter").val();

        var query='';

        var count=0;



        // sort By

        if (val1 === "" || val2 === ""){

            if (home_query === "null"){

                query = "null"

            } else {

                query+= home_query;

            }



        }else if(home_query !==null  && home_query !== undefined){

            if (home_query === "null"){

                query+=col +" BETWEEN " +  val1  +  " AND " + val2

            }else{

                query+= home_query +" AND " +col +" BETWEEN " +  val1  +  " AND " + val2   ;

            }



        }

console.log(query);

        var fuel = $("#car-fuel").val();

        var year = $("#car-year").val();

        if(year !== null && year !== ""){

            if (fuel === "DESC"){

                query = query +"  ORDER BY "+year+" DESC";



            }else{

                query = query +"  ORDER BY "+year+" ASC";

            }



        }



        console.log(query);

        var url="{{ route('mileage-filter-data',['query'=>':val'])}}";

        url=url.replace(":val",query);



        $.ajax({

            method:"get",

            url:url,

            DataType:"json",

            success:function(data){

                $("#apend").remove();

                $(".append_class").append('<div id="apend" class="row m-0" style="width:100%;"></div>');

                if(data.status==1){

                    $(".pagination-remove-home").hide();

                    $(".error-post-code").css({display:'none'});

                    $(".red-color-paginate").hide();

                    for(x in data.result){

                        var a_route = '{{route('car-details',['id'=>':id'])}}';

                        var id = btoa(data.result[x]['id']);

                        a_route=a_route.replace(":id",id);

                        if(data.result[x]["car_condition"]==="Used"){

                            var v="Used";

                        }else{

                            var v="new";

                        }

                        if(data.result[x]["featured"]=='1'){

                            var budge = '<p style="font-size: 14px;font-weight: 200">Featured</p>';



                        }else{

                            var budge = '<p>'+v+'</p>';

                        }





                        if(data.result[x]["car_availbilty"]==="Lease"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><button class="bidnowbtn">Bid Now</button></div>';

                        }else if (data.result[x]["car_availbilty"]==="Prestige"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if(data.result[x]["car_availbilty"] === "Sell"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if (data.result[x]["car_availbilty"]==="American-Muscle"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if(data.result[x]["car_availbilty"]==="Auction"){



                            if (data.result[x]["car_auction"] !==null){

                                if (data.result[x]["car_auction"]) {

                                    var price = '<p class="cardPrice">£'+ data.result[x]["car_auction"]["bid_amount"] +'</p>';

                                }

                            }else {

                                var price = '';

                            }



                            var type = '';

                        }else if(data.result[x]["car_availbilty"]==="Swap"){

                            // console.log(data.user_car_id.includes("54"));

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var id=  data.result[x]["id"] ;

                            var s_id  =  id.toString();

                            if(data.user_car_id.length !== 0 && data.user_car_id.includes(s_id)){

                                var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><label class="mt-2 swap_label">You already request this car</label></div>';

                            }else{

                                var id =  btoa(data.result[x]["id"]) ;

                                var url = '{{route("frontend-swap-cars",["s_id"=>":s_id"])}}';

                                url = url.replace(":s_id",id);

                                var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><a href='+url+'><button class="bidnowbtn">Swap Now</button></a></div>';



                            }

                        }else if (data.result[x]["car_availbilty"]==="Rent"){

                            if (data.result[x]["price"] !== null){

                                var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            }else {

                                price = '';

                            }

                            var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><button class="bidnowbtn">View Now</button></div>';

                        }else{

                            var type = '';

                        }


   if(data.result[x]["d_model"] != null){
                                     
                                       var d_model = data.result[x]["d_model"]['_value'];
                                      
                                  }else{
                                      var d_model = '';
                                  }

                        var apend='';

                        var apend='<div  class="col-12 col-sm-6 col-md-4 colwidth"><div class="card" ><div class="cardimage f-cardimg">'+budge+

                            '<a href="'+a_route+'"><img class="card-img-top imgWidthAndHeight" src="'+data.result[x]["crop_image"]+'" alt="Card image cap"></a></div><div class="card-body f-card-body  d-flex flex-column">' +

                            '<div class="row"><div class="col-12 col-sm-12 col-md-7 col-lg-7 pr-0  pb-1 "  data-maxlength="10"><div class="f-card-name">' +' '+data.result[x]["year"]+' '+d_model+

                            '</div></div><div class="col-12 col-sm-12 col-md-5 col-lg-5 d-flex align-items-start justify-content-center f-card-price"><p class="f-card-price">'+price+'</p></div>' +

                            '<div class="col-12 col-sm-12 col-md-12 col-lg-12" data-maxlength="100">' +

                            '<p class="f-card-description pt-0 m-0" style ="text-align:justify;">'+data.result[x]["advert_text"]+'</p>' +

                            '</div></div>' + type +

                            '</div></div></div>';

                        $("#apend").append(apend);





                    }



                    $(".f-card-name").html(function(index, currentText) {



                        var maxLength = $(this).parent().attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        } else {

                            return currentText

                        }

                    });

                    $(".f-card-description").html(function(index, currentText) {



                        var maxLength = $(this).parent().attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        } else {

                            return currentText

                        }

                    });



                }else {

                    $(".error-post-code").html("There is no record against your request");

                    $(".error-post-code").css({display:'block',color:"#e4001b",fontSize:'25px',fontWeight: '500'});

                }





            },

            error:function(data){

                console.log(data);



            }



        });

    });





    $(document).on("click",".price-featured-btn",function(e){

        e.preventDefault();

        $(".f-card-description").css("display","block");

        var col=$(this).data("col");

        var val1=$("#val1-filter").val();

        var val2=$("#val2-filter").val();

        if(val1 === "" || val2 === ""  ) {



            $("#val1-filter").css("border", "1px solid #e4001b") ;

            $("#val2-filter").css("border", "1px solid #e4001b");



            setTimeout(function () {

                $("#val1-filter").css("border", "transparent");

                $("#val2-filter").css("border", "transparent");

            },5000);

            return false;

        }

        var featured_query = $("#featured-filters").val();

        var query='';

        var count=0;



        // sort By

        if(featured_query !==null  && featured_query !== undefined){

            query+=col +" BETWEEN " +  val1  +  " AND " + val2 +  " AND "  + " featured" + " = " + "1";

        }



        var fuel = $("#car-fuel").val();

        var year = $("#car-year").val();

        if(year !== null && year !== ""){

            if (fuel === "DESC"){

                query = query +"  ORDER BY "+year+" DESC";



            }else{

                query = query +"  ORDER BY "+year+" ASC";

            }

    

        }



        console.log(query);

        var url="{{ route('price-filter-data',['query'=>':val'])}}";

        url=url.replace(":val",query);



        $.ajax({

            method:"get",

            url:url,

            DataType:"json",

            success:function(data){

                console.log(data);

                $("#apend").remove();

                $(".append_class").append('<div id="apend" class="row m-0" style="width:100%;"></div>');

                if(data.status==1){

                    $(".error-post-code").css({display:'none'});

                    for(x in data.result){

                        var a_route = '{{route('car-details',['id'=>':id'])}}';

                        var id = btoa(data.result[x]['id']);

                        a_route=a_route.replace(":id",id);

                        if(data.result[x]["car_condition"]==="Used"){

                            var v="Used";

                        }else{

                            var v="new";

                        }

                        if(data.result[x]["featured"]=='1'){

                            var budge = '<p style="font-size: 14px;font-weight: 200">Featured</p>';



                        }else{

                            var budge = '<p>'+v+'</p>';

                        }

                

                        if(data.result[x]["car_availbilty"]==="Lease"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><button class="bidnowbtn">Bid Now</button></div>';

                        }else if(data.result[x]["car_availbilty"] === "Sell"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if (data.result[x]["car_availbilty"]==="American-Muscle"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if (data.result[x]["car_availbilty"]==="Prestige"){

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var type = '';

                        }else if(data.result[x]["car_availbilty"]==="Auction"){



                            if (data.result[x]["car_auction"] !==null){

                                var price = '<p class="cardPrice">£'+data.result[x]["car_auction"]["bid_amount"]+'</p>';

                            }else {

                                var price = '';

                            }



                            var type = '';

                        }else if(data.result[x]["car_availbilty"]==="Swap"){

                            // console.log(data.user_car_id.includes("54"));

                            var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            var id=  data.result[x]["id"] ;

                            var s_id  =  id.toString();

                            if(data.user_car_id.length !== 0 && data.user_car_id.includes(s_id)){

                                var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><label class="mt-2 swap_label">You already request this car</label></div>';

                            }else{

                                var id =  btoa(data.result[x]["id"]) ;

                                var url = '{{route("frontend-swap-cars",["s_id"=>":s_id"])}}';

                                url = url.replace(":s_id",id);

                                var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><a href='+url+'><button class="bidnowbtn">Swap Now</button></a></div>';



                            }





                        }else if (data.result[x]["car_availbilty"]==="Rent"){

                            if (data.result[x]["price"] !== null){

                                var price = '<p class="cardPrice">£'+data.result[x]["price"]+'</p>';

                            }else {

                                price = '';

                            }

                            var type = '<div class="mt-auto ml-auto bidnowbtndiv d-flex align-items-end"><button class="bidnowbtn">View Now</button></div>';

                        }else{

                            var type = '';

                        }

                        var apend='';

                        var apend='<div  class="col-12 col-sm-6 col-md-4 colwidth"><div class="card" ><div class="cardimage f-cardimg">'+budge+

                            '<a href="'+a_route+'"><img class="card-img-top imgWidthAndHeight" src="'+data.result[x]["crop_image"]+'" alt="Card image cap"></a></div><div class="card-body f-card-body  d-flex flex-column">' +

                            '<div class="row"><div class="col-12 col-sm-12 col-md-7 col-lg-7 pr-0  pb-1 "  data-maxlength="10"><div class="f-card-name">' +' '+data.result[x]["year"]+data.result[x]["title"]+

                            '</div></div><div class="col-12 col-sm-12 col-md-5 col-lg-5 d-flex align-items-start justify-content-center f-card-price"><p class="f-card-price">'+price+'</p></div>' +

                            '<div class="col-12 col-sm-12 col-md-12 col-lg-12" data-maxlength="100">' +

                            '<p class="f-card-description pt-0 m-0" style="text-align:justify;">'+data.result[x]["advert_text"]+'</p>' +

                            '</div></div>' + type +

                            '</div></div></div>';

                        $("#apend").append(apend);





                    }



                }else {

                    $(".error-post-code").html("There is no record against your request");

                    $(".error-post-code").css({display:'block',color:"#e4001b",fontSize:'25px',fontWeight: '500'});

                }





            },

            error:function(data){

                console.log(data);



            }



        });

    });





    $(document).on('change','.brand-base-model',function (e) {

        $(".f-card-description").css("display","block");

        e.preventDefault();

        var b_id=$(this).val();
// $(".model_appen_filter").html("<div class="model_second_dev" style="overflow: scroll;height: 300px!important;"></div>");
        if($(this).prop("checked") === true){

              var   value  =  $(this).data('id');

            var url = '{{route('model-brand',['id'=>':id'])}}';

            url = url.replace(':id',value);

console.log(value);

            $.ajax({

                method:"get",

                url:url,

                DataType:"json",

                success:function(data){

                    console.log(data);

                    if(data.status==1){
  $(".model_appen_filter").show();
                        $(".model_remove_brand").hide();
                              for(x in data.result){
                                  
                                   var apend='<div class="row model_s_'+data.result[x]['brand']+'" style="padding: 5px 0;">' +

                                '<div class="col-12">' +

                                '<div class="custom-control custom-checkbox">' +

                                '<input type="checkbox" class="custom-control-input filter-input-class model-base-variant-filter" data-col="modal" value="'+data.result[x]['id']+'"  data-id="'+data.result[x]['id']+'" id="br_'+data.result[x]['id']+'">' +

                                '<label class="custom-control-label" for="br_'+data.result[x]['id']+'">' + data.result[x]['_value'] +

                                '</label>' +

                                '</div></div>' +

                                '</div>' ;

                            $(".model_appen_filter").append(apend);

                        }



                    }else {
                        //   $(".model_appen_filter").hide();
                 $(".model_remove_brand").empty();
                    $(".model_remove_brand").html("No Record Found");
                     return false;

                    }





                },

                error:function(data){

                    console.log(data);



                }



            });







            }else {



              $(".model_s_"+b_id).each(function (e) {



                  $(this).remove();

            
              });
         
         
//                   $(".model_appen_filter").hide();
//               $(".model_remove_brand").show()
// $(".model_remove_brand").html("First select 'Make'");
            }
 });
 
 
    $(document).on('change','.model-base-variant-filter',function (e) {

        $(".f-card-description").css("display","block");

        e.preventDefault();

        var b_id=$(this).val();

        if($(this).prop("checked") === true){

              var   value  =  $(this).data('id');

            var url = '{{route('model-variant',['id'=>':id'])}}';

            url = url.replace(':id',value);

console.log(value);

            $.ajax({

                method:"get",

                url:url,

                DataType:"json",

                success:function(data){

                    console.log(data);

                    if(data.status==1){
                        $(".variant_appen_filter").show();
                        $(".variant_remove_brand").hide();
                              for(x in data.result){
                                  
                                   var apend='<div class="row variant_s_'+data.result[x]['model']+'" style="padding: 5px 0;">' +

                                '<div class="col-12">' +

                                '<div class="custom-control custom-checkbox">' +

                                '<input type="checkbox" class="custom-control-input filter-input-class " data-col="variant" value="'+data.result[x]['id']+'"  data-id="'+data.result[x]['id']+'" id="vr_'+data.result[x]['id']+'">' +

                                '<label class="custom-control-label" for="vr_'+data.result[x]['id']+'">' + data.result[x]['_value'] +

                                '</label>' +

                                '</div></div>' +

                                '</div>' ;

                            $(".variant_appen_filter").append(apend);

                        }



                    }else {
                        //   $(".model_appen_filter").hide();
                 $(".variant_remove_brand").empty();
                    $(".variant_remove_brand").html("No Record Found");
                     return false;

                    }





                },

                error:function(data){

                    console.log(data);



                }



            });







            }else {



              $(".variant_s_"+b_id).each(function (e) {

           $(this).remove();

                  
              });
         
         
//                   $(".model_appen_filter").hide();
//               $(".model_remove_brand").show()
// $(".model_remove_brand").html("First select 'Make'");
            }
 });

    $(document).on('change','.brand-base-model-featured',function (e) {

        e.preventDefault();

        var b_id=$(this).val();

        if($(this).prop("checked") === true){

              var   value  =  $(this).data('id');

            var url = '{{route('model-brand',['id'=>':id'])}}';

            url = url.replace(':id',value);

console.log(value);

            $.ajax({

                method:"get",

                url:url,

                DataType:"json",

                success:function(data){

                    console.log(data);

                    if(data.status==1){
$(".model_appen_filter").show();
                        $(".model_remove_brand").hide();
for(x in data.result){

                            var apend='<div class="row model_s_'+data.result[x]['brand']+'" style="padding: 5px 0;">' +

                                '<div class="col-12">' +

                                '<div class="custom-control custom-checkbox">' +

                                '<input type="checkbox" class="custom-control-input filter-featured-car model-base-variant-featured" data-col="modal" value="'+data.result[x]['id']+'"  data-id="'+data.result[x]['id']+'" id="br_'+data.result[x]['id']+'">' +

                                '<label class="custom-control-label" for="br_'+data.result[x]['id']+'">' + data.result[x]['_value'] +

                                '</label>' +

                                '</div></div>' +

                                '</div>' ;

                            $(".model_appen_filter").append(apend);

                        }



                    }else {


                        return false;

                    }





                },

                error:function(data){

                    console.log(data);



                }



            });







            }else {



              $(".model_s_"+b_id).each(function (e) {



                  $(this).remove();

            

              });

            }
 });


    $(document).on('change','.model-base-variant-featured',function (e) {

        $(".f-card-description").css("display","block");

        e.preventDefault();

        var b_id=$(this).val();

        if($(this).prop("checked") === true){

              var   value  =  $(this).data('id');

            var url = '{{route('model-variant',['id'=>':id'])}}';

            url = url.replace(':id',value);

console.log(value);

            $.ajax({

                method:"get",

                url:url,

                DataType:"json",

                success:function(data){

                    console.log(data);

                    if(data.status==1){
                        $(".variant_appen_filter").show();
                        $(".variant_remove_model").hide();
                              for(x in data.result){
                                  
                                   var apend='<div class="row variant_s_'+data.result[x]['model']+'" style="padding: 5px 0;">' +

                                '<div class="col-12">' +

                                '<div class="custom-control custom-checkbox">' +

                                '<input type="checkbox" class="custom-control-input filter-featured-car " data-col="variant" value="'+data.result[x]['id']+'"  data-id="'+data.result[x]['id']+'" id="vr_'+data.result[x]['id']+'">' +

                                '<label class="custom-control-label" for="vr_'+data.result[x]['id']+'">' + data.result[x]['_value'] +

                                '</label>' +

                                '</div></div>' +

                                '</div>' ;

                            $(".variant_appen_filter").append(apend);

                        }



                    }else {
                        //   $(".model_appen_filter").hide();
                 $(".variant_remove_brand").empty();
                    $(".variant_remove_brand").html("No Record Found");
                     return false;

                    }





                },

                error:function(data){

                    console.log(data);



                }



            });







            }else {



              $(".variant_s_"+b_id).each(function (e) {

           $(this).remove();

                  
              });
         
         
//                   $(".model_appen_filter").hide();
//               $(".model_remove_brand").show()
// $(".model_remove_brand").html("First select 'Make'");
            }
 });


    $(document).on('change','.brand-base-model-misc',function (e) {

        $(".f-card-description").css("display","block");

        e.preventDefault();

        var b_id=$(this).val();

        if($(this).prop("checked") === true){

            var   value  =  $(this).data('id');

            var url = '{{route('model-brand',['id'=>':id'])}}';

            url = url.replace(':id',value);

            console.log(value);

            $.ajax({

                method:"get",

                url:url,

                DataType:"json",

                success:function(data){

                    console.log(data);

                    if(data.status==1){

                        $(".remove_class_misc_model").hide();

                    

                        for(x in data.result){

                            var apend='<div class="row model_s_'+data.result[x]['brand']+'" style="padding: 5px 0;">' +

                                '<div class="col-12">' +

                                '<div class="custom-control custom-checkbox">' +

                                '<input type="checkbox" class="custom-control-input filter-radio-misc" data-col="modal" value="'+data.result[x]['id']+'"  data-id="'+data.result[x]['id']+'" id="br_'+data.result[x]['id']+'">' +

                                '<label class="custom-control-label" for="br_'+data.result[x]['id']+'">' + data.result[x]['_value'] +

                                '</label>' +

                                '</div></div>' +

                                '</div>' ;

                            $(".misc-model-append").append(apend);

                        }



                    }else {

                      

                        return false;

                    }





                },

                error:function(data){

                    console.log(data);



                }



            });







        }else {



            $(".model_s_"+b_id).each(function (e) {



                $(this).remove();

           

            });

        }



   













    });



    $(document).on('change','.brand-base-model-wanted',function (e) {

        e.preventDefault();

        var b_id=$(this).val();

        if($(this).prop("checked") === true){

            var   value  =  $(this).data('id');

            var url = '{{route('model-brand',['id'=>':id'])}}';

            url = url.replace(':id',value);

            console.log(value);

            $.ajax({

                method:"get",

                url:url,

                DataType:"json",

                success:function(data){

                    console.log(data);

                    if(data.status==1){

                       $(".remove_class_wanted_model").hide();

              

                        for(x in data.result){

                            var apend='<div class="row model_s_'+data.result[x]['brand']+'" style="padding: 5px 0;">' +

                                '<div class="col-12">' +

                                '<div class="custom-control custom-checkbox">' +

                                '<input type="checkbox" class="custom-control-input filter-input-wanted" data-col="modal" value="'+data.result[x]['id']+'"  data-id="'+data.result[x]['id']+'" id="br_'+data.result[x]['id']+'">' +

                                '<label class="custom-control-label" for="br_'+data.result[x]['id']+'">' + data.result[x]['_value'] +

                                '</label>' +

                                '</div></div>' +

                                '</div>' ;

                            $(".wanted-model-append").append(apend);

                        }



                    }else {

                    

                        return false;

                    }





                },

                error:function(data){

                    console.log(data);



                }



            });







        }else {



            $(".model_s_"+b_id).each(function (e) {



                $(this).remove();


            });

        }

 });



    $(document).on('change','.brand-base-model-home',function (e) {

        e.preventDefault();

        var b_id=$(this).val();

        if($(this).prop("checked") === true){

            var   value  =  $(this).data('id');

            var url = '{{route('model-brand',['id'=>':id'])}}';

            url = url.replace(':id',value);

            console.log(value);

            $.ajax({

                method:"get",

                url:url,

                DataType:"json",

                success:function(data){

                    console.log(data);

                    if(data.status==1){
                        $(".model_remove_brand").hide();
                       $(".home-model-append").show();

                  for(x in data.result){

                            var apend='<div class="row model_s_'+data.result[x]['brand']+'" style="padding: 5px 0;">' +

                                '<div class="col-12">' +

                                '<div class="custom-control custom-checkbox">' +

                                '<input type="checkbox" class="custom-control-input filter-home-class model-base-variant-home" data-col="modal" value="'+data.result[x]['id']+'"  data-id="'+data.result[x]['id']+'" id="br_'+data.result[x]['id']+'">' +

                                '<label class="custom-control-label" for="br_'+data.result[x]['id']+'">' + data.result[x]['_value'] +

                                '</label>' +

                                '</div></div>' +

                                '</div>' ;

                            $(".home-model-append").append(apend);

                        }



                    }else {

                     
                        return false;

                    }





                },

                error:function(data){

                    console.log(data);



                }



            });







        }else {



            $(".model_s_"+b_id).each(function (e) {



                $(this).remove();


            });

        }


    });

  $(document).on('change','.model-base-variant-home',function (e) {

        $(".f-card-description").css("display","block");

        e.preventDefault();

        var b_id=$(this).val();

        if($(this).prop("checked") === true){

              var   value  =  $(this).data('id');

            var url = '{{route('model-variant',['id'=>':id'])}}';

            url = url.replace(':id',value);

console.log(value);

            $.ajax({

                method:"get",

                url:url,

                DataType:"json",

                success:function(data){

                    console.log(data);

                    if(data.status==1){
                        $(".variant_appen_filter").show();
                        $(".variant_remove_model").hide();
                              for(x in data.result){
                                  
                                   var apend='<div class="row variant_s_'+data.result[x]['model']+'" style="padding: 5px 0;">' +

                                '<div class="col-12">' +

                                '<div class="custom-control custom-checkbox">' +

                                '<input type="checkbox" class="custom-control-input filter-home-class" data-col="variant" value="'+data.result[x]['id']+'"  data-id="'+data.result[x]['id']+'" id="vr_'+data.result[x]['id']+'">' +

                                '<label class="custom-control-label" for="vr_'+data.result[x]['id']+'">' + data.result[x]['_value'] +

                                '</label>' +

                                '</div></div>' +

                                '</div>' ;

                            $(".variant_appen_filter").append(apend);

                        }



                    }else {
                        //   $(".model_appen_filter").hide();
                 $(".variant_remove_model").empty();
                    $(".variant_remove_model").html("No Record Found");
                     return false;

                    }





                },

                error:function(data){

                    console.log(data);



                }



            });







            }else {



              $(".variant_s_"+b_id).each(function (e) {

           $(this).remove();

                  
              });
         
         
//                   $(".model_appen_filter").hide();
//               $(".model_remove_brand").show()
// $(".model_remove_brand").html("First select 'Make'");
            }
 });


 $(document).on('change','.brand-select-filter',function (e) {

        $(".f-card-description").css("display","block");

        e.preventDefault();

        var value  = $('option:selected',this).attr('data-id');

        var url = '{{route('model-brand',['id'=>':id'])}}';

url = url.replace(':id',value);

        $.ajax({

            method:"get",

            url:url,

            DataType:"json",

            success:function(data){

                console.log(data);

                if(data.status==1){

                    $("#brandModalFilter").empty();

                    $("#brandModalFilter").html('<option value="">Select Model</option>');

                    for(x in data.result){

                        var apend= '<option value="'+data.result[x]['id']+'">'+data.result[x]['_value']+'</option>';

                        $("#brandModalFilter").append(apend);

                    }



                }else {

                    $('#brandModalFilter').html('<option selected disabled>No Data Found</option>');

                    return false;

                }





            },

            error:function(data){

                console.log(data);



            }



        });



    });



    $(document).on('change','.model-base-variant',function (e){

        $(".f-card-description").css("display","block");

        e.preventDefault();

        var value  =   $('option:selected',this).val();

        var url = '{{route('model-variant',['id'=>':id'])}}';

url = url.replace(':id',value);

        $.ajax({

            method:"get",

            url:url,

            DataType:"json",

            success:function(data){

                console.log(data);

                if(data.status==1){

                    $(".variant-dashboard-brand").empty();

                    $(".variant-dashboard-brand").html('<option value="">Select Variant</option>');

                    for(x in data.result){

                        var apend= '<option value="'+data.result[x]['id']+'">'+data.result[x]['_value']+'</option>';

                        $(".variant-dashboard-brand").append(apend);

                    }



                }else{

                    $('.variant-dashboard-brand').html('<option value="">No Data Found</option>');

                    return false;

                }





            },

            error:function(data){

                console.log(data);



            }



        });



    });

    $(document).on('change','.brand-select-base',function (e) {

        $(".f-card-description").css("display","block");

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

                    $(".make-brand-append").empty();

                    $(".make-brand-append").html('<option value="">Select Model</option><option value="">Any</option>');

                    for(x in data.result){

                        console.log(model_api);

                      

                           var apend= '<option value="'+data.result[x]['id']+'" data-val="'+data.result[x]['_value']+'">'+data.result[x]['_value']+'</option>';

                        $(".make-brand-append").append(apend);



                        if (model_api != '' && model_api == data.result[x]['_value']) {

                            var model=$("#model_api option[data-val='"+model_api+"']").prop("selected",true);

                            if ($("#model_api option[data-val='"+model_api+"']").prop("selected")===true) {

                                $(".model-base-variant").trigger("change");

                            }

                        }

                    }



                }else{

                    $('.make-brand-append').html('<option selected disabled>No Data Found</option>');

                    return false;

                }





            },

            error:function(data){

                console.log(data);



            }



        });



    });



    //  this for search in wanted



    $(document).on("click",".wanted-span-search",function(e){

        $(".f-card-description").css("display","block");

        e.preventDefault();

        var val=$(".input-search-wanted").val();

        var col=$(".input-search-wanted").data("col");

        // console.log(col,val);

        if(val === "") {

            $(".input-search-wanted").css("border", "1px solid #e4001b");

            $(".wanted-span-search").css("border", "1px solid #e4001b");



            // $(".input-span-db").css("border", "1px solid #e4001b");



            setTimeout(function () {

                $(".wanted-span-search").css("border", "transparent");

                $(".input-search-wanted").css("border", "transparent");

                //     $(".input-span-db").css("border", "1px solid #ced4da");





            },5000);

            return false;

        }

        var url="{{ route('wanted-search',['fill'=>':val','col'=>':col'])}}";

        url=url.replace(":val",val);

        url=url.replace(":col",col);

        $.ajax({

            method:"get",

            url:url,

            DataType:"json",

            success:function(data){

                console.log(data);

                $("#apend").remove();

                $(".append_class_wanted").append('<div id="apend" class="row m-0"></div>');

                if(data.status==1){

                    $(".wanted-section-error").css({display:'none'});

                    for(x in data.result){

                        var c_img = data.result[x]["image"];

                        var img =   "{{asset('storage/app/public/'.":img")}}";

                        img = img.replace(':img',c_img);

                        var apend='';

                        var c_img = data.result[x]["image"];

                        var img =   "{{asset('storage/app/public/'.":img")}}";

                        img = img.replace(':img',c_img);

                        var s_class="";

                        var s_span = 'add favourite';

                        if(data.s_user_id.length!== 0 && data.s_user_id.includes(data.result[x]["id"])){

                            s_class="save_list";

                            s_span= 'favourite';



                        }

                        var form_text = "";

                     @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)

                        var session_id= "{{session('userDetails')->id}}";

                        if (session_id  == data.result[x]["user_id"]){

                            form_text ="";

                        }else {

                            form_text ='<form action="{{route("chat-wanted")}}" class="form-chat-wanted" method="post" id="chat_wanted" style="width: 100%;">'+

                                '<div class="row">'+

                                '<input type="hidden" name="car_id" value="'+data.result[x]["id"]+'">'+

                                '<input type="hidden" name="to_id" value="'+data.result[x]["user_id"]+'">'+

                                '<div class="form-group col-md-8">'+

                                '<label for="inputEmail4">Your Query was</label>'+

                                '<input type="text" name="query1" class="form-control" id="query_input" placeholder="Enter Your Query">'+

                                '</div>'+

                                '<div class="form-group col-md-4">'+

                                '<label for="inputEmail4">Your proposal was</label>'+

                                '<input type="text" class="form-control" name="query2" id="porposal_input" placeholder="Prices">'+

                                '</div>'+

                                '<div class="col-12 col-sm-4 ml-auto">'+

                                '<button id="btn_toggle"  class="btn-show-more-filter mb-3">Send Proposal</button>'+

                                '</div>'+

                                '</div>'+

                                '</form>';

                        }

                        @endif

                     

                        if (data.result[x]["user_number"] !== null){

                            var con = '<h5>Contact Member :<span>'+data.result[x]["user_number"]+'</span></h5>';

                        }else {

                            con = "";

                        }

                        var sesion = '@if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true) <a class="wanted-save-list" data-col="'+data.result[x]["id"]+'"><i class="fas fa-heart '+s_class+'" style="display: flex;color:#707070;padding-left: 12px;"></i><span class="span-heart '+s_class+'" style="color:#707070;">'+s_span+'</span></a> @endif';

                          if (data.result[x]["model_wanted"]['_value'] !== null){

                              var model_Wanted = data.result[x]["model_wanted"]['_value'];

                          }else {

                              model_Wanted = '';

                          }

                        if(data.result[x]["varient_wanted"]['_value'] !== null){

                              var variant_Wanted = data.result[x]["varient_wanted"]['_value'];



                        }else{

                               variant_Wanted = '';

                        }

                        if(data.result[x]["brand_wanted"]['name'] !== null){

                              var brand_Wanted = data.result[x]["brand_wanted"]['name'];



                        }else {

                              brand_Wanted = '';

                        }

                        var apend='';

                        var apend='<div class="row m-0 mb-3 mt-3 pt-4  save-lis-wanted"><div class="col-12 pl-0"><div class="row m-0"><div class="col-5 save-list-heading"><h3>'+data.result[x]["title"]+'</h3>' +

                            '<p>'+data.result[x]["describe"]+'</p><a href="'+img+'" class="download-btn"  download><i class="fas fa-paperclip"></i>Download Image</a></div>'+

                            '<div class="col-5 d-flex align-items-center justify-content-center  wanted-heart-fvrt"><img class="card-img-top imgWidthAndHeight" src="'+img+'"></div>'+

                            '<div class="col-2 d-flex align-items-start justify-content-end  wanted-heart-fvrt">'+sesion+'</div>' +

                            '<div class="col-7 wanted-client-budget">' +

                            '<h5>'+brand_Wanted+'-<span>Client Budget :</span> <span>£ '+data.result[x]["budget"]+' </span></h5>' +

                            ' '+con+'<span></span></div>' +

                            '<div class="col-5 ask-question-wanted Veiw-detail-wanted d-flex align-items-center justify-content-end"><h6 class="m-0">View Details </h6>'  +

                            ' <div class="round-question"><i class="fas fa-caret-down"></i></div>'+

                            '</div></div></div>' +

                            '<div class="col-12 detailDiv-query"><div class="col-12 p-0"><hr/></div><div class="row m-0"><div class="col-12"><div class="form-row">' +

                            '<div class="form-group col-6 col-md-6"><label for="inputEmail4">Brand</label><input type="text" class="form-control"   value="'+brand_Wanted+'" readonly></div>' +

                            '<div class="form-group col-6 col-md-6"><label for="inputEmail4">Model</label>  <input type="text" class="form-control"   value="'+model_Wanted+'" readonly> </div>' +

                            ' <div class="form-group col-6 col-md-6"><label for="inputEmail4">Varient</label>  <input type="text" class="form-control"   value="'+variant_Wanted+'" readonly> </div>' +

                            form_text +'</div></div></div>' +

                            '</div></div>' ;

                        $("#apend").append(apend);

                    }

                    let detailDiv=  $(".detailDiv-query");

                    detailDiv.hide();

                    $('.Veiw-detail-wanted').on('click',function(e){

                        $(".f-card-description").css("display","block");



                        if(  detailDiv.css("display")== "none"){

                            console.log(this);

                            // $(this).closest(".save-lis-wanted ").css("background", "#fff");

                            // $(this).closest(".save-lis-wanted ").find(".round-question").css("background", "#e4001b");

                            // $(this).closest(".round-question").css("background", "#e4001b");

                            $(this).closest(".save-lis-wanted ").find(".round-question i").css("color", "#707070");

                            console.log(this);

                            $(this).closest(".save-lis-wanted").find(detailDiv).slideToggle("slow");







                        }else if (  detailDiv.css("display")== "block" ) {

                            // $(this).closest(".save-lis-wanted ").css("background", "#efefef");



                            $(this).closest(".save-lis-wanted ").find(".round-question").css("background", "#fff");

                            $(this).closest(".save-lis-wanted ").find(".round-question i").css("color", "#707070");



                            $(this).closest(".save-lis-wanted ").find(detailDiv).slideToggle("slow");





                        }





                    });





                }else {

                    $(".wanted-section-error").html("No Record Match");

                    $(".wanted-section-error").css({display:'block',color:"#e4001b",fontSize:'25px',fontWeight: '500'});

                    return false;

                }





            },

            error:function(data){

                console.log(data);



            }



        });

    });
    


    // this for garage search

    $(document).on("click",".garage-section-search-filter",function(e){

        $(".f-card-description").css("display","block");

        e.preventDefault();

      var val=$("#garage-search-input").val();

        var col=$("#garage-search-input").data("col");

             if(val === "") {

              $("#garage-search-input").css("border", "1px solid #e4001b");

              $(".garage-section-search-filter").css("border", "1px solid #e4001b");



        setTimeout(function () {

                $("#garage-search-input").css("border", "1px solid #ced4da");

                   $(".garage-section-search-filter").css("border", "transparent");

                   },5000);

                     return false;

             }

        var image1 ="{{ config('app.ui_asset_url').'frontend/img/featuredCar/Group 3236.png' }}";

        var image2 = "{{ config('app.ui_asset_url').'frontend/img/garageicon/badge.png' }}";

        var url="{{ route('garage-search',['col'=>':col','val'=>':val'])}}";

        url=url.replace(":val",val);

        url=url.replace(":col",col);

        console.log(url);

        $.ajax({

            method:"get",

            url:url,

            DataType:"json",

            success:function(data){

                console.log(data);

                $("#apend").remove();

                $(".append_class_garage").append('<div id="apend" class="row"></div>');

                if(data.status==1){

                    $(".garage-section-error").css({display:'none',color:"#e4001b",fontSize:'25px',fontWeight: '500'});

                    for(x in data.result){

                        var c_image = data.result[x]["pic"];

                        var image = JSON.parse(c_image)[0];

                        var f_image = "{{asset('storage/app/public/'.':image')}}";
@if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true) 
var stars  = '<div class="row"> <div class="col-4"><img src=" {{ config('app.ui_asset_url').'frontend/img/garageicon/badge.png' }}" alt="">' +
'<div class="col-8 p-0  toprated"><h3>Top Rated</h3><div class="stars"><form action="" id="container">' +
' <div class="form-row"><div class="commonLable"><div class="form-group col-lg-12">'+
''+
'</div></div></div></div></div></div>';
@else
var stars  = '';
@endif
                        f_image = f_image.replace(":image",image);

                        var apend='';
                        console.log(new Date(data.result[x]["close_timing"]).toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3"));
                        

                        var apend=' <div class="col-12 col-md-6 shop"><div class="row garage-close-div" style="border: 1px solid #e4e0e0;"><div class="col-3 p-0 sidecar"><img src="'+image+'" alt=""></div><div class="col-9">' +

                            '<div class="row shopdetailSection"><div class="col-12  shopName"><h3>'+data.result[x]["c_name"]+'</h3><img  src="'+image1+'" alt=""></div>'+

                            ' <div class="col-12  shopdescription"> <p>'+data.result[x]["description"]+'</p></div>' +
                            ' <div class="col-6"><label for="opening_time"><b>Opening Time</b></label></div>' +
                            '<div class="col-6"> <label for="close_time"><b>Closing Time</b></label></div>'+
                          
                            '<div class="col-12 formgroup"> <form>  <label><span>Your Email:</span> Let us Contact You</label> <div class="input-group mb-3"><input type="text" class="form-control" placeholder="e.g. abc@example.com" aria-label="Recipient\'s username" aria-describedby="basic-addon2">' +

                            '<div class="input-group-append"><button class="input-group-text" type="submit" id="basic-addon2"><i class=\'fas fa-paper-plane\'></i></button></div></div></form></div>'  +

                            '<div class="col-12"><div class="row">'+

                            '</div></div><div class="col-12 topratedSection"><div class="row"><div class="col-8 col-sm-6"> ' +

                            ' </div>' +

                            '<div class="col-12 col-sm-6  visitourwebsitebtn"><button href="#"> Visit our website</button>' +

                            '</div></div></div>' +

                            '</div></div></div></div>' ;

                        $("#apend").append(apend);

                    }



                }else {

                    $(".garage-section-error").html("No Record Match");

                    $(".garage-section-error").css({display:'block',color:"#e4001b",fontSize:'25px',fontWeight: '500'});

                    return false;

                }





            },

            error:function(data){

                console.log(data);



            }



        });

    });

</script>

<script>

    $(".filter_btn").click(function(e){

        $(".f-card-description").css("display","block");

        e.preventDefault();

        var count = 0;

        var query='';

        var array = [];

        var price_col = '';

        var price_val = '';

        var price_val2='';

        $(".filter-price").each(function () {

            if($(this).val() && $(this).val()!==""){

                 price_col=$(this).attr("name");

                if ($(this).data('flag')=== "to"){

                    price_val = $(this).val();

                }else{

                    price_val2 = $(this).val();

                }

           



            }



        });

        if(price_val != '' && price_val2 != ''){

            count = 1;

            query+= price_col +" between " +  price_val +' and '+price_val2+ " and ";

        }

        var ycolname='';

        var from_val = '';

        var to_val='';

        $(".filter-year").each(function () {

            ycolname=$(this).attr("name");

            if ($(this).data('flag')=== "from"){

                from_val = $(this).val();

            }else{

                to_val = $(this).val();

            }



        });



        if(from_val != '' && to_val != ''){

            count = 1;

            query+= ycolname +" between " +  from_val +' and '+to_val+ " and ";

        }

        $(".filter-mileage").each(function () {

            if($(this).val() && $(this).val()!==""){

                var mcolname=$(this).attr("name");

                var mvalue=$(this).val();

                count = 1;

                query+= mcolname +" between " +  mvalue+  " and ";



            }



        });





        var cartype =  $(".modalFilterCar").data('col');

        if (cartype != null && cartype != undefined ){

            count = 1;

            query+='car_type' +"= '" + cartype + "' and ";

            array.push(JSON.stringify(cartype));

        }



        $(".filter").each(function () {

            if($(this).val() && $(this).val()!==""){

                var colname=$(this).attr("name");

                var value=$(this).val();

                query+=colname +"= '" + value + "' and ";

                count++;

                array.push(JSON.stringify(value));

            }



        });



        if(count==0){

            window.location ="{{route('home-filters',["query"=>"null"])}}";

     

            return false;

        }

        query=query.substring(0,query.length-5);

        console.log(query);

        query = btoa(query);

        var url="{{route('home-filters',["query"=>":url","val"=>":val"])}}";

        url=url.replace(":url",query);

        url=url.replace(":val",array);

        window.location=url;





    });

// preview btn

$(document).on('click','.preview-img-btn',function(e) {

    $(".f-card-description").css("display","block");

    e.preventDefault();

    $('.image-preview-modal-dash').empty();

    $(".image-preview").empty();

    $(".safety-feature-preview-modal-dash").empty();

    $('.enter-feature-preview-modal-dash').empty();

    $(".image-preview").prepend('<img src="'+featured_image+'">');



    $(".preview-dashboard-input").each(function () {

        if ($(this).prop('tagName') === "SELECT"){



            if ($(this).val() != "" && $(this).val() != null && $(this).val() != undefined){

                var label =  $(this).data('label');

                var value = $(this).val();

                var apend = '<div class="form-group col-md-4">' +

                    '<label for="inputEmail4">'+label+'</label>' +

                    '<input type="text" class="form-control" value="'+$(this).find(":selected").text()+'" readonly>' +

                    '</div>';

                $('.image-preview-modal-dash').prepend(apend);

            }

        }else {

            if($(this).val() != "" && $(this).val() != null && $(this).val() != undefined ){

                var label =  $(this).data('label');

                var value = $(this).val();

                if(label == "Description"){

                    var apend = '<div class="form-group col-md-8">' +

                        '<label for="inputEmail4">'+label+'</label>' +

                        '<textarea class="form-control" rows="4" readonly>'+value+'</textarea>' +

                        '</div>';

                    $('.image-preview-modal-dash').append(apend);

                }else if(label === "Safety Feature"){

                    if ($(this).prop("checked")){

                        $("#safety_feature_dashboard").show();

                        var apend = '<li>'+$(this).data("col")+'</li>';

                        $('.safety-feature-preview-modal-dash').append(apend);

                    }

                }else if(label === "Entertainment Feature"){

                    if ($(this).prop("checked")){

                        $("#entertainment_feature_dashboard").show();

                        var apend = '<li>'+$(this).data("col")+'</li>';

                        $('.enter-feature-preview-modal-dash').append(apend);



                        }

                }else{

                    var apend = '<div class="form-group col-md-4">' +

                        '<label for="inputEmail4">'+label+'</label>' +

                        '<input type="text" class="form-control" value="'+value+'" readonly>' +

                        '</div>';

                    $('.image-preview-modal-dash').prepend(apend);

                }





            }

        }



 

    });



});



    //this for dashboard section filters

    $(document).on("click",".filter-dashboard",function(e){
$(".f-card-description").css("display","block");
    e.preventDefault();
    $(".filter-dashboard").attr("style"," ");
$(this).css({"background-color":"#e4001b","color":"#ffffff"});

        var val = $(this).val();

        var con=$("#check-box-switch").val();

        var url = "{{route('dashboard-filters',['val'=>':val','con'=>':con'])}}";

        var url = url.replace(":val",val);

        url = url.replace(":con",con);

        var update = '';

$.ajax({

            method:"get",

            url:url,

            DataType:"json",

            success:function(data){

                // console.log(data);

                $("#appned-remove").remove();

                $("#append-div").remove();

               $(".appned-dashboard").append('<div class="row" id="append-div"></div>');

                var u="";

                var id="";

                if(data.status==1){

                    $("#span-dashboard-result").css("display","none");

                for(x in data.result){

                        u="{{ route('sell-your-car', ['id' =>':id']) }}";

                        id=btoa(btoa(data.result[x]["id"]));

                        u=u.replace(':id',id);

                        var update="{{route('del_car',['id'=>':id'])}}";

                        del=btoa(data.result[x]["id"]);

                        up=update.replace(':id',del);

                        var apend='<div class="col-12 col-sm-6 col-md-3 pb-3 cardetail"><div class="card">'+

                            '<img class="card-img-top imgWidthAndHeight" src="'+data.result[x]["crop_image"]+'" alt="Card image cap" style="width: auto; height: 150px;object-fit: cover;"><div class="card-body"><div class="carname" data-maxlength="10"><div class="d-card-title">'+ data.result[x]["title"]+'</div></div><div class="editordelete">' +

                            '<div class="edit"><a href="'+ u +'">Edit</a></div><div class="divider"></div><div class="delete"><a href="javascript:void(0)" class="car_del" data-delete="'+del+'">Delete</a><div class="divider"></div></div></div></div></div>';

                        $("#append-div").append(apend);

                    }

                    $(".d-card-title").html(function(index, currentText) {

                        var maxLength = $(this).parent().attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        } else {

                            return currentText

                        }

                    });

                }else{

                    $("#span-dashboard-result").html("No Result");

                    $("#span-dashboard-result").css({display:"block",color:"#e4001b",fontSize:"35px",paddingLeft:"230px",fontWeight:"400",});



                }





            },

            error:function(data){

                console.log(data);



            }



        });

    });



//    this for switch button

    $(document).on("change","#check-box-switch",function(e){

    $(".f-card-description").css("display","block");

        e.preventDefault();

        if(!$(this).is(":checked")){

            $(this).val("New");

        }

        else{

              $(this).val("Used");



        }

        var con = $(this).val();

        var url = "{{route('new-filters',['con'=>':con'])}}";

        var url = url.replace(":con",con);

        var update = '';

        console.log($(this).val());



        $.ajax({

            method:"get",

            url:url,

            DataType:"json",

            success:function(data){

             

                $("#appned-remove").remove();

                $("#append-div").remove();

                $(".appned-dashboard").append('<div class="row" id="append-div"></div>');

                var u="";

                var id="";

                if(data.status==1){

                    console.log(data);

                    $("#span-dashboard-result").css("display","none");

                      console.log(data.result);

                    for(x in data.result){

                        u="{{ route('sell-your-car', [ 'id' =>':id']) }}";

                        id=btoa(btoa(data.result[x]["id"]));

                        u=u.replace(':id',id);

                        var update="{{route('del_car',['id'=>':id'])}}";

                        del=btoa(data.result[x]["id"]);

                        up=update.replace(':id',del);

                        var apend='<div class="col-12 col-sm-6 col-md-3 pb-3 cardetail"><div class="card">'+

                            '<img class="card-img-top imgWidthAndHeight" src="'+data.result[x]["crop_image"]

                            +'" alt="Card image cap" style="width: auto; height: 150px;object-fit: cover;" ><div class="card-body"><div class="carname" data-maxlength="10"><div class="d-card-title">'+ data.result[x]["title"]+'</div></div><div class="editordelete">' +

                            '<div class="edit"><a href="'+ u +'">Edit</a></div><div class="divider"></div><div class="delete"><a href="javascript:void(0)" class="car_del" data-delete="'+del+'" >Delete</a><div class="divider"></div></div></div></div></div>';

                        $("#append-div").append(apend);

                    }

                    $(".d-card-title").html(function(index, currentText) {

                        var maxLength = $(this).parent().attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        } else {

                            return currentText

                        }

                    });

                }else{

                    $("#span-dashboard-result").html("No Result");

                    $("#span-dashboard-result").css({display:"block",color:"#e4001b",fontSize:"35px",paddingLeft:"230px",fontWeight:"400",});



                }





            },

            error:function(data){

                console.log(data);



            }



        });





        });

$(document).on("change",".filter-input-wanted",function(e){

    $(".f-card-description").css("display","block");

    e.preventDefault();

    var query='';

    var count=0;

$(".custom-control-input").each(function(e){



        if($(this).prop("checked")){

            if(count == 0){

                query='(';

            }

            var col=$(this).data("col");

            var val=$(this).val();

            query+=col +"=" +"'"+ val + "' "+ "or ";

            count++;

        }

    });



    query=query.substring(0,query.length-4);

    query= query+ ")";

    var url="{{ route('wanted-filters',['query'=>':val'])}}";

    url=url.replace(":val",query);

    $.ajax({

        method:"get",

        url:url,

        DataType:"json",

        success:function(data){

              console.log(data);

            $("#apend").remove();

            $(".append_class_wanted").append('<div id="apend" class="row m-0"></div>');

            if(data.status==1){

 $(".wanted-section-error").css({display:'none'});

                for(x in data.result){

                    var c_img = data.result[x]["image"];

                    var img =   "{{asset('storage/app/public/'.":img")}}";

                        img = img.replace(':img',c_img);

                    var s_class="";

                    var s_span = 'add favourite';

                    if(data.s_user_id.length!== 0 && data.s_user_id.includes(data.result[x]["id"])){

                        s_class="save_list";

                        s_span = 'favourite';



                    }

                    var form_text = "";

                            @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)

                    var session_id= "{{session('userDetails')->id}}";

                    if (session_id  == data.result[x]["user_id"]){

                        form_text ="";

                    }else {

                        form_text ='<form action="{{route("chat-wanted")}}" class="form-chat-wanted" method="post" id="chat_wanted" style="width: 100%;">'+

                            '<div class="row">'+

                            '<input type="hidden" name="car_id" value="'+data.result[x]["id"]+'">'+

                            '<input type="hidden" name="to_id" value="'+data.result[x]["user_id"]+'">'+

                            '<div class="form-group col-md-8">'+

                            '<label for="inputEmail4">Your Query was</label>'+

                            '<input type="text" name="query1" class="form-control" id="query_input" placeholder="Enter Your Query">'+

                            '</div>'+

                            '<div class="form-group col-md-4">'+

                            '<label for="inputEmail4">Your proposal was</label>'+

                            '<input type="text" class="form-control" name="query2" id="porposal_input" placeholder="Prices">'+

                            '</div>'+

                            '<div class="col-12 col-sm-4 ml-auto">'+

                            '<button  class="btn-show-more-filter mb-3">Send Proposal</button>'+

                            '</div>'+

                            '</div>'+

                            '</form>';

                    }

                    @endif
                    
                 if (data.result[x]["user_number"] !== null){

                        var con = '<h5>Contact Member :<span>'+data.result[x]["user_number"]+'</span></h5>';

                    }else{

                        con = "";

                    }

                    var sesion = '@if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true) <a class="wanted-save-list" data-col="'+data.result[x]["id"]+'"><i class="fas fa-heart '+s_class+'" style="display: flex;color:#707070;padding-left: 12px;"></i><span class="span-heart '+s_class+'" style="color:#707070;">'+s_span+'</span></a> @endif';



                    if (data.result[x]["model_wanted"] !== null){

                        var model_Wanted = data.result[x]["model_wanted"]['_value'];

                    }else {

                        model_Wanted = '';

                    }

                    if(data.result[x]["varient_wanted"] !== null){

                        var variant_Wanted = data.result[x]["varient_wanted"]['_value'];



                    }else{

                        variant_Wanted = '';

                    }

                    if(data.result[x]["brand_wanted"] !== null){

                        var brand_Wanted = data.result[x]["brand_wanted"]['name'];



                    }else {

                        brand_Wanted = '';

                    }

                    var apend='';

                    var apend='<div class="row m-0 mb-3 mt-3 pt-4  save-lis-wanted"><div class="col-12 pl-0"><div class="row m-0"><div class="col-5 save-list-heading"><h3>'+data.result[x]["title"]+'</h3>' +

                        '<p>'+data.result[x]["describe"]+'</p><a href="'+data.result[x]["image"]+'" class="download-btn"  download><i class="fas fa-paperclip"></i>Download Image</a></div>'+

                        '<div class="col-5 d-flex align-items-center justify-content-center  wanted-heart-fvrt"><img class="card-img-top imgWidthAndHeight" src="'+data.result[x]["image"]+'"></div>'+

                        '<div class="col-2 d-flex align-items-start justify-content-end  wanted-heart-fvrt">'+sesion+'</div>' +

                        '<div class="col-7 wanted-client-budget">' +

                        '<h5>'+brand_Wanted+'-<span>Client Budget :</span> <span>£ '+data.result[x]["budget"]+' </span></h5>' +

                        ' '+con+'<span></span></div>' +

                        '<div class="col-5 ask-question-wanted Veiw-detail-wanted d-flex align-items-center justify-content-end"><h6 class="m-0">View Details </h6>'  +

                        ' <div class="round-question"><i class="fas fa-caret-down"></i></div>'+

                        '</div></div></div>' +

                        '<div class="col-12 detailDiv-query"><div class="col-12 p-0"><hr/></div><div class="row m-0"><div class="col-12"><div class="form-row">' +

                        '<div class="form-group col-6 col-md-6"><label for="inputEmail4">Brand</label><input type="text" class="form-control"   value="'+brand_Wanted+'" readonly></div>' +

                        '<div class="form-group col-6 col-md-6"><label for="inputEmail4">Model</label>  <input type="text" class="form-control"   value="'+model_Wanted+'" readonly> </div>' +

                        ' <div class="form-group col-6 col-md-6"><label for="inputEmail4">Varient</label>  <input type="text" class="form-control"   value="'+variant_Wanted+'" readonly> </div>' +

                        form_text +'</div></div></div>' +

                        '</div></div>' ;

                    $("#apend").append(apend);

                        }



                let detailDiv=  $(".detailDiv-query");

                detailDiv.hide();

                $('.Veiw-detail-wanted').on('click',function(e){

                    $(".f-card-description").css("display","block");



                    if(  detailDiv.css("display")== "none"){

                        console.log(this);

                        

                        $(this).closest(".save-lis-wanted ").find(".round-question i").css("color", "#707070");

                        console.log(this);

                        $(this).closest(".save-lis-wanted").find(detailDiv).slideToggle("slow");







                    }else if (  detailDiv.css("display")== "block" ) {

                        


                        $(this).closest(".save-lis-wanted ").find(".round-question").css("background", "#fff");

                        $(this).closest(".save-lis-wanted ").find(".round-question i").css("color", "#707070");



                        $(this).closest(".save-lis-wanted ").find(detailDiv).slideToggle("slow");





                    }





                });





            }else {

                $(".wanted-section-error").html("No Record Match");

                $(".wanted-section-error").css({display:'block',color:"#e4001b",fontSize:'25px',fontWeight: '500'});

                return false;

            }





        },

        error:function(data){

            console.log(data);



        }



    });

});



$(document).on("click",".wanted-save-list",function(e) {

    $(".f-card-description").css("display","block");

    e.preventDefault();

   var c_id = $(this).data("col");

    var cur=$(this);

    console.log(c_id);

    var url="{{ route('wanted-save-list',['c_id'=>':val'])}}";

    url=url.replace(":val",c_id);

    $.ajax({

        method:"get",

        url:url,

        DataType:"json",

        success:function(data){

            console.log(data);

            if(data.status==1){

                cur.find("i").toggleClass("save_list");

                cur.find("span").toggleClass("save_list");

                if(data.result === "Car deleted"){

                    cur.find("span").text("add favourite");

                }else {

                    cur.find("span").text("favourite");

                }









            }



            else{

                alert(data.result);

            }

            },

        error:function(data){

            console.log(data);



        }



    });



});



$(document).on("click","#nav-contact-tab",function(e) {

    $(".f-card-description").css("display","block");

    e.preventDefault();

    $("#save-wanted-list").empty();

    $("#save-wanted-list").append('<div id="s_w_append" class="row m-0"></div>');

 var url  = "{{route('wanted-save-list-view')}}";

    $.ajax({

        method:"get",

        url:url,

        DataType:"json",

        success:function(data){

            if(data.status== 1){

                console.log(data.result["data"]);

                $(".wanted-section-error").css({display:'none'});

               var d= data.result["data"];

                for(x in d){

                    var c_img = d[x]["image"];

                    var img =   "{{asset('storage/app/public/'.":img")}}";

                    img = img.replace(':img',c_img);

                    var form_text = "";

                            @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)

                    var session_id= "{{session('userDetails')->id}}";

                    if (session_id  == d[x]["user_id"]){

                        form_text ="";

                    }else {

                        form_text ='<form action="{{route("chat-wanted")}}" class="form-chat-wanted" method="post" id="chat_wanted" style="width: 100%;">'+

                            '<div class="row">'+

                            '<input type="hidden" name="car_id" value="'+d[x]["id"]+'">'+

                            '<input type="hidden" name="to_id" value="'+d[x]["user_id"]+'">'+

                            '<div class="form-group col-md-8">'+

                            '<label for="inputEmail4">Your Query was</label>'+

                            '<input type="text" name="query1" class="form-control" id="query_input" placeholder="Enter Your Query">'+

                            '</div>'+

                            '<div class="form-group col-md-4">'+

                            '<label for="inputEmail4">Your proposal was</label>'+

                            '<input type="text" class="form-control" name="query2" id="porposal_input" placeholder="Prices">'+

                            '</div>'+

                            '<div class="col-12 col-sm-4 ml-auto">'+

                            '<button  class="btn-show-more-filter mb-3">Send Proposal</button>'+

                            '</div>'+

                            '</div>'+

                            '</form>';

                    }

                    @endif

                    

                    if (d[x]["user_number"] !== null){

                        var con = '<h5>Contact Member :<span>'+d[x]["user_number"]+'</span></h5>';

                    }else{

                        con = "";

                    }

                    if (d[x]["model_wanted"] !== null){

                        var model_Wanted = d[x]["model_wanted"]["_value"];

                    }else {

                        model_Wanted = '';

                    }

                    if(d[x]["varient_wanted"] !== null){

                        var variant_Wanted = d[x]["varient_wanted"]["_value"];



                    }else{

                        variant_Wanted = '';

                    }

                    if(d[x]["brand_wanted"] !== null){

                        var brand_Wanted = d[x]["brand_wanted"]["name"];



                    }else {

                        brand_Wanted = '';

                    }

                    var apend='';

                    var apend='<div class="row m-0 mb-3 mt-3 pt-4  save-lis-wanted"><div class="col-12 pl-0"><div class="row m-0"><div class="col-5 save-list-heading"><h3>'+d[x]["title"]+'</h3>' +

                        '<p>'+d[x]["describe"]+'</p><a href="'+img+'" class="download-btn"  download><i class="fas fa-paperclip"></i>Download Image</a></div>'+

                        '<div class="col-5 d-flex align-items-center justify-content-center  wanted-heart-fvrt"><img class="card-img-top imgWidthAndHeight" src="'+c_img+'"></div>'+

                        '<div class="col-2 d-flex align-items-start justify-content-end  wanted-heart-fvrt"><a><i class="fas fa-heart" style="display: flex;"></i><span  style="color:red;">Favourite</span></a></div>' +

                        '<div class="col-7 wanted-client-budget">' +

                        '<h5>'+brand_Wanted+'-<span>Client Budget :</span> <span>£ '+d[x]["budget"]+' </span></h5>' +

                        ' '+con+'<span></span></div>' +

                        '<div class="col-5 ask-question-wanted Veiw-detail-wanted d-flex align-items-center justify-content-end"><h6 class="m-0">View Details </h6>'  +

                        ' <div class="round-question"><i class="fas fa-caret-down"></i></div>'+

                        '</div></div></div>' +

                        '<div class="col-12 detailDiv-query"><div class="col-12 p-0"><hr/></div><div class="row m-0"><div class="col-12"><div class="form-row">' +

                        '<div class="form-group col-6 col-md-6"><label for="inputEmail4">Brand</label><input type="text" class="form-control"   value="'+brand_Wanted+'" readonly></div>' +

                        '<div class="form-group col-6 col-md-6"><label for="inputEmail4">Model</label>  <input type="text" class="form-control"   value="'+model_Wanted+'" readonly> </div>' +

                        ' <div class="form-group col-6 col-md-6"><label for="inputEmail4">Varient</label>  <input type="text" class="form-control"   value="'+variant_Wanted+'" readonly> </div>' +

                        form_text +'</div></div></div>' +

                        '</div></div>' ;

                    $("#s_w_append").append(apend);

                }





                let detailDiv=  $(".detailDiv-query");

                detailDiv.hide();

                $('.Veiw-detail-wanted').on('click',function(e){

                    $(".f-card-description").css("display","block");



                    if(  detailDiv.css("display")== "none"){

                        console.log(this);

                        // $(this).closest(".save-lis-wanted ").css("background", "#fff");

                        // $(this).closest(".save-lis-wanted ").find(".round-question").css("background", "#e4001b");

                        // $(this).closest(".round-question").css("background", "#e4001b");

                        $(this).closest(".save-lis-wanted ").find(".round-question i").css("color", "#707070");

                        console.log(this);

                        $(this).closest(".save-lis-wanted").find(detailDiv).slideToggle("slow");







                    }else if (  detailDiv.css("display")== "block" ) {

                        // $(this).closest(".save-lis-wanted ").css("background", "#efefef");



                        $(this).closest(".save-lis-wanted ").find(".round-question").css("background", "#fff");

                        $(this).closest(".save-lis-wanted ").find(".round-question i").css("color", "#707070");



                        $(this).closest(".save-lis-wanted ").find(detailDiv).slideToggle("slow");





                    }





                });





            }else{



            }

        },

        error:function(data){

            console.log(data);



        }



    });



});







$(document).on("submit",".garage_btn_email",function(e) {

    e.preventDefault();
   var formdata=new FormData(this);

    var url=$(this).attr("action");

    var t =this;

    $(t).find(".garage-email-loader").show();

    $(t).find(".garage-sign-arrow").hide();

    $(t).find(".garage-btn-mail").prop("disabled",true);

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

            if(data.status== 1){

                $(t).find(".garage-email-loader").hide();

                $(t).find(".garage-sign-arrow").show();

                $(t).find(".garage-btn-mail").prop("disabled",false);

                $("#g_email").val("");

            // alert("your email has been send");

               $(".EmailModalSuccess").modal("show");

             console.log(data.result);

            }else{

            }

        },

        error:function(data){

            console.log(data);



        }



    });



});

//misc mail



$(document).on("submit",".misc_btn_email",function(e) {

    e.preventDefault();

    var formdata=new FormData(this);

    var url=$(this).attr("action");

    var t = this;

    $(t).find(".misc-email-loader").show();

    $(t).find(".misc-sign-arrow").hide();

    $(t).find(".misc-btn-mail").prop("disabled",true);

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

            if(data.status== 1){

                $(t).find(".misc-email-loader").hide();

                $(t).find(".misc-sign-arrow").show();

                $(t).find(".misc-btn-mail").prop("disabled",false);

                $("#g_email").val("");

                //alert("your email has been send");

                $(".EmailModalSuccess").modal("show");

                console.log(data.result);

            }else{

            }

        },

        error:function(data){

            console.log(data);



        }



    });



});











$("#contact_Checkbox").on("change",function(e) {

    $(".f-card-description").css("display","block");

    e.preventDefault();

if($(this).is(':checked') == true){

    $("#contact_numbr").css("display","block");

    }else{

        $("#contact_numbr").css("display","none");

    }



});

$("#contact_Checkbox_nmbr").on("change",function(e) {

    $(".f-card-description").css("display","block");

    e.preventDefault();

    $("#contact_numbr").css("display","none");

});

$("#misc_Checkbox").on("change",function(e) {

    $(".f-card-description").css("display","block");

    e.preventDefault();

    $("#misc_numbr").css("display","block");

    if($(this).is(':checked') == true){

        $("#misc_contact").css("display","block");

    }else{

        $("#misc_contact").css("display","none");

    }



});

$("#misc_Checkbox_nmbr").on("change",function(e) {

    $(".f-card-description").css("display","block");

    e.preventDefault();

    $("#misc_contact").css("display","none");

    $(".contact_pattern").hide();





});

$(document).on("change",".filter-radio-misc",function(e){

    e.preventDefault();

    $(".f-card-description").css("display","block");



    var query='';

    var count=0;

    $(".filter-radio-misc").each(function(e){

        if($(this).prop("checked")){

            var col=$(this).data("col");

            var val=$(this).val();

            console.log(col,val);

            query+=col +"=" +"'"+ val + "'"+ " or ";

            count++;

        }

    });

    query=query.substring(0,query.length-4);

    var search = $("#input-filter-search-misc").val();

    console.log(query);

    if (search !== ""){

        var url="{{ route('filter-misc',['query'=>':val','search'=>':srch'])}}";

        url=url.replace(":val",query);

        url = url.replace(":srch",search) ;

    }else {

         url="{{ route('filter-misc',['query'=>':val'])}}";

        url=url.replace(":val",query);

    }



    console.log(url);
   $.ajax({

        method:"get",

        url:url,

        DataType:"json",

        success:function(data){

            console.log(data);

            $("#apend").remove();

            $(".append_class_misc").append('<div id="apend" style="width:100%;"></div>');

            if(data.status==1){

                $(".error-post-code-misc").css({display:'none'});

                for(x in data.result){

               if (data.result[x]["number"] !== null){

                 var nmbr =  '<div class="form-group col-12 col-md-12"><label for="inputEmail4">Contact Number</label><input type="text" class="form-control misc-class-color" value="'+data.result[x]["number"]+'" readonly=""></div>';

                }else {

                   var nmbr= "";

               }



                  var rout = "{{route('miscemail')}}";

                    var form_text = "";

                            @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)

                    var session_id= "{{session('userDetails')->id}}";

                    if (session_id  == data.result[x]["user_id"]){

                        form_text ="";

                    }else{

                        form_text =    '<div class="form-group col-12 formgroup"><label>Email:</label><form class="misc_btn_email" action="'+rout+'" method="post"><div class="input-group mb-3"><input type="hidden" value="'+data.result[x]["user_id"]+'" name="m_userId" class="m_userId"><input type="email"  style="background-color: #e9ecef;" class="form-control g_email misc-class-color" name="email"  placeholder="e.g. abc@example.com" aria-label="Recipient,s username" aria-describedby="basic-addon2" required>' +

                            '<div class="input-group-append"><button class="input-group-text" id="basic-addon2"><i class="fas fa-paper-plane"></i></button></div>'+

                            '</div> </form></div>';

                    }

                            @endif



                        if(data.result[x]["model_misc"] !== null && data.result[x]["model_misc"]["_value"] !== null){

                            var model_misc = data.result[x]["model_misc"]["_value"];

                            }else {

                                model_misc = '';

                            }

                            if (data.result[x]["brand_misc"]["name"] !== null){

                            var brand_misc = data.result[x]["brand_misc"]["name"];

                            }else{

                            brand_misc = '';

                            }
                              var img = JSON.parse(data.result[x]["pics"])[0];

                    var apend='';

                    var apend='<div class="row m-0 mb-3 pt-4  save-lis-wanted"><div class="col-12 pl-0"><div class="row m-0"><div class="col-8 save-list-heading">' +

                            '<h3>'+data.result[x]["car_part"]+'</h3><div class="row"><div class="col-12"><div class="form-row"><div class="form-group col-6 col-md-6"><label for="inputEmail4">Brand</label><input type="text" class="form-control misc-class-color" value="'+brand_misc+'" readonly="" ></div>' +

                        '<div class="form-group col-6 col-md-6"><label for="inputEmail4">Model</label><input type="text" class="form-control misc-class-color" value="'+model_misc+'" readonly="" ></div>' +

                        '<div class="form-group col-6 col-md-6"><label for="inputEmail4">Condition</label><input type="text" class="form-control misc-class-color" value="'+data.result[x]["part_condition"]+'" readonly=""></div>' +

                        '<div class="form-group col-6 col-md-6"><label for="inputEmail4">price</label><input type="text" class="form-control misc-class-color" value="£'+data.result[x]["price"]+'" readonly="" style="font-weight: 700"></div>' +

                        '</div></div></div>' +

                        nmbr +

                        form_text +

                        '</div>'+

                            '<div class="col-4 d-flex align-items-start justify-content-end  wanted-heart-fvrt"><img class="card-img-top imgWidthAndHeight" src="'+img+'"></div>'+

                        '</div></div></div>';

                    $("#apend").append(apend);





                }



            }else {

                $(".error-post-code-misc").html("No Record Match");

                $(".error-post-code-misc").css({display:'block',color:"#e4001b",fontSize:'25px',fontWeight: '500'});

                return false;

            }





        },

        error:function(data){

            console.log(data);



        }



    });

});



// search for miscellanous

$(document).on("click",".input-search-misc",function(e){

    e.preventDefault();

 

    var val=$("#input-filter-search-misc").val();

    if(val === "") {

        $("#input-filter-search-misc").css("border", "1px solid #e4001b");

        $(".input-search-misc").css("border", "1px solid #e4001b");



        setTimeout(function () {

            $("#input-filter-search-misc").css("border", "transparent");

            $(".input-search-misc").css("border", "transparent");

        },5000);

        return false;

    }

    var url="{{ route('misc-search',['val'=>':val'])}}";

    url=url.replace(":val",val);

    console.log(url);

    $.ajax({

        method:"get",

        url:url,

        DataType:"json",

        success:function(data){

            console.log(data);

            $("#apend").remove();

            $(".append_class_misc").append('<div id="apend" style="width:100%;"></div>');

            if(data.status==1){

                $(".error-post-code-misc").css({display:'none'});

                for(x in data.result){

                    if (data.result[x]["number"] !== null){

                        var nmbr =  '<div class="form-group col-12 col-md-12"><label for="inputEmail4">Contact Number</label><input type="text" class="form-control misc-class-color" value="'+data.result[x]["number"]+'" readonly=""></div>';

                    }else {

                        var nmbr= "";

                    }

                    var rout = "{{route('miscemail')}}";

                    var form_text = "";

                            @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)

                    var session_id= "{{session('userDetails')->id}}";

                    if (session_id  == data.result[x]["user_id"]){

                        form_text ="";

                    }else{

                        form_text =    '<div class="form-group col-12 formgroup"><label>Email:</label><form class="misc_btn_email" action="'+rout+'" method="post"><div class="input-group mb-3"><input type="hidden" value="'+data.result[x]["user_id"]+'" name="m_userId" class="m_userId"><input type="email"  style="background-color: #e9ecef;" class="form-control g_email misc-class-color" name="email"  placeholder="e.g. abc@example.com" aria-label="Recipient,s username" aria-describedby="basic-addon2" required>' +

                            '<div class="input-group-append"><button class="input-group-text" id="basic-addon2"><i class="fas fa-paper-plane"></i></button></div>'+

                            '</div> </form></div>';

                    }

                            @endif



  if(data.result[x]["model_misc"] !== null){

      var model_misc = data.result[x]["model_misc"]["_value"];

                            }else {

                                   model_misc='';

                            }

                            if (data.result[x]["brand_misc"] !== null){

      var brand_misc= data.result[x]["brand_misc"]["name"];

                            } else{

      brand_misc = '';

                            }
                            
                            var img = JSON.parse(data.result[x]["pics"])[0];

                    var apend='';

                    var apend='<div class="row m-0 mb-3 pt-4  save-lis-wanted"><div class="col-12 pl-0"><div class="row m-0"><div class="col-8 save-list-heading">' +

                        '<h3>'+data.result[x]["car_part"]+'</h3><div class="row"><div class="col-12"><div class="form-row"><div class="form-group col-6 col-md-6"><label for="inputEmail4">Brand</label><input type="text" class="form-control misc-class-color" value="'+brand_misc+'" readonly="" ></div>' +

                        '<div class="form-group col-6 col-md-6"><label for="inputEmail4">Model</label><input type="text" class="form-control misc-class-color" value="'+model_misc+'" readonly="" ></div>' +

                        '<div class="form-group col-6 col-md-6"><label for="inputEmail4">Condition</label><input type="text" class="form-control misc-class-color" value="'+data.result[x]["part_condition"]+'" readonly=""></div>' +

                        '<div class="form-group col-6 col-md-6"><label for="inputEmail4">price</label><input type="text" class="form-control misc-class-color" value="£'+data.result[x]["price"]+'" readonly="" style="font-weight: 700"></div>' +

                        '</div></div></div>' +

                        nmbr +

                        form_text +

                        '</div>'+

                        '<div class="col-4 d-flex align-items-start justify-content-end  wanted-heart-fvrt"><img class="card-img-top imgWidthAndHeight" src="'+img+'"></div>'+

                        '</div></div></div>';

                    $("#apend").append(apend);





                }



            }else {

                $(".error-post-code-misc").html("No Record Match");

                $(".error-post-code-misc").css({display:'block',color:"#e4001b",fontSize:'25px',fontWeight: '500'});

                return false;

            }





        },

        error:function(data){

            console.log(data);



        }



    });

});





$(document).on("click","#price-misc-filter",function(e){

    e.preventDefault();

    var val1=$("#val1").val();

    var val2=$("#val2").val();

    if(val1 === "" || val2 === ""  ) {



        $("#val1").css("border", "1px solid #e4001b") ;

        $("#val2").css("border", "1px solid #e4001b");



        setTimeout(function () {

            $("#val1").css("border", "transparent");

            $("#val2").css("border", "transparent");

        },5000);

        return false;

    }



var search = $("#input-filter-search-misc").val();

    var url="{{ route('misc-price-filter',['val1'=>':val1','val2'=>':val2','search'=>':val'])}}";

    url=url.replace(":val1",val1);

    url=url.replace(":val2",val2);

    url=url.replace(":val",search);

    console.log(url);

    $.ajax({

        method:"get",

        url:url,

        DataType:"json",

        success:function(data){

            console.log(data);

            $("#apend").remove();

            $(".append_class_misc").append('<div id="apend" style="width:100%;"></div>');

            if(data.status==1){

                $(".remove-paginate-misc").hide();

                $(".error-post-code-misc").css({display:'none'});

                for(x in data.result){

                    if (data.result[x]["number"] !== null){

                        var nmbr =  '<div class="form-group col-12 col-md-12"><label for="inputEmail4">Contact Number</label><input type="text" class="form-control misc-class-color" value="'+data.result[x]["number"]+'" readonly=""></div>';

                    }else {

                        var nmbr= "";

                    }

                    var form_text = "";

                            @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)

                    var session_id= "{{session('userDetails')->id}}";

                    if (session_id  == data.result[x]["user_id"]){

                        form_text ="";

                    }else{

                        form_text =    '<div class="form-group col-12 formgroup"><label>Email:</label><form class="misc_btn_email" action="'+rout+'" method="post"><div class="input-group mb-3"><input type="hidden" value="'+data.result[x]["user_id"]+'" name="m_userId" class="m_userId"><input type="email"  style="background-color: #e9ecef;" class="form-control g_email misc-class-color" name="email"  placeholder="e.g. abc@example.com" aria-label="Recipient,s username" aria-describedby="basic-addon2" required>' +

                            '<div class="input-group-append"><button class="input-group-text" id="basic-addon2"><i class="fas fa-paper-plane"></i></button></div>'+

                            '</div> </form></div>';

                    }

                    @endif

                    if(data.result[x]["model_misc"] !== null){

                        var model_misc = data.result[x]["model_misc"]["_value"];

                    }else{

                        model_misc = '';

                    }

                    if (data.result[x]["brand_misc"] !== null){

                        var brand_misc = data.result[x]["brand_misc"]["name"];

                    }else{

                        brand_misc = '';

                    }

                    var rout = "{{route('miscemail')}}";

                    var apend='';

                    var apend='<div class="row m-0 mb-3 pt-4  save-lis-wanted"><div class="col-12 pl-0"><div class="row m-0"><div class="col-8 save-list-heading">' +

                        '<h3>'+data.result[x]["car_part"]+'</h3><div class="row"><div class="col-12"><div class="form-row"><div class="form-group col-6 col-md-6"><label for="inputEmail4">Brand</label><input type="text" class="form-control misc-class-color" value="'+brand_misc+'" readonly="" ></div>' +

                        '<div class="form-group col-6 col-md-6"><label for="inputEmail4">Model</label><input type="text" class="form-control misc-class-color" value="'+model_misc+'" readonly="" ></div>' +

                        '<div class="form-group col-6 col-md-6"><label for="inputEmail4">Condition</label><input type="text" class="form-control misc-class-color" value="'+data.result[x]["part_condition"]+'" readonly=""></div>' +

                        '<div class="form-group col-6 col-md-6"><label for="inputEmail4">price</label><input type="text" class="form-control misc-class-color" value="£'+data.result[x]["price"]+'" readonly="" style="font-weight: 700"></div>' +

                        '</div></div></div>' +

                        nmbr +

                        form_text +

                        '</div>'+

                        '<div class="col-4 d-flex align-items-start justify-content-end  wanted-heart-fvrt"><img class="card-img-top imgWidthAndHeight" src="/../../public/crop_images/'+data.result[x]["feature_img"]+'"></div>'+

                        '</div></div></div>';

                    $("#apend").append(apend);





                }



            }else {

                $(".error-post-code-misc").html("No Record Match");

                $(".error-post-code-misc").css({display:'block',color:"#e4001b",fontSize:'25px',fontWeight: '500'});

                return false;

            }





        },

        error:function(data){

            console.log(data);



        }



    });

});







// preappend for swap

$(document).on("click",".swap-my-car",function (e) {

    e.preventDefault();

var id = $(this).data("col");

var url = '{{route("swap-pricing",["p_id"=>":id"])}}';

url = url.replace(":id",id);

    $.ajax({

        url:url,

        method:"get",

        DataType:"json",

        success:function(data){

            if(data.status==1){

                console.log(data.result);

                $(".loader").hide();

                $("#swap_err").css({display:"none"});

                $("#swap_pricing_tab").click();

                $("#append_swap").remove();

                $("#get_swap_id").val(data.result['id']);

                if(data.result["cartype"] != null){

  var cartype = data.result["cartype"]['_value'];

                }else {

                     cartype = '';

                }

                if (data.result['d_brand']!= null){

                    var brand = data.result['d_brand']['name'];

                }else {

                    brand ='';

                }

if (data.result["enginetype"] !== null){

              var enginetype = data.result["enginetype"]["_value"];



} else{

                    enginetype = '' ;

}

if(data.result["model"] !== null){

                    var model = data.result["model"]['_value'];

}else {

                    model = '';

}



                var c_img = data.result["crop_image"];

                var img ='{{asset(":image")}}';

                img = img.replace(":image",c_img);

                var apend = '<div class="card" id="append_swap">' +

                    '<div class="card-header p-0">' +

                    '<h3 style="font-size: 22px;">'+model+'</h3>' +

                    '<p>'+brand+','+cartype+','+enginetype+'</p>' +

                    '</div>' +

                    '<div class="cardimageswap-car">' +

                    '<img class="card-img-top imgWidthAndHeight" src="'+data.result["crop_image"]+'" alt="Card image cap">' +

                    '</div>' +

                    '<div class="card-body p-0">' +

                    '<div class="row">' +

                    '<div class="col-12 carworth">Your Car Worth</div>' +

                    '<div class="col-12">' +

                    '<div class="  carspecspric">£'+data.result['price'] +

                    '</div></div>' +

                    '<div class="col-12"><hr></div>' +

                    '</div>' +

                    '<div class="row summarysection">' +

                    '<div class="col-12 summaryheading">' +

                    '<i class="fas fa-file-alt"></i>Car Summary' +

                    '</div>' +

                    '<div class="col-6 summarybillheading " >Make:</div>' +

                    '<div class="col-6 summarybilldetail">'+brand+'</div>' +

                    '<div class="col-12"><hr></div>' +

                    '<div class="col-6 summarybillheading " >Model:</div>' +

                    '<div class="col-6 summarybilldetail">'+model+'</div>' +

                    '<div class="col-12"><hr></div>' +

                    '<div class="col-6 summarybillheading " >Car Condition:</div>' +

                    '<div class="col-6 summarybilldetail">'+data.result["car_condition"]+'</div>' +

                    '<div class="col-12"><hr></div>' +

                    '<div class="col-6 summarybillheading " >Car Trasnmission:</div>' +

                    '<div class="col-6 summarybilldetail">'+data.result["transmission"]+'</div>' +

                    '<div class="col-12"><hr></div>' +

                    '<div class="col-6 summarybillheading " >Body Type:</div>' +

                    '<div class="col-6 summarybilldetail">'+cartype+'</div>' +

                    '<div class="col-12"><hr></div>' +

                    '<div class="col-6 summarybillheading " >Color:</div>' +

                    '<div class="col-6 summarybilldetail">'+data.result["color"]+'</div>' +

                    '<div class="col-12"><hr></div>' +

                    '<div class="col-6 summarybillheading " >Engine Type:</div>' +

                    '<div class="col-6 summarybilldetail">'+enginetype+'</div>' +

                    '<div class="col-12"><hr></div>' +

                    '<div class="col-6 summarybillheading " >Fuel type:</div>' +

                    '<div class="col-6 summarybilldetail">'+data.result["fuel_type"]+'</div>' +

                    '<div class="col-12"><hr></div>' +

                    '<div class="col-9 summarybillheading" style="margin-top: 30px; padding-bottom: 40px;"></div>'+

                    '</div>' +

                    '</div>' +

                    '</div>';

                $("#swap_append_class").prepend(apend);



            }else{

                $("#swap_err").css({backgroundColor:"#f8d7da",textAlign:"center",display:"block"});

                $("#swap_err").html(data.msg);

                $(".loader").hide();

            }

        }

    });







});

// create swap_id

$(document).on("submit","#swap_id_form",function (e){

    e.preventDefault();

    var swapcar = $("#get_swap_id").val();

    $("#btn-swap-dis").prop("disabled",true);

    if (swapcar === ""){

        $("#span_err_swap").css({backgroundColor:"#f8d7da",textAlign:"center",display:"block"});

        $("#span_err_swap").html("Please select your car");

        setTimeout(function () {

            $("#span_err_swap").css("display","none");

            $("#swap_car_details").click();

        },5000);

        return false;



    }

    var formdata=new FormData(this);

    var url=$(this).attr("action");



    $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });

        $(".loader").show();



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

                    $("#swap_loader").hide();

                    setTimeout(function () {

                        window.location = "{{route('frontend-swap-list')}}";

                    }, 5000);



                   

$(".EmailModalSuccessSwap").modal("show");

$("#email_body_swap").html(data.msg);



                    setTimeout(function () {

                        $(".error-post-code-swap").css({backgroundColor:"#d4edda",textAlign:"center",display:"block"});

                        $(".error-post-code-swap").html(data.msg);

                    }, 5000);





                }else{

                    $("#span_err_swap").css({backgroundColor:"#f8d7da",textAlign:"center",display:"block"});

                    $("#span_err_swap").html(data.msg);

                    $("#swap_loader").hide();

                }

            }

        });



});

$(".select-swap-index-filter").change(function () {

    $(".f-card-description").css("display","block");



   var value =   $(this).val();

   var col = $(this).data("col");

    var query='';

    var count=0;

    query+=col +"=" +"'"+ value + "'"+ " or ";

    count++;

    query=query.substring(0,query.length-4);

    query= query + " and  car_availbilty  =  'Swap'";

    console.log(query);

    var url = "{{route('frontend-swap-index',['query'=>':query'])}}";

    url = url.replace(":query",query);

    $.ajax({

        url:url,

        method:"get",

        DataType:"json",

        success:function(data){

            if(data.status==1){

                if (data.result !== null){

                console.log(data.result);

          $("#swap-btn-index").remove();

          $("#swap-img-index").remove();

          $("#swap-img-index-append").append('<div id="swap-img-index"></div>');

          $("#swap-btn-index-append").append('<div id="swap-btn-index"></div>');

        var url_r = '{{route("frontend-swap-cars",["s_id"=>":id"])}}';

     var id   = btoa(data.result["id"]);

     url_r = url_r.replace(":id",id);

         var apend = '<a href="'+url_r+'"><button class="becomrental becomrental1" style="margin-top: 20px;">Swap</button></a>';

          $("#swap-btn-index").prepend(apend);

          var img = '{{":image"}}';

          json_img =JSON.parse(data.result['pic_url']);

          img=img.replace(":image",json_img[0]);

          var apend_img =  '<img class="" src="'+img+'" style="height:473px!important;">';

             $("#swap-img-index").prepend(apend_img);

             console.log(data.result['brand']);

                    $("#model-index option[value='"+data.result['modal']+"']").prop("selected",true);

                    $("#Year-index option[value='"+data.result['year']+"']").prop("selected",true);

                    $("#condition-index option[value='"+data.result['car_condition']+"']").prop("selected",true);

                }

            }else{

                $("#model-index option[value='']").prop("selected",true);

                $("#Year-index option[value='']").prop("selected",true);

                $("#condition-index option[value='']").prop("selected",true);



            }

        }

    });



});

$(".index-filter-selection").click(function(){

    $('.index-filter-selection').removeClass('index-newCar');

    $('.index-filter-selection').addClass('all');

    $(this).removeClass('all').addClass('index-newCar');

    // var condition = $(this).data('con');

    // alert(condition);

});

$("#search-filter-btn-index").click(function(e){

    e.preventDefault();

    var count = 0;

    var query='';

  var firstcondition = $(".index-newCar").data('con');

    $(".price-filter-range").each(function () {

        if($(this).val() && $(this).val()!==""){

            var pcolname=$(this).attr("name");

            var pvalue=$(this).val();

            count = 1;

            if (pvalue === "above"){



                query+= pcolname +" >= " + 100000  + " and ";



            }else {

                query+= pcolname +" between " +  pvalue + " and ";

            }



        }



    });

 var brand = '';

 var model = '';

 var year = '';



    $(".filter-index").each(function () {

        if($(this).val() && $(this).val()!==""){

            var colname=$(this).attr("name");

            if (colname === "brand"){

                brand = $(this).val();

            }else if (colname === "modal"){

                 model = $(this).val();

            }else{

                 year = $(this).val();

            }

            var value=$(this).val();

            query+=colname +"= '" + value + "' and ";

                count++;

        }

    });



    if (firstcondition === "Featured"){

     query+= "featured" + " = '" + "1" + "' and ";

    }else if(firstcondition === "New"){

        query+= "car_condition" + " = '" + firstcondition + "' and ";

    }else if(firstcondition === "Used"){

        query+= "car_condition" + " = '" + firstcondition + "' and ";

    }

    if(count==0){

  

        window.location ="{{route('index-front-filter',["query"=>"all"])}}";

 

         return false;

    }

    query=query.substring(0,query.length-5);

 

    query = btoa(query);

    var url="{{route('index-front-filter',["query"=>":url","b"=>":brand","m"=>":model","y"=>":year"])}}";

    url=url.replace(":url",query);

    if (brand != ''){

        url=url.replace(":brand",brand);

    }

    if (model != ''){

        url=url.replace(":model",model);

    }

  if (year != ''){

      url=url.replace(":year",year);

  }



    window.location=url;





});



$(".like-in-blog").click(function (e) {

   e.preventDefault();

   @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)

 var col = $(this).data('col');

   console.log(col);

var url  = '{{route('Blog-Save-List',['c_id'=>':col'])}}';

url = url.replace(":col",col);

@else

$('#blogModalCenter').modal("show");

    return false;

    @endif

    $.ajax({

        method:"get",

        url:url,

        DataType:"json",

        success:function(data){

            console.log(data);

            if(data.status==1){

              

                if(data.result === "Car deleted"){

                    $(".like-in-blog").css("color","#707070");

                    $(".count-lik-blog").html();

                  

                }else {

                    $(".like-in-blog").css("color","#fd001e");

                  

                }









            }else{

                alert(data.result);

            }

        },

        error:function(data){

            console.log(data);



        }



    });





});

$(".like-car-detail").click(function (e) {

    e.preventDefault();

    @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)

    var col = $(this).data('col');

    console.log(col);

    var url  = '{{route('like-car-detail',['c_id'=>':col'])}}';

    url = url.replace(":col",col);

    @else

    $('#detailModalCenter').modal("show");

    return false;

    @endif

    $.ajax({

        method:"get",

        url:url,

        DataType:"json",

        success:function(data){

            console.log(data);

            if(data.status==1){

               

                if(data.result === "Car deleted"){

                    $(".like-car-detail").css("color","#dee2e6");

                  

                }else {

                    $(".like-car-detail").css("color","#fd001e");

                  

                }









            }else{

                alert(data.result);

            }

        },

        error:function(data){

            console.log(data);



        }



    });





});









$(document).on("change",".garage-star-rating",function(e) {

        $(".f-card-description").css("display","block");

        e.preventDefault();



        if($(this).prop('checked') === true){

            var limit = $(this).data('id');

            var c_id = $(this).data('car');

            var url='{{route('garage-rating',['id'=>':id','c_id'=>':c_id'])}}';

            url =  url.replace(':id',limit);

            url= url.replace(':c_id',c_id);

        }
$.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });

        $.ajax({

            method:"post",

            url:url,

            DataType:"json",

            cache: false,

            success:function(data){

                if(data.status== 1){

                    console.log(data.result);

                    if(data.result == null){

                        setTimeout(function () {





                        },5000);

                    }else{



                    }









                }else{



                }

            },

            error:function(data){

                console.log(data);



            }



        });



    });









$(".like-car-detail-auction").click(function (e) {

    e.preventDefault();



            @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)

    var col = $(this).data('col');

    console.log(col);

    var url  = '{{route('like-car-detail',['c_id'=>':col'])}}';

    url = url.replace(":col",col);

    @else

    $('#detailModalCenter').modal("show");

    return false;

    @endif

    $.ajax({

        method:"get",

        url:url,

        DataType:"json",

        success:function(data){

            console.log(data);

            if(data.status==1){

             

                if(data.result === "Car deleted"){

                    $(".like-car-detail-auction").css("color","#dee2e6");

                  

                }else {

                    $(".like-car-detail-auction").css("color","#fd001e");

              

                }









            }else{

                alert(data.result);

            }

        },

        error:function(data){

            console.log(data);



        }



    });





});



$(".blog-span-search").click(function (e) {

    e.preventDefault();

  var val = $(".input-blog").val();

  if (val === ""){

      $(".input-blog").css("border","1px solid #e4001b");

      $(".blog-span-search").css("border","1px solid #e4001b");

      setTimeout(function () {

          $(".input-blog").css("border", "1px solid #ced4da");

          $(".blog-span-search").css("border", "transparent");

      },5000);

 return false;

  }

  var url  = '{{route('blog-search',['search'=>':val'])}}';

  url = url.replace(":val",val);

    $.ajax({

        method:"get",

        url:url,

        DataType:"json",

        success:function(data){



            $("#apend_blog").remove();

            if(data.status==1){

                console.log(data.result);

                $("#blog-search-popular").html("Search Blog");

                for(x in data.result){

                    console.log(data.result[x]);

                    var a_url = '{{route("frontend-blog",["id"=>":id"])}}';

                    var a_origanal = btoa(data.result[x]["id"]);

                    a_url = a_url.replace(":id",a_origanal);

                    var time =moment(data.result[x]['created_at']).format('YYYY-MM-DD');

                     var img = '{{ asset('public/blog_images/'.':img') }}';

                    img=img.replace(":img",data.result[x]["image_large"]);

                    var apend='<div class="col-12 blogcard">'

                     +   '<div class="card">' +

                        '<a href="'+a_url+'"><img class="card-img-top imgWidthAndHeight" src="'+img+'" alt="Card image cap"> </a>' +

                       ' <div class="card-body"> ' +

                      '  <div class="row">' +

                       ' <div class="col-12 blogcardheading">' +

                         data.result[x]['title']

                      + ' </div>' +

                       ' <div class="col-12 blogwritername">'+data.result[x]['author_name']+' | '+time+'</div>' +

                  '  </div> ' +

                    '</div>' +

                    '</div>' +

                    ' </div>';

                    $("#append_id_blog").append(apend);





                }



            }else {

                $(".error-post-code").html("There is no record against your request");

                $(".error-post-code").css({display:'block',color:"#e4001b",fontSize:'25px',fontWeight: '500'});

            }





        },

        error:function(data){

            console.log(data);



        }



    });

});

$(".ppc-span-search").click(function (e) {

    e.preventDefault();

  var val = $(".input-ppc").val();

  if (val === ""){

      $(".input-ppc").css("border","1px solid #e4001b");

      $(".ppc-span-search").css("border","1px solid #e4001b");

      setTimeout(function () {

          $(".input-ppc").css("border", "1px solid #ced4da");

          $(".ppc-span-search").css("border", "transparent");

      },5000);

 return false;

  }

  var url  = '{{route('ppc-search',['search'=>':val'])}}';

  url = url.replace(":val",val);

    $.ajax({

        method:"get",

        url:url,

        DataType:"json",

        success:function(data){



            $("#apend_ppc").remove();

            if(data.status==1){

                console.log(data.result);

                $("#ppc-search-popular").html("Search News");

                for(x in data.result){

                    console.log(data.result[x]);

                    var a_url = '{{route("ppc-news",["id"=>":id"])}}';

                    var a_origanal = btoa(data.result[x]["id"]);

                    a_url = a_url.replace(":id",a_origanal);

                    var time =moment(data.result[x]['created_at']).format('YYYY-MM-DD');

                     var img = '{{ asset('public/testimonial_images/'.':img') }}';

                    img=img.replace(":img",data.result[x]["img"]);

                    var apend='<div class="col-12 blogcard">'

                     +   '<div class="card">' +

                        '<a href="'+a_url+'"><img class="card-img-top imgWidthAndHeight" src="'+img+'" alt="Card image cap"> </a>' +

                       ' <div class="card-body"> ' +

                      '  <div class="row">' +

                       ' <div class="col-12 blogcardheading" data-maxlength="20">' +

                        '<div class="f-card-description" style="display: block!important;">'+data.result[x]['body']+'</div>' +



                       ' <div class="col-12 blogwritername">'+data.result[x]['user_name']+' | '+time+'</div>' +

                  '  </div> ' +

                    '</div>' +

                    '</div>' +

                    ' </div>';

                    $("#append_id_ppc").append(apend);





                }

                $(".f-card-description").html(function(index, currentText) {



                    var maxLength = $(this).parent().attr('data-maxlength');

                    if(currentText.length >= maxLength) {

                        return currentText.substr(0, maxLength) + "...";

                    } else {

                        return currentText

                    }

                });



            }else {

                $(".error-post-code").html("There is no record against your request");

                $(".error-post-code").css({display:'block',color:"#e4001b",fontSize:'25px',fontWeight: '500'});

            }





        },

        error:function(data){

            console.log(data);



        }



    });

});

  $(document).on("click",".load_car_comment",function(e){
        e.preventDefault();
        @if(empty(session("userLoggedIn")) && session("userLoggedIn") == false)
        $('#CarCommentLogin').modal("show");
 return false;

        @endif
    });

$(".event-span-search").click(function (e) {

    e.preventDefault();

    var val = $(".input-event").val();

    if (val === ""){

        $(".input-event").css("border","1px solid #e4001b");

        $(".event-span-search").css("border","1px solid #e4001b");

        setTimeout(function () {

            $(".input-event").css("border", "1px solid #ced4da");

            $(".event-span-search").css("border", "transparent");

        },5000);

        return false;

    }

    var url  = '{{route('event-search',['search'=>':val'])}}';

    url = url.replace(":val",val);

    $.ajax({

        method:"get",

        url:url,

        DataType:"json",

        success:function(data){

            $("#append_id_event").empty();

            if(data.status==1){

                console.log(data.result);

                $("#event-search-popular").html("Search Events");

                for(x in data.result){

                    console.log(data.result[x]);

                    var a_url = '{{route("event-detail",["id"=>":id"])}}';

                    var a_origanal = btoa(data.result[x]["id"]);

                    a_url = a_url.replace(":id",a_origanal);

                    var time =moment(data.result[x]['created_at']).format('YYYY-MM-DD');

                    var img = '{{ asset('public/event_images/'.':img') }}';

                    img=img.replace(":img",data.result[x]["img"]);

                    var apend='<div class="col-12 blogcard">'

                        +   '<div class="card">' +

                        '<a href="'+a_url+'"><img class="card-img-top imgWidthAndHeight" src="'+img+'" alt="Card image cap"> </a>' +

                        ' <div class="card-body"> ' +

                        '  <div class="row">' +

                        ' <div class="col-12 blogcardheading">' +

                        data.result[x]['event_name']

                        + ' </div>' +

                        ' <div class="col-12 blogwritername">'+data.result[x]['event_host']+' | '+time+'</div>' +

                        '  </div> ' +

                        '</div>' +

                        '</div>' +

                        ' </div>';

                    $("#append_id_event").append(apend);





                }



            }else {

                $("#append_id_event").html("<span class='ml-5'>No Data Found</span>");

                $("#append_id_event").css({display:'block',color:"#e4001b",fontSize:'25px',fontWeight: '500'});

            }





        },

        error:function(data){

            console.log(data);



        }



    });

});



$(document).on("change",".checkbox-class-dashboard",function(e){

    $(".f-card-description").css("display","block");

    e.preventDefault();

     $(this).prop("checked",false);
    $(".bd-featured-modal-lg").modal("show");

});
$(document).on("change",".checkbox-purchase-class",function(e){

    if($(this).prop("checked") === true){
        $("#checkbox-featured").val(1);
    }else{
        $("#checkbox-featured").val(0);
    }



});

$("#checkbox-id-dashboard").change();

 $(document).on('click','.image-select-modal',function (e) {

    e.preventDefault();

     $(this).css('border','solid 1px #626b9a');

 });

    $(document).ready(function(){

        var _token = $('.token').find('input[name="_token"]').val();

        var p_id  = $("#post_id").val();

        load_data('', _token,p_id);

        function load_data(id="", _token,p_id)

        {

            $.ajax({

                url:"{{route('blog-comment-load-more')}}",

                method:"POST",

                data:{id:id, _token:_token,post_id:p_id},

                success:function(data)

                {

                    console.log(data);

                    $('#load_more_button').remove();

                    $('#post_data').append(data);

                }

            })

        }



        $(document).on('click', '#load_more_button', function(){

            var id = $(this).data('id');

            var p_id  = $("#post_id").val();

            $('#load_more_button').html('<b>Loading...</b>');

            load_data(id, _token,p_id);

        });



    });



$(document).ready(function(){

    var _token = $('.token_car').find('input[name="_token"]').val();

    var c_id  = $("#car_id").val();

    //alert(c_id);

    load_data('', _token,c_id);

    function load_data(id="", _token,c_id)

    {

        $.ajax({

            url:"{{route('car-comment-load-more')}}",

            method:"POST",

            data:{id:id, _token:_token,car_id:c_id},

            success:function(data)

            {

                console.log(data);

                $('#load_more_car_button').remove();

                $('#car_data').append(data);

            }

        })

    }



    $(document).on('click', '#load_more_car_button', function(){

        var id = $(this).data('id');

        var c_id  = $("#car_id").val();

        $('#load_more_car_button').html('<b>Loading...</b>');

        load_data(id, _token,c_id);

    });



});





$(document).on('click', '#pkg_featured_car', function(e){

    e.preventDefault();

$(this).prop('disabled',true);

$(this).html('selected');

$("#checkbox-featured").val(1);



});











function myFunctionurl() {

    var copyText = document.getElementById("car_share_icon");

    copyText.select();

    copyText.setSelectionRange(0, 99999);

    document.execCommand("copy");

    $("#ShareModalCenter").modal("show");



}

$(".price-feild").hide();

$(".rent-feild-check").hide();

$(".auction-next-section").hide();



if($(".price-show-dashbrd").is(':checked')){

    $(".price-show-dashbrd").addClass('preview-dashboard-input');

    $(".auction-checkbox6").removeClass('preview-dashboard-input');

    $(".rent-show-dashbrd").removeClass('preview-dashboard-input');

    $("#rent-price").val('');

    $("#rent-duration").val('');

           $("#open-time").val('');

        $("#close-time").val('');

    $('#Start_Date').val("");

    $("#auctionMapInput").val("");

    $('#End_Date').val("");

    $(".price-feild").show();

    $(".auction-next-section").hide();

    $(".rent-feild-check").hide();



}

if($(".auction-checkbox6").is(':checked')){

    $(".auction-checkbox6").addClass('preview-dashboard-input');

    $(".price-show-dashbrd").removeClass('preview-dashboard-input');

    $(".rent-show-dashbrd").removeClass('preview-dashboard-input');

    $("#rent-price").val('');

    $("#rent-duration").val('');

           $("#open-time").val('');

        $("#close-time").val('');

    $("#number").val("");

    $(".price-feild").hide();

    $(".auction-next-section").show();

    $(".rent-feild-check").hide();



}

if($(".rent-show-dashbrd").is(':checked')){

    $(".rent-show-dashbrd").addClass('preview-dashboard-input');

    $(".price-show-dashbrd").removeClass('preview-dashboard-input');

    $(".auction-checkbox6").removeClass('preview-dashboard-input');

    $('#Start_Date').val("");

    $("#number").val("");

    $('#End_Date').val("");

    $("#auctionMapInput").val("");

    $(".price-feild").hide();

    $(".auction-next-section").hide();

    $(".rent-feild-check").show();

}





$(".price-show-dashbrd").change(function (){

    $(".f-card-description").css("display","block");

    if($(this).is(":checked")){

        $(this).addClass('preview-dashboard-input');

        $(".auction-checkbox6").removeClass('preview-dashboard-input');

        $(".rent-show-dashbrd").removeClass('preview-dashboard-input');

        $('#Start_Date').val("");

        $('#End_Date').val("");

        $("#auctionMapInput").val("");

        $("#rent-price").val('');

        $("#rent-duration").val('');

               $("#open-time").val('');

        $("#close-time").val('');

        $(".price-feild").show();

        $(".auction-next-section").hide();

        $(".rent-feild-check").hide();



    }

});

$(".rent-show-dashbrd").change(function (){

    $(".f-card-description").css("display","block");

    if($(this).is(":checked")){

        $(this).addClass('preview-dashboard-input');

        $(".price-show-dashbrd").removeClass('preview-dashboard-input');

        $(".auction-checkbox6").removeClass('preview-dashboard-input');

        $('#Start_Date').val("");

        $("#auctionMapInput").val("");

        $("#number").val("");

        $('#End_Date').val("");

        $(".rent-feild-check").show();

        $(".price-feild").hide();

        $(".auction-next-section").hide();



    }

});











$(document).on('change', '.auction-checkbox6', function(){

    $(".f-card-description").css("display","block");

    if($(this).is(":checked")){

        $(this).addClass('preview-dashboard-input');

        $(".price-show-dashbrd").removeClass('preview-dashboard-input');

        $(".rent-show-dashbrd").removeClass('preview-dashboard-input');

        $("#rent-price").val('');

               $("#open-time").val('');

        $("#close-time").val('');

        $("#number").val("");

        $("#rent-duration").val('');

        $(".auction-next-section").show();

        $(".price-feild").hide();

        $(".rent-feild-check").hide();



    }else {

        $(".auction-next-section").hide();

    }





});







// create auction biding

$(document).on("submit","#auction-biding-form",function(e) {

    e.preventDefault();

    var formdata=new FormData(this);

    if ($('#auction-bid-input').val() <= $("#auction-bid-input").attr('min')){

        $("#bid-span").html("Please enter value greater than "+$('#auction-bid-input').val());

        $("#bid-span").css("color","#fd001e");

        return false;

    }

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

            if(data.status== 1){



                if(data.result == null){

                    $("#biding-count-id").html('<span>'+data.count+'Bids</span>');

                    $("#bid-span").show();

                    $("#bid-span").html("your bid has been Placed");

                    $("#bid-span").css("color","#fd001e");

                    setTimeout(function () {

                        $("#bid-span").hide();

                 

                    },5000);

                }else{

                    $("#bidning-amount-id").html('<span>£'+data.result+'</span>');

                    $("#biding-count-id").html('<span>'+data.count+'Bids</span>');

                    $("#bid-span").show();

                    $("#auction-bid-input").attr('min',data.result);

                    $("#auction-bid-input").val(data.result);

                    $("#bid-span").html("your bid has been Placed");

                    $("#bid-span").css("color","#fd001e");

                    setTimeout(function () {

                        $("#bid-span").hide();



                    },5000);

                }







                console.log(data.result);

            }else{



            }

        },

        error:function(data){

            console.log(data);



        }



    });



});

$(document).on("change",".star-dynamic-rating",function(e) {

    $(".f-card-description").css("display","block");

    e.preventDefault();



    if($(this).prop('checked') === true){

        var limit = $(this).data('id');

    }

    var c_id = $(".star-car-id").val();

    var url='{{route('star-rating',['id'=>':id','c_id'=>':c_id'])}}';

    url =  url.replace(':id',limit);

    url= url.replace(':c_id',c_id);
  $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

    $.ajax({

        method:"post",

        url:url,

        DataType:"json",

        cache: false,

        success:function(data){

            if(data.status== 1){

                console.log(data.result);

                if(data.result == null){

                    setTimeout(function () {

 },5000);

                }else{



                }









            }else{



            }

        },

        error:function(data){

            console.log(data);



        }



    });



});



// dash board Api

 //jquery for home page modal filter car

$(document).on('click','.car-modal-filter',function (e){

    e.preventDefault();

    $('.car-modal-filter').removeClass('modalFilterCar');

    $(this).addClass('modalFilterCar');



});





// map api



    $(document).on("click",".my-add-load-dahsboard",function(e){

        e.preventDefault();

        var url = "{{route('fetch-data-dashboard',['type'=>':type'])}}";

        url = url.replace(':type',$(this).data("type"));

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

                console.log(data);

                if(data.status==1){

                    $(".append-fetch-data-dashboard-wanted").empty();

                    for(x in data.result){

                        var d= data.result;

var a_r= "{{ route('user-dashboard',['tab'=>'wantedsection','id'=>':id']) }}";

var id = btoa(d[x]["id"]);

a_r = a_r.replace(':id',id);

                        var apend='<div class="col-12 col-sm-6 col-md-4 mb-3 cardetail">' +

                           ' <div class="card"> <img class="card-img-top imgWidthAndHeight" src='+d[x]["image"]+' alt="Card image cap"> ' +

                           ' <div class="card-body"> <div class="carname" datamax-length="20">'+d[x]["title"]+'</div> <div class="editordelete"> ' +

                            '<div class="edit"><a href="'+a_r+'">Edit</a> </div>' +

                           ' <div class="divider"></div><div class="delete"><a href="javascript:void(0)" class="wanted_del" data-delete="'+id+'">Delete</a>'  +

                           '</div> </div> </div> </div> </div>';

                        $(".append-fetch-data-dashboard-wanted").append(apend);

                    }

                    $(".f-card-name").html(function(index, currentText) {



                        var maxLength = $(this).parent().attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        } else {

                            return currentText

                        }

                    });





                }else if (data.status==2){



                    $(".append-fetch-data-dashboard-mics").empty();

                    for(x in data.result){

                        var d= data.result;

                        var a_r= "{{ route('user-dashboard',['tab'=>'miscellaneous','id'=>':id']) }}";

                        var id = btoa(d[x]["id"]);

                        a_r = a_r.replace(':id',id);

                        var img = "{{asset('/public/crop_images/'.":img")}}";

                        img = img.replace(':img',d[x]["feature_img"]);

                        var apend='<div class="col-12 col-sm-6 col-md-3 mb-3 cardetail">' +

                            ' <div class="card"> <img class="card-img-top imgWidthAndHeight" src='+img+' alt="Card image cap"> ' +

                            ' <div class="card-body"> <div class="carname" datamax-length="20">'+d[x]["car_part"]+'</div> <div class="editordelete"> ' +

                            '<div class="edit"><a href="'+a_r+'">Edit</a> </div>' +

                            ' <div class="divider"></div><div class="delete"><a href="javascript:void(0)" class="misecellinous_del" data-delete="'+id+'">Delete</a>'  +

                            '</div> </div> </div> </div> </div>';

                        $(".append-fetch-data-dashboard-mics").append(apend);





                    }

                    $(".f-card-name").html(function(index, currentText) {



                        var maxLength = $(this).parent().attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        } else {

                            return currentText

                        }

                    });

                }else if (data.status==3){



                    $(".append-fetch-data-dashboard-garage").empty();

                    for(x in data.result){

                        var d= data.result;

                        var a_r= "{{ route('user-dashboard',['tab'=>'garageadvert','id'=>':id']) }}";

                        var id = btoa(d[x]["id"]);

                        a_r = a_r.replace(':id',id);

                        var img = "{{asset('/public/crop_images/'.":img")}}";

                        img = img.replace(':img',d[x]["feature_img"]);

                        var apend='<div class="col-12 col-sm-6 col-md-3 mb-3 cardetail">' +

                            ' <div class="card"> <img class="card-img-top imgWidthAndHeight" src='+img+' alt="Card image cap"> ' +

                            ' <div class="card-body"> <div class="carname" datamax-length="20">'+d[x]["c_name"]+'</div> <div class="editordelete"> ' +

                            '<div class="edit"><a href="'+a_r+'">Edit</a> </div>' +

                            ' <div class="divider"></div><div class="delete"><a href="javascript:void(0)" class="garage_del" data-delete="'+id+'">Delete</a>'  +

                            '</div></div></div></div></div>';

                        $(".append-fetch-data-dashboard-garage").append(apend);





                    }

                    $(".f-card-name").html(function(index, currentText) {



                        var maxLength = $(this).parent().attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        } else {

                            return currentText

                        }

                    });

                }else {

                       $(".DataFetchFail").modal("show");

                }



                    $(".f-card-description").html(function(index, currentText) {



                        var maxLength = $(this).parent().attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        } else {

                            return currentText

                        }

                    });



            },error:function(data){

                console.log(data);



            }



        });

    });







 let detailDiv=  $(".detailDiv-query-garage");

    detailDiv.hide();

    $('.Veiw-detail-garage').on('click',function(e){

var id = $(this).data('id');

var t= this;

var  ap_div= $(this).closest(".garage-close-div").find(".garagefeedback1section");

if(detailDiv.css("display") == "none"){







            $(this).find(".round-question i").css("color", "#707070");

    $(this).closest(".garage-close-div").find(detailDiv).slideToggle("slow");









        }else if(detailDiv.css("display")== "block"){



    $(this).find(".round-question").css("background", "#fff");

            $(this).find(".round-question i").css("color", "#707070");

    $(this).closest(".garage-close-div").find(detailDiv).slideToggle("slow");







        }

        var url = '{{route('get-garage-feedback',['id'=>':id'])}}';

        url = url.replace(':id',id);

        $.ajax({

            method:"get",

            url:url,

            DataType:"json",

            cache: false,

            success:function(data){

                if(data.status==1){

                    ap_div.empty();

                    for(x in data.result){

                        console.log(data.result);

                        if (data.result[x]['user'] != null){

                          var append =   '<div class="garage__feedback-box">'+

                               ' <div class="garage__user-avatar clientimages1"><img src="'+data.result[x]['user']['avatar']+'" alt=""></div> ' +

                               ' <div class="garage__user-text clientName p-0">'+

                              '  <h6 class="garage__user-name">'+data.result[x]['user']['username']+'</h6>'+

                             '<p class="garage__user-feedback">'+data.result[x]['feedback']+' </p>'+

                           '</div> </div>'  ;

                            ap_div.append(append);

                        }



                    }

                }else{

                    ap_div.append("<span>no feedback</span>");

                }













            },error:function(data){

                console.log(data);



            }



        });



    });







function activaTab(hidetab, showtab, tabChanged = null) {

    $('#' + hidetab).hide();

    $('#' + showtab).show();

    if (!tabChanged) {

        $('a[href="#' + showtab + '"]').click();

    }

}

</script>

<script type="text/javascript">
  $(document).ready(function() {
    var showChar = 30;
    var ellipsestext = "...";
    var moretext = "more";
    var lesstext = "less";
    $('.more').each(function() {
        var content = $(this).html();

        if(content.length > showChar) {

            var c = content.substr(0, showChar);
            var h = content.substr(showChar-1, content.length - showChar);

            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

            $(this).html(html);
        }

    });

    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});
</script>

<style type="text/css">

a.morelink {
    text-decoration:none;
    outline: none;
}
.morecontent span {
    display: none;
}
.comment {
   
  
   
}
</style>



