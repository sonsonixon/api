<?php 
	namespace App\Controllers;

	use App\Models\Users;
	
	class UsersController extends FunctionController{

		protected $dates = ['deleted_at'];


		public function __construct()
		{
			
		}

		public static function boot()
		{
		  	parent::boot();
		  	self::creating(function ($model) {
		    	$model->uuid = (string)Uuid::generate();
		  	});
		}


    	public function getAllUsers($request, $response, $args)
		{
			$users = new Users();
			$data['data'] = $users->all();
			return $response->withJSON($data);
		}

		public function getUser($request, $response, $args)
		{
			$users = new Users();

			$result = $users->where('id', $args['id'])->first();

			return $response->withJSON($result);
			
		}

		public function addUser($request, $response, $args)
		{
			$params = $request->getParsedBody();

			$users = new Users;

			if($users->validate($params)){
				if($users->save()){
					return $response->withJSON(["code" => "success", "message" => "Successfully Created"]);
				}
			} 
			else{
				return $response->withJSON(["code" => "error", "errors" => $users->errors()]);
			}
		}

		public function updateUser($request, $response, $args)
		{
			$params = $request->getParsedBody();

			$users = new Users;

			if($users->validate($params)){
				if($users->where('id', $args['id'])->update($params)){
					return $response->withJSON(["code" => "success", "title" => "Update Success", "message" => "Changes has been saved"]);
				}
			} 
			else{
				return $response->withJSON(["code" => "error", "errors" => $users->errors()]);
			}

			/*$users->where('id', $args['id'])->update($params);
	
			

			return $response->withJSON(["message" => "Successfully Updated"]);*/
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


    	

    	public function delete($request,$response, $args)
		{
			$flight = Table::find($args['id']);

			$flight->delete();			

			return $response->withJSON(["message" => "Successfully Deleted"]);
		}*/

	}