<?php

class usercontroller extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
			
			if(isset($_COOKIE['email']) )
              {
              	$users = Detail::where('id','=',$_COOKIE["userid"])->orderBy('date')->orderBy('time')->get();
              return View::make('users.index', compact('users'));
			
              }  
             
              if(!isset($_COOKIE['email']))
               {
                return Redirect::route('login.index');
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
		       if(!isset($_COOKIE['email']))
               {
                return Redirect::route('login.index');
               } 
			return View::make('users.create');
					//
	}
	


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		 if(!isset($_COOKIE['email']))
               {
                return Redirect::route('login.index');
               } 
               
		$input = Input::all();
		$store[0]=0;
	    $data = Detail::where('id', '=',$_COOKIE['userid'])->get();
		$newid=1;
        $i=0;
		foreach ($data as $key) 
		{
				
			$store[$i]=$key->todo_id;
		    $i++;
		   
	    }
		
		for($j=1;$j<=$i+1;$j++)
		{
			if(! in_array($j, $store))
			{
				$newid=$j;
				break;
				
			}
		}
		 
		
		
		$input['id']=$_COOKIE['userid'];
		$input['todo_id']=$newid;
		Detail::create($input);
        return Redirect::route('users.index');

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
		 if(!isset($_COOKIE['email']))
               {
                return Redirect::route('login.index');
               } 
			 return Redirect::route('users.index');
			
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
		 if(!isset($_COOKIE['email']))
               {
                return Redirect::route('login.index');
               } 
	      $user = Detail::where('id', '=',$_COOKIE['userid'])->where('todo_id','=',$id)->get();
           if (is_null($user))
            {
             return Redirect::route('users.index');
              }
            return View::make('users.edit', compact('user'));
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
		 if(!isset($_COOKIE['email']))
               {
                return Redirect::route('login.index');
               } 

			$input = Input::all();
			$data['name']=$input['name'];
			$data['time']=$input['time'];
			$data['date']=$input['date'];
			$data['priority']=$input['priority'];
			$data['status']=$input['status'];
			$data['id']=$_COOKIE['userid'];
		    $data['todo_id']=$id;
            Detail::where('id', '=',$_COOKIE['userid'])->where('todo_id','=',$id)->update($data);
			 return Redirect::route('users.index');
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
		 if(!isset($_COOKIE['email']))
               {
                return Redirect::route('login.index');
               } 
	    $data = Detail::where('id', '=',$_COOKIE['userid'])->where('todo_id','=',$id)->delete();
        return Redirect::route('users.index');
		//
	}
	


}
