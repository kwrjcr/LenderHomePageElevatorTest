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
        $elevator = Elevator::all();

        if (empty($elevator->getMovingTowards(3, 'up'))) {
            echo "";
        } else {
            echo "";
            //foreach($elevator->getClosestStanding(3, 'up') as $item) {
                //echo $item->id."<br/>";
            //}
        }

        return view('index');
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
