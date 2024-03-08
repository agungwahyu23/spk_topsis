<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Pilih Objek:') !!}
    {!! Form::select('objek_id', $objek, null, ['class' => 'form-control select2']) !!}
</div>