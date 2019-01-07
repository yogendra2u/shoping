@extends('adminlte::page')

@section('content')
<div class="container">


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('danger'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-striped">

            <thead>
            <tr>
              <th>ID</th>
              <th>Item Name</th>
              <th>Price</th>
              <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>

           @foreach($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->item_name}}</td>
                <td>{{$item->price}}</td>
                <td><a href="{{ url('/edit/item/'.$item->id) }}" class="btn btn-primary">Edit</a></td>
                <td>
                   <!-- <form action="{{action('ItemController@destroy', $item->id)}}" method="post">-->

                    <form action="{{url('/delete/item',$item->id)}}" method="post">



                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
        
    </table>
<div>

@endsection