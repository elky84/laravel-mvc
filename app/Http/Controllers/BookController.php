<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private $book;

    public function __construct(book $book){
        $this->book = $book;
    }

    public function create(){
        return view('books.create');
    }

    public function store(Request $request)
    {
        // Request 에 대한 유효성 검사입니다, 다양한 종류가 있기에 공식문서를 보시는 걸 추천드립니다.
        // 유효성에 걸린 에러는 errors 에 담깁니다.
        $request = $request->validate([
            'name' => 'required',
            'url' => 'required'
        ]);
        $this->book->create($request);
        return redirect()->route('books.index');
    }

    public function index(){
        $books = $this->book->latest()->paginate(10);
        return view('books.index', compact('book')); //
    }

    // 상세 페이지
    public function show(book $book){
	// show 에 경우는 해당 페이지의 모델 값이 파라미터로 넘어옵니다.
        return view('books.show', compact('book'));
    }
}