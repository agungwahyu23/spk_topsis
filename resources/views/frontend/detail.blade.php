@extends('frontend.app_base')

@section('content')


    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Detail</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Detail</p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">{{ $objek->name }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Blog Detail Start -->
                    <div class="pb-3">
                        <div class="blog-item">
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="{{ asset('/media/'.$objek->thumbnail) }}" alt="">
                            </div>
                        </div>
                        <div class="bg-white mb-3" style="padding: 30px;">
                            {!! $objek->description !!}

                            <br>
                            <h3>Galeri</h3>
                            <!-- Destination Start -->
                            <div class="container-fluid py-2">
                                <div class="container pt-2 pb-3">
                                    <div class="row">
                                        @foreach ($gallery as $item)
                                        <div class="col-lg-4 col-md-6 mb-4">
                                            <div class="destination-item position-relative overflow-hidden mb-2">
                                                @if (isset($item->image))
                                                    <img class="img-fluid" src="{{ asset('/media/' . $item->image) }}" alt="" style="width: 400px; height: 250px; object-fit: cover;">
                                                @else   
                                                    <img class="img-fluid" src="{{ asset('images/no_image.jpg') }}" alt="">
                                                @endif
                                                
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- Destination Start -->
                        </div>
                    </div>
                    <!-- Blog Detail End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->


@endsection