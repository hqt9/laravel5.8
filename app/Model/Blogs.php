<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'blogs';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';
}
