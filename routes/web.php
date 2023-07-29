<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books', [BookController::class, 'index'])->name('books.index');

Route::get('/books/create', [BookController::class, 'create'])->name('books.create');

// store 요청은 form 을 통해 post 로 옵니다.
Route::post('/books/store', [BookController::class, 'store'])->name('books.store');

Route::get('books/{book}', [BookController::class, 'show'])->name("books.show");

// 수정 페이지
Route::get('books/{book}/edit', [BookController::class, 'edit'])->name("books.edit");

// Laravel에서 업데이트의 대한 메서드로는 Patch 또는 Put을 권장합니다.
Route::patch('books/{book}', [BookController::class, 'update'])->name('books.update');

Route::delete('books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
