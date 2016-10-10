@if(Session::has("message"))
    <div class="alert {{ Session::get("alert-class", "alert-info") }}">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ Session::get("message") }}
    </div>
@endif
