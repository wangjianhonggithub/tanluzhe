<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cert extends Model
{
    public static function GetCertOne($id)
    {
    	$result = Cert::find($id);
    	return $result;
    }

    public static function UpdateCert($id,$data)
    {
    	$result = Cert::where('id',$id)->update($data);
        return $result;
    }

    public static function DataDelete($id)
    {
    	$result = Cert::destroy($id);
    	return $result;
    }
}
