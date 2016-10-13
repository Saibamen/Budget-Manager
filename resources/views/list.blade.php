@extends("layouts.app")

@inject("Type", "App\Models\Type")

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">@if(isset($title)) {{ $title }} @endif</div>

                <div class="panel-body">
                    @include("layouts.messages")

                    @if(!is_null($dataset))
                        @if(isset($title))
                            <h2>{{ $title }}</h2>
                        @endif

                        <table class="table table-striped table-hover table-responsive">
                            <thead>
                                <tr class="active">
                                    @foreach($columns as $column)
                                        <th>{{ $column["title"] }}</th>
                                    @endforeach

                                    <th>@lang("general.actions")</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dataset as $data)
                                    @php
                                        if(isset($data->type_id)) {
                                            $data->type_id === $Type::INCOME ? $color_class = "success" : $color_class = NULL;
                                            $data->type_id === $Type::EXPENDITURE ? $color_class = "danger" : NULL;
                                        }
                                    @endphp

                                    <tr class="{{ $color_class or NULL }}">
                                        @foreach($columns as $column)
                                            <td>{!! $column["value"]($data) !!}</td>
                                        @endforeach

                                        {{-- Akcje --}}
                                        <td>
                                            @if(($is_actions_restricted && $data->user_id === Auth::User()->id) || !$is_actions_restricted)
                                                {{ Html::link(route($route_name . ".editform", $data->id), trans("general.edit"), ["class" => "btn btn-sm btn-primary"]) }}
                                                {{ Form::button(trans("general.delete"), ["class" => "btn btn-sm btn-danger", "data-toggle" => "modal", "data-target" => "#delete-modal", "data-id" => $data->id, "data-name" => $data->name]) }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="text-center">
                            @if($dataset->total() > $dataset->perPage())
                                {{ $dataset->links() }}
                                <br>
                            @endif

                            <a href="{{ route($route_name . ".addform") }}" class="btn btn-success" role="button"><i class="fa fa-plus"></i> @lang("general.add")</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@include("deletemodal")

@endsection
