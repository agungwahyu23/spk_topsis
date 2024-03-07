<div class='btn-group'>

    <a href="{{ route('subCriterias.edit', $id) }}" class="btn btn-sm font-sm btn-warning rounded mx-1"> <i
            class="mdi mdi-square-edit-outline"></i></a>

    <a href="javascript:void(0);" class="btn btn-sm font-sm btn-danger rounded btn-delete" id="btn-delete"
        data-remote="{{ route('subCriterias.destroy', $id) }}"> <i class="mdi mdi-trash-can-outline"></i> </a>

</div>
