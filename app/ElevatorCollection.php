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
        $elevators = $this->getStanding($floor);

        $elevatorsByFloor = [];
        foreach($elevators as $elevator) {
            if (!isset($elevatorsByFloor[$elevator->currentFloor])) {
                $elevatorsByFloor[$elevator->currentFloor] = [];
            }
            $elevatorsByFloor[$elevator->currentFloor][] = $elevator;
        }
        ksort($elevatorsByFloor);
        $elevatorsByDistance = [];
        foreach ($elevatorsByFloor as $currentFloor => $elevators) {
            $distance = $currentFloor >= $floor ? $currentFloor - $floor : $floor - $currentFloor;
            $elevatorsByDistance[$distance] = array_merge(!isset($elevatorsByDistance[$distance]) ? [] : $elevatorsByDistance[$distance], $elevators);
        }
        ksort($elevatorsByDistance);
        return current($elevatorsByDistance);
    }
}
