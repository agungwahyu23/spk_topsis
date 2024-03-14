@if (count($sub_criteria))
    @foreach ($sub_criteria as $item)       
        <div class="form-group col-sm-4" hidden>
            {!! Form::label('id', 'ID:') !!}
            {!! Form::text('id[]', isset($item->id) ? $item->id : null, ['class' => 'form-control']) !!}
        </div>

        <!-- Description Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('description', 'Deskripsi:') !!}
            {!! Form::text('description[]', isset($item->description) ? $item->description : null, ['class' => 'form-control']) !!}
        </div>

        <!-- Value Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('value', 'Bobot:') !!}
            {!! Form::text('value[]', isset($item->value) ? $item->value : null, ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group col-sm-2">
            {{-- {!! Form::label('action', 'Aksi') !!} --}}
            <a href="javascript:void(0);" class="mt-4 form-control btn btn-sm font-sm btn-danger rounded btn-delete" data-remote="{{ route('subCriterias.destroy', $item->id) }}"> <i class="mdi mdi-trash-can-outline"></i> </a>
        </div>
    @endforeach
@endif
