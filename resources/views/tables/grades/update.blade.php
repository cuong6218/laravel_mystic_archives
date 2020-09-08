@extends('dashboard.base')
@section('content')
    <div class="container">
        <div class="text-center"><h1>Form update grade</h1></div>
        <form method="post" action="{{Route('grades.update', $grade->id)}}">
            @csrf
            <div class="form-group">
                <label>Grade name</label>
                <input type="text" name="name" value="{{$grade->name}}" class="form-control" placeholder="Type grade name">
            </div>
            @if($errors->has('name'))
                <p style="color:red">{{$errors->first('name')}}</p>
            @endif
            <div class="form-group">
                <label>Teacher name</label>
                <input type="text" name="teacher" value="{{$grade->teacher}}" class="form-control" placeholder="Type teacher name">
            </div>
            @if($errors->has('teacher'))
                <p style="color:red">{{$errors->first('teacher')}}</p>
            @endif
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
