@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Common part of posts</h1>
                @foreach($posts_data as $item)
                    <h1>{{$item->title}}</h1>
                    <p>{{$item->content}}</p>
                    <p>created by {{$item->user_name}}</p>
                    <hr>
                @endforeach
            </div>

            <!-- Pager -->
            <div class="col-md-7 col-md-offset-3">
                {!! $posts_data->render() !!}
            </div>
        </div>
    </div>
@endsection