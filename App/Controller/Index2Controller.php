<?php
namespace App\Controller;

use PhpRest\ApiResult;

/**
 * tag1
 * 
 * @path /index2
 */
class Index2Controller
{
    // /**
    //  * @route POST /index1
    //  * @param $p1
    //  * @param int $p2
    //  * @param string $p3
    //  * @param string $p4 pp4
    //  * @param string $p5 {@rule length=6}
    //  * @param string $p6 P66 {@rule max=6}
    //  * @param int[] $p7
    //  * @param email $p8
    //  * @param ip[] $p9
    //  * @param xxx $p10
    //  * @param numeric $p11 {@rule min=1}
    //  * @param int $p12
    //  */
    // public function index1($p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10, $p11, $p12 = 999) {
    //     return "OK";
    // }

    /**
     * @route POST /upload_file/{id}
     * @param $file1 第一个文件 {@bind files.file1}
     * @param $file2 第二个文件 {@bind files.file2}
     */
    public function uploadFile($id, $file1, $file2) {
        return "OK";
    }

    // /**
    //  * @route POST /index2
    //  * @param \Example\Entity\User $user
    //  * @param \Example\Entity\Info $info
    //  */
    // public function index2($user, $info) {
    //     return "OK";
    // }

    // /**
    //  * @route POST /index3
    //  * @param \Example\Entity\Nested\Company[] $companys
    //  */
    // public function index3($companys) {
    //     return "OK";
    // }
}
