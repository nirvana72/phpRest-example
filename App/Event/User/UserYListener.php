<?php
namespace App\Event\User;

use \PhpRest\Event\EventInterface;

class UserYListener implements EventInterface
{
    public function listen(): array
    {
        return ['UserEventB'];
    }

    public function handle($params = []): void
    {
        echo 'UserYListener.handle';
        var_dump($params);
    }
}
