
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        
        <title>DealersGear || CRM </title>
        <!-- Meta Tag -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="keywords" content="Responsive Web Design, landing page, Portfolio, Business">
        <meta name="description" content="Responsive Multipurpose Business Website Design">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        @include('common.header_scripts')
    </head>
    @inject('helpers', 'App\Classes\Helpers')
    <body>
        <!-- loader -->
        <div class="loaders">
            <div class="loader"></div>
        </div>
        <!-- loader -->
        <!-- Modal -->
        @php
        $settings=$helpers->get_settings();
        @endphp
        <div class="modal video-modal fade" id="youtubeVideo" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe src="https://www.youtube.com/embed/ErhHD_DQSoE" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header-area -->
        @include('common.header')
        <!-- header-area -->
        
        <!-- easy-to-use -->
        @yield('content')
        <!-- easy-to-use -->
        <!-- footer-area -->
        @include('common.footer')
        <!-- footer-area -->
        <div class="col-12">
            <a href="#" class="scrolltotop"><i class="fa fa-angle-up"></i></a>
        </div>
       @include('common.footer_scripts')
    </body>
</html>