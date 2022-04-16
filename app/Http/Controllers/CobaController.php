<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CobaController extends Controller
{
    
    public function friends()
    {
        $friends = friends::paginate(3);

        return view('friend', compact('friends'));
    }

    public function create()
    {
        return view('create');
    }
   
    public function store(Request $request)
    {
        //validate the request...
        
        $friends = new friends;

        $friends->nama = $request->name;
        $friends->no_tlp = $request->no_tlp;
        $friends->alamat = $request->alamat;

        $friends->save();
     }
}