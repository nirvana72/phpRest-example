<?php
namespace App\Event;

use \PhpRest\Event\EventInterface;
use \App\Utils\AsyncHelper;
use \Psr\Log\LoggerInterface;

class AsyncEventListener implements EventInterface
{
    /**
     * @Inject
     * @var LoggerInterface
     */
    private $logger;

    public function listen(): array
    {
        return ['AsyncEvent'];
    }

    public function handle(string $event, $params = []): void
    {
        // 异步处理
        AsyncHelper::getInstance()->run(function() {
            $i = 0;
            while ($i < 5) {
                $this->logger->info("{$i}");
                \sleep(2);
                $i++;
            }
        });

        echo 'AsyncEventListener.handle';
    }
}
