<?php

namespace ElevatorApp;

use ElevatorApp\Floor;


class ElevatorCollection extends \Illuminate\Database\Eloquent\Collection
{
    public function getAvailable($floor) {
        return $this->filter(function ($elevator) use ($floor) {
            return $elevator->currentFloor == $floor && $elevator->direction == "stand";
        });
    }

    public function getMovingTowards($floor, $direction) {
        return $this->filter(function ($elevator) use ($floor, $direction) {
            if ($direction == 'up') {
                return $elevator->destination >= $floor && $elevator->currentFloor < $floor && $elevator->direction == "up";
            } elseif ($direction == 'down') {
                return $elevator->destination <= $floor && $elevator->currentFloor > $floor && $elevator->direction == "down";
            }
        });
    }

    public function getClosestStanding($floor) {
        return $this->filter(function ($elevator) use ($floor) {
            return $elevator->direction == 'stand';
        });
    }
}
