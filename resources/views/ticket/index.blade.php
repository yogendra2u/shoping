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
              <td>Ticket IDddd  d</td>
              <td>Name</td>
              <td>Description Detail of shoping_1</td>
              <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
            <tr>
                <td>{{$ticket->id}}</td>
                <td>{{$ticket->title}}</td>
                <td>{{$ticket->description}}</td>
                <td><a href="{{action('TicketController@edit',$ticket->id)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{action('TicketController@destroy', $ticket->id)}}" method="post">
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
{{$tickets->links()}}
@endsection