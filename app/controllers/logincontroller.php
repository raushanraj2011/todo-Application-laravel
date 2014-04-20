<?php

class logincontroller extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
			 	
			 if(isset($_COOKIE['email']) )
              {
              	
              return Redirect::route('users.index');
			
              }  

              if(!isset($_COOKIE['email']))
               {
               return View::make('users.login');
               }   
			
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		                     
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		 $flag=0;
			 $users = User::all();   
                     foreach ($users as $user) 
						{
							if($user->Email==$_POST['email'] && $user->password==$_POST['password'])
							{
							session_start();
							 setcookie("email", $_POST['email'], time()+36000,"/");
							  setcookie("name", $user->Name, time()+36000,"/");
							 setcookie("userid",$user->ID, time()+36000,"/");
							  $flag=1;
							 return Redirect::route('login.index');
							}
						}
						if($flag==0) //if password is invalid
						{
							
							    return View::make('users.loginfailed');
						}
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
