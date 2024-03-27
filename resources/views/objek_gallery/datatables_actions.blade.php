<div class='btn-group'>

    <a href="{{ route('objeks.edit', $id) }}" class="btn btn-sm font-sm btn-warning rounded mx-1"> <i
            class="mdi mdi-square-edit-outline"></i></a>

        <a href="{{ route('objekGallery.edit', $id) }}" class="btn btn-sm font-sm btn-primary rounded mx-1"> <i
                class="mdi mdi-file-image"></i></a>

    <a href="javascript:void(0);" class="btn btn-sm font-sm btn-danger rounded btn-delete mx-1" id="btn-delete"
        data-remote="{{ route('objeks.destroy', $id) }}"> <i class="mdi mdi-trash-can-outline"></i> </a>

</div>
