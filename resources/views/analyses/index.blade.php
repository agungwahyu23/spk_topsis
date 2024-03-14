@extends('layouts.app')

@section('title')
    Perhitungan
@endsection

@section('content')
    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('analyses.table')
        </div>
    </div>

@endsection
