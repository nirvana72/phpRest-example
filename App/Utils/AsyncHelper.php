<?php
namespace App\Utils;

// php 异步进程
// 需解禁用 pcntl_fork, pcntl_wait 两个函数

// 使用方式
// $file = fopen($_SERVER['DOCUMENT_ROOT'] . '/async_lock.txt','w+');
// if(! flock($file, LOCK_EX|LOCK_NB)){
//     return "异步进程忙";
// }
// if(flock($file, LOCK_EX)) {
//     AsyncHelper::getInstance()->run(function() use ($file) {
//         $i = 0;
//         while ($i < 5) {
//             $this->logger->info("{$i}");
//             \sleep(2);
//             $i++;
//         }
//         flock($file, LOCK_UN); //解锁
//         fclose($file);
//     });
// }

class AsyncHelper
{
    static $instance;

    /**
     * @return static
     */
    public static function getInstance()
    {
        if (null == AsyncHelper::$instance) {
            AsyncHelper::$instance = new AsyncHelper();
        }
        return AsyncHelper::$instance;
    }

    public function run($rb)
    {
        $pid = pcntl_fork();
        if($pid > 0) {
            pcntl_wait($status);
        } elseif ($pid == 0) {
            $cid = pcntl_fork();
            if($cid > 0) {
                // exit();
            } elseif($cid == 0) {
                $rb();
            } else {
                exit();
            }
        } else {
            exit();
        }
    }
}
