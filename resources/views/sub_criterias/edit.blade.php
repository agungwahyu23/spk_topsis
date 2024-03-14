@extends('layouts.app')

@section('title')
Edit Sub Kriteria
@endsection

@section('content')

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($criteria, ['route' => ['subCriterias.update', $criteria->id], 'method' => 'patch']) !!}

            <div class="card-header">
                Kriteria {{ $criteria->criteria_name }}
            </div>
            <div class="card-body">
                <div class="row">
                    @include('sub_criterias.fields_edit')
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

@push('third_party_scripts')
@include('layouts.datatables_js')
<script>
    $('.btn-delete').on('click', function(e) {
        e.preventDefault();

        var url = $(this).data('remote');
        console.log(url);
        var trclose = $(this).closest("tr");
        trclose.addClass('table-danger');

        Swal.fire({
            title: "Apa Anda Yakin?",
            text: "Menghapus data ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Tidak ",
        }).then(function (data) {
            if (data.isConfirmed) {

                trclose.fadeOut(1000,
                    function() {
                        trclose.remove();
                    });

                $.ajax({
                    url: url,
                    method: 'DELETE',
                    data : { '_method':'delete' },
                    contentType: 'application/json',
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                    success: function(result) {
                        if (result) {
                            Swal.fire({
                                title: 'Informasi',
                                text: 'Data berhasil dihapus.',
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Redirect or reload the page here
                                    window.location.reload(); // Reload current page
                                    // Alternatively, you can redirect to another page like this:
                                    // window.location.href = '/your/target/route';
                                }
                            });
                        }

                    },
                    error: function(request,msg,error) {
                        // handle failure
                    }
                });
            };
            trclose.removeClass('table-danger');
        });
    });
</script>
@endpush
