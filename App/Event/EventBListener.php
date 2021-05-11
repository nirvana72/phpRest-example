<?php
namespace App\Event;

use \PhpRest\Event\EventInterface;

class EventBListener implements EventInterface
{
    public function listen(): array
    {
        return ['SomeThingDelete'];
    }

    public function handle($params = []): void
    {
        echo 'EventBListener.handle';
        var_dump($params);
    }
}
