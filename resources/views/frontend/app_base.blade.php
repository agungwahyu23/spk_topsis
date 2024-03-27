<!DOCTYPE html>
<html lang="en">

{{-- heaad --}}
@include('frontend.partials.head')
{{-- end heaad --}}

<body>
    <!-- Topbar Start -->
    {{-- @include('frontend.partials.topbar') --}}
    <!-- Topbar End -->

    <!-- Navbar Start -->
    @include('frontend.partials.navbar')
    <!-- Navbar End -->

    @yield('content')

    <!-- Footer Start -->
    @include('frontend.partials.footer')
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    @include('frontend.partials.js')
    @yield('scripts')

</body>

</html>