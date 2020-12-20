<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bookings';

    /**
     * Get the Event of the booking.
     */
    public function event()
    {
        return $this->belongsTo('App\Event','event_id');
    }

    /**
	 * Generate new code for promocode
	 * 
	 * @return string
	 */
	public function generateCode(): string
    {
	    $code_str = strtoupper(str_random(10));

	    if ($this->codeExists($code_str)) {
	        return generateCode();
	    }

	    return $code_str;
	}

	/**
	 * Check if generated code already exists in DB
	 * 
	 * @param  string $str
	 * @return bool     
	 */
	private function codeExists($str): bool
	{
	    return Booking::whereCode($str)->exists();
	}
}
