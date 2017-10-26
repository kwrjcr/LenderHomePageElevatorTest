<?php

namespace ElevatorApp\Http\Controllers;

use Illuminate\Http\Request;
use ElevatorApp\Elevator;
use ElevatorApp\ElevatorCollection;


class ElevatorController extends Controller
{
    protected $floorRequests;
    protected $currentFloor;

    public function index()
    {
        return view('index');
    }

    public function show(Request $request)
    {

    }

    public function update(Request $request)
    {
        $floor = $request['floor'];
        $direction = '';

        $elevator = Elevator::all();


        if(!empty($elevator->getAvailable($floor))) {

        } elseif (!empty($elevator->getMovingTowards($floor, $direction))) {

        } elseif (!empty($elevator->getClosestStanding($floor))) {

        };


    }

    public function delete(Request $request)
    {

    }
}
