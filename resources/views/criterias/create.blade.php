@extends('layouts.app')

@section('title')
    Tambah Kriteria
@endsection

@section('content')
    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'criterias.store']) !!}
            <div class="card-body">
                <div class="row">
                    @include('criterias.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('criterias.index') }}" class="btn btn-secondary"> Batal </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
