<?php

//  注解格式解析使用 phpDocumeontor
//  https://docs.phpdoc.org/3.0/guide/getting-started/your-first-set-of-documentation.html#overview
//
// /**
//  * 实体类摘要                        [可选, 默认等于类名]
//  * 
//  * 实体类描述, bala bala bala ...    [可选]
//  * 
//  * @table sys_user                  [可选 指定表名, 默认等于实体类名 例 User=user UsreInfo=user_info]
//  */
// class User
// {
//     /**
//      * 字段摘要                      [可选, 默认等于字段名]
//      *
//      * 字段描述                      [可选]
//      *
//      * @field user_id               [可选 指定字段名, 默认等于变量名, 规则同 @table]
//      * @var int                     [可选 指定类型, 格式同参数说明的 @param]
//      * @rule min=1|max=100          [可选 指定验证规则, 格式同参数说明的 @rule]
//      */
//     public $id = 1;                 [这个当然必选了, 但必需是非静态的 public 变量]
//
//     /**
//      * @rule required               [所有变量默认都是非必传，除非有 required 验证规则]
//      */
//     public $name;
//
//     public $age;
// }

namespace Example\Entity;

class User
{
    public $id = 1;

    public $name;

    /**
     * @var email
     */
    public $info;
}