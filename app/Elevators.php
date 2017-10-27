<?php

namespace ElevatorApp;


use Illuminate\Database\Eloquent\Model;

class Elevators extends Model
{
   /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = "elevators";


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
