<div class="footer wow slideInUp" data-wow-duration="2s" data-wow-delay=".0s">
    <footer class="footer-area">
        <div class="containers">
            <div class="row">
                <div class="col-md-4 col-lg-5">
                    <div class="footer-menu">
                        <div class="footer-logo">
                            <a href="index.html"><img class="img-fluid" src="{{ asset('assets/img/Logo.svg') }}" alt=""></a>
                        </div>
                        <ul>
                            <li>
                                <a href="#">About</a>
                            </li>
                            <li>
                                <a href="#">Sucess Stories</a>
                            </li>
                            <li>
                                <a href="#">Meet the Team</a>
                            </li>
                            <li>
                                <a href="#">Careers</a>
                            </li>
                            <li>
                                <a href="#">Blog</a>
                            </li>
                            <li>
                                <a href="#">Dashboard Login</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 col-lg-5">
                    <div class="footer-menu">
                        <h4>Contact us</h4>
                        <p> <img class="img-fluid" src="{{ asset('assets/img/icon2.svg') }}" alt=""> {{ @$settings->cell_number }}</p>
                        <p> <img class="img-fluid" src="{{ asset('assets/img/icon3.svg') }}" alt=""> {{ @$settings->email }}</p>
                        <p> <img class="img-fluid" src="{{ asset('assets/img/icon1.svg') }}" alt=""> {{ @$settings->address }}
                    </div>
                </div>

                <div class="col-md-4 col-lg-2">
                    <div class="social">
                        <h4>Follow us</h4>
                        <ul>
                            <li>
                                <a target="blank" href="{{ @$settings->facebook }}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="{{ @$settings->twitter }}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="{{ @$settings->instagram }}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="{{ @$settings->linkedln }}"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="{{ @$settings->youtube }}"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <footer class="footer-bottom">
        <div class="containers">
            <div class="row">
                <div class="col-12">
                    <p>Copyright © 2020 Dealers United <a href="#">Privacy Policy</a> | <a href="#">Our Terms</a> </p>
                </div>
            </div>
        </div>
    </footer>
</div>