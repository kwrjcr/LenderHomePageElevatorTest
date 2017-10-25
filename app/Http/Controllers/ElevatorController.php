<?php

namespace ElevatorApp\Http\Controllers;



use Illuminate\Http\Request;
use ElevatorApp\Elevator;


//eloquent model
//each shaft is one record


class ElevatorController extends Controller
{
    protected $floorRequests;
    protected $currentFloor;

    public function index()
    {
        /*
        $this->floorRequests = [['requestedFloor' => 1, 'direction' => 'down'], ['requestedFloor' => 7, 'direction' => 'up'], ['requestedFloor' => 1, 'direction' => 'down'], ['requestedFloor' => 7, 'direction' => 'up']];
        $this->currentFloor = 1;

        $floorRequests = array(
                        'currentFloor' => $this->currentFloor,
                        'floorRequests' => $this->floorRequests
        );

        print("<pre>"); print_r($floorRequests); print("</pre>");
        */

        return view('index');
    }

    /*
    public function down()
    {
        echo "Down!";
    }

    public function stand()
    {

    }

    public function maintenance()
    {

    }

    public function alarm()
    {

    }

    public function door_open()
    {

    }

    public function door_close()
    {

    }
    */
}
