<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimulationController extends Controller
{
    //
    public function index()
    {
        return view('simulation.simulation_list');
    }

    public function model1() {
        return view('simulation.model1');
    }
}
