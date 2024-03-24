@extends('layouts.app')

@section('title')
Edit Penilaian
@endsection

@section('content')

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            <div class="card-header">
                Objek: {{ $analysis->alternatif->objek->name }}
            </div>

            {!! Form::model($analysis, ['route' => ['analyses.update', $analysis->alternative_id], 'method' => 'patch']) !!}

            <input type="hidden" name="alternative_id" value="{{ $analysis->alternative_id }}" />
            <div class="card-body">
                <div class="row">
                    @include('analyses.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('analyses.index') }}" class="btn btn-default"> Cancel </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
