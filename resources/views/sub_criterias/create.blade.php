@extends('layouts.app')

@section('title')
    Tambah Sub Kriteria
@endsection

@section('content')
    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'subCriterias.store']) !!}
            <div class="card-body">
                <div class="row">
                    @include('sub_criterias.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('subCriterias.index') }}" class="btn btn-secondary"> Batal </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
