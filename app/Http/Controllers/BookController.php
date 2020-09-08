<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookRequest;
use App\Http\Services\BookService;
use App\Http\Services\TypeService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $bookService;
    protected $typeService;
    public function __construct(BookService $bookService, TypeService $typeService)
    {
        $this->bookService = $bookService;
        $this->typeService = $typeService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->bookService->getAll();
        return view('tables.books.list', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = $this->typeService->all();
        return view('tables.books.add', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBookRequest $request)
    {
        $this->bookService->store($request);
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = $this->typeService->getAll();
        $book = $this->bookService->getBook($id);
        return view('tables.books.update', compact('book', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateBookRequest $request, $id)
    {
        $this->bookService->update($request, $id);
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->bookService->destroy($id);
        return redirect()->route('books.index');
    }
    public function search(Request $request)
    {
        $books = $this->bookService->search($request);
        return view('tables.books.list', compact('books'));
    }
}
