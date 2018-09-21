<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserComment extends Model
{
    protected $table='user_comments';

    public static function GetUserCommentOne($id)
    {
    	$result = UserComment::find($id);
    	return $result;
    }


    public static function DataDelete($id)
    {
    	$result = UserComment::destroy($id);
    	return $result;
    }
}
