@extends("layouts.app")

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">@if(isset($title)) {{ $title }} @endif</div>

                <div class="panel-body">
                    @if(!is_null($fields))
                        @if(isset($title))
                            <h2>{{ $title }}</h2>
                        @endif

                        {!! Form::open(["url" => $submit_route, "class" => "form-horizontal"]) !!}

                        @php($class = "form-control")

                        @foreach($fields as $field)
                            <div class="form-group">
                                {{ Form::label($field["id"], $field["title"], ["class" => "col-md-4 control-label"]) }}

                                <div class="col-md-6">
                                    @php(isset($field["type"]) ? $type = $field["type"] : $type = "text")

                                    {{ Form::$type($field["id"], $field["value"]($dataset), ["class" => $class]) }}
                                </div>
                            </div>
                        @endforeach

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">@lang("general.send")</button>
                        </div>

                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
