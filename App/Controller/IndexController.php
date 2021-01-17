<?php
namespace App\Controller;

use PhpRest\ApiResult;
use Example\Entity\Orm\User;

/**
 * @path /
 */
class IndexController
{
    /**
     * @Inject
     * @var \PhpRest\Application
     */
    private $app;

    /**
     * @route GET /
     */
    public function index() 
    {
        $user = $this->app->make(User::class);
        $data = [
            'userId'    => 1,
            'account'   => 'nirvana72',
            'nickName'  => 'nijia',
            'password'  => '123qwe@@',
            'phone'     => '13913181371',
            'writeTime' => date('Y-m-d H:i:s'),
        ];
        // $user->userId    = 1;
        // $user->account   = 'nirvana72';
        // $user->nickName  = 'nijia';
        // $user->password  = '123qwe@@';
        // $user->phone     = '13913181371';
        // $user->writeTime = date('Y-m-d H:i:s');
        $user->fill($data)->delete();
        // $user->delete(['user_id' => 1]);
        return ApiResult::success('OK');
    }
}
