<?php

use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route for the books 

Route::post('/books','\App\Http\Controllers\BooksController@store');

Route::patch('/books/{book}','\App\Http\Controllers\BooksController@update');

Route::delete('/books/{book}','\App\Http\Controllers\BooksController@destroy');


// routes for the authors 

Route::post('/authors','\App\Http\Controllers\AuthorController@store');

