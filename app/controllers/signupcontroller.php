<?php
class signupcontroller extends \BaseController 
{
	public function index()
	{
		          
			 return View::make('users.signup');
					
	}
	public function create()
	{
		          
			                 setcookie("email", '', time()-36000,"/");
							 setcookie("name", '', time()-36000,"/");
							 setcookie("userid",'', time()-36000,"/");
		                     return Redirect::route('login.index');
					
	}
	public function store()
	{
    $input =Input::all();
    $users=User::all();
                        foreach ($users as $user) 
						{
							if($user->Email==$input['email'])//signup failed
							{
							 return View::make('users.signupfailed');
							}
						}
    $data['Name']=$input['name'];
    $data['password']=$input['password'];
    $data['Email']=$input['email'];
     User::create($data);
     return Redirect::route('login.index');
	}

}