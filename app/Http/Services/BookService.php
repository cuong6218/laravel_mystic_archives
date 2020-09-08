<?php


namespace App\Http\Services;


use App\Book;
use App\Http\Repositories\BookRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookService
{
    protected $bookRepo;

    public function __construct(BookRepository $bookRepo)
    {
        $this->bookRepo = $bookRepo;
    }

    public function getAll()
    {
        return $this->bookRepo->getAll();
    }
    public function all()
    {
        return $this->bookRepo->all();
    }
    public function store(Request $request)
    {
        $book = new Book();
        $data = $request->all();
        //upload file
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $data['image'] = $path;
            // fill data
            $book->fill($data);
            $this->bookRepo->save($book);
            $book->types()->sync($request->type);
        }
    }

    public function getBook($id)
    {
        return $this->bookRepo->getBook($id);
    }

    public function update(Request $request, $id)
    {
        $book = $this->bookRepo->getBook($id);
        $data = $request->all();
        //update image
        if ($request->hasFile('image')) {
            // delete current image
            $currentImg = $book->image;
            if ($currentImg) {
                Storage::delete('/public/' . $currentImg);
            }
            //update new image
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $data['image'] = $path;
        }

        // fill data
        $book->fill($data);
        $this->bookRepo->save($book);
        $book->types()->sync($request->type);
    }

    public function destroy($id)
    {
        $book = $this->bookRepo->getBook($id);
        $book->types()->detach();
        $this->bookRepo->destroy($id);
    }

    public function search(Request $request)
    {
        $option = $request->checkbook;
        switch ($option)
        {
            case 'name':
                return $this->bookRepo->searchName($request);
                break;
            case 'author':
                return $this->bookRepo->searchAuthor($request);
                break;
            default:
                return 'Book not found';
        }
    }
}
