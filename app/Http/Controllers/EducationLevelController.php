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
        $EducationLevel = EducationLevel::all();
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
        //
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
    public function edit(EducationLevel $educationLevel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EducationLevel  $educationLevel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EducationLevel $educationLevel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EducationLevel  $educationLevel
     * @return \Illuminate\Http\Response
     */
    public function destroy(EducationLevel $educationLevel)
    {
        //
    }
}
