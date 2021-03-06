<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-url="{{ url("/") }}/{{ $route_name }}/delete/">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">@lang("general.delete")</h4>
            </div>
            <div class="modal-body">
                @if($route_name === "source")
                    @lang("general.source_delete_warning")
                    <br><br>
                @endif

                @lang("general.really_delete") <strong></strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">@lang("general.no")</button>
                <button id="delete-confirm" type="button" class="btn btn-danger">@lang("general.yes")</button>
            </div>
        </div>
    </div>
</div>

@section("js")
    {!! Html::script("js/delete.js") !!}
@endsection
