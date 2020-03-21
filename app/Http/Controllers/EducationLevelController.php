<?php

namespace App\Http\Controllers;

use App\EducationLevel;
use Illuminate\Http\Request;

class EducationLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
 
    {
        $EducationLevel = EducationLevel::paginate(10);

        return view('educations.index')->with('EducationLevel', $EducationLevel);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('educations.create');
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
            'name'=>'required'
        ]);

        $inputs = $request->only('name');
        $education = EducationLevel::create($inputs);

        return redirect()->route('educations.index')
            ->with('flash_message',
             'Se agrego su Nivel ejecutivo.');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\EducationLevel  $educationLevel
     * @return \Illuminate\Http\Response
     */
    public function show(EducationLevel $educationLevel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EducationLevel  $educationLevel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $educationActualizar = EducationLevel::findOrFail($id);
        return view('educations.edit' , ["educationActualizar" => $educationActualizar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EducationLevel  $educationLevel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inputs = $request->only('name', 'actions');

        $educationUpdate = EducationLevel::findOrfail($id);
        $educationUpdate->fill($inputs)->save();
        
        return redirect()->route('educations.index')
            ->with('flash_message',
             'Su Nivel educativo '. $educationUpdate->name.' fue modificado!');
    }
    
     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EducationLevel  $educationLevel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = EducationLevel::findOrFail($id);
        $item->delete();

        return redirect()->route('educations.index')
            ->with('flash_message',
             'Su registro se elimino!');
    }
}
