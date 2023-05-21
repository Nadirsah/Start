<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KompleksModel;
use App\Models\BinaModel;
use App\Models\MenzilModel;
use App\Models\Menzil_sah_Model;


class Menzil extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bina=BinaModel::all();
        $kompleks=KompleksModel::all();
        $menzil=MenzilModel::all();
        
        return view('back.menzil.index',compact('bina','kompleks','menzil'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=KompleksModel::all();
        $bina=BinaModel::all();
        return view('back.menzil.create',compact('data','bina'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=new MenzilModel();
        $data->kompleks=$request->kompleks;
        $data->bina=$request->bina;
        $data->menzil=$request->menzil;
        $data->save();
        return  redirect()->route('admin.menzil.index')->with('message', 'Məlumat əlavə olundu!');
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
        $menzil=MenzilModel::findOrFail($id);
        $kompleks=KompleksModel::all();
        $bina=BinaModel::all();
        return view('back.menzil.update',compact('menzil','bina','kompleks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=MenzilModel::findOrFail($id);
        $data->kompleks=$request->kompleks;
        $data->bina=$request->bina;
        $data->menzil=$request->menzil;
        $data->update();
        return  redirect()->route('admin.menzil.index')->with('message', 'Məlumat ugurla yenilendi!');
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
        $data = MenzilModel::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.menzil.index')->with(['success' => 'Səhifə uğurla silindi!']);
    }
}
