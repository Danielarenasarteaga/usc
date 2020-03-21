<?php

namespace App\Http\Controllers;

use App\Campus;
use Illuminate\Http\Request;

class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campuses = Campus::paginate(10);

        return view('campuses.index')->with('campuses', $campuses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('campuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'director'=>'required',
            'address'=>'required',
            'phone'=>'required'
        ]);

        $inputs = $request->only('name', 'director', 'address', 'phone');
        $campus = Campus::create($inputs);

        return redirect()->route('campuses.index')
            ->with('flash_message',
             'Se agrego su campus.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function show(Campus $campus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $campusesActualizar = campus::findOrFail($id);
        return view('campuses.edit' , ["campusesActualizar" => $campusesActualizar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inputs = $request->only('name', 'director', 'address', 'phone');

        $campusUpdate = Campus::findOrfail($id);
        $campusUpdate->fill($inputs)->save();
        
        return redirect()->route('campuses.index')
            ->with('flash_message',
             'Su campus '. $campusUpdate->name.' fue modificado!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Campus::findOrFail($id);
        $item->delete();

        return redirect()->route('campuses.index')
            ->with('flash_message',
             'Su registro se elimino!');
    }
}
