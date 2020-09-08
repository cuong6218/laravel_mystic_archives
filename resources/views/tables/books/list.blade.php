@extends('dashboard.base')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <a href="{{Route('books.create')}}" class="btn btn-primary mt-3 mb-3"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path></svg>&nbsp;
                    Add</a>
            </div>
            <div class="row">
            <div class="col-md-12 mt-3 mb-3">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Hide/Show</button>
                <div class="dropdown-menu">
                    <a class="dropdown-item">
                        <!-- Default unchecked -->
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="checkbox1" checked>
                            <label class="custom-control-label" id="show-hide-name" for="checkbox1">Name</label>
                        </div>
                    </a>
                    <a class="dropdown-item" href="#">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="checkbox2" checked>
                            <label class="custom-control-label" id="show-hide-type" for="checkbox2">Type</label>
                        </div>
                    </a>
                    <a class="dropdown-item" href="#">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="checkbox2" checked>
                            <label class="custom-control-label" id="show-hide-author" for="checkbox2">Author</label>
                        </div>
                    </a>
                    <a class="dropdown-item" href="#">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="checkbox2" checked>
                            <label class="custom-control-label" id="show-hide-price" for="checkbox2">Price</label>
                        </div>
                    </a>
                    <a class="dropdown-item" href="#">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="checkbox2" checked>
                            <label class="custom-control-label" id="show-hide-amount" for="checkbox2">Amount</label>
                        </div>
                    </a>
                    <a class="dropdown-item" href="#">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="checkbox2" checked>
                            <label class="custom-control-label" id="show-hide-image" for="checkbox2">Image</label>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="checkbox4" checked>
                            <label class="custom-control-label" id="show-hide-all" for="checkbox4">Check All</label>
                        </div>
                    </a>
                </div>
            </div>
            </div>
            <div class="row md-3">
                <form method="post" action="{{Route('books.search')}}" class="form-inline">
                    <select class="form-control" name="checkbook">
                        <option value="name">Book name</option>
                        <option value="author">Author</option>
                    </select>
                    @csrf
                    <input name="keyword" class="form-control ml-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success ml-2" type="submit">Search</button>
                </form>
            </div>
        </div>
        <div class="card-header">
            <h1>List Book</h1>
        </div>
        <table class="table text-center">
            <thead class="thead-blue">
            <tr>
                <th scope="col">#</th>
                <th scope="col" class="book-name">Name</th>
                <th scope="col" class="book-type">Types</th>
                <th scope="col" class="book-author">Author</th>
                <th scope="col" class="book-price">Price</th>
                <th scope="col" class="book-amount">Amount</th>
                <th scope="col" class="book-image">Image</th>
                <th colspan="2"></th>
            </tr>
            </thead>
            <tbody>

            @forelse($books as $key => $book)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td class="book-name">{{$book->name}}</td>
                    <td class="book-type">
                        @foreach($book->types as $type)
                            {{$type->name}}<br/>
                        @endforeach
                    </td>
                    <td class="book-author">{{$book->author}}</td>
                    <td class="book-price">{{$book->price}}</td>
                    <td class="book-amount">{{$book->amount}}</td>
                    <td class="book-image"><img src="{{asset('storage/'.$book->image)}}" style="width: 50px; height: 50px" alt="No image"></td>
                    <td><a href="{{Route('books.edit', $book->id)}}">Update</a> </td>
                    <td><a href="{{Route('books.delete', $book->id)}}">Delete</a> </td>
                    @empty
                        <td>No data</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $books->links() }}
    </div>
@endsection
