@extends('frontend.app_base')

@section('content')

    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('fe/img/carousel-1.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Wisata Magetan</h4>
                            <h1 class="display-3 text-white mb-md-4">Temukan Destinasi Wisata Menarik</h1>
                            {{-- <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Book Now</a> --}}
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('fe/img/carousel-2.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Wisata Magetan</h4>
                            <h1 class="display-3 text-white mb-md-4">Discover Amazing Places With Us</h1>
                            {{-- <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Book Now</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Booking Start -->
    <form method="GET" action="{{ route('wisata.index') }}">
        <div class="container-fluid booking mt-5 pb-5">
            <div class="container pb-5">
                <div class="bg-light shadow" style="padding: 30px;">
                    <div class="row align-items-center" style="min-height: 60px;">
                        <div class="col-md-10">
                            <div class="row">
                                @foreach ($criteria as $item)
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <select class="custom-select px-4" style="height: 47px;" name="{{ strtolower($item['criteria_name']) }}">
                                            <option value="" selected>{{ $item['criteria_name'] }}</option>
                                            @foreach ($item['sub'] as $val)
                                            <option value="{{ $val->id }}">{{ $val->id }} {{ $val->description }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary btn-block" type="submit"
                                style="height: 47px; margin-top: -2px;">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Booking End -->

    <!-- Destination Start -->
    <div class="container-fluid py-2" id="recomendation">
        <div class="container pt-2 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Rekomendasi</h6>
                <h1>Rekomendasi Wisata Magetan</h1>
            </div>
            <div class="row">
                @foreach ($recomendation as $item)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        @if (isset($item->thumbnail))
                            <img class="img-fluid" src="{{ asset('/media/' . $item->thumbnail) }}" alt="" style="width: 400px; height: 250px; object-fit: cover;">
                        @else   
                            <img class="img-fluid" src="{{ asset('images/no_image.jpg') }}" alt="">
                        @endif
                        <a class="destination-overlay text-white text-decoration-none" href="{{ url('detail') . '/' . $item->objek_id }}">
                            <h5 class="text-white">{{ $item->name }}</h5>
                            {{-- <span>100 Cities</span> --}}
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Destination Start -->

    <!-- About Start -->
    <div class="container-fluid py-5" id="about">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-6" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="{{ asset('fe/img/about.jpg') }}" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pb-lg-5">
                    <div class="about-text bg-white p-4 p-lg-5 my-lg-5">
                        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Tentang Kami</h6>
                        <h1 class="mb-3">Rekomendasi Wisata Menarik di Magetan</h1>
                        <p>Temukan rekomendasi wisata menarik di Magetan yang cocok untuk anda kunjungi. Cukup gunakan filter yang sesuai dengan referensi anda dan kami akan tampilkan rekomendasi yang pas untuk Anda.</p>
                        <div class="row mb-4">
                            <div class="col-6">
                                <img class="img-fluid" src="{{ asset('fe/img/about-1.jpg') }}" alt="">
                            </div>
                            <div class="col-6">
                                <img class="img-fluid" src="{{ asset('fe/img/about-2.jpg') }}" alt="">
                            </div>
                        </div>
                        {{-- <a href="" class="btn btn-primary mt-1">Book Now</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Packages Start -->
    <div class="container-fluid py-5" id="objek">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Wisata</h6>
                <h1>Daftar Tempat Wisata</h1>
            </div>
            <div class="row">
                @foreach ($objek as $item)    
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="package-item bg-white mb-2">
                        @if (isset($item->thumbnail))
                            <img class="img-fluid" src="{{ asset('/media/' . $item->thumbnail) }}" alt="" style="width: 400px; height: 250px; object-fit: cover;">
                        @else   
                            <img class="img-fluid" src="{{ asset('images/no_image.jpg') }}" alt="">
                        @endif
                        <div class="p-4">
                            <a class="h5 text-decoration-none" href="{{ url('detail') . '/' . $item->objek_id }}">{{ $item->name }}</a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ url('detail') . '/' . $item->objek_id }}" class="btn btn-primary">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Packages End -->


@endsection

@push('third_party_scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    // Smooth scrolling when clicking on navigation links
    document.querySelectorAll('#navbar a').forEach(anchor => {
      anchor.addEventListener('click', function(e) {
        e.preventDefault();
        
        const targetId = this.getAttribute('href').substring(1);
        const targetSection = document.getElementById(targetId);
        const topPos = targetSection.offsetTop;
        
        window.scrollTo({
            top: topPos,
            behavior: 'smooth' // Smooth scrolling behavior
        });
      });
    });
  </script>
@endpush