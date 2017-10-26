<?php

namespace ElevatorApp\Http\Controllers;

use Illuminate\Http\Request;
use ElevatorApp\Elevator;
use ElevatorApp\ElevatorCollection;


class ElevatorController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function update(Request $request)
    {

        echo $request;

        die();

        /*
        $floor = $request['floor'];
        $currentFloor = $request['currentFloor'];

        if ($currentFloor > $floor) {
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
        */
    }

}
