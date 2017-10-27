<?php

namespace ElevatorApp\Http\Controllers;

use Illuminate\Http\Request;
use ElevatorApp\Elevator;
use ElevatorApp\ElevatorCollection;
use ElevatorApp\FloorRequests;


class ElevatorController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function update(Request $request)
    {

        $floor = $request['userFloor'];
        $floorRequest = $request['floorRequest'];

        if ($floorRequest < $floor) {
            $direction = 'down';
        } else {
            $direction = 'up';
        }

        $requestLog = new FloorRequests();
        $requestLog->userFloor = $floor;
        $requestLog->floorRequest = $floorRequest;
        $requestLog->save();

        $chosenElevator = [];
        $elevator = Elevator::all();

        if($elevator->getAvailable($floor)->count() > 0) {

            $chosenElevator = $elevator->getAvailable($floor);

        } elseif ($elevator->getMovingTowards($floor, $direction)->count() > 0) {

            $chosenElevator = $elevator->getMovingTowards($floor, $direction);

        } elseif (!empty($elevator->getClosestStanding($floor))) {

            $chosenElevator = $elevator->getClosestStanding($floor);

        };

        foreach($chosenElevator as $e) {
            $id = $e->id;
        }

        $elevatorRequest = Elevator::find($id);

        $elevatorRequest->destination = $floorRequest;
        $elevatorRequest->save();

        return $elevatorRequest;
    }

}
