@extends('layouts.app')

@section('title')
Edit Objek Wisata
@endsection

@section('content')

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($objek, ['route' => ['objeks.update', $objek->id], 'method' => 'patch', 'enctype'=>"multipart/form-data"]) !!}

            <div class="card-body">
                <div class="row">
                    @include('objeks.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('objeks.index') }}" class="btn btn-default"> Cancel </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
