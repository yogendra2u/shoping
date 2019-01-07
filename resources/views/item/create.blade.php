@extends('adminlte::page')

@section('content')
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif
    <div class="row">
    <form method="post" action="{{url('/create/item')}}">
        <div class="form-group">
        <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="item_name">Item Name:</label>
            <input type="text" class="form-control" name="item_name"/>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
             <input type="text" class="form-control" name="price"/>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection