<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', '51Careers')</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Bootstrap core JavaScript --><!-- CSS only -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <!-- JS, Popper.js, and jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <!-- Customized CSS files -->
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark static-top">
            <div class="container">
                <a class="navbar-brand" href="/">51 Careers</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/management/manageCandidates">Management System</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        @yield('body')

        <!-- Footer -->
{{--        <footer class="page-footer font-small unique-color-dark pt-4" style="background-color: #1C2331;">--}}

{{--            <!-- Footer Elements -->--}}
{{--            <div class="container">--}}

{{--                <!-- Call to action -->--}}
{{--                <ul class="list-unstyled list-inline text-center py-2">--}}
{{--                    <li class="list-inline-item">--}}
{{--                        <h5 class="mb-1" style="color: white;">Register for free</h5>--}}
{{--                    </li>--}}
{{--                    <li class="list-inline-item">--}}
{{--                        <a href="#!" class="btn btn-outline-white btn-rounded" style="color: white; border-color: white;">Sign up!</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--                <!-- Call to action -->--}}

{{--            </div>--}}
{{--            <!-- Footer Elements -->--}}

{{--            <!-- Copyright -->--}}
{{--            <div class="footer-copyright text-center py-3" style="color: whitesmoke;">© 2020 Copyright:--}}
{{--                <a href="https://mdbootstrap.com/" style="color: whitesmoke;"> MDBootstrap.com</a>--}}
{{--            </div>--}}
{{--            <!-- Copyright -->--}}

{{--        </footer>--}}
        <!-- End Footer -->
    </body>
</html>
