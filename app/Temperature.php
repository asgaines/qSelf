<?php namespace qSelf;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Temperature extends Model {

	/**
	 * The database table used by the model.
	 * A temperature is a Celcius representation of core temperature with a timestamp
	 * @var string
	 */
	protected $table = 'temperatures';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['temperature'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

}
