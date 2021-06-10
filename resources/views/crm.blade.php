@extends('common.main')
@section('content')
@inject('helpers', 'App\Classes\Helpers')
<!-- header-area -->
<!-- Main-Section-->
<section class="intuitive-area">
    <div class="containers">
        <div class="row">

            <!-- automotive-area-->
            
            @if (@$main_section->section_status==1)
                
            <div class="col-12">
                <div class="automotive-area">
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="automotive-content wow fadeInLeft" data-wow-duration="2s" data-wow-delay=".0s">
                                <div class="automotive">
                                    <h1>{{ @$main_section->section_heading }}</h1>
                                    <p>
                                        {{ @$main_section->section_description }}
                                    </p>


                                    {{-- <h1>The Most Intuitive <br><span> Data Driven</span> <br> Automotive CRM </h1>
                                    <p>CRM “Customer Relationship Management” is one of the most important tools a
                                        dealership has. It doesn’t just connect to your DMS, it’s the hub of all your
                                        data… prospects, customers, tasks,, Websites, Inventory,
                                        Webleads, Phone Ups, Desking, Data Mining, Advertising, Service, Call Tracking
                                        and Reporting.</p>
                                    <p>Manage the customer life cycle. Maintain accountability. Move away from your
                                        dependency on 3rd Party Lead providers and costly advertising. Use your existing
                                        CRM database to create more effective and relevant marketing
                                        campaigns.
                                    </p> --}}
                                    <a class="live-demo" href="request-demo.html" target="_blank"> Request A Demo</a>
                                </div>
                            </div>
                        </div>
                        @php
                            $image=$helpers->get_image($main_section->section_image , 'img');
                        @endphp
                        <div class="col-md-12 col-lg-6">
                            <div class="automotive-img wow fadeInRight" data-wow-duration="2s" data-wow-delay=".0s">
                                <img class="img-fluid" src="{{ @$image }}" alt="">
                                <img class="img-fluid clock" src="{{ asset('assets/img/clock.png') }}" alt="">


                                <div class="hand">
                                    <div id="containers">
                                        <div id="inner"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            
            <!-- automotive-area-->

            <!-- Dealership  -->
            <div class="col-md-12 col-lg-10 offset-lg-1">
                <div class="dealership-text wow slideInDown" data-wow-duration="2s" data-wow-delay=".0s">
                    <h2>
                        {{ @$main_section->section_alert }}
                    </h2>
                    {{-- <h2>We Listened! DealersGear CRM is automotive’s newest CRM. Built with the latest technological
                        Solutions, created by Dealers for Dealers.
                    </h2> --}}
                </div>
            </div>
            <!-- Dealership  -->

        </div>
    </div>
</section>
<!-- Main-Section-->
<!-- header-area -->


<!-- easy-to-use -->
@if (!empty($sections))


<section class="easy-to-use">
    <div class="containers">
        
        <div class="row">

            <!-- user-content -->
            
            @foreach ($sections as $key=> $item)
                @if ($item->section_position==0)
                <div class="col-md-6">
                    <div class="east-content wow slideInLeft" data-wow-duration="2s" data-wow-delay=".0s">
                        <div class="easy-text">
                            <h3>{{ $item->section_heading }}</h3>
                            <p>{{ $item->section_description }}</p>
                            {{-- <h3>01. Easy to Use</h3>
                            <p>Provide keywords that describe your video as well as the names of YouTube channels whose
                                subscribers you’d like targeted.</p> --}}
                        </div>
                    </div> 
                </div>    
                <div class="col-md-6">
                    <div class="easy-image wow slideInRight" data-wow-duration="2s" data-wow-delay=".0s">
                        @php
                            $s_image=$helpers->get_image($item->section_image, 'img');
                        @endphp
                        <img class="img-fluid" src="{{ @$image }}" alt="">
                    </div>
                </div>
                <div class="col-12">
                    <div class="spape1">
                        <img class="img-fluid" src="{{ asset('assets/img/path1.svg') }}" alt="">
                    </div>
                </div>
                @endif
                @if ($item->section_position==1)
                    <div class="col-md-6">
                        <div class="easy-image wow slideInLeft" data-wow-duration="2s" data-wow-delay=".0s">
                            @php
                            $s_image=$helpers->get_image($item->section_image, 'img');
                            @endphp
                            <img class="img-fluid" src="{{ @$image }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="east-content wow slideInLeft" data-wow-duration="2s" data-wow-delay=".0s">
                            <div class="easy-text">
                                <h3>{{ $item->section_heading }}</h3>
                                <p>{{ $item->section_description }}</p>
                                {{-- <h3>01. Easy to Use</h3>
                                <p>Provide keywords that describe your video as well as the names of YouTube channels whose
                                    subscribers you’d like targeted.</p> --}}
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-12">
                        <div class="spape2">
                            <img class="img-fluid" src="{{ asset('assets/img/path2.svg') }}" alt="">
                        </div>
                    </div> --}}
                @endif
            @endforeach
            
                
           
            
            <!-- user-content -->


            


            <!-- user-content -->
            
            <!-- user-content -->


            

            <!-- user-content -->

            

        </div>
    </div>
</section>
<!-- easy-to-use -->




<!-- easy-to-use -->
<section class="easy-to-use mobile-view">
    <div class="containers">
        <div class="row">

            <!-- user-content -->
            <div class="col-md-6">
                <div class="east-content wow slideInLeft" data-wow-duration="2s" data-wow-delay=".0s">
                    <div class="easy-text">
                        <h3>01. Easy to Use</h3>
                        <p>Provide keywords that describe your video as well as the names of YouTube channels whose
                            subscribers you’d like targeted.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="easy-image wow slideInRight" data-wow-duration="2s" data-wow-delay=".0s">
                    <img class="img-fluid" src="assets/img/webmatech-leadsheet.png" alt="">
                </div>
            </div>
            <!-- user-content -->


            <div class="col-12">
                <div class="spape1">
                    <img class="img-fluid" src="assets/img/path1.svg" alt="">
                </div>
            </div>


            <!-- user-content -->

            <div class="col-md-6">
                <div class="east-content uses wow slideInRight" data-wow-duration="2s" data-wow-delay=".0s">
                    <div class="easy-text">
                        <h3>02. Incomperable Reporting</h3>
                        <p>Provide keywords that describe your video as well as the names of YouTube channels whose
                            subscribers you’d like targeted.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="easy-image wow slideInLeft" data-wow-duration="2s" data-wow-delay=".0s">
                    <img class="img-fluid" src="assets/img/webmatech-performance-report2.png" alt="">
                </div>
            </div>
            <!-- user-content -->


            <div class="col-12">
                <div class="spape2">
                    <img class="img-fluid" src="assets/img/path2.svg" alt="">
                </div>
            </div>


            <!-- user-content -->
            <div class="col-md-6">
                <div class="east-content wow slideInLeft" data-wow-duration="2s" data-wow-delay=".0s">
                    <div class="easy-text">
                        <h3>03. World Class Design and Interface</h3>
                        <p>Provide keywords that describe your video as well as the names of YouTube channels whose
                            subscribers you’d like targeted.</p>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="easy-image wow slideInRight" data-wow-duration="2s" data-wow-delay=".0s">
                    <img class="img-fluid" src="assets/img/text.png" alt="">
                </div>
            </div>

            <!-- user-content -->

            <div class="col-12">
                <div class="spape3">
                    <img class="img-fluid" src="assets/img/path3.svg" alt="">
                </div>
            </div>


            <!-- user-content -->
            <div class="col-md-6">
                <div class="east-content uses wow slideInRight" data-wow-duration="2s" data-wow-delay=".0s">
                    <div class="easy-text">
                        <h3>04. Stay Alerted</h3>
                        <p>Provide keywords that describe your video as well as the names of YouTube channels whose
                            subscribers you’d like targeted.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="easy-image wow slideInLeft" data-wow-duration="2s" data-wow-delay=".0s">
                    <img class="img-fluid" src="assets/img/webmatech-performance-report.png" alt="">
                </div>
            </div>

            <!-- user-content -->

        </div>
    </div>
</section>
@endif
<!-- easy-to-use -->
@endsection