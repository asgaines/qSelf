<?php namespace qSelf\Http\Controllers;

class IndexController extends Controller {

  /*
	|--------------------------------------------------------------------------
	| Index Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the index page for the application.
	|
	*/

  /**
   * Show the application welcome screen to the user.
   *
   * @return Response
   */
  public function index()
  {
    return view('index');
  }

}
