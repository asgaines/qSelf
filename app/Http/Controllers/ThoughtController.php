<?php namespace qSelf\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use \qSelf\Thought;
use Auth;
use App;

class ThoughtController extends Controller {

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
	public function index($thought_id)
	{
    $thought = Thought::find($thought_id);
		if ($thought->user_id != Auth::user()->id)
		{
			// This thought doesn't belong to them. Don't show; private feature
			App::abort(403, 'Access denied');
		}
    return view('thought', array('thought' => $thought));
	}

  public function getNew()
  {
    return view('new_thought');
  }

  public function postNew()
  {
    $rules = array(
      'thought' => 'required|min:3'
    );

    $userId = Auth::user()->id;
    $validator = Validator::make(Input::all(), $rules);

    if ($validator->fails())
    {
      return Redirect::route('new_thought')->withErrors($validator);
    }

    $thought = new Thought;
    $thought->thought = Input::get('thought');
    $thought->user_id = Input::get('user_id');

    if ($thought->user_id == $userId)
    {
      $thought->save();
    }
    else
    {
      // They do not have permission to upload this thought
      App::abort(403, 'Access denied');
    }

    return Redirect::route('home');
  }

}
