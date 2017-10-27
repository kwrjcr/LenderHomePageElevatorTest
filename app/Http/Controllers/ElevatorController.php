<?php

namespace ElevatorApp\Http\Controllers;

use Illuminate\Http\Request;
use ElevatorApp\Elevators;
use ElevatorApp\ElevatorCollection;
use ElevatorApp\FloorRequests;
use ElevatorApp\RequestsLog;


class ElevatorController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function update(Request $request)
    {

        $floor = $request->userFloor;
        $floorRequest = $request->floorRequest;

        if ($floorRequest < $floor) {
            $direction = 'down';
        } else {
            $direction = 'up';
        }

        $requestLog = new RequestsLog();
        $requestLog->userFloor = $floor;
        $requestLog->floorRequest = $floorRequest;
        $requestLog->save();

        $chosenElevators = [];
        $elevator = Elevator::all();

        if($elevator->getAvailable($floor)->count() > 0) {
            $chosenElevators = $elevator->getAvailable($floor);
        } elseif ($elevator->getMovingTowards($floor, $direction)->count() > 0) {
            $chosenElevators = $elevator->getMovingTowards($floor, $direction);
        } elseif (!empty($elevator->getClosestStanding($floor))) {
            $chosenElevators = $elevator->getClosestStanding($floor);
        };


        $id = current($chosenElevators)->id;


        //check this
        if ($floorRequest == 2 || $floorRequest == 4) {

        } else {
            $elevatorRequest = Elevator::find($id);

            $elevatorRequest->destination = $floorRequest;
            $elevatorRequest->save();
        }

        return ['destination' => $elevatorRequest->destination, 'direction' => $elevatorRequest->direction, 'signal' => $elevatorRequest->signal, 'currentFloor' => $elevatorRequest->currentFloor, 'id' => $elevatorRequest->id];
    }
}
