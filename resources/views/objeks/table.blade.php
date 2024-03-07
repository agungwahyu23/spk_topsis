@push('third_party_stylesheets')
    @include('layouts.datatables_css')
@endpush

<div class="card-body px-4">
    {!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']) !!}
</div>

@push('third_party_scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}

    <script type="text/javascript">
        @php
            $tableId = $dataTable->getTableAttribute('id');
        @endphp
    
        $("#filter-input").on("keyup", function (t) {
            if (t.keyCode === 13) {
            window.LaravelDataTables["{{$tableId}}"].search(t.target.value).draw();
           }
        });
    
        $('#{{ $tableId }}').on('click', '.btn-delete', function(e) {
            console.log("aaa");
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

                                Swal.fire('Informasi',
                                    'data berhasil dihapus.',
                                    'success');
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
