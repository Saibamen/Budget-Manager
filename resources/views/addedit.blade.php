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

                        @if($dataset->id)
                            {!! Form::model($dataset, ["url" => $submit_route, "class" => "form-horizontal"]) !!}
                        @else
                            {!! Form::open(["url" => $submit_route, "class" => "form-horizontal"]) !!}
                        @endif

                        @php($optional_attributes = ["class" => "form-control" ])

                        @foreach($fields as $field)
                            <div class="form-group{{ $errors->has($field["id"]) ? " has-error" : "" }}">
                                {{ Form::label($field["id"], $field["title"], ["class" => "col-md-4 control-label"]) }}

                                {{-- Autofocus na pierwsze pole w formularzu --}}
                                @if($loop->first)
                                    @php($optional_attributes = array_merge($optional_attributes, ["autofocus" => "autofocus"]))
                                @endif

                                @if(isset($field["optional"]))
                                    @php($optional_attributes = array_merge($optional_attributes, $field["optional"]))
                                @endif

                                <div class="col-md-6">
                                    @php(isset($field["type"]) ? $type = $field["type"] : $type = "text")

                                    @if($type === "select")
                                        {{ Form::$type($field["id"], $field["selectable"], $field["value"]($dataset), $optional_attributes) }}
                                    @else
                                        {{ Form::$type($field["id"], $field["value"]($dataset), $optional_attributes) }}
                                    @endif

                                    @if($errors->has($field["id"]))
                                        <span class="help-block">
                                            <strong>{{ $errors->first($field["id"]) }}</strong>
                                        </span>
                                    @endif
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
