<?php


namespace App\Http\Repositories;


use App\Book;
use Illuminate\Http\Request;

class BookRepository
{
    protected $book;
    public function __construct(Book $book)
    {
        $this->book = $book;
    }
    public function getAll()
    {
        return $this->book->select('*')->orderBy('id', 'desc')->paginate(5);
    }
    public function all()
    {
        return $this->book->all();
    }
    public function save($book)
    {
        $book->save();
    }
    public function getBook($id)
    {
        return $this->book->findOrFail($id);
    }
    public function destroy($id)
    {
        $this->book->destroy($id);
    }
    public function searchName(Request $request)
    {
        $keyword = $request->keyword;
        return Book::where('name', 'LIKE', '%'.$keyword.'%')->paginate(5);
    }
    public function searchAuthor(Request $request)
    {
        $keyword = $request->keyword;
        return Book::where('author', 'LIKE', '%'.$keyword.'%')->paginate(5);
    }
}
