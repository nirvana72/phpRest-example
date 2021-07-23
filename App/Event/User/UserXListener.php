<?php
namespace App\Event\User;

use \PhpRest\Event\EventInterface;

class UserXListener implements EventInterface
{
    public function listen(): array
    {
        return ['UserEventA', 'UserEventB'];
    }

    public function handle(string $event, $params = []): void
    {
        echo 'UserXListener.handle';
        if (is_array($params) && count($params) > 0) {
          var_dump($params);
        }        
    }
}
