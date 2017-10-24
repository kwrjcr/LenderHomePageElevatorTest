<?php

namespace ElevatorApp\Http\Controllers;

use Illuminate\Http\Request;

class ElevatorController extends Controller
{
    protected $currentDirection = 'stand';
    protected $buttonDirection;
    protected $buttonFloor;
    protected $signal;
    protected $floorRequest;
    protected $currentFloor;

    public function index($currentDirection)
    {
        echo "Index!";
        //array format = (from, to, elevator coming from, direction to get to from floor, direction to get to to floor)
        echo "<br/>";
        echo $currentDirection;
        echo "<br/>";
        return view('index');
    }

    public function direction()
    {
        //possible directions up, down, stand, maintenance
        //return redirect('/');
        $this->currentDirection = 'up';
        return redirect('/'.$this->currentDirection);
            //->action('ElevatorController@index', ['currentDirection' => $this->currentDirection]);

    }

    public function signals()
    {
        //possible signals: alarm, door_open, door_close
    }

    /*public function down()
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
