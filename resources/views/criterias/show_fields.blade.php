<!-- Code Field -->
<div class="col-sm-12">
    {!! Form::label('code', 'Code:') !!}
    <p>{{ $criteria->code }}</p>
</div>

<!-- Criteria Name Field -->
<div class="col-sm-12">
    {!! Form::label('criteria_name', 'Criteria Name:') !!}
    <p>{{ $criteria->criteria_name }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $criteria->status }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $criteria->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $criteria->updated_at }}</p>
</div>

