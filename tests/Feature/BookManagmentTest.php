<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookManagmentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_book_can_bew_added_to_the_library(){
        
        $this->withoutExceptionHandling();

        $response = $this->post('/books', [
            'title' => 'Cool Book Title',
            'author' => 'Victor',
        ]);
        
        $book = Book::first();
        $this->assertCount(1,Book::all());
        $response->assertRedirect('/books/' . $book->id);
        

    }
     /** @test */
     public function a_title_is_required(){
        
        // $this->withoutExceptionHandling();

        $response = $this->post('/books', [
            'title' => '',
            'author' => 'Victor',
        ]);

        $response->assertSessionHasErrors('title');

    }
     /** @test */
     public function a_author_is_required(){
        
        // $this->withoutExceptionHandling();

        $response = $this->post('/books', [
            'title' => 'Cool Title',
            'author' => '',
        ]);

        $response->assertSessionHasErrors('author');

    }

     /** @test */
     public function a_book_can_be_update(){
        
        // $this->withoutExceptionHandling();
        $this->post('/books', [
            'title' => 'Cool Title',
            'author' => 'Victor',
        ]);

        $book = Book::first();

        $response = $this->patch('/books/' . $book->id, [
            'title' => 'New Title',
            'author' => 'New Author',
        ]);

        $this->assertEquals('New Title' , Book::first()->title);
        $this->assertEquals('New Author' , Book::first()->author);
        $response->assertRedirect('/books' . $book->id);
    }

    /** @test */
    public function a_book_can_be_deleted(){

        $this->withoutExceptionHandling();

        $this->post('/books',[
            'title' => 'Cool title',
            'author' => 'Abhi',
        ]);

        $book = Book::first();
        $this->assertCount(1,Book::all());
        $response = $this->delete('/books/'. $book->id);
        $this->assertCount(0,Book::all());
        $response->assertRedirect('/books');
    }
}
