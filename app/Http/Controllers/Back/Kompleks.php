<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KompleksModel;
use App\Models\BinaModel;

class Kompleks extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=KompleksModel::all();
        return view('back.kompleks.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.kompleks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=new KompleksModel();
        $data->title=$request->title;
        $data->save();
        return  redirect()->route('admin.kompleks.index')->with('message', 'Məlumat əlavə olundu!');
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
        $data=KompleksModel::findorFail($id);
        return view('back.kompleks.update',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=KompleksModel::findOrFail($id);
        $data->title=$request->title;
        $data->update();
        return  redirect()->route('admin.kompleks.index')->with('message', 'Məlumat ugurla yenilendi!');
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
        $data = KompleksModel::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.kompleks.index')->with(['success' => 'Səhifə uğurla silindi!']);
    }

    public function getbina(Request $request)
    {
        $kid = $request->post('kid');
        $bina = BinaModel::where('kompleks', $kid)->get();
        $html = '<option value="">bina  seçin</option>';
        foreach ($bina as $list) {
            $html .= '<option value="'.$list->id.'">'.$list->name.'</option>';
        }
        echo $html;
    }

    public function getmenzil(Request $request)
    {
        $mid = $request->post('kid');
        $menzil = MenzilModel::where('bina', $mid)->get();
        $html = '<option value="">menzil  seçin</option>';
        foreach ($menzil as $list) {
            $html .= '<option value="'.$list->id.'">'.$list->name.'</option>';
        }
        echo $html;
    }
}
