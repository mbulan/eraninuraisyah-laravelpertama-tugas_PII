<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CobaController extends Controller
{
   
    public function index()
    {
        $friends = friends::orderBy ('id', 'desc')->paginate(3);

        return view('friends.index', compact('friends'));
    }

    public function create()
    {
        return view('friends.create');
    }
   
    public function store(Request $request)
    {
        //validate the request...
        $request->validate([
            'nama' => 'required|unique:friends|max:255',
            'no_tlp' => 'required|numric',
            'alamat' => 'required',
        ]);

        $friends = new friends;

        $friends->nama = $request->nama;
        $friends->no_tlp = $request->no_tlp;
        $friends->alamat = $request->alamat;

        $friends->save();

        return redirect('/');
     }
     public function show($id)
     {
         $friends = friends::where('id', $id)->first();
         return view('friends.show', ['friend' => $friend]);
     }
     public function edit($id)
     {
         $friends = friends::where('id', $id)->first();
         return view('friends.edit', ['friend' => $friend]);
     }
     public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:friends|max:255',
            'no_tlp' => 'required|numric',
            'alamat' => 'required',
        ]);
        friends::find($id)->update([
            'nama' => $request->nama,
            'no_tlp' => $request->no_tlp,
            'alamat' => $request->alamat
        ]);

        return redirect('/');
    }
    public function destroy($id)
    {
        friends::find($id)->delete();
        return redirect('/');
    }
}
