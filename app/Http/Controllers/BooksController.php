<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    
    public function store(){

        $data = request()->validate([
            'title' => 'required',
            'author' => 'required',
        ]);

        Book::create($data);
    }

    public function update(Book $book){

        $data = request()->validate([
            'title' => 'required',
            'author' => 'required',
        ]);

        $book->update($data);
    }

}
