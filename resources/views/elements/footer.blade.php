<footer>
    <div class="footer-inner">
        <div class="our-features-box wow bounceInUp animated animated">
            <div class="container">
                <ul>
                    <li>
                        <div class="feature-box">
                            <div class="icon-truck"><img src="{{ url('/assets/images/world-icon.png') }}" alt="Image">
                            </div>
                            <div class="content">
                                <h6>World's #1</h6>
                                <p>Largest Auto portal</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="feature-box">
                            <div class="icon-support"><img src="{{ url('/assets/images/car-sold-icon.png') }}"
                                    alt="Image"></div>
                            <div class="content">
                                <h6>Car Sold</h6>
                                <p>Every 4 minute</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="feature-box">
                            <div class="icon-money"><img src="{{ url('/assets/images/tag-icon.png') }}" alt="Image">
                            </div>
                            <div class="content">
                                <h6>Offers</h6>
                                <p>Stay updated pay less</p>
                            </div>
                        </div>
                    </li>
                    <li class="last">
                        <div class="feature-box">
                            <div class="icon-return"><img src="{{ url('/assets/images/compare-icon.png') }}"
                                    alt="Image"></div>
                            <div class="content">
                                <h6>Compare</h6>
                                <p>Decode the right car</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="newsletter-row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col1">
                        <div class="newsletter-wrap">
                            <h5>Newsletter</h5>
                            <h4>Get Notified Of any Updates!</h4>
                            <form action="{{ route('add-subscriber') }}" method="post"
                                id="newsletter-validate-detail1">
                                @csrf
                                <div id="container_form_news">
                                    <div id="container_form_news2">
                                        <input type="text" name="email" id="newsletter1" required
                                            title="Sign up for our newsletter"
                                            class="input-text required-entry validate-email"
                                            placeholder="Enter your email address">
                                        <button type="submit" title="Subscribe"
                                            class="button subscribe"><span>Subscribe</span></button>
                                    </div>
                                    <!--container_form_news2-->
                                </div>
                                <!--container_form_news-->
                            </form>

                            <center>
                                @if (session('status'))
                                    <script>
                                        alert('{{ session('status') }}')
                                    </script>
                                @endif
                            </center>

                        </div>
                        <!--newsletter-wrap-->
                    </div>
                </div>
            </div>
            <!--footer-column-last-->
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-12 col-lg-4">
                    <div class="co-info">
                        <h4>SHOWROOM</h4>
                        <address>
                            <div><span>Prime Carz LTD, Dysart Way,<br>
                                    Leicester, England, LE1 2JY</span></div>
                            <div> <span> 322 067 172</span></div>
                            <div> <span><a href="#">primecarzltd@gmail.com</a></span></div>
                            <div> <span>Mon - Fri : 09am to 06pm</span></div>
                        </address>
                    </div>
                </div>
                <div class="col-sm-8 col-xs-12 col-lg-8">
                    <div class="footer-column">
                        <h4>Used vehicles by make</h4>
                        <ul class="links">
                            <li class="first"><a title="Used Audi"
                                    href="{{ route('filter-vehicles', ['brand' => 'Audi', 'condition' => 0]) }}">Used
                                    AUDI
                            <li><a title="Used Volkswagen"
                                    href="{{ route('filter-vehicles', ['brand' => 'Valkswagen', 'condition' => 0]) }}">Used
                                    VOLKSWAGEN</a></li>
                            <li><a title="Used Honda"
                                    href="{{ route('filter-vehicles', ['brand' => 'Honda', 'condition' => 0]) }}">Used
                                    HONDA</a></li>
                            <li><a title="Used Nissan"
                                    href="{{ route('filter-vehicles', ['brand' => 'Nissan', 'condition' => 0]) }}">Used
                                    NISSAN</a></li>
                            <li><a title="Used Toyota"
                                    href="{{ route('filter-vehicles', ['brand' => 'Toyota', 'condition' => 0]) }}">Used
                                    TOYOTA</a></li>
                        </ul>
                    </div>
                    <div class="footer-column">
                        <h4>Information</h4>
                        <ul class="links">
                            <li class="first"><a title="Vehicles" href="{{ route('vehicles') }}">Vehicles</a></li>
                            <li><a title="Part Exchange" href="{{ route('frontend-part-ex') }}">Part Exchange</a></li>
                            <li><a title="AA Dealer Promise" href="{{ route('dealer-promises') }}">AA Dealer
                                    Promise</a>
                            </li>
                            <li><a title="AA Warrenty" href="{{ route('aa-warrenty') }}">AA Warrenty</a></li>
                            <li><a title="Contact Us" href="{{ route('dealer-promises') }}">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="footer-column">
                        <h4>Follow Us</h4>
                        <div class="social">
                            <ul>
                                <li class="fb"><a href="#"></a></li>
                                <li class="tw"><a href="#"></a></li>
                                <li class="youtube"><a href="#"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <!--footer-inner-->

    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-12 coppyright">All rights Reserved Prime Carz Ltd. Developed By <a
                        target="_blank" href="https://www.ozonwebs.com/">Ozon Web Solutions</a></div>
                <div class="col-xs-12 col-sm-4"></div>
                <div class="col-xs-12 col-sm-4">
                    <div class="payment-accept"> <img src="{{ url('/assets/images/payment-1.png') }}" alt="">
                        <img src="{{ url('/assets/images/payment-2.png') }}" alt=""> <img
                            src="{{ url('/assets/images/payment-3.png') }}" alt=""> <img
                            src="{{ url('/assets/images/payment-4.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BEGIN SIMPLE FOOTER -->
</footer>
<!-- End For version 1,2,3,4,6 -->
