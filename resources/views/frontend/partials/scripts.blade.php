@if(!empty($tab) && $tab == 'packages')<script>    $(document).ready(function() {        document.getElementById("currentpackage").click();    });</script>@endif@if(!empty($tab) && $tab == 'wantedsection')    <script>        $(document).ready(function() {            document.getElementById("powersCar").click();            document.getElementById("v-pills-wanted-tab").click();        });    </script>@endif@if(!empty($tab) && $tab == 'newmyadverts')    <script>        $(document).ready(function() {            document.getElementById("powersCar").click();            document.getElementById("v-pills-wanted-section-tab").click();        });    </script>@endif@if(!empty($tab) && $tab == 'findcar')    <script>        $(document).ready(function() {            document.getElementById("powersCar").click();            document.getElementById("v-pills-sell-your-car-tab").click();        });    </script>@endif@if(!empty($tab) && $tab == 'sell-your-car')<script>    $(document).ready(function() {        document.getElementById("powersCar").click();        document.getElementById("v-pills-sell-your-car-tab").click();    });</script>@endif@if(!empty($tab) && $tab == 'wmyadverts')    <script>        $(document).ready(function() {            document.getElementById("powersCar").click();            document.getElementById("v-pills-garage-adverts-list-tab").click();        });    </script>@endif@if(!empty($tab) && $tab == 'garageadvert')    <script>        $(document).ready(function() {            document.getElementById("garagetab").click();        });    </script>@endif@if(!empty($tab) && $tab == 'miscellaneous')    <script>        $(document).ready(function() {            document.getElementById("powersCar").click();            document.getElementById("v-pills-misecellinous-adverts-list-tab").click();        });    </script>@endif@if(!empty($tab) && $tab == 'mymiscellaneous')    <script>        $(document).ready(function() {            document.getElementById("powersCar").click();            document.getElementById("v-pills-misecellinous-advert-list-tab").click();        });    </script>@endif@if(!empty($tab) && $tab == 'profile')<script>    $(document).ready(function(){        document.getElementById("profilesection").click();    });</script>@endif@if(!empty($tab) && $tab == 'myadvert')<script>    $(document).ready(function() {        document.getElementById("powersCar").click();    });</script>@endif@if(!empty($tab) && $tab == 'edit')    <script>        $(document).ready(function() {            document.getElementById("powersCar").click();   document.getElementById("v-pills-sell-your-car-tab").click();            // $("#v-pills-sell-your-car-tab").click();        });    </script>@endif@if(!empty($tab) && $tab == 'swap')    <script>        $(document).ready(function() {            document.getElementById("powersCar").click();            document.getElementById("v-pills-sell-your-car-tab").click();            // $("#v-pills-sell-your-car-tab").click();        });    </script>@endif@if(!empty($tab) && $tab == 'findcar')    <script>        $(document).ready(function() {            document.getElementById("powersCar").click();            document.getElementById("v-pills-profile-tab").click();            // $("#v-pills-profile-tab").click();        });    </script>@endif<script>//     $(".new-registerbtn").on("click",function (){//         $('#email-rspond button').hide();//     var sec=30;//     countDown(sec);// } );// function countDown(secs) {//     console.log(timer);//     $('#email-rspond').html("Please wait for  "+secs+" seconds");//     if(secs < 1) {//         clearTimeout(timer);//         $('#email-rspond').html( "<a> Resend Email</a>") ;//     }//     secs--;//     var timer = setTimeout('countDown('+secs+')',1000);// }</script>