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
     * 事件传参
     * 
     * @route GET /something_delete
     */
    public function somethingDelete()
    {
        $params = ['user' => ['name' => 'nij', 'age' => 12]];
        EventTrigger::on('SomeThingDelete', $params);
        return 'event.somethingDelete';
    }

    /**
     * 触发多个事件
     * 
     * @route GET /user_event
     */
    public function userEvent()
    {
        EventTrigger::on('UserEventA');
        EventTrigger::on('UserEventB');
        return 'event.userEvent';
    }

    /**
     * 异步事件处理
     * 
     * @route GET /async_event
     */
    public function asyncEvent()
    {
        EventTrigger::on('AsyncEvent');
        return 'event.AsyncEvent';
    }
}