<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Contact Us - Prime Carz Ltd</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Default Description">
    <meta name="keywords" content="fashion, store, E-commerce">
    <meta name="robots" content="*">
    <link rel="icon" href="#" type="image/x-icon">
    <link rel="shortcut icon" href="#" type="image/x-icon">

    <!-- CSS Style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.css"
        integrity="sha512-ITS8GbPjCRA7c/PBl6Kqb9XjvQbKMBXpzEmpi7BgRwf6mUCySmHbF9opWfVUQvbdiYouDYxhxttWS+wyq4l+Ug=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.cdnfonts.com/css/fontawesome" rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/stylesheet/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/stylesheet/font-awesome.css') }}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/stylesheet/bootstrap-select.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/stylesheet/revslider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/stylesheet/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/stylesheet/owl.theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/stylesheet/jquery.bxslider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/stylesheet/jquery.mobile-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/stylesheet/style.css') }}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/stylesheet/responsive.css') }}" media="all">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700,800'
        rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Teko:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Saira+Condensed:300,400,500,600,700,800" rel="stylesheet">
</head>

<body>
    <div id="page">
        @include('elements.navigation-bar')

        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title">
                            <h2>Contact Us</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-container col2-right-layout">
            <div class="main container">
                <div class="row">
                    <div class="col-main col-sm-9 wow bounceInUp animated animated" style="visibility: visible;">

                        <div class="static-contain">
                            <fieldset class="group-select">
                                <h1>Head Office</h1>
                                <div class="mapouter">
                                    <div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0"
                                            scrolling="no" marginheight="0" marginwidth="0"
                                            src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Prime Carz LTD, Dysart Way, Leicester, England, LE1 2JY&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
                                            href="https://capcuttemplate.org/">Capcut Templates</a></div>
                                    <style>
                                        .mapouter {
                                            position: relative;
                                            text-align: right;
                                            width: 100%;
                                            height: 400px;
                                        }

                                        .gmap_canvas {
                                            overflow: hidden;
                                            background: none !important;
                                            width: 100%;
                                            height: 400px;
                                        }

                                        .gmap_iframe {
                                            height: 400px !important;
                                        }
                                    </style>
                                </div>
                            </fieldset>
                        </div>

                        <div id="messages_product_view"></div>
                        <form action="{{ route('send-contact-us') }}" id="contactForm" method="post">
                            @csrf
                            <div class="static-contain">
                                <fieldset class="group-select">
                                    <ul>
                                        <li id="billing-new-address-form">

                                            <center>
                                                @if (session('status'))
                                                    <script>
                                                        alert('{{ session('status') }}')
                                                    </script>
                                                @endif
                                            </center>


                                            <fieldset class="">
                                                <ul>
                                                    <h1>Make an Enquiry</h1>
                                                    <hr>
                                                    <li>
                                                        <div class="customer-name">
                                                            <div class="input-box name-firstname">
                                                                <label for="name"><em
                                                                        class="required">*</em>Name</label>
                                                                <br>
                                                                <input name="name" id="name" title="Name"
                                                                    placeholder="required" required
                                                                    class="input-text required-entry" type="text">
                                                            </div>
                                                            <div class="input-box name-firstname">
                                                                <label for="email"><em
                                                                        class="required">*</em>Email</label>
                                                                <br>
                                                                <input name="email" id="email" title="Email"
                                                                    required placeholder="Valid email address required"
                                                                    class="input-text required-entry validate-email"
                                                                    type="text">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <label for="telephone">Telephone</label>
                                                        <br>
                                                        <input name="telephone" id="telephone" title="Telephone"
                                                            value="" class="input-text" type="text">
                                                    </li>
                                                    <li>
                                                        <label for="msg"><em
                                                                class="required"></em>Comment</label>
                                                        <br>
                                                        <textarea name="msg" id="msg" title="Comment" class="required-entry input-text" cols="5"
                                                            rows="3"></textarea>
                                                    </li>
                                                </ul>
                                            </fieldset>
                                        </li>
                                        <p class="require"><em class="required">* </em>Required Fields</p>
                                        <input type="text" name="hideit" id="hideit" value=""
                                            style="display:none !important;">
                                        <div class="buttons-set">
                                            <button type="submit" title="Submit"
                                                class="button submit"><span><span>Submit</span></span></button>
                                        </div>
                                    </ul>
                                </fieldset>
                            </div>
                        </form>

                    </div>
                    <aside class="col-right sidebar col-sm-3 wow bounceInUp animated animated"
                        style="visibility: visible;">
                        <div class="block block-company">
                            <div class="block-title">Head Office</div>
                            <div class="block-content">
                                <ol id="recently-viewed-items">
                                    <li class="item odd">Prime Carz LTD, Dysart Way,<br></li>
                                    <li class="item even">Leicester, England, LE1 2JY</li>
                                    <hr>
                                    <li class="item even">Tel: 322 067 172</li>
                                    <li class="item  odd">Email: <strong>primecarzltd@gmail.com</strong></li>
                                </ol>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>



    @include('elements.footer')

    </div>
    <!--page-->
    <!-- Mobile Menu-->
    <div id="mobile-menu">
        <ul>
            <li>
                <div class="mm-search">
                    <form id="search1" name="search">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control simple" placeholder="Search ..."
                                name="srch-term" id="srch-term">
                        </div>
                    </form>
                </div>
            </li>
            <li class="active"> <a class="level-top" href="index.html"><span>Home</span></a></li>
            <li class="level0 parent drop-menu"> <a class="level-top" href="vehicle.html"><span>Vehicles</span></a>
            </li>
            <li class="level0 parent drop-menu"> <a class="level-top" href="part-exchange.html"><span>Part
                        Exchange</span></a></li>
            <li class="mega-menu hidden-sm"> <a class="level-top" href="aa-dealer-promise.html"><span>AA Dealer
                        Promise</span></a> </li>
            <li class="mega-menu hidden-sm"> <a class="level-top" href="aa-warrenty.html"><span>AA
                        Warrenty</span></a> </li>
            <li class="level0 parent drop-menu"><a href="contact-us.html"><span>Contact us</span> </a>
        </ul>
    </div>
    <!-- JavaScript -->
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap-slider.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/parallax.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/revslider.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/common.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.bxslider.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.mobile-menu.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/countdown.js') }}"></script>


</body>

</html>
