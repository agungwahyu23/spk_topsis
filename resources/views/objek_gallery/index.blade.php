@extends('layouts.app')
@push('third_party_stylesheets')
    @include('layouts.datatables_css')
@endpush

@section('title')
    Galeri Wisata
@endsection

@section('content')

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        {!! Form::open(['route' => 'objekGallery.store', 'enctype'=>"multipart/form-data"]) !!}
        {!! Form::hidden('objek_id', $objek->id) !!}
        <div class="card mb-4">
            <div class="card-header">
                <h5>Tambah galeri</h5>
            </div>
            <div class="card-body px-4">
                <div class="row">
                    <div class="form-group col-sm-6">
                        {!! Form::label('title', 'Title:') !!}
                        {!! Form::text('title', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('image', 'Upload Gambar:') !!}
                        <input class="form-control mb-4" type="file" name="image" id="product-image-1" />

                        <img src="{{ asset('images/blank.png') }}" alt="" id="image-1" width="100px" height="100px" style="object-fit: contain" />
                    </div>
                </div>
            </div>
            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}

        <div class="card">
            <div class="card-body px-4">
                <div class="table-responsive">
                    <table id="tabel_data" class="table table-striped table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gallery as $item)    
                                <tr class="table-striped">
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        <img src="{{ asset('/media/' . $item->image) }}" alt="" width="200px" height="200px" style="object-fit: cover; width: 100px; height: 100px">
                                    </td>
                                    <td>
                                        <button class="btn btn-sm font-sm btn-danger rounded btn-delete mx-1" id="btn-delete" onclick="deleteImage({{ $item->id }})"
                                        data-remote="{{ route('objekGallery.destroy', $item->id) }}"> 
                                        <i class="mdi mdi-trash-can-outline"></i> 
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('third_party_scripts')
@include('layouts.datatables_js')
<script>
    $('#product-image-1').change(function() {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function(event) {
                console.log(event.target.result);
                $('#image-1').attr('src', event.target.result);
            }
            reader.readAsDataURL(file);
        }
    });
</script>

<script>
    function deleteImage(id) {
        var url = "{{ route('objekGallery.destroy', ':id') }}";
        url = url.replace(':id', id);

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
                $.ajax({
                    url: url,
                    method: 'DELETE',
                    data : { '_method':'delete' },
                    contentType: 'application/json',
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                    success: function(result) {
                        Swal.fire({
                            title: 'Informasi',
                            text: 'Data berhasil dihapus.',
                            icon: 'success',
                            didClose: function () {
                                window.location.reload(); // Memuat ulang halaman saat dialog ditutup
                            }
                        });
                    },
                    error: function(request,msg,error) {
                        // handle failure
                    }
                });
            };
        });
    }
</script>
@endpush