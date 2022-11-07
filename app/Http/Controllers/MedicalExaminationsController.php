<?php

namespace App\Http\Controllers;

use App\Models\MedicalExamination;
use Illuminate\Http\Request;

class MedicalExaminationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('medical-exam.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medical-exam.create');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MedicalExamination  $medicalExamination
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalExamination $medicalExamination)
    {
        return view('medical-exam.show', compact('medicalExamination'));
    }

}
