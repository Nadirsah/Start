<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KompleksModel;
use App\Models\BinaModel;
use App\Models\MenzilModel;
use App\Models\Menzil_sah_Model;

class Menzil_sah extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bina=BinaModel::all();
        $kompleks=KompleksModel::all();
        $menzil=MenzilModel::all();
        $sahib=Menzil_sah_Model::all();
        return view('back.menzil_sah.index',compact('bina','kompleks','menzil','sahib'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=KompleksModel::all();
        $bina=BinaModel::all();
        $menzil=MenzilModel::all();
        return view('back.menzil_sah.create',compact('data','bina','menzil'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=new Menzil_sah_Model();
        $data->kompleks=$request->kompleks;
        $data->bina=$request->bina;
        $data->menzil=$request->menzil;
        $data->name=$request->name;
        $data->save();
        return  redirect()->route('admin.menzil_sah.index')->with('message', 'Məlumat əlavə olundu!');
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
        $menzil_sah=Menzil_sah_Model::findOrFail($id);
        $kompleks=KompleksModel::all();
        $bina=BinaModel::all();
        $menzil=MenzilModel::all();
        return view('back.menzil_sah.update',compact('menzil','bina','kompleks','menzil','menzil_sah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=Menzil_sah_Model::findOrFail($id);
        $data->kompleks=$request->kompleks;
        $data->bina=$request->bina;
        $data->menzil=$request->menzil;
        $data->name=$request->name;
        $data->update();
        return  redirect()->route('admin.menzil_sah.index')->with('message', 'Məlumat ugurla yenilendi!');
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
        $data = Menzil_sah_Model::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.menzil_sah.index')->with(['success' => 'Səhifə uğurla silindi!']);
    }
}
