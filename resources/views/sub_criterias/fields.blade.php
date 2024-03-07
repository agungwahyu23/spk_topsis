<!-- Criteria Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('criteria_id', 'Kriteria:') !!}
    {!! Form::select('criteria_id', $criteria, null, ['class' => 'form-control select2']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Deskripsi:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value', 'Bobot:') !!}
    {!! Form::text('value', null, ['class' => 'form-control']) !!}
</div>