<?php
namespace tmukherjee13\notification\components;

use yii\base\Component;

/**
 * Notifier  Class
 */
class Notifier extends Component
{

    /**
     * Notify listeners of event
     *
     * @method notify
     * @param  array  $data
     * @return json
     * @author Tarun Mukherjee (https://github.com/tmukherjee13)
     */
        
    public static function notify(array $data = [])
    {
        $context = new \ZMQContext();
        $socket  = $context->getSocket(\ZMQ::SOCKET_PUSH, 'my pusher');
        $socket->connect("tcp://localhost:5555");

        $socket->send(json_encode($data));
    }
}
