@extends('dashboard.base')
@section('content')
    <div class="container">
        <div class="text-center"><h1>Form add kid</h1></div>
        <form method="post" action="{{Route('kids.store')}}">
            @csrf
            <div class="form-group">
                <label>Kid name</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Type kid name">
            </div>
            @if($errors->has('name'))
                <p style="color:red">{{$errors->first('name')}}</p>
            @endif
            <div class="form-group">
                <label>Grade select</label>
                <select name="grade_id" class="form-control">
                    @foreach($grades as $grade)
                        <option value="{{$grade->id}}">{{$grade->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Date of birth</label>
                <input type="date" name="age" class="form-control">
            </div>
            @if($errors->has('age'))
                <p style="color:red">{{$errors->first('age')}}</p>
            @endif
            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" value="{{old('phone')}}" class="form-control" placeholder="Type phone">
            </div>
            @if($errors->has('phone'))
                <p style="color:red">{{$errors->first('phone')}}</p>
            @endif
            <div class="form-group">
                <label>Address</label>
                <textarea name="address" value="{{old('address')}}" class="form-control" placeholder="Type address"></textarea>
            </div>
            @if($errors->has('address'))
                <p style="color:red">{{$errors->first('address')}}</p>
            @endif
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
