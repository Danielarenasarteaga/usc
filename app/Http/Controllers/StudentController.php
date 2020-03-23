<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::paginate(10);

        return view('students.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
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
            'career'=>'required',
            'cell_phone'=>'required',
            'phone'=>'required'
        ]);

        $inputs = $request->only('name', 'type', 'career', 'cell_phone', 'phone');
        $studentes = User::create($inputs);

        return redirect()->route('studentes.index')
            ->with('flash_message',
             'Se agrego el estudiante');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $studentesActualizar = user::findOrFail($id);
        return view('studentes.edit' , ["studentesActualizar" => $usersesActualizar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inputs = $request->only('name', 'type', 'career', 'cell phone', 'phone');

        $studentesUpdate = User::findOrfail($id);
        $studentesUpdate->fill($inputs)->save();
        
        return redirect()->route('studentes.index')
            ->with('flash_message',
             'Su estudiante '. $studentesUpdate->name.' fue modificado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::findOrFail($id);
        $item->delete();

        return redirect()->route('studentes.index')
            ->with('flash_message',
             'Su registro se elimino!');
    }
}
