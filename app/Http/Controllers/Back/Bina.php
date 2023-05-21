<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KompleksModel;
use App\Models\BinaModel;

class Bina extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $bina=BinaModel::all();
        
        return view('back.bina.index',compact('bina'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {    $data=KompleksModel::all();
        return view('back.bina.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=new BinaModel();
        $data->kompleks=$request->kompleks;
        $data->bina=$request->bina;
        $data->save();
        return  redirect()->route('admin.bina.index')->with('message', 'Məlumat əlavə olundu!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bina=BinaModel::findOrFail($id);
        $data=KompleksModel::all();
        return view('back.bina.update',compact('data','bina'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=BinaModel::findOrFail($id);
        $data->kompleks=$request->kompleks;
        $data->bina=$request->bina;
        $data->update();
        return  redirect()->route('admin.bina.index')->with('message', 'Məlumat ugurla yenilendi!');
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
        $data = BinaModel::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.bina.index')->with(['success' => 'Səhifə uğurla silindi!']);
    }
}
