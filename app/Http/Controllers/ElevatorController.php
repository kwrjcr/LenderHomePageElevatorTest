<?php

namespace ElevatorApp\Http\Controllers;

use Illuminate\Http\Request;
use ElevatorApp\Elevators;
use ElevatorApp\ElevatorsCollection;
use ElevatorApp\FloorRequests;
use ElevatorApp\RequestsLog;
use ElevatorApp\Floor;


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
        $elevator = Elevators::all();

        if($elevator->getAvailable($floor)->count() > 0) {
            $chosenElevators = $elevator->getAvailable($floor);
        } elseif ($elevator->getMovingTowards($floor, $direction)->count() > 0) {
            $chosenElevators = $elevator->getMovingTowards($floor, $direction);
        } elseif (!empty($elevator->getClosestStanding($floor))) {
            $chosenElevators = $elevator->getClosestStanding($floor);
        };


        foreach($chosenElevators as $chosenElevator) {
            $id = $chosenElevator->id;
        }

        $floorTable = Floor::find($floorRequest);
        $floorStatus = $floorTable->status;

        $userCurrentFloor = Floor::find($floor);
        $userFloorStatus = $userCurrentFloor->status;


        if ($floorStatus == 'maintenance' || $userFloorStatus == 'maintenance') {

            $vueReturn['destination'] = ($floorStatus == 'maintenance') ? $floorRequest : $floor;
            $vueReturn['direction'] = 'empty';
            $vueReturn['signal'] = 'empty';
            $vueReturn['currentFloor'] = 'empty';
            $vueReturn['id'] = 'empty';

        } else {
            $elevatorRequest = Elevators::find($id);

            $elevatorRequest->destination = $floorRequest;
            $elevatorRequest->save();

            $vueReturn['destination'] = $elevatorRequest->destination;
            $vueReturn['direction'] = $elevatorRequest->direction;
            $vueReturn['signal'] = $elevatorRequest->signal;
            $vueReturn['currentFloor'] = $elevatorRequest->currentFloor;
            $vueReturn['id'] = $elevatorRequest->id;
        }

        return ['destination' => $vueReturn['destination'], 'direction' => $vueReturn['direction'], 'signal' => $vueReturn['signal'], 'currentFloor' => $vueReturn['currentFloor'], 'id' => $vueReturn['id']];
    }
}
