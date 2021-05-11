<?php
namespace App\Event;

use \PhpRest\Event\EventInterface;

class EventCListener implements EventInterface
{
    public function listen(): array
    {
        return ['SomeThingDelete'];
    }

    public function handle($params = []): void
    {
        echo 'EventCListener.handle';
        var_dump($params);
    }
}
