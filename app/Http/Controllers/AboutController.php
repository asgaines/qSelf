<?php namespace qSelf\Http\Controllers;

class AboutController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('about');
	}

}
