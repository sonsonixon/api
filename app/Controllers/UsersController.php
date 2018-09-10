<?php 
	namespace App\Controllers;


	use App\Models\Users;

	
	class UsersController{

		// protected $dates = ['deleted_at'];


		public function __construct()
		{
			
		}


    	public function getAllUsers($request, $response, $args)
		{
			$users = new Users();
			return $response->withJSON($users->all());
		}

		public function getUser($request, $response, $args)
		{
			$users = new Users();

			$id = $users->where('username', '=', $args['id'])->first();

			if($id){
				return $response->withJSON(["message" => "Success", "id" => $id['employee_uuid']]);
			}
			else{
				return $response->withJSON(["message" => "Failed"]);
			}
			
		}

		public function addUser($request, $response, $args)
		{
			$params = $request->getParsedBody();

			//var_dump($params['username']);

			$users = new Users;

			if( $users->validate($params) ) {
				return $params['username'];
			} else {
				return $response->withJSON($users->errors());
			}

			//return $response->withJSON(["message" => "Successfully Created"]);
		}


    	/*public function add($request,$response, $args)
		{
			$params = $request->getParsedBody();

			$table = new Table;
			
			if($table->validate($params)){
				$table->save();
			}else{
				return $response->withJSON($table->errors());
			}

		

			return $response->withJSON(["message" => "Successfully Created"]);
		}


    	public function update($request,$response, $args)
		{

			$params = $request->getParsedBody();

			Table::where('id',$args['id'])->update($params);


			return $response->withJSON(["message" => "Successfully Updated"]);
		}


    	public function delete($request,$response, $args)
		{
			$flight = Table::find($args['id']);

			$flight->delete();			

			return $response->withJSON(["message" => "Successfully Deleted"]);
		}*/

	}