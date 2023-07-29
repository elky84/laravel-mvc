@extends('books.layout')
@section('content')
    <h2 class="mt-4 mb-3">book Edit</h2>

    {{-- 유효성 검사에 걸렸을 경우 --}}
    @if ($errors->any())
        <div class="alert alert-warning" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('books.update',$book)}}" method="post">
        {{-- 라라벨은 CSRF로 부터 보호하기 위해 데이터를 등록할 때의 위조를 체크 하기 위해 아래 코드가 필수 --}}
        @csrf
        {{-- 라라벨 patch 메서드 사용 --}}
        @method('patch')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" autocomplete="off" value="{{$book->name}}">
        </div>
        <div class="mb-3">
            <label for="url" class="form-label">Url</label>
            <textarea rows="10" cols="40" name="url" class="form-control" id="name" autocomplete="off">{{$book->url}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{route("books.index")}}">
            <button type="button" class="btn btn-primary">Cancel</button>
        </a>
    </form>
@endsection