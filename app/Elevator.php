<?php

namespace ElevatorApp;


use ElevatorApp\ElevatorCollection;
use Illuminate\Database\Eloquent\Model;

class Elevator extends Model
{
   /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = "elevator_shafts";


   /*
    *  Create a new Eloquent Collection instance.
    *
    * @param array $models
    * @return \Illumniate\Database\Eloquent\Collection
    */
   public function newCollection(array $models = [])
   {
       return new ElevatorCollection($models);
   }
}
