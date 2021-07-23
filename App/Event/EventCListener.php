<?php
namespace App\Event;

use \PhpRest\Event\EventInterface;

class EventCListener implements EventInterface
{
    public function listen(): array
    {
        return ['SomeThingDelete'];
    }

    public function handle(string $event, $params = []): void
    {
        echo 'EventCListener.handle';
        echo "\r\n";
        echo "event = {$event}";
        echo "\r\n";
        echo 'params = ';
        var_dump($params);
    }
}
