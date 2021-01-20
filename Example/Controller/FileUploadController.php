<?php
namespace Example\Controller;

/**
 * @path /fileupload
 */
class FileUploadController
{
    /**
     * @Inject
     * @var \Psr\Log\LoggerInterface
     */  
    private $logger;

    /**
     * @route POST /upload_file/{id}
     * @param $file1 第一个文件 {@bind files.file1}
     * @param $file2 第二个文件 {@bind files.file2}
     */
    public function uploadFile($id, $file1, $file2) 
    {
        // 由于Request对象封装用的是 Symfony
        // 所以从Request中获取的文件对象，就是symfony/http-foundation 库中的UploadedFile对象
        // see https://github.com/symfony/http-foundation/blob/5.x/File/UploadedFile.php

        // $file1 为 UploadedFile 实例

        $this->logger->info('upaloading files');
        return "OK";
    }
}
