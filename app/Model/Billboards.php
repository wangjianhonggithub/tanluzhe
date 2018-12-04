<?php
/**
 * Created by PhpStorm.
 * User: 马 黎
 * Date: 2018/11/21
 * Time: 14:58
 */
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Billboards extends Model
{
    /**
     * 定义表明
     * @var string
     */
    protected $table = 'billboards';


    /**
     * 定义主键
     * @var string
     */
    protected $primaryKey = 'billboards_id';


    /**
     * 表明模型不打上时间戳
     * @var bool
     */
    public $timestamps = false;

    /**
     * 模型日期列的存储格式
     *
     * @var string
     */
    protected $dateFormat = 'U';

    /**
     * 创建时间
     */
    const CREATED_AT = 'billboards_creation_date';


    /**
     * 修改时间
     */
    const UPDATED_AT = 'billboards_last_update';
}
