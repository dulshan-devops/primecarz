<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Gorgeous Mercedes - Prime Carz Ltd</title>
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
            <div class="page-title">
                <h2>PRODUCT Detail</h2>
            </div>
        </div>
        <!-- BEGIN Main Container -->
        <div class="main-container col1-layout wow bounceInUp animated">
            <div class="main">
                <div class="col-main">
                    <!-- Endif Next Previous Product -->
                    <div class="product-view wow bounceInUp animated" itemscope=""
                        itemtype="http://schema.org/Product" itemid="#product_base">
                        <div id="messages_product_view"></div>

                        <!--product-next-prev-->
                        <div class="product-essential container">
                            <div class="row">

                                @if (session('status'))
                                    <script>
                                        alert('{{ session('status') }}')
                                    </script>
                                @endif

                                <form action="#" method="post" id="product_addtocart_form">
                                    <!--End For version 1, 2, 6 -->
                                    <!-- For version 3 -->
                                    <div class="product-img-box col-lg-5 col-sm-5 col-xs-12">
                                        <div class="new-label new-top-left">Hot</div>
                                        <div class="sale-label sale-top-left">-15%</div>
                                        <div class="product-image">
                                            <div class="product-full"> <img id="product-zoom1"
                                                    src="{{ url('/assets/products-images') }}{{ '/' . $vehicle[0]->main_img }}"
                                                    data-zoom-image="{{ url('/assets/products-images') }}{{ '/' . $vehicle[0]->main_img }}"
                                                    alt="product-image" />
                                            </div>
                                            <div class="more-views">
                                                <div class="slider-items-products">
                                                    <div id="gallery_02"
                                                        class="product-flexslider hidden-buttons product-img-thumb">
                                                        <div class="slider-items slider-width-col4 block-content">
                                                            @foreach ($images as $img)
                                                                <div class="more-views-items">
                                                                    <a href="#"
                                                                        data-image="{{ url('/assets/products-images') }}{{ '/' . $img->image }}"
                                                                        data-zoom-image="{{ url('/assets/products-images') }}{{ '/' . $img->image }}">
                                                                        <img id="product-zoom0"
                                                                            src="{{ url('/assets/products-images') }}{{ '/' . $img->image }}"
                                                                            alt="product-image" />
                                                                    </a>
                                                                </div>
                                                            @endforeach

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end: more-images -->
                                        <div class="toll-free"><a href="#"><i class="fa fa-phone"></i> 322 067
                                                172</a></div>
                                        <div class="ask-question"><a href="#" onClick="ShowMe();"><i
                                                    class="fa fa-envelope"></i> Make an Enquiry</a></div>
                                        <div class="request-call"><a href="#" onClick="ShowMe1();"><i
                                                    class="fa fa-map-marker"></i> Get Directions</a></div>
                                    </div>
                                    <!--End For version 1,2,6-->
                                    <!-- For version 3 -->
                                    <div class="product-shop col-lg- col-sm-7 col-xs-12">
                                        <div class="brand">
                                            @if ($vehicle[0]->condition == 0)
                                                <td><span class="badge badge-pill badge-primary">Used</span></td>
                                            @else
                                                <td><span class="badge badge-pill badge-primary">Brand New</span></td>
                                            @endif
                                        </div>
                                        <div class="product-name">
                                            <h1>{{ $vehicle[0]->brand }}-{{ $vehicle[0]->model }} </h1>
                                            {{-- <h4>Low mileage ulez exempt mpv 1.4</h4> --}}
                                        </div>
                                        <div class="price-block">
                                            <div class="price-box">

                                                <p class="special-price"> <span class="price-label">Special
                                                        Price</span> <span id="product-price-48"
                                                        class="price">£{{ $vehicle[0]->price }} </span> </p>
                                            </div>
                                        </div>

                                        <div class="spec-row" id="summarySpecs">
                                            <h2>Vehicle Details</h2>
                                            <table width="100%">
                                                <tbody>
                                                    <tr>
                                                        <td class="label-spec"> Mileage <span class="coln">:</span>
                                                        </td>
                                                        <td class="value-spec"> {{ $vehicle[0]->millage }} kmpl </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="label-spec"> Color <span class="coln">:</span>
                                                        </td>
                                                        <td class="value-spec"> {{ $vehicle[0]->color }} </td>
                                                    </tr>
                                                    <tr class="odd">
                                                        <td class="label-spec"> Transmission <span
                                                                class="coln">:</span></td>

                                                        @if ($vehicle[0]->transmission == 0)
                                                            <td class="value-spec">Manual</td>
                                                        @elseif($vehicle[0]->transmission == 1)
                                                            <td class="value-spec"> Automatic </td>
                                                        @elseif($vehicle[0]->transmission == 2)
                                                            <td class="value-spec"> Semi Auto </td>
                                                        @endif

                                                    </tr>
                                                    <tr class="odd">
                                                        <td class="label-spec"> Fuel Type <span
                                                                class="coln">:</span></td>

                                                        @if ($vehicle[0]->fuel_type == 0)
                                                            <td class="value-spec"> Hybrid </td>
                                                        @elseif($vehicle[0]->fuel_type == 1)
                                                            <td class="value-spec"> Petrol </td>
                                                        @elseif ($vehicle[0]->fuel_type == 2)
                                                            <td class="value-spec"> Diesel </td>
                                                        @elseif ($vehicle[0]->fuel_type == 3)
                                                            <td class="value-spec"> Electric </td>
                                                        @elseif ($vehicle[0]->fuel_type == 4)
                                                            <td class="value-spec"> Bi-Fuel </td>
                                                        @elseif ($vehicle[0]->fuel_type == 5)
                                                            <td class="value-spec"> LPG </td>
                                                        @endif

                                                    </tr>
                                                    <tr>
                                                        <td class="label-spec"> First Registered <span
                                                                class="coln">:</span>
                                                        </td>
                                                        <td class="value-spec"> {{ $vehicle[0]->first_registered }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="label-spec"> MPG <span class="coln">:</span></td>
                                                        <td class="value-spec"> {{ $vehicle[0]->mpg }} URBAN </td>
                                                    </tr>
                                                    <tr class="odd">
                                                        <td class="label-spec"> Power <span class="coln">:</span>
                                                        </td>
                                                        <td class="value-spec"> {{ $vehicle[0]->power }} BHP </td>
                                                    </tr>
                                                    <tr class="odd">
                                                        <td class="label-spec"> CO2 Emission <span
                                                                class="coln">:</span></td>
                                                        <td class="value-spec"> {{ $vehicle[0]->co2_emission }} g/km
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="label-spec"> Road Tax <span class="coln">:</span>
                                                        </td>
                                                        <td class="value-spec"> £{{ $vehicle[0]->road_tax }} </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="social">
                                            <ul class="link">
                                                <li class="fb"><a href="#"></a></li>
                                                <li class="tw"><a href="#"></a></li>
                                                <li class="youtube"><a href="#"></a></li>
                                            </ul>
                                        </div>
                                        <ul class="shipping-pro">
                                            <li>Free Servicing</li>
                                            <li>Free Monthly Checkup</li>
                                            <li>Extended Warrenty</li>
                                        </ul>
                                    </div>
                                    <!--product-shop-->
                                    <!--Detail page static block for version 3-->
                                </form>
                            </div>
                        </div>
                        <!--product-essential-->
                        <div class="product-collateral container">
                            <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                                <li class="active"> <a href="#product_tabs_description" data-toggle="tab"> Vehicle
                                        Overview </a> </li>
                                <li><a href="#product_tabs_tags" data-toggle="tab">Technical Details</a></li>
                                <li> <a href="#product_tabs_custom" data-toggle="tab">Accessories</a> </li>
                            </ul>
                            <div id="productTabContent" class="tab-content">
                                <div class="tab-pane fade in active" id="product_tabs_description">
                                    <div class="std">
                                        <p style="font-size: 14px;">{{ $vehicle[0]->overview }}</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="product_tabs_tags">
                                    <div class="spec-row" id="summarySpecs">
                                        <table width="100%">
                                            <tbody>
                                                <tr>
                                                    <td class="label-spec"> MPG <span class="coln">:</span></td>
                                                    <td class="value-spec"> {{ $vehicle[0]->mpg }} URBAN </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td class="label-spec"> Power <span class="coln">:</span>
                                                    </td>
                                                    <td class="value-spec"> {{ $vehicle[0]->power }} BHP </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td class="label-spec"> CO2 Emission <span class="coln">:</span>
                                                    </td>
                                                    <td class="value-spec"> {{ $vehicle[0]->co2_emission }} g/km
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="label-spec"> Road Tax <span class="coln">:</span>
                                                    </td>
                                                    <td class="value-spec"> £{{ $vehicle[0]->road_tax }} </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="product_tabs_custom">
                                    <div class="spec-row" id="summarySpecs">
                                        <table width="100%">
                                            <tbody>
                                                @foreach ($accessories as $acc)
                                                    <tr>
                                                        <td class="label-spec"> {{ $acc->name }} <span
                                                                class="coln">:</span></td>
                                                        <td class="value-spec"> <i class="fa fa-check-circle"></i>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <section class=" wow bounceInUp animated">
                            <div class="best-pro slider-items-products container">
                                <div class="new_title">
                                    <h2>{{ $vehicle[0]->brand }} Makes</h2>
                                </div>
                                <div id="best-seller" class="product-flexslider hidden-buttons">
                                    <div class="slider-items slider-width-col4 products-grid">
                                        @foreach ($related_vehicles as $vehicle)
                                            <div class="item">
                                                <div class="item-inner">
                                                    <div class="item-img">
                                                        <div class="item-img-info"><a
                                                                href="{{ route('vehicle.details', ['v_id' => $vehicle->v_id]) }}"
                                                                title="{{ $vehicle->brand }}-{{ $vehicle->model }}"
                                                                class="product-image"><img
                                                                    src="{{ url('/assets/products-images') }}{{ '/' . $vehicle->main_img }}"
                                                                    style="height: 20rem;"
                                                                    alt="{{ $vehicle->brand }}-{{ $vehicle->model }}"></a>
                                                            <div class="item-box-hover">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title"><a
                                                                    href="{{ route('vehicle.details', ['v_id' => $vehicle->v_id]) }}"
                                                                    title="{{ $vehicle->brand }}-{{ $vehicle->model }}">{{ $vehicle->brand }}-{{ $vehicle->model }}</a>
                                                            </div>
                                                            <div class="item-content">
                                                                <div class="item-price">
                                                                    <div class="price-box"><span
                                                                            class="regular-price"><span
                                                                                class="price">£{{ $vehicle->price }}</span>
                                                                        </span> </div>
                                                                </div>
                                                                <div class="other-info">
                                                                    <div class="col-km"><i
                                                                            class="fa fa-tachometer"></i>
                                                                        {{ $vehicle->millage }}Kmpl
                                                                    </div>
                                                                    <div class="col-engine"><i class="fa fa-gear"></i>

                                                                        @if ($vehicle->transmission == 0)
                                                                            Manual
                                                                        @elseif($vehicle->transmission == 1)
                                                                            Automatic
                                                                        @elseif($vehicle->transmission == 2)
                                                                            Auto
                                                                        @endif

                                                                    </div>
                                                                    <div class="col-date"><i class="fa fa-calendar"
                                                                            aria-hidden="true"></i>
                                                                        {{ date('Y', strtotime($vehicle->first_registered)) }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                    <!--box-additional-->
                    <!--product-view-->
                </div>
            </div>
            <!--col-main-->
        </div>
        <!--main-container-->
    </div>
    <!--col1-layout-->

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

    <div class="popup2" style="display: none;">
        <div class="ask-question-block">
            <h3>Ask a Question</h3>
            <div class="form-inner"><img src="{{ url('/assets/images/close-icon.png') }}" alt="close"
                    class="x" onClick="HideMe1();">
                <form action="{{ route('send-product-inquiry') }}" method="post">
                    @csrf
                    <div class="form-block"><label>Name</label>
                        <input name="name" type="text">
                    </div>
                    <div class="form-block"><label>Email</label>
                        <input name="email" type="text">
                    </div>
                    <div class="form-block"><label>Phone</label>
                        <input name="telephone" type="text">
                    </div>
                    <div class="form-block"><label>Question</label>
                        <input name="msg" type="text">
                    </div>
                    <div class="form-block">
                        <button type="submit" title="submit" class="button"><span>Submit</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="popup3" style="display: none;">
        <div class="ask-question-block">
            <h3>Get Directions</h3>
            <div class="form-inner"><img src="{{ url('/assets/images/close-icon.png') }}" alt="close"
                    class="x" onClick="HideMe2();">
                <div class="form-block" style="font-size: 20px;">For directions please visit our <a
                        href="{{ route('contact-us') }}" style="color: #de7112;">contact page.</a></label>
                </div>
            </div>
        </div>
    </div>

    <div id="fade"></div>

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
    <script src="{{ asset('assets/js/cloud-zoom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.mobile-menu.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/countdown.js') }}"></script>
    <script type="text/javascript">
        function HideMe() {
            jQuery('.popup1').hide();
            jQuery('#fade').hide();


        }

        function ShowMe() {
            jQuery('.popup2').show();
            jQuery('#fade').show();

        }

        function ShowMe1() {
            jQuery('.popup3').show();
            jQuery('#fade').show();

        }

        function HideMe1() {
            jQuery('.popup2').hide();
            jQuery('#fade').hide();


        }

        function HideMe2() {
            jQuery('.popup3').hide();
            jQuery('#fade').hide();


        }
    </script>

</body>

</html>
