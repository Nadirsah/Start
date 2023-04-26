<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use App\Http\Requests\UserRequest;

class Profil extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=User::all();
       return view('back.profil.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.profil.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data=new User();
        $data->name=$request->name;
        $data->password=Hash::make($request->password);
        $data->save();
        return  redirect()->route('admin.profil.index')->with('message', 'Məlumat əlavə olundu!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=User::findOrFail($id);
        return view('back.profil.update',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=User::findOrFail($id);
        $data->name=$request->name;
        $data->password=Hash::make($request->password);
        $data->update();
        return  redirect()->route('admin.profil.index')->with('message', 'Məlumat yenilendi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete($id)
    {
        $data = User::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.profil.index')->with('message', 'Məlumat silindi!');
    }
}
