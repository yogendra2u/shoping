<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
 protected $fillable = ['item_id', 'item_name', 'price'];

        public function saveItem($data)
{
		$this->user_id = auth()->user()->id;
       // $this->item_id = $data['item_id'];
        $this->item_name = $data['item_name'];
        $this->price = $data['price'];
        $this->save();
        return 1;
}

public function updateItem($data)
{		
		//echo auth()->user()->id; exit;
		$item->user_id = auth()->user()->id;
        //$item = $this->find($data['item_id']);        
        $item->item_name = $data['item_name'];
        $item->price = $data['price'];
        $item->save();
        return 1;
}





}
