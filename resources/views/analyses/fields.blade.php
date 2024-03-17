@foreach ($subKriteria->unique('criteria_id') as $item)

<div class="form-group col-sm-6">
    <label for="criteria_id">Sub Kriteria: {{ $item->kriteria->criteria_name }}</label>
    <select name="criteria_id[]" id="criteria_id[]" class="form-select select2">
        <option value="">Pilih</option>
        
        @foreach ($subKriteria->where('criteria_id', $item->criteria_id) as $value)

            @if (isset($data2->where('criteria_id', $item->criteria_id)->first()->sub_criteria_id))
                @php
                    $sub_criteria_id = $data2->where('criteria_id', $item->criteria_id)->first()->sub_criteria_id;
                @endphp

                @if ($value->id == $sub_criteria_id)
                    <option value="{{ $value->id }}" selected>{{ $value->value ." - ". $value->description }}</option>
                @else
                    <option value="{{ $value->id }}">{{ $value->value ." - ". $value->description }}</option>
                @endif
            @else
                <option value="{{ $value->id }}">{{ $value->value ." - ". $value->description }}</option>
            @endif

        @endforeach

    </select>
</div>

@endforeach