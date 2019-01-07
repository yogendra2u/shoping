<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use DB;





class ItemController extends Controller
{
    //

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
   return view('item.create');
}


  public function store(Request $request)
    {

         // echo '<pre>';
         //print_r($request->all());

        // echo $request->title;

         //die();

        $item = new Item();


        $data = $this->validate($request, [
            'item_name'=>'required',
            'price'=> 'required'
        ]);
             
        $item->saveItem($data);

        //$ticket->user_id = auth()->user()->id;
       // $ticket->title = $data['title'];
        //$ticket->description = $data['description'];
       // $ticket->save();


        
        return redirect('/item')->with('success', 'New Item added successfully');
    }



    public function index()
    {

        if(auth()->user()->role == 'admin'){
            $items = Item::get();
        }else{
        $items = Item::where('user_id', auth()->user()->id)->get();
        // $tickets = Item::where('item_id', auth()->user()->id)->paginate('3'); //for pagination
        }
        return view('item.index',compact('items'));
    }


     public function edit($id)
    {  

       // $item = Item::where('user_id', auth()->user()->id)
         $item = Item::where('user_id', auth()->user()->id)
                        ->where('id', $id)
                        ->first();

        return view('item.edit', compact('item', 'id'));
    }


     public function update(Request $request, $id)
    {
    
        
        $data = $this->validate($request, [
            'item_name'=>'required',
            'price'=> 'required'
        ]);
        $data['id'] = $id;
        $items = Item::find($id);      
        $items->user_id = auth()->user()->id;        
        $items->item_name = $data['item_name'];
        $items->price = $data['price'];
        $items->save();

        //$item->updateItem($data);
        return redirect('/item')->with('success', 'Item updated!!');
    }


/*

   public function updateItem($data)
{
        $item = $this->find($data['item_id']);
        $item->user_id = auth()->user()->id;
        $item->item_name = $data['item_name'];
        $price->price = $data['price'];
        $item->save();
        return 1;
}

*/


public function destroy($id)
    {

        //echo "here"; exit;
      //  $title = 'raju';

        //$ticket = Ticket::where('title', $title)->delete();
        $item = Item::where('id', $id)->delete();


        //$ticket->delete();

        return redirect('/item')->with('success', 'Ticket has been deleted!!');
    }


    public function mail()
{

/*
      $data = array('name'=>"Virat Gandhi");
   
      Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to('yogendra.chauhan@srmtechsol.com', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
         $message->from('yogendra.chauhan@srmtechsol.com','Virat Gandhi');
      });
      echo "Basic Email Sent. Check your inbox.";
*/




 $data = array('name'=>"Virat Gandhi",'age'=>'30');

      Mail::send('mail', $data, function($message) {
         $message->to('yogendra.chauhan@srmtechsol.com', 'Tutorials Point')->subject
            ('Laravel HTML Testing Mail');
         $message->from('yogendra.chauhan@srmtechsol.com','Virat Gandhi');
      });
      echo "HTML Email Sent. Check your inbox.";






//   $data = array('name'=>'Yogendra', 'age'=>'30');
  // Mail::to('yogendra.chauhan@srmtechsol.com')->send(new SendMailable($data));
   

   //return redirect('/mail')->with('success', 'Item updated!!');
   
   //return view('email.testMail', compact('data'));


  // return 'Email was sent';
}


    public function chart()
    {

        $results = DB::table('results')->get();    
        return view('mychart.mychart',compact('results'));
    }


}
