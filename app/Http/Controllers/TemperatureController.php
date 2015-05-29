<?php namespace qSelf\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use \qSelf\Temperature;
use Auth;
use Carbon\Carbon;

class TemperatureController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{

	}

  public function getNew()
  {
    return view('new_temperature');
  }

  public function postNew()
  {

		$rules = array(
      'temperature' => 'required|numeric|min:95|max:107'
    );

    $userId = Auth::user()->id;
    $validator = Validator::make(Input::all(), $rules);

    if ($validator->fails())
    {
      return Redirect::route('new_temperature')->withErrors($validator);
    }

    $temperature = new Temperature;
    $temperature->temperature = Input::get('temperature');
    $temperature->user_id = Input::get('user_id');

    if ($temperature->user_id == $userId)
    {
      $temperature->save();
    }
    else
    {
      // They do not have permission to upload this temperature
      App::abort(403, 'Access denied');
    }

    return Redirect::route('home');
  }

}
