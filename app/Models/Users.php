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
    protected $errors;
    protected $rules = [
    	"username" => "required|alpha|min:6",
    	"password" => "required",
        "status" => "required"
    ];

    public function errors()
    {
    	return $this->errors;
    }



}