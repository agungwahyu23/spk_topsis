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

    {{-- matriks ternormalisasi --}}
    <div class="card mt-4">
        <div class="card-header">
            <h5>Matriks Ternormalisasi</h5>
        </div>
        <div class="card-body px-4">
            <div class="table-responsive">
                <table id="tabel_data" class="table table-striped table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            @foreach ($matriksNormalisasi->unique('criteria_id') as $item)
                                <th>{{ $item->criteria_name }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($matriksNormalisasi->unique('alternative_id') as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    @foreach ($matriksNormalisasi->where('alternative_id', $item->alternative_id) as $value)
                                        <td>
                                            {{ round($value->value, 3) }}
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- bobot ternormalisasi --}}
    <div class="card mt-4">
        <div class="card-header">
            <h5>Bobot Ternormalisasi</h5>
        </div>
        <div class="card-body px-4">
            <div class="table-responsive">
                <table id="tabel_data" class="table table-striped table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            @foreach ($bobotTernormalisasi->unique('criteria_id') as $item)
                                <th>{{ $item->criteria_name }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($bobotTernormalisasi->unique('alternative_id') as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    @foreach ($bobotTernormalisasi->where('alternative_id', $item->alternative_id) as $value)
                                        <td>
                                            {{ round($value->value, 3) }}
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Tabel Ideal Positif --}}
    <div class="card mt-4">
        <div class="card-header">
            <h5>Ideal Positif (A<sup>+</sup>)</h5>
        </div>
        <div class="card-body px-4">
            <div class="table-responsive">
                <table id="tabel_data" class="table table-striped table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            @foreach ($idealPositif->unique('criteria_id') as $item)
                                <th>{{ $item->criteria_name }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($idealPositif->unique('alternative_id') as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    @foreach ($idealPositif->where('alternative_id', $item->alternative_id) as $value)
                                        <td>
                                            {{ number_format($value->value, 6) }}
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Tabel Ideal Negative --}}
    <div class="card mt-4">
        <div class="card-header">
            <h5>Ideal Negative (A<sup>-</sup>)</h5>
        </div>
        <div class="card-body px-4">
            <div class="table-responsive">
                <table id="tabel_data" class="table table-striped table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            @foreach ($idealNegative->unique('criteria_id') as $item)
                                <th>{{ $item->criteria_name }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($idealNegative->unique('alternative_id') as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    @foreach ($idealNegative->where('alternative_id', $item->alternative_id) as $value)
                                        <td>
                                            {{ number_format($value->value, 6) }}
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection