<?php
namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'name' => 'required',
        ]);

        // Create new author
        Author::create($request->all());

        return redirect()->route('authors.index')->with('success', 'Author created successfully');
    }

    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        // Validate request data
        $request->validate([
            'name' => 'required',
        ]);

        // Update author
        $author->update($request->all());

        return redirect()->route('authors.index')->with('success', 'Author updated successfully');
    }

    public function destroy(Author $author)
    {
        // Delete author
        $author->delete();

        return redirect()->route('authors.index')->with('success', 'Author deleted successfully');
    }
}