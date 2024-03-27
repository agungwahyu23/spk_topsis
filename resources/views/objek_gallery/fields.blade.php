<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Kode:') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('thumbnail', 'Thumbnail:') !!}
    <input class="form-control mb-4" type="file" name="thumbnail" id="product-image-1" />

    @if (isset($objek) && isset($objek->thumbnail))
        <img src="{{ asset('/media/' . $objek->thumbnail) }}" alt="" id="image-1" width="200px" height="200px" style="object-fit: contain" />
    @else
        <img src="{{ asset('images/blank.png') }}" alt="" id="image-1" width="200px" height="200px" style="object-fit: contain" />
    @endif
</div>

<div class="form-group col-sm-12">
<label for="desc">Deskripsi</label>
{!! Form::textarea('description', null, ['class' => 'form-control', 'id'=>'editor']) !!}
</div>

@push('third_party_scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

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
@endpush