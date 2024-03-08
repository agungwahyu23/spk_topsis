@extends('layouts.app')

@section('title')
    Tambah Alternatif
@endsection

@section('content')
    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'alternatives.store']) !!}
            <div class="card-body">
                <div class="row">
                    @include('alternatives.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('alternatives.index') }}" class="btn btn-secondary"> Batal </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
