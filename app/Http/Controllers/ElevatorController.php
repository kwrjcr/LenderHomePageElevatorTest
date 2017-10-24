<?php

namespace ElevatorApp\Http\Controllers;

use Illuminate\Http\Request;

class ElevatorController extends Controller
{
    protected $direction;
    protected $signal;
    protected $floorRequest;
    protected $currentFloor;

    public function index(Request $request)
    {
        echo "Index!";

        /*if ($request == 'up') {
            $this->up();
        }*/

        //return view('index');
    }

    public function up()
    {
        echo "Up!";
        //return view('index');
    }

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
}
