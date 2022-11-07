<?php

namespace App\Http\Controllers;

use App\Models\MedicalBooklet;
use Illuminate\Http\Request;

class MedicalBookletsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('medical-booklet.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medical-booklet.create');
    }

 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MedicalBooklet  $medicalBooklet
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalBooklet $medicalBooklet)
    {
      return view('medical-booklet.show', compact('medicalBooklet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedicalBooklet  $medicalBooklet
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicalBooklet $medicalBooklet)
    {
        return view('medical-booklet.edit', compact('medicalBooklet'));
    }

}
