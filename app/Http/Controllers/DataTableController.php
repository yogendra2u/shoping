<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Mail\SendMailable;
use DB;
use Redirect;
use DataTables;
use App\User;




class DataTableController extends Controller
{
    //
  public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->parameters([
                        'buttons' => ['excel'],
                    ]);
    }


   public function datatable()
    {
        return view('datatable');
    }

    public function getPosts()
    {
        return \DataTables::of(User::query())->make(true);
    }

}
