@extends('layouts.app')

@section('title')
    Perhitungan
@endsection

@section('content')
<section class="content-header">
    <div class="row mb-2 text-start">
        <div class="col-sm-12">
            <form action="{{ 'calculate_topsis' }}" method="post" enctype="multipart/form-data">
                @csrf
                <button type="submit" class="btn btn-primary float-left">
                    Hitung Topsis
                </button>
            </form>
        </div>
    </div>
</section>

<div class="content px-3">

    @include('flash::message')

    <div class="clearfix"></div>

    <div class="card">

        <div class="card-header">
            <h5>Hasil Pembagi</h5>
        </div>

        <div class="card-body px-4">
            <div class="table-responsive">
                <table id="tabel_data" class="table table-striped table-bordered" width="100%">
                    <thead>
                        <tr>
                            @foreach ($hasilPembagi as $item)
                                <th>{{ $item->criteria_name }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($hasilPembagi as $item)
                                <td>{{ round($item->value, 3) }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection