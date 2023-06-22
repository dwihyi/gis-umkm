<?php

namespace App\Controllers;


class Home extends BaseController
{
	
	// public function register()
	// {
	// 	return view('auth/register');
	// }


	public function index()
	{
        return view ('welcome_message');
	}

}
