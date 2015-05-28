<?php namespace qSelf;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Thought extends Model {

	/**
	 * The database table used by the model.
	 * A thought is a text representation of a thought with a timestamp
	 * @var string
	 */
	protected $table = 'thoughts';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['thought'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

}
