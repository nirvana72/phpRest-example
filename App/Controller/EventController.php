<?php

namespace App\Controller;

use PhpRest\Event\EventTrigger;

/**
 * 事件驱动
 * 
 * @path /event
 */
class EventController
{
    /**
     * @route GET /something_delete
     */
    public function somethingDelete()
    {
        $params = ['user' => ['name' => 'nij', 'age' => 12]];
        // 触发事件并传参
        EventTrigger::on('SomeThingDelete', $params);
        return 'event.somethingDelete';
    }

    /**
     * @route GET /user_event
     */
    public function userEvent()
    {
        EventTrigger::on('UserEventA');
        EventTrigger::on('UserEventB');
        return 'event.userEvent';
    }
}