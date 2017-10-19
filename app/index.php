<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1,requiresActiveX=true">
    <title> Index :: Quantum </title>
    <meta name="description" content=" add description  ... ">
    <!-- /// Favicons ////////  -->
    <link rel="shortcut icon" href="favicon.png">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <meta name="msapplication-TileColor" content="#232323">
    <meta name="msapplication-TileImage" content="mstile.png">
    <!-- /// Google Fonts ////////  -->
    <link rel="stylesheet"
          href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Montserrat:400,700">

    <!-- /// FontAwesome Icons 4.3.0 ////////  -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- /// Custom Icon Font ////////  -->
    <link rel="stylesheet" href="assets/fonts/iconfontcustom/icon-font-custom.css">

    <!-- /// Plugins CSS ////////  -->
    <link rel="stylesheet" href="assets/vendors/revolutionslider/css/settings.css">
    <link rel="stylesheet" href="assets/vendors/bxslider/jquery.bxslider.css">
    <link rel="stylesheet" href="assets/vendors/magnificpopup/magnific-popup.css">
    <link rel="stylesheet" href="assets/vendors/animations/animate.min.css">
    <link rel="stylesheet" href="assets/vendors/itplayer/css/YTPlayer.css">

    <!-- /// Template CSS ////////  -->
    <link rel="stylesheet" href="assets/css/compressed.css">


    <style>

    </style>
</head>
<body class="sticky-header">

<noscript>
    <div class="javascript-required">
        You seem to have Javascript disabled. This website needs javascript in order to function properly!
    </div>
</noscript>

<!--[if lte IE 8]>
<div class="modern-browser-required">
    You are using an <strong>outdated</strong> browser. Please
    <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">upgrade your browser</a>
    to improve your experience.
</div>
<![endif]-->

<div id="wrap">
    <?php include "includes/header.php"; ?>

    <div id="content">

        <!-- /// CONTENT  /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <div class="ytwala">
            <div class="ytwala-overlay">

            </div>

            <div class="cover">
<!--                <p class="text-center"></p>-->
                <div class="hi">
<!--                    <br><br> Click <span><i class="fa fa-music"></i></span> to <em>un</em>mute &-->
<!--                    <span>here</span> to see another vid (<em>0</em> of <em>0</em>). Check all of them! They're quite-->
<!--                    awesome. ;]-->
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium amet
                    asperiores laborum non porro, quidem voluptas? Assumenda, impedit nisi!

                </div>
            </div>
            <div class="tv">
                <div class="screen mute" id="tv"></div>
            </div>

        </div>


        <?php include 'includes/index-content.php'; ?>

        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

    </div><!-- end #content -->
    <?php include 'includes/footer.php'; ?>

</div><!-- end #wrap -->


<a id="back-to-top" href="#">
    <i class="ifc-up4"></i>
</a>

<!-- /// jQuery ////////  -->
<script src="assets/vendors/jquery-2.1.3.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<!-- /// ViewPort ////////  -->
<script src="assets/compressed/script.js"></script>
<script>
    var tag = document.createElement('script');
    tag.src = 'https://www.youtube.com/player_api';
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    var tv,
        playerDefaults = {
            autoplay: 1,
            autohide: 1,
            modestbranding: 0,
            rel: 0,
            showinfo: 0,
            controls: 0,
            disablekb: 1,
            enablejsapi: 0,
            iv_load_policy: 3
        };
    var vid = [
            {'videoId': '4PKuESL9TBc', 'startSeconds': 0, 'endSeconds': 690, 'suggestedQuality': 'hd720'},

        ],
        randomVid = Math.floor(Math.random() * vid.length),
        currVid = randomVid;

    $('.hi em:last-of-type').html(vid.length);

    function onYouTubePlayerAPIReady() {
        tv = new YT.Player('tv', {
            events: {'onReady': onPlayerReady, 'onStateChange': onPlayerStateChange},
            playerVars: playerDefaults
        });
    }

    function onPlayerReady() {
        tv.loadVideoById(vid[currVid]);
        tv.mute();
    }

    function onPlayerStateChange(e) {
        if (e.data === 1) {
            $('#tv').addClass('active');
            $('.hi em:nth-of-type(2)').html(currVid + 1);
        } else if (e.data === 2) {
            $('#tv').removeClass('active');
            if (currVid === vid.length - 1) {
                currVid = 0;
            } else {
                currVid++;
            }
            tv.loadVideoById(vid[currVid]);
            tv.seekTo(vid[currVid].startSeconds);
        }
    }

    function vidRescale() {

        var w = $(window).width() + 200,
            h = $(window).height() + 200;

        if (w / h > 16 / 9) {
            tv.setSize(w, w / 16 * 9);
            $('.tv .screen').css({'left': '0px'});
        } else {
            tv.setSize(h / 9 * 16, h);
            $('.tv .screen').css({'left': -($('.tv .screen').outerWidth() - w) / 2});
        }
    }

    $(window).on('load resize', function () {
        vidRescale();
    });

    $('.hi span:first-of-type').on('click', function () {
        $('#tv').toggleClass('mute');
        $('.hi em:first-of-type').toggleClass('hidden');
        if ($('#tv').hasClass('mute')) {
            tv.mute();
        } else {
            tv.unMute();
        }
    });

    $('.hi span:last-of-type').on('click', function () {
        $('.hi em:nth-of-type(2)').html('~');
        tv.pauseVideo();
    });

</script>

</body>
</html>