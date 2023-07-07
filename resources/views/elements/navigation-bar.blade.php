<header>
    <div class="container">
        <div class="row">
            <div id="header">
                <div class="header-container">
                    <div class="header-logo"> <a title="Car HTML" class="logo">
                            <div><img src="{{ url('/assets/images/Prime Carz Ltd.png') }}" alt="Car Store">
                            </div>
                        </a> </div>
                    <div class="header__nav">
                        <div class="header-banner">
                            <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
                                <div class="assetBlock">
                                    <div style="height: 20px; overflow: hidden;" id="slideshow">
                                        <p style="display: block;">primecarzltd@gmail.com</p>
                                        <p style="display: none;">Dysart Way,
                                            Leicester, England, LE1 2JY</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-lg-6 col-xs-12 col-sm-6 col-md-6 call-us"><i
                                    class="fa fa-clock-o"></i> Mon - Sun : 09am to 06pm <i class="fa fa-phone"></i> 322
                                067 172</div>
                        </div>
                        <div class="fl-nav-menu">
                            <nav>
                                <div class="mm-toggle-wrap">
                                    <div class="mm-toggle"><i class="fa fa-bars"></i><span class="mm-label">Menu</span>
                                    </div>
                                </div>
                                <div class="nav-inner">
                                    <ul id="nav" class="hidden-xs">
                                        <li class="active"> <a class="level-top"
                                                href="/"><span>Home</span></a></li>
                                        <li class="level0 parent drop-menu"> <a class="level-top"
                                                href="{{ route('vehicles') }}"><span>Vehicles</span></a></li>
                                        <li class="level0 parent drop-menu"> <a class="level-top"
                                                href="{{ route('frontend-part-ex') }}"><span>Part
                                                    Exchange</span></a></li>
                                        <li class="mega-menu hidden-sm"> <a class="level-top"
                                                href="{{ route('dealer-promises') }}"><span>AA Dealer
                                                    Promise</span></a>
                                        </li>
                                        <li class="mega-menu hidden-sm"> <a class="level-top"
                                                href="{{ route('aa-warrenty') }}"><span>AA Warrenty</span></a> </li>
                                        <li class="level0 parent drop-menu"><a href="{{ route('contact-us') }}"><span>Contact
                                                    us</span> </a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>
