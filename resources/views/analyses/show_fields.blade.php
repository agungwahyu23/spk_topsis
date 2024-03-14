<!-- Alternative Id Field -->
<div class="col-sm-12">
    {!! Form::label('alternative_id', 'Alternative Id:') !!}
    <p>{{ $analysis->alternative_id }}</p>
</div>

<!-- Criteria Id Field -->
<div class="col-sm-12">
    {!! Form::label('criteria_id', 'Criteria Id:') !!}
    <p>{{ $analysis->criteria_id }}</p>
</div>

<!-- Sub Criteria Id Field -->
<div class="col-sm-12">
    {!! Form::label('sub_criteria_id', 'Sub Criteria Id:') !!}
    <p>{{ $analysis->sub_criteria_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $analysis->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $analysis->updated_at }}</p>
</div>

