@extends('layouts.app')

@section('title')
    Penilaian
@endsection

@section('content')
    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">

            <div class="card-body px-4">
                <div class="table-responsive">
                    <table id="tabel_data" class="table table-striped table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                @foreach ($data->unique('criteria_id') as $item)
                                    <th>{{ $item->kriteria->criteria_name }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->unique('alternative_id') as $item)
                                <tr class="table-striped">
                                    <td>
                                        {{ $item->alternatif->objek->name }}
                                        <a href="{{ route('analyses.edit', $item->alternative_id) }}" class="btn btn-xs font-sm rounded mx-1"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    </td>
                                    @foreach ($data->where('alternative_id', $item->alternative_id) as $value)
                                        <td class="table-striped">
                                            @if ($value->subKriteria != null) 
                                            {{ $value->subKriteria->description }} 
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
