$(document).ready(
    function() {
        $("#gridview").on("click",
            function() {
                if ($(window).width() > 768) {
                    $('.colwidth').css({ "flex": "0 0 33.33%", "max-width": "33.33%" });
                    $('.colwidth .card .card-body .row').css("width","auto");
                    $('.colwidth .card .cardimage').css("width", "100%");

                }
                if ($(window).width() > 576 && $(window).width() < 768) {
                    $('.colwidth').css({ "flex": "0 0 50.0%", "max-width": "50.0%" });
                    $('.colwidth .card .card-body .row').css("width","auto");
                    $('.colwidth .card .cardimage').css("width", "190%");

                }
                if ($(window).width() < 575) {
                    $('.colwidth').css({ "flex": "0 0 100.0%", "max-width": "100.0%" });
                    $('.colwidth .card .card-body .row').css("width","auto");
                    $('.colwidth .card .cardimage').css("width", "100%");
                    $('.colwidth .card ').css("height","auto");
                    $('.colwidth .card img').css({"max-height":"155px","height":"100%"});

            
                    $('.colwidth .card .card-body').css("height", "auto");

                }
                console.log("working");
                $("#gridview i").css("color", "red");
                $("#listview i").css("color", "#dadada");
                $('.colwidth .card').css("flex-direction", "column");
                // $('.colwidth .card .card-body').css("padding-left", "0");


            }

        );

        $("#listview").on("click",

            function() {
                if ($(window).width() < 575) {
                    $('.colwidth').css({ "flex": "0 0 100.0%", "max-width": "100.0%" });
                    $('.colwidth .card .card-body .row').css("width","auto");
                    $('.colwidth .card ').css("height","230px");
                    $('.colwidth .card img').css({"max-height":"100%","height":"100%"});

                    $('.colwidth .card .cardimage').css("flex", "0 0 40%");
                    $('.colwidth .card .card-body').css("height", "100%");

                   
                }
                if ($(window).width() > 768) {
                $('.colwidth').css({
                    "flex": "0 0 100%",
                    "max-width": "100%"

                });
                $('.colwidth .card .cardimage').css("flex", "0 0 40%");
                $('.colwidth .card .cardimage img').css("height", "100%");


                }
                if ($(window).width() < 768 && $(window).width()>576) {
                    $('.colwidth').css({
                        "flex": "0 0 100%",
                        "max-width": "100%"
    
                    });
                    $('.colwidth .card .cardimage').css("flex", "0 0 30%");
                    $('.colwidth .card .cardimage img').css("height", "100%");
    
    
                    }
                $('.colwidth .card').css("flex-direction", "row");
                $('.colwidth .card .card-body').css({"padding-left": "30px","display":"flex","align-items":"center","justify-content":"center"});
                $('.colwidth ').css({
                    "margin-top": "20px",
                    "margin-bottom": "20px"
                });
                $('.colwidth .card .card-body .row').css("width","100%");
                $('.lease-car-image  img').css("height", "fit-content");
                console.log("working");
                $("#gridview i").css("color", "#dadada");
                $("#listview i").css("color", "red");

            }

        )
    }

)
