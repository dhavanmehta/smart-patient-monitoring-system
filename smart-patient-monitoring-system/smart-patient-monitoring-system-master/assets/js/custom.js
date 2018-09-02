/*=============================================================
 Authour URI: www.binarytheme.com
 License: Commons Attribution 3.0

 http://creativecommons.org/licenses/by/3.0/

 100% To use For Personal And Commercial Use.
 IN EXCHANGE JUST GIVE US CREDITS AND TELL YOUR FRIENDS ABOUT US

 ========================================================  */




(function ($) {
    "use strict";
    var mainApp = {

        main_fun: function () {
            /*====================================
             SCROLLING FUNCTION
             ======================================*/
            $(function () {
                $('.scrollclass a').bind('click', function (event) { //just pass scrollclass in design and start scrolling
                    var $anchor = $(this);
                    $('html, body').stop().animate({
                        scrollTop: $($anchor.attr('href')).offset().top
                    }, 1000, 'easeInOutQuad');
                    event.preventDefault();
                });
            });
            //ADD REMOVE PADDING CLASS ON SCROLL
            $(window).scroll(function () {
                if ($(".navbar").offset().top > 50) {
                    $(".navbar-fixed-top").addClass("navbar-pad-original");
                } else {
                    $(".navbar-fixed-top").removeClass("navbar-pad-original");
                }
            });
            /*====================================
             VAGAS SLIDESHOW SCRIPTS
             ======================================*/
            $(function () {
                var picArr = RandomNumber(1,9);
                console.log("picArr - "+picArr);
                var picLink0 = "assets/img/bg_pics/inspire_"+picArr[0]+".jpg";
                var picLink1 = "assets/img/bg_pics/inspire_"+picArr[1]+".jpg";
                var picLink2 = "assets/img/bg_pics/inspire_"+picArr[2]+".jpg";
                var picLink3 = "assets/img/bg_pics/inspire_"+picArr[3]+".jpg";
                //document.writeln(picArr[0]);
                $("body").vegas({
                    slides: [
                        //'assets/img/inspire_'+picArr[0]+'.jpg'
                        //{ src: 'assets/img/9.jpg', delay:9000, fade:2000},
                        {src: picLink0, delay: 9000, fade: 2000},
                        {src: picLink1, delay: 9000, fade: 2000},
                        {src: picLink2, delay: 9000, fade: 2000},
                        {src: picLink3, delay: 9000, fade: 2000}
//                        {src: 'assets/img/6.jpg', delay: 9000, fade: 2000}
                        //CHANGE THESE IMAGES WITH YOUR ORIGINAL IMAGES
                        //THESE IMAGES ARE FOR DEMO PURPOSE ONLY YOU, CAN NOT USE THEM WITHOUT AUTHORS PERMISSION

                    ],
                    transition: ['zoomOut','fade2'],
                    overlay: 'assets/plugins/vegas/overlays/17.png'
                })
            });

            $(function () {
                $('.carousel').carousel({
                    interval: 5000 //TIME IN MILLI SECONDS
                });
            });
            /*====================================
             WRITE YOUR SCRIPTS BELOW
             ======================================*/


        },

        initialization: function () {
            mainApp.main_fun();

        }

    }

    //FlipClock Timer Below

  var clock;

    $(document).ready(function () {
        var clock;

        clock = $('.clock').FlipClock({
            clockFace: 'DailyCounter',
            autoStart: false,
            callbacks: {
                stop: function () {
                    $('.message').html('The clock has stopped!')
                }
            }
        });

        var CurrentDate = new Date();
        var eventDate = new Date("April 20, 2016 12:00:00");
        var diff = eventDate - CurrentDate;
        //document.write("diff is "+diff);
        clock.setTime(Number(diff / 1000));
        clock.setCountdown(true);
        clock.start();

    });


    //var myCenter = new google.maps.LatLng(21.1313454,72.7117463);
    //
    //function initialize() {
    //    var mapProp = {
    //        center:myCenter,
    //        zoom:12,
    //        scrollwheel:false,
    //        draggable:false,
    //        mapTypeId:google.maps.MapTypeId.ROADMAP
    //    };
    //
    //    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
    //
    //    var marker = new google.maps.Marker({
    //        position:myCenter,
    //    });
    //
    //    marker.setMap(map);
    //}
    //
    //google.maps.event.addDomListener(window, 'load', initialize);


    // Initializing ///


    $(document).ready(function () {
        mainApp.main_fun();
    });

}(jQuery));


function RegistrationPopUp()
{
 
 
   /*swal({
        //title: "<span style=\"color:red\">Inspire 16 </span>",
        title: "<span style='font-size: 100%'> <span class=\"color-red\">I</span>nsp<span class=\"color-red\">i</span>re<sup><span class=\"color-red\">1</span>6</sup></span>",
        imageUrl: "assets/img/final_logo.png",
        imageSize: "200x112",
        html:true,
     });*/
 swal({
            title:"Schedule Will Be Updated Soon.",
            imageUrl: "assets/img/inspire_final_logo.png",
            imageSize: "200x112",
            showCancelButton: false,
            confirmButtonColor: '#068E8B',
            cancelButtonColor: '#068E8B',
            confirmButtonText: 'Ok',
            cancelButtonText: 'Close',
            confirmButtonClass: 'confirm-class',
            cancelButtonClass: 'cancel-class',
            closeOnConfirm: true,
            closeOnCancel: true
        },
        function(isConfirm) {
            if (isConfirm) {
              //location.href= 'http://bit.ly/inspire_register';
               //window.open('event/pdf/register.pdf','_blank');
                
              
            } else {
              swal(
                '',
                'Your imaginary file is safe :)',
                'error'
              );
            }
        });
 
}


function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function RandomNumber(min,max){
    var arr = []
    while(arr.length < 4){
        var randomnumber=Math.floor(Math.random()* (max - min + 1)) + min;
        var found=false;
        for(var i=0;i<arr.length;i++){
            if(arr[i]==randomnumber){found=true;break}
        }
        if(!found)arr[arr.length]=randomnumber;
    }
    return arr;
}

//Navigation Bar
 /*
$('.nav li a').on('click',function()
{
  $('.btn-navbar').click();
  $('.navbar-toggle').click();
});*/

$(function() {
    $('.nav a').on('click', function(){
        if($('.navbar-toggle').css('display') !='none'){
            $(".navbar-toggle").trigger( "click" );
        }
    });
});