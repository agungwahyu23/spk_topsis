@extends('layouts.app')

@section('title')
    Kriteria
@endsection

@section('content')
    <section class="content-header">
        <div class="row mb-2 text-end">
            <div class="col-sm-12">
                <a class="btn btn-primary float-right"
                   href="{{ route('criterias.create') }}">
                    Tambah Baru
                </a>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('criterias.table')
        </div>
    </div>

@endsection
