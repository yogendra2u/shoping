<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;


class TicketController extends Controller
{

	 public function __construct()
    {
        //$this->middleware('auth', ['except' => ['about_us']]);
        $this->middleware('auth');
    }
    
  public function create()
{
	//echo '<pre>'; print_r(auth()->user()); //to get all detail of single user
	//echo auth()->user()->email;  //to get paticuler detail of user
	// exit;
   return view('ticket.create');
}


  public function store(Request $request)
    {
    	// echo '<pre>';
    	 //print_r($request->all());

    	// echo $request->title;

    	 //die();

        $ticket = new Ticket();

        $data = $this->validate($request, [
            'description'=>'required',
            'title'=> 'required'
        ]);
             
        $ticket->saveTicket($data);

        //$ticket->user_id = auth()->user()->id;
       // $ticket->title = $data['title'];
        //$ticket->description = $data['description'];
       // $ticket->save();


        
        return redirect('/tickets')->with('success', 'New support ticket has been created! Wait sometime to get resolved');
    }

    public function index()
    {
       // $tickets = Ticket::where('user_id', auth()->user()->id)->get();
         $tickets = Ticket::where('user_id', auth()->user()->id)->paginate('3'); //for pagination
        
        return view('ticket.index',compact('tickets'));
    }

     public function edit($id)
    {
        $ticket = Ticket::where('user_id', auth()->user()->id)
                        ->where('id', $id)
                        ->first();
        return view('ticket.edit', compact('ticket', 'id'));
    }

     public function update(Request $request, $id)
    {
        $ticket = new Ticket();
        $data = $this->validate($request, [
            'description'=>'required',
            'title'=> 'required'
        ]);
        $data['id'] = $id;
        $ticket->updateTicket($data);
        return redirect('/tickets')->with('success', 'New support ticket has been updated!!');
    }

/*
    public function updateTicket($data)
{
        $ticket = $this->find($data['id']);
        $ticket->user_id = auth()->user()->id;
        $ticket->title = $data['title'];
        $ticket->description = $data['description'];
        $ticket->save();
        return 1;
}
*/
public function destroy($id)
    {
    	$title = 'raju';

        //$ticket = Ticket::where('title', $title)->delete();
        $ticket = Ticket::where('id', $id)->delete();


        //$ticket->delete();

        return redirect('/tickets')->with('success', 'Ticket has been deleted!!');
    }

}
?>