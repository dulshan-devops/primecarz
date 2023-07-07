<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Part Exchange - Prime Carz Ltd</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Default Description">
    <meta name="keywords" content="fashion, store, E-commerce">
    <meta name="robots" content="*">
    <link rel="icon" href="#" type="image/x-icon">
    <link rel="shortcut icon" href="#" type="image/x-icon">

    <!-- CSS Style -->
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

    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.css"
        integrity="sha512-ITS8GbPjCRA7c/PBl6Kqb9XjvQbKMBXpzEmpi7BgRwf6mUCySmHbF9opWfVUQvbdiYouDYxhxttWS+wyq4l+Ug=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://fonts.cdnfonts.com/css/fontawesome" rel="stylesheet">
</head>

<body>
    <div id="page">

        @include('elements.navigation-bar')

        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title">
                            <h2>Part Exchange</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-container col2-right-layout">
            <div class="main container">
                <div class="row">
                    <div class="col-main col-sm-9 wow bounceInUp animated animated" style="visibility: visible;">
                        <div id="messages_product_view"></div>

                        <div class="main-container col1-layout wow bounceInUp animated animated"
                            style="visibility: visible;">
                            <h1>Part Exchange</h1>

                            <div class="std">
                                <div class="wrapper_bl" style="margin-top: 1px;">
                                    <div class="form_background">

                                        <p>To make buying your next car as simple as possible we offer excellent part
                                            exchange prices on a wide range of vehicles. Call us today, or pop in and we
                                            will give you a valuation straight away, meaning you are one step closer to
                                            driving away in the car of your dreams.</p>
                                        <br>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <h3>Part Exchange Enquiry Form</h3>
                        <form action="{{ route('add-part-ex') }}" id="contactForm" method="post">
                            @csrf
                            <div class="static-contain">
                                <fieldset class="group-select">
                                    <ul>
                                        <li id="billing-new-address-form">
                                            <fieldset class="">
                                                <ul>
                                                    <li>

                                                        <center>
                                                            @if (session('status'))
                                                                <h2 style="color : rgb(21, 177, 21)">
                                                                    {{ session('status') }}</h2>

                                                                <script>
                                                                    alert('{{ session('status') }}')
                                                                </script>
                                                            @endif


                                                        </center>


                                                        <h4><b>Personal Details</b></h4>
                                                        <hr>
                                                        <div class="customer-name">
                                                            <div class="input-box name-firstname">
                                                                <label for="name"><em class="required"></em>Full
                                                                    Name</label>
                                                                <br>
                                                                <input name="full_name" id="full_name" title="Name"
                                                                    placeholder="required"
                                                                    class="input-text required-entry" type="text">
                                                            </div>
                                                            <div class="input-box name-firstname">
                                                                <label for="email"><em class="required">*</em>Email
                                                                    Address</label>
                                                                <br>
                                                                <input name="email" id="email" title="Email"
                                                                    placeholder="Valid email address required"
                                                                    class="input-text required-entry validate-email"
                                                                    required type="email">
                                                            </div>
                                                            <div class="input-box name-firstname">
                                                                <label for="telephone"><em
                                                                        class="required"></em>Telephone</label>
                                                                <br>
                                                                <input name="telephone" id="telephone"
                                                                    title="telephone" placeholder=""
                                                                    class="input-text required-entry validate-email"
                                                                    type="number">
                                                            </div>
                                                            <div class="input-box name-firstname">
                                                                <label for="Mobile"><em class="required"></em>Mobile
                                                                    Number</label>
                                                                <br>
                                                                <input name="mobile" id="mobile" title="mobile"
                                                                    placeholder=""
                                                                    class="input-text required-entry validate-email"
                                                                    type="text">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <h4><b>Vehicle Details</b></h4>
                                                        <hr>
                                                        <div class="customer-name">
                                                            <div class="input-box name-firstname">
                                                                <label for="text"><em
                                                                        class="required">*</em>Brand</label>
                                                                <br>
                                                                <input name="brand" id="brand" title="Brand"
                                                                    placeholder="required" required
                                                                    class="input-text required-entry" type="text">
                                                            </div>
                                                            <div class="input-box name-firstname">
                                                                <label for="text"><em
                                                                        class="required">*</em>Model</label>
                                                                <br>
                                                                <input name="model" id="model" title="Model"
                                                                    placeholder="required"
                                                                    class="input-text required-entry validate-email"
                                                                    required type="text">
                                                            </div>
                                                            <div class="input-box name-firstname">
                                                                <label for="telephone"><em
                                                                        class="required"></em>Variant</label>
                                                                <br>
                                                                <input name="variant" id="variant" title="Variant"
                                                                    placeholder=""
                                                                    class="input-text required-entry validate-email"
                                                                    type="text">
                                                            </div>
                                                            <div class="input-box name-firstname">
                                                                <label for="telephone"><em
                                                                        class="required"></em>Color/Paint</label>
                                                                <br>
                                                                <input name="color" id="color"
                                                                    title="Color/Paint"
                                                                    placeholder="Eg. Metalic Blue or just Blue"
                                                                    class="input-text required-entry validate-email"
                                                                    type="text">
                                                            </div>

                                                            <div class="input-box name-firstname">
                                                                <label for="radio"><em class="required"></em>Fuel
                                                                    Type</label>
                                                                <br>

                                                                <label class="radio-inline">
                                                                    <input type="radio" name="fuel_type"
                                                                        value="Petrol" checked>Petrol
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="fuel_type"
                                                                        value="Diesel">Diesel
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="fuel_type"
                                                                        value="Hybrid">Hybrid
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="fuel_type"
                                                                        value="Electric">Electric
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="fuel_type"
                                                                        value="Bi-Fuel">Bi-Fuel
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="fuel_type"
                                                                        value="LPG">LPG
                                                                </label>

                                                            </div>
                                                        </div>
                                                    </li>
                                                    <hr>

                                                    <li>
                                                        <div class="customer-name">
                                                            <div class="input-box name-firstname">
                                                                <label for="name"><em
                                                                        class="required"></em>Vehicle
                                                                    Registration</label>
                                                                <br>
                                                                <input name="vregister" id="vregister"
                                                                    title="vragister" placeholder=""
                                                                    class="input-text required-entry" type="text">
                                                            </div>
                                                            <div class="input-box name-firstname">
                                                                <label for="rdate"><em
                                                                        class="required"></em>Registration Date</label>
                                                                <br>
                                                                <input name="rdate" id="rdate" title="rdate"
                                                                    value=""
                                                                    class="input-text required-entry validate-email"
                                                                    type="date">
                                                            </div>
                                                            <div class="input-box name-firstname">
                                                                <label for="mileage"><em
                                                                        class="required">*</em>Millage</label>
                                                                <br>
                                                                <input name="millage" id="millage" title="Millage"
                                                                    placeholder="required" required
                                                                    class="input-text required-entry validate-email"
                                                                    type="text">
                                                            </div>
                                                            <div class="input-box name-firstname">
                                                                <label for="lservice"><em class="required"></em>Date
                                                                    of last service</label>
                                                                <br>
                                                                <input name="lservice" id="lservice"
                                                                    title="lservice" placeholder=""
                                                                    class="input-text required-entry validate-email"
                                                                    type="date">
                                                            </div>
                                                        </div>





                                                        <div class="input-box name-firstname">
                                                            <label for="transmission"><em
                                                                    class="required"></em>Transmission</label>
                                                            <br>

                                                            <label class="radio-inline">
                                                                <input type="radio" id="transmission"
                                                                    name="transmission" value="Manual" checked>Manual
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" id="transmission"
                                                                    name="transmission" value="Automatic">Automatic
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" id="transmission"
                                                                    name="transmission" value="Semi Auto">Semi Auto
                                                            </label>

                                                        </div>




                                                        <div class="input-box name-firstname">
                                                            <label for="telephone"><em class="required"></em>Full
                                                                service history?</label>
                                                            <br>

                                                            <label class="radio-inline">
                                                                <input type="radio" id="full_service_history"
                                                                    name="full_service_history" value="Yes"
                                                                    checked>No
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" id="full_service_history"
                                                                    name="full_service_history" value="No">Yes
                                                            </label>

                                                        </div>
                                                    </li>
                                                    <hr>


                                                    <li>
                                                        <label for="optional"><em class="required"></em>Any additional
                                                            details? (optional)</label>
                                                        <br>
                                                        <textarea name="optional" id="optional" title="optional"
                                                            placeholder="Include any additional information you think might be useful here" class="required-entry input-text"
                                                            cols="5" rows="3"></textarea>
                                                    </li>
                                                    <hr>

                                                    <li>
                                                        <p>
                                                            The data you have provided on this form will be used to
                                                            process your enquiry and may be shared with a third party if
                                                            required to process this enquiry.</p>
                                                    </li>
                                                    <hr>
                                                </ul>
                                            </fieldset>
                                        </li>
                                        <p class="require"><em class="required">* </em>Required Fields</p>
                                        <input type="text" name="hideit" id="hideit" value=""
                                            style="display:none !important;">
                                        <div class="buttons-set">
                                            <button type="submit" title="Submit"
                                                class="button submit"><span><span>Send</span></span></button>
                                        </div>
                                    </ul>
                                </fieldset>
                            </div>
                        </form>

                    </div>
                    <aside class="col-right sidebar col-sm-3 wow bounceInUp animated animated"
                        style="visibility: visible;">
                        <div class="block block-company">
                            <div class="block-title">Opening Hours</div>
                            <div class="block-content">
                                <ol id="recently-viewed-items">
                                    <li class="item odd">
                                        <div class="input-box name-firstname">
                                            <label for="name"><em class="required"></em>Monday</label>
                                            <label for="name" style="float: right;"><em
                                                    class="required"></em>10:00 - 18:00</label>
                                        </div>
                                        <div class="input-box name-firstname">
                                            <label for="name"><em class="required"></em>Tuesday</label>
                                            <label for="name" style="float: right;"><em
                                                    class="required"></em>10:00 - 18:00</label>
                                        </div>
                                        <div class="input-box name-firstname">
                                            <label for="name"><em class="required"></em>Wednesday</label>
                                            <label for="name" style="float: right;"><em
                                                    class="required"></em>10:00 - 18:00</label>
                                        </div>
                                        <div class="input-box name-firstname">
                                            <label for="name"><em class="required"></em>Thursday</label>
                                            <label for="name" style="float: right;"><em
                                                    class="required"></em>10:00 - 18:00</label>
                                        </div>
                                        <div class="input-box name-firstname">
                                            <label for="name"><em class="required"></em>Friday</label>
                                            <label for="name" style="float: right;"><em
                                                    class="required"></em>10:00 - 18:00</label>
                                        </div>
                                        <div class="input-box name-firstname">
                                            <label for="name"><em class="required"></em>Saturday</label>
                                            <label for="name" style="float: right;"><em
                                                    class="required"></em>10:00 - 18:00</label>
                                        </div>
                                        <div class="input-box name-firstname">
                                            <label for="name"><em class="required"></em>Sunday</label>
                                            <label for="name" style="float: right;"><em
                                                    class="required"></em>10:00 - 18:00</label>
                                        </div>
                                    </li>
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
                                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> </button>
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
    {{-- <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/parallax.js"></script>
    <script type="text/javascript" src="js/revslider.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/jquery.mobile-menu.min.js"></script> --}}

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

    <script>
        var transmission = document.getElementById('transmission').value;
        var full_service_history = document.getElementById('full_service_history').value;
        console.log(transmission);
    </script>


</body>

</html>
