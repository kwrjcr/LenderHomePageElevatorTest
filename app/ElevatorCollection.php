<?php

namespace ElevatorApp;


class ElevatorCollection extends \Illuminate\Database\Eloquent\Collection
{

    public function getClosestToFloor($floor) {

        return $this->reject(function ($elevator) {

            return $elevator->active === false;

        });
    }

}
