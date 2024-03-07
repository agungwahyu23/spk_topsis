@extends('layouts.app')

@section('title')
Edit Sub Kriteria
@endsection

@section('content')

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($subCriteria, ['route' => ['subCriterias.update', $subCriteria->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('sub_criterias.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('subCriterias.index') }}" class="btn btn-default"> Batal </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
