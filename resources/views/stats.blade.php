@extends("layouts.app")

@inject("Type", "App\Models\Type")

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">@if(isset($title)) {{ $title }} @endif</div>

                <div class="panel-body">
                    <div class="col-md-6">
                        <div id="stat" data-url="{{ route("stats.json") }}"></div>
                    </div>
                    <div class="col-md-6">
                        <div id="stat-2"></div>
                    </div>
                    <div class="col-md-6">
                        <div id="stat-3"></div>
                    </div>
                    <div class="col-md-6">
                        <div id="stat-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section("js")
    {!! Html::script("https://code.highcharts.com/highcharts.js") !!}
    {!! Html::script("js/stats.js") !!}
@endsection
