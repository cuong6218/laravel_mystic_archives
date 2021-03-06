@extends('dashboard.base')
@section('content')
    <div class="container">
        <div class="text-center"><h1>Form add type</h1></div>
        <form method="post" action="{{Route('types.store')}}">
            @csrf
            <div class="form-group">
                <label>Type name</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Enter type name">
            </div>
            @if($errors->has('name'))
                <p style="color:red">{{$errors->first('name')}}</p>
            @endif
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
