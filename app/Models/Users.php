<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use ValidatorFactory;

class Users extends Model {

	use SoftDeletes;

	protected $table;
    // protected $primaryKey = ['uuid'];
	protected $guarded = ['uuid'];
    // public    $timestamps = false; // created_at & updated_at
    protected $errors;
    // protected $keyType = 'string';
    // public    $incrementing = false;
    protected $rules = [
        "username"      =>      "required",
        "password"      =>      "required",
        "status"        =>      "required"
    ];

    public function errors()
    {
    	return $this->errors;
    }



}