<?php
namespace App\Event;

use \PhpRest\Event\EventInterface;

class EventAListener implements EventInterface
{
    // 注册事件，一个Listener可以监听多个事件
    public function listen(): array
    {
        return ['SomeThingDelete'];
    }

    // 执行事件，事件触发参考 \App\Controller\EventController.php
    public function handle($params = []): void
    {
        echo 'EventAListener.handle';
        var_dump($params);
    }
}
