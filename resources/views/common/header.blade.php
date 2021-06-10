

<header class="header-area">
    <div class="containers">
        <div class="row">
            <div class="col-12">
                <!-- navigation -->
                <div class="navigation">
                    <nav class="navbar navbar-expand-lg">
                        @php
                        //echo $settings->logo; exit;
                            $logo=@$helpers->get_image($settings->logo, 'logo');
                        @endphp
                        <a class="navbar-brand" href="index.html"><img class="img-fluid" src="{{ asset('assets/img/Logo.svg') }}"
                                alt="logo"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"><svg xmlns="http://www.w3.org/2000/svg" width="30"
                                    height="27" viewbox="0 0 30 27">
                                    <g fill="none" fill-rule="evenodd">
                                        <g fill="#0A2A68" style="fill: #0A2A68;">
                                            <g>
                                                <path d="M0 17H30V19H0zM0 25H30V27H0z"
                                                    transform="translate(-1376 -48) translate(1376 48)" />
                                                <text font-family="Mulish" sans-serif font-size="10" font-weight="500"
                                                    letter-spacing=".2"
                                                    transform="translate(-1376 -48) translate(1376 48)">
                                                    <tspan x=".115" y="10">MENU</tspan>
                                                </text>
                                            </g>
                                        </g>
                                    </g>
                                </svg></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Solutions
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                        <div class="dropdown-box">
                                            <ul>
                                                <li>
                                                    <a class="active" href="crm.html">
                                                        <div class="media">
                                                            <img src="{{ asset('assets/img/Partnership.svg') }}" class="img-fluid mr-3"
                                                                alt="...">
                                                            <div class="media-body">
                                                                <h5 class="mt-0">CRM</h5>
                                                                <p>DealersGear CRM </p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="media">
                                                            <img src="{{ asset('assets/img/data.svg') }}" class="img-fluid mr-3"
                                                                alt="...">
                                                            <div class="media-body">
                                                                <h5 class="mt-0">Data Mining</h5>
                                                                <p>Collected data</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="reporting.html">
                                                        <div class="media">
                                                            <img src="{{ asset('assets/img/Secure_Payments.svg') }}"
                                                                class="img-fluid mr-3" alt="...">
                                                            <div class="media-body">
                                                                <h5 class="mt-0">Reporting</h5>
                                                                <p>Intuitive reports</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="dropdown-box">
                                            <ul>
                                                <li>
                                                    <a href="inventory.html">
                                                        <div class="media">
                                                            <img src="{{ asset('assets/img/Target.svg') }}" class="img-fluid mr-3"
                                                                alt="...">
                                                            <div class="media-body">
                                                                <h5 class="mt-0">Inventory Syndication</h5>
                                                                <p>Importance of SEO</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="intelligent.html">
                                                        <div class="media">
                                                            <img src="{{ asset('assets/img/Online_Store.svg') }}"
                                                                class="img-fluid mr-3" alt="...">
                                                            <div class="media-body">
                                                                <h5 class="mt-0">Websites</h5>
                                                                <p>Best converting interface</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="craigslist.html">
                                                        <div class="media">
                                                            <img src="{{ asset('assets/img/cralist.svg') }}" class="img-fluid mr-3"
                                                                alt="...">
                                                            <div class="media-body">
                                                                <h5 class="mt-0">Craigslist Posting</h5>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="leadership.html">Leadership</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Why Us</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
                                <li class="nav-item"><a class="live-demo" href="request-demo.html">Request a Demo</a>
                                </li>
                                <li class="nav-item"><a class="call-now" href="#"><img src="{{ asset('assets/img/call.png') }}"
                                            alt=""></a></li>
                                <li class="nav-item"><a class="login-btn" href="#">LOG IN</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- navigation -->
        </div>
    </div>
</header>