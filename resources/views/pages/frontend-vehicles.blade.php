<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Vehicles - Prime Carz Ltd</title>
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
            <div class="breadcrumbs">
                <div class="container">
                    <div class="row">
                    </div>
                </div>
            </div>
        </div>

        @include('elements.search-filter')


        <!--Category silder End-->

        <!-- BEGIN Main Container col2-left -->
        <section class="main-container col2-left-layout bounceInUp animated">
            <div class="container">
                <div class="row">
                    <div class="col-main col-sm-12 product-grid">
                        <div class="pro-coloumn">
                            <article class="col-main">
                                <div class="toolbar bottom">

                                    <form method="get" action="{{ route('vehicles') }}" id="sort_form">
                                        @csrf
                                        <div id="sort-by" class="row">
                                            <label class="left">Sort By: </label>
                                            <select name="sort" id="sort_by">
                                                <option value="brand">Make</option>
                                                <option value="price">Price</option>
                                                <option value="millage">Millage</option>
                                                <option value="transmission">Transmission</option>
                                                <option value="fuel_type">Fuel Type</option>
                                                <option value="color">Color</option>
                                            </select>

                                            <select name="order" id="order_by" onchange="filterBy()">
                                                <option value="ASC">select order</option>
                                                <option value="ASC">ASC</option>
                                                <option value="DESC">DESC</option>
                                            </select>
                                        </div>
                                        <div class="pager">
                                            <div id="limiter">
                                                <label>Show: </label>
                                                <select name="paginate" id="paginate" style="width: 90px;" onchange="filterBy()">
                                                    <option value="2">2</option>
                                                    <option value="5">5</option>
                                                    <option value="10">10</option>
                                                    <option value="15">15</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="row">
                                    <div class="vehicle-header">
                                        <h1>All cars for sale in Prime Carz</h1>
                                        
                                        <p>MH Quality Motors are a used car dealer based in Leicester, Leicestershire.
                                            We offer quality used cars at affordable prices.
                                            For more information on any of the vehicles below please contact us on
                                            <b>322 067 172</b> or email <a
                                                href="mailto:primecarzltd@gmail.com">primecarzltd@gmail.com</a>
                                        </p>
                                    </div>
                                </div>

                                <div class="category-products">
                                    @if (count($vehicles) == 0)
                                        <center>
                                            {{-- <h2 style="color:orange">No Vehicles Found !</h2> --}}


                                            <i class="fa fa-exclamation-circle fa-4x"></i>
                                            <h3>Sorry no vehicles found</h3>
                                            <p>The vehicle may have been sold or removed from our website. Please try
                                                another search or return to the main vehicle page</p>
                                            <p>Take me back to the <a
                                                    href="{{route('vehicles')}}" style="color:DodgerBlue">vehicles page</a></p>

                                        </center>
                                    @else
                                        <ol class="products-list" id="products-list">
                                            @foreach ($vehicles as $vehicle)
                                                <li class="item">
                                                    <div class="product-image"> <a
                                                            href="{{ route('vehicle.details', ['v_id' => $vehicle->v_id]) }}"
                                                            title="{{ $vehicle->brand }}-{{ $vehicle->model }}">
                                                            <img id="product-img" class="small-image"
                                                                src="{{ url('/assets/products-images') }}{{ '/' . $vehicle->main_img }}"
                                                                alt="{{ $vehicle->brand }}-{{ $vehicle->model }}" />
                                                        </a>
                                                    </div>
                                                    <div class="product-shop">
                                                        <h2 class="product-name"><a
                                                                href="{{ route('vehicle.details', ['v_id' => $vehicle->v_id]) }}"
                                                                title="{{ $vehicle->brand }}-{{ $vehicle->model }}">{{ $vehicle->brand }}
                                                                -
                                                                {{ $vehicle->model }}
                                                                ({{ date('Y', strtotime($vehicle->first_registered)) }})
                                                            </a>
                                                        </h2>
                                                        {{-- <div class="ratings">
                                                        <h4>Low mileage ulez exempt mpv 1.4</h4>
                                                    </div> --}}
                                                        <div class="spec-row" id="summarySpecs">
                                                            <table width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="label-spec"> Mileage <span
                                                                                class="coln">:</span></td>
                                                                        <td class="value-spec">
                                                                            {{ $vehicle->millage }}
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td class="label-spec"> Fuel Type: <span
                                                                                class="coln">:</span></td>
                                                                        @if ($vehicle->fuel_type == 0)
                                                                            <td class="value-spec">Hybrid
                                                                            </td>
                                                                        @elseif($vehicle->fuel_type == 1)
                                                                            <td class="value-spec">Petrol
                                                                            </td>
                                                                        @elseif ($vehicle->fuel_type == 2)
                                                                            <td class="value-spec">Diesel
                                                                            </td>
                                                                        @elseif ($vehicle->fuel_type == 3)
                                                                            <td class="value-spec">Electric
                                                                            </td>
                                                                        @elseif ($vehicle->fuel_type == 4)
                                                                            <td class="value-spec">Bi-Fuel
                                                                            </td>
                                                                        @elseif ($vehicle->fuel_type == 5)
                                                                            <td class="value-spec">LPG
                                                                            </td>
                                                                        @endif
                                                                        </td>
                                                                    </tr>

                                                                    <tr class="odd">
                                                                        <td class="label-spec"> Transmission <span
                                                                                class="coln">:</span></td>

                                                                        @if ($vehicle->transmission == 0)
                                                                            <td class="value-spec">Manual
                                                                            </td>
                                                                        @elseif($vehicle->transmission == 1)
                                                                            <td class="value-spec">Automatic
                                                                            </td>
                                                                        @elseif($vehicle->transmission == 2)
                                                                            <td class="value-spec">Semi Auto</td>
                                                                        @endif
                                                                    </tr>
                                                                    <tr class="odd">
                                                                        <td class="label-spec"> Body Style <span
                                                                                class="coln">:</span></td>
                                                                        <td class="value-spec">
                                                                            {{ $vehicle->body_style }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="label-spec"> MPG <span
                                                                                class="coln">:</span></td>
                                                                        <td class="value-spec"> {{ $vehicle->mpg }}
                                                                            Urban
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="odd">
                                                                        <td class="label-spec"> Engine Size <span
                                                                                class="coln">:</span></td>
                                                                        <td class="value-spec">
                                                                            {{ $vehicle->engine_size }} </td>
                                                                    </tr>
                                                                    <tr class="odd">
                                                                        <td class="label-spec"> Road Tax <span
                                                                                class="coln">:</span></td>
                                                                        <td class="value-spec">
                                                                            {{ $vehicle->road_tax }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="label-spec"> First Reg Date: <span
                                                                                class="coln">:</span></td>
                                                                        <td class="value-spec">
                                                                            {{ $vehicle->first_registered }} </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="label-spec"> Colour <span
                                                                                class="coln">:</span></td>
                                                                        <td class="value-spec"> {{ $vehicle->color }}
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="desc std">
                                                            <p>{{ $vehicle->overview }}
                                                                {{-- <a class="link-learn" title="" href="#">Learn
                                                                More</a> --}}
                                                            </p>
                                                        </div>
                                                        <div class="price-box">
                                                            <ul class="price-box" style="list-style: none;">
                                                                <li>
                                                                    <span
                                                                        style="font-size: 17px; font-weight: 700;">Price:</span>
                                                                </li>
                                                                <li style="padding-top: 10px;">
                                                                    <div class="price-box"> <span
                                                                            class="regular-price"
                                                                            id="product-price-159"> <span
                                                                                class="price">£{{ $vehicle->price }}</span>
                                                                        </span> </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                </li>
                                            @endforeach
                                        </ol>
                                    @endif

                                </div>
                                <div class="toolbar bottom">

                                    <div class="pager">
                                        <div class="pages">                                            
                                            {{ $vehicles->links() }}
                                        </div>
                                    </div>

                                    
                                </div>

                            </article>
                        </div>
                    </div>
                </div>
                <!--row-->
            </div>
            <!--container-->
        </section>
        <!--main-container col2-left-layout-->

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
        jQuery(document).ready(function() {
            jQuery('#rev_slider_4').show().revolution({
                dottedOverlay: 'none',
                delay: 5000,
                startwidth: 1170,
                startheight: 650,

                hideThumbs: 200,
                thumbWidth: 200,
                thumbHeight: 50,
                thumbAmount: 2,

                navigationType: 'thumb',
                navigationArrows: 'solo',
                navigationStyle: 'round',

                touchenabled: 'on',
                onHoverStop: 'on',

                swipe_velocity: 0.7,
                swipe_min_touches: 1,
                swipe_max_touches: 1,
                drag_block_vertical: false,

                spinner: 'spinner0',
                keyboardNavigation: 'off',

                navigationHAlign: 'center',
                navigationVAlign: 'bottom',
                navigationHOffset: 0,
                navigationVOffset: 20,

                soloArrowLeftHalign: 'left',
                soloArrowLeftValign: 'center',
                soloArrowLeftHOffset: 20,
                soloArrowLeftVOffset: 0,

                soloArrowRightHalign: 'right',
                soloArrowRightValign: 'center',
                soloArrowRightHOffset: 20,
                soloArrowRightVOffset: 0,

                shadow: 0,
                fullWidth: 'on',
                fullScreen: 'off',

                stopLoop: 'off',
                stopAfterLoops: -1,
                stopAtSlide: -1,

                shuffle: 'off',

                autoHeight: 'off',
                forceFullWidth: 'on',
                fullScreenAlignForce: 'off',
                minFullScreenHeight: 0,
                hideNavDelayOnMobile: 1500,

                hideThumbsOnMobile: 'off',
                hideBulletsOnMobile: 'off',
                hideArrowsOnMobile: 'off',
                hideThumbsUnderResolution: 0,

                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                startWithSlide: 0,
                fullScreenOffsetContainer: ''
            });
        });
    </script>

    <script type="text/javascript">
        function HideMe() {
            jQuery('.popup1').hide();
            jQuery('#fade').hide();
        }
    </script>

    <script type="text/javascript">
        function filterBy() {
            document.getElementById("sort_form").submit();
        }
    </script>

</body>

</html>
