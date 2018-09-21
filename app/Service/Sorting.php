<?php

/**
 * @Author: Administrator
 * @Date:   2018-04-04 11:07:02
 * @Last Modified by:   Administrator
 * @Last Modified time: 2018-04-04 11:23:30
 */
namespace App\Service;
/**
* 
*/
class Sorting
{
	public static function GetLimitLiShi($data)
	{
		$len = count($data);
		for($i=1;$i<$len;$i++)
		{
			for($j=$len-1;$j>=$i;$j--)
				if($data[$j]->count > $data[$j-1]->count)
				{//如果是从大到小的话，只要在这里的判断改成if($b[$j]>$b[$j-1])就可以了
				 $x=$data[$j];
				 $data[$j]=$data[$j-1];
				 $data[$j-1]=$x;
				}
		}
		$result = [];
		foreach ($data as $k => $val) {
			$result[] = $val;
		}
		return $result;
	}

}