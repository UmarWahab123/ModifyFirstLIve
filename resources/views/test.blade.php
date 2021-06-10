@extends('common.main')
@section('content')
<section class="intuitive-area">
    <div class="containers">
        <div class="row">

            <!-- automotive-area-->
            <div class="col-12">
                <div class="automotive-area">
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="automotive-content wow fadeInLeft" data-wow-duration="2s" data-wow-delay=".0s">
                                <div class="automotive">
                                    <h1>Welcome To The <br> <span>Future</span> </h1>
                                    <p>The most innovative data driven technologies for auto dealers</p>
                                    <a class="live-demo" href="request-demo.html" target="_blank"> Request A Demo</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="automotive-img wow fadeInRight" data-wow-duration="2s" data-wow-delay=".0s">
                                <img class="img-fluid" src="assets/img/welcome.png" alt="">
                                <a class="play" href="#" data-toggle="modal" data-target="#youtubeVideo"><img
                                        class="img-fluid" src="{{ asset('assets/img/play.png') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- automotive-area-->

            <!-- comming-soon -->
            <div class="col-12">
                <div class="comming-soon wow slideInLeft" data-wow-duration="2s" data-wow-delay=".0s">
                    <div class="row">
                        <div class="col-md-5 col-lg-5">
                            <div class="comming-img">
                                <img class="img-fluid" src="assets/img/comming.png" alt="">
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7">
                            <div class="soon">
                                <div class="comming-text">
                                    <h2>Coming Soon!</h2>
                                    <h4>The Most Innovative CRM in The Industry!</h4>
                                    <p>Be The First to Be Notified</p>
                                    <div class="notifi-btn">
                                        <a href="#"><img class="img-fluid" src="assets/img/notifi.svg" alt=""> get
                                            Notified</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- comming-soon -->

            <div class="col-12">
                <div class="merketing wow slideInRight" data-wow-duration="2s" data-wow-delay=".0s">
                    <h3>Stay ahead of your competition with data driven digital <br> marketing tools from DealersGear
                    </h3>
                    <p>After years of intensive research and testing, we are ecstatic to introduce the most innovative
                        and <br> cutting-edge digital marketing tools for Dealers. </p>
                </div>
            </div>

        </div>
    </div>
</section>
    
@endsection