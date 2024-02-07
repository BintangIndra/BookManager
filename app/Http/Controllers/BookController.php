<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'title' => 'required',
            'isbn' => 'required|unique:books',
        ]);

        // Create new book
        $book = Book::create($request->except('author'));
        if(Auth::user()->isAdmin()){
            foreach($request->input('author') as $autho){
                if (!$book->authors()->where('author_id', $autho)->exists()) {
                    $book->authors()->attach(intval($autho));
                }
            }
        }

        return redirect()->route('books.index')->with('success', 'Book created successfully');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('books.edit', compact('book','authors'));
    }

    public function update(Request $request, Book $book)
    {
        // Validate request data
        $request->validate([
            'title' => 'required',
            'isbn' => 'required|unique:books,isbn,'.$book->id,
        ]);

        // Update book
        $book->update($request->except('author'));
        if(Auth::user()->isAdmin()){
            foreach($request->input('author') as $autho){
                if (!$book->authors()->where('author_id', $autho)->exists()) {
                    $book->authors()->attach(intval($autho));
                }
            }
        }

        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }

    public function destroy(Book $book)
    {
        // Delete book
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }
}