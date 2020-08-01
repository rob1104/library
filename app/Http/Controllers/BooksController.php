<?php

namespace App\Http\Controllers;

use App\Book;

class BooksController extends Controller
{
    public function store()
    {
        $book = Book::create($this->validateRequest());
        return redirect('/books/' . $book->id);
    }

    public function update(Book $book)
    {
        $book->update($this->validateRequest());
        return redirect('/books/' . $book->id);
    }

    /**
     * @return mixed
     */
    protected function validateRequest()
    {
        return request()->validate([
            'title' => 'required',
            'author' => 'required'
        ]);
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/books');
    }

}
