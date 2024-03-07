@extends('layouts.base_layout')

@section('content')
<div class="col-md-4 stretch-card grid-margin">
    <div class="card bg-gradient-danger card-img-holder text-white">
        <div class="card-body">
            <img src="{{ asset('images/dashboard/circle.svg') }}" class="card-img-absolute"
                alt="circle-image" />
            <h3 class="font-weight-normal mb-3">Total Pesanan <i
                    class="mdi mdi-chart-line mdi-24px float-right"></i>
            </h3>
            <h2 class="mb-5">10</h2>
        </div>
    </div>
</div>
<div class="col-md-4 stretch-card grid-margin">
    <div class="card bg-gradient-info card-img-holder text-white">
        <div class="card-body">
            <img src="{{ asset('images/dashboard/circle.svg') }}" class="card-img-absolute"
                alt="circle-image" />
            <h3 class="font-weight-normal mb-3">Pesanan Diproses <i
                    class="mdi mdi-truck-fast mdi-24px float-right"></i>
            </h3>
            <h2 class="mb-5">10</h2>
        </div>
    </div>
</div>
<div class="col-md-4 stretch-card grid-margin">
    <div class="card bg-gradient-success card-img-holder text-white">
        <div class="card-body">
            <img src="{{ asset('images/dashboard/circle.svg') }}" class="card-img-absolute"
                alt="circle-image" />
            <h3 class="font-weight-normal mb-3">Pesanan Selesai <i
                    class="mdi mdi-briefcase-check mdi-24px float-right"></i>
            </h3>
            <h2 class="mb-5">10</h2>
        </div>
    </div>
</div>
@endsection