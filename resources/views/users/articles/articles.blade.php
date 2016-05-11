@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

        @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <a href="{{action('HomeController@create') }}" class="btn btn-success">CREATE</a>

        <div class="table-responsive">

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>CONTENT</th>
                        <th>ACTION</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($articles_data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->content }}</td>
                        <td><a href="{{ action('HomeController@edit',['articles'=>$item->id]) }}" class="btn btn-warning">EDIT</a></td>
                        <td>
                            <form method="POST" action="{{action('HomeController@destroy',['articles'=>$item->id])}}">
                                <input type="hidden" name="_method" value="delete"/>
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <input type="submit" value="DELETE" class="btn btn-danger"/>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
@stop