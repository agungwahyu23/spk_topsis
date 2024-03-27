@extends('layouts.app')

@section('title')
    Tambah Objek Wisata
@endsection

@section('content')
    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'objeks.store', 'enctype'=>"multipart/form-data"]) !!}
            <div class="card-body">
                <div class="row">
                    @include('objeks.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('objeks.index') }}" class="btn btn-secondary"> Batal </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection