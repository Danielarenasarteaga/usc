<?php

namespace App\Http\Controllers;

use App\Career;
use App\EducationLevel;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Careeres = Career::paginate(10);
        $educations = EducationLevel::all()->pluck('name', 'id');
        return view('Careeres.index')->with('Careeres', $Careeres)->with('educations', $educations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $educations = EducationLevel::all()->pluck('name', 'id');
        return view('careeres.create')->with('educations', $educations);
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
            'type'=>'required',
            ]);

        $inputs = $request->only('name', 'type');
        $career = Career::create($inputs);

        return redirect()->route('careeres.index')
            ->with('flash_message',
                'Se agrego su career.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function show(Career $career)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Career  $career
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $careeresActualizar = career::findOrFail($id);
        $educations = EducationLevel::all()->pluck('name', 'id');
        return view('careeres.edit')->with('careeresActualizar', $careeresActualizar)->with('educations', $educations);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inputs = $request->only('name', 'type');

        $careerUpdate = Career::findOrfail($id);
        $careerUpdate->fill($inputs)->save();
        
        return redirect()->route('careeres.index')
            ->with('flash_message',
             'Su carrera '. $careerUpdate->name.' fue modificada!');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Career::findOrFail($id);
        $item->delete();

        return redirect()->route('careeres.index')
            ->with('flash_message',
             'Su registro se elimino!');
         
    }
}
