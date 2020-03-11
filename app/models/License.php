<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class License extends Eloquent {

	public function Computer()
    {    	
        return $this->hasOne('Computer');
    }
}
