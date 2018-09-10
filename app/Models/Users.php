<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use ValidatorFactory;


class Users extends Model {

	use SoftDeletes;

	protected $table;
	protected $guarded = ['id'];
    public    $timestamps = false;
    public 	  $errors;
    protected $rules = [
    	"username" => "required|max:3",
    	"password" => "required"

    ];

    public function errors()
    {
    	return $this->errors;
    }

}