<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\AyarlarModel;
use App\Http\Requests\AyarlarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Ayarlar extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $data=AyarlarModel::first();
        return view('back.ayarlar.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('back.ayarlar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AyarlarRequest $request)
    {   
        $data=new AyarlarModel();
        $data->title=$request->title;
        $data->activ=$request->activ;
        $data->facebook=$request->facebook;
        $data->text=$request->text;
        if ($request->hasFile('logo')) {
            $imagename = Str::random(5).'.'.$request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('uploads'), $imagename);
            $data->logo = 'uploads/'.$imagename;
        }
        $data->save();
        return  redirect()->route('admin.ayarlar.index')->with('message', 'Məlumat əlavə olundu!');
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
    public function edit($id)
    {   $data=AyarlarModel::first();
        return view('back.ayarlar.update',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=AyarlarModel::findOrFail($id);
        $data->title=$request->title;
        $data->activ=$request->activ;
        $data->facebook=$request->facebook;
        $data->text=$request->text;
        if ($request->hasFile('logo')) {
            $imagename = Str::random(5).'.'.$request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('uploads'), $imagename);
            $data->logo = 'uploads/'.$imagename;
        }
        $data->update();
        return  redirect()->route('admin.ayarlar.index')->with('message', 'Məlumat ugurla yenilendi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    
}