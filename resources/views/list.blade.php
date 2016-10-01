@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    @if(!is_null($dataset))
                        @if(isset($title))
                            <h2>{{ $title }}</h2>
                        @endif

                        <table class="table table-striped table-hover table-responsive">
                            <thead>
                                @foreach($columns as $column)
                                    <th>{{ $column["title"] }}</th>
                                @endforeach
                            </thead>
                            <tbody>
                                @foreach($dataset as $data)
                                    <tr>
                                        @foreach($columns as $column)
                                            <td>{!! $column["value"]($data) !!}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="text-center">
                            {{ $dataset->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
