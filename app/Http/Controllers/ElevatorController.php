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
        //$current_floor = $request['current_floor'];
        $current_floor = 1;

        if ($current_floor > $floor) {
            $direction = 'down';
        } else {
            $direction = 'up';
        }

        $elevator = Elevator::all();

        if(empty($elevator->getAvailable($floor))) {

            return $elevator->getAvailable($floor);

        } elseif (empty($elevator->getMovingTowards($floor, $direction))) {

            return $elevator->getMovingTowards($floor, $direction);

        } elseif (empty($elevator->getClosestStanding($floor))) {

            return $elevator->getClosestStanding($floor);

        };
    }

    public function delete(Request $request)
    {

    }
}
