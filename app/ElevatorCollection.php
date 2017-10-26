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

    private function getStanding($floor) {
        return $this->filter(function ($elevator) use ($floor) {
            return $elevator->direction == 'stand';
        });
    }

    public function getClosestStanding($floor) {
        $elevator = $this->getStanding($floor);

        $plus_floor = $floor++;
        $minus_floor = $floor--;

        foreach($elevator as $e) {

            if ($e['currentFloor'] == $plus_floor || $e['currentFloor'] == $minus_floor) {
                return $e;
            };

            $plus_floor = $plus_floor++;
            $minus_floor = $minus_floor--;

        }
    }
}
