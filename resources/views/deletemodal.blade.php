<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-url="{{ url("/") }}/{{ $route_name }}/delete/{{ $data->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">@lang("general.delete")</h4>
            </div>
            <div class="modal-body">
                Czy na pewno chcesz usunąć <b></b> ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">@lang("general.no")</button>
                <button type="button" class="btn btn-danger">@lang("general.yes")</button>
            </div>
        </div>
    </div>
</div>

@section("js")

@endsection
