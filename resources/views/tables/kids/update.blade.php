@extends('dashboard.base')
@section('content')
    <div class="container">
        <div class="text-center"><h1>Form update kid</h1></div>
        <form method="post" action="{{Route('kids.update', $kid->id)}}">
            @csrf
            <div class="form-group">
                <label>Kid name</label>
                <input type="text" name="name" value="{{$kid->name}}" class="form-control" placeholder="Type kid name">
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
                <label>Age</label>
                <input type="date" name="age" class="form-control">
            </div>
            @if($errors->has('age'))
                <p style="color:red">{{$errors->first('age')}}</p>
            @endif
            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" value="{{$kid->phone}}" class="form-control" placeholder="Type phone">
            </div>
            @if($errors->has('phone'))
                <p style="color:red">{{$errors->first('phone')}}</p>
            @endif
            <div class="form-group">
                <label>Address</label>
                <textarea name="address" class="form-control" placeholder="Type address">{{$kid->address}}</textarea>
            </div>
            @if($errors->has('address'))
                <p style="color:red">{{$errors->first('address')}}</p>
            @endif
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
