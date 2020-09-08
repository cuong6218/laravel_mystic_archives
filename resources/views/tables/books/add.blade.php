@extends('dashboard.base')
@section('content')
    <div class="container">
        <div class="text-center"><h1>Form add book</h1></div>
        <form method="post" action="{{Route('books.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Book name</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Type book name">
            </div>
            @if($errors->has('name'))
                <p style="color:red">{{$errors->first('name')}}</p>
            @endif
            <div class="form-group">
                <label>Types select</label>
                @foreach($types as $type)
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="type[{{$type->id}}]"
                                   value="{{ $type->id }}"> {{ $type->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <label>Author name</label>
                <input type="text" name="author" value="{{old('author')}}" class="form-control" placeholder="Type author name">
            </div>
            @if($errors->has('author'))
                <p style="color:red">{{$errors->first('author')}}</p>
            @endif
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" value="{{old('price')}}" class="form-control" placeholder="Type price">
            </div>
            @if($errors->has('price'))
                <p style="color:red">{{$errors->first('price')}}</p>
            @endif
            <div class="form-group">
                <label>Amount</label>
                <input type="text" name="amount" value="{{old('amount')}}" class="form-control" placeholder="Type book amount">
            </div>
            @if($errors->has('amount'))
                <p style="color:red">{{$errors->first('amount')}}</p>
            @endif
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
