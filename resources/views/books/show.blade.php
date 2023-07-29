@extends('books.layout')

@section('content')
    <h2 class="mt-4 mb-3">Book View: {{$book->name}}</h2>
    <p style="text-align: right" class="pt-2">{{$book->created_at}}</p>

    <div class="content mt-4 rounded-3 border border-secondary">
        Url:
        <div class="p-3">
            {{$book->url}}
        </div>
    </div>
@endsection