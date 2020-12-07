<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    /**
     * `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '发布编号',
     *  `imgurl` varchar(256) DEFAULT '' COMMENT '发布图片',
     *  `label` varchar(32) DEFAULT '' COMMENT '发布标签',
     *  `title` varchar(32) DEFAULT '' COMMENT '发布标题',
     *  `note` varchar(32) DEFAULT '' COMMENT '发布笔记',
     *  `opentype` varchar(32) DEFAULT '' COMMENT '跳转方式',
     *  `openurl` varchar(256) DEFAULT '' COMMENT '跳转链接',
     *  `status` int(2) unsigned DEFAULT '1' COMMENT '发布状态',
     *  `rank` int(2) unsigned DEFAULT '0' COMMENT '发布排位',
     *  `created` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '发布时间',
     * @var array
     */
    protected $fillable = ['imgurl','label','title','note','opentype','openurl', 'status','rank'];
}
