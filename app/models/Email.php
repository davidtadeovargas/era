<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Email extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'emails';



	public function user()
    {
        return $this->hasOne('User');
    }

    public function emailType()
    {
        return $this->hasOne('EmailType');
    }
}
