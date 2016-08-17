<?php
namespace tmukherjee13\notification\console\controllers;

use yii\console\Controller;
use yii\helpers\Console;

class ServiceController extends Controller
{

    /**
     * Run Notification Server
     *
     * @method actionNotification
     * @param  array              $args
     * @return mixed
     * @author Tarun Mukherjee (https://github.com/tmukherjee13)
     */

    public function actionNotification(array $args = [])
    {

        $loop   = \React\EventLoop\Factory::create();
        $pusher = new \tmukherjee13\notification\service\Pusher;

        // Listen for the web server to make a ZeroMQ push after an ajax request
        $context = new \React\ZMQ\Context($loop);
        $pull    = $context->getSocket(\ZMQ::SOCKET_PULL);
        $pull->bind('tcp://127.0.0.1:5555'); // Binding to 127.0.0.1 means the only client that can connect is itself
        $pull->on('message', array($pusher, 'onBlogEntry'));

        // Set up our WebSocket server for clients wanting real-time updates
        $webSock = new \React\Socket\Server($loop);
        $webSock->listen(8080, '0.0.0.0'); // Binding to 0.0.0.0 means remotes can connect
        $webServer = new \Ratchet\Server\IoServer(
            new \Ratchet\Http\HttpServer(
                new \Ratchet\WebSocket\WsServer(
                    new \Ratchet\Wamp\WampServer(
                        $pusher
                    )
                )
            ),
            $webSock
        );

        $this->stdout("Starting notification server...\n", Console::FG_YELLOW);
        try {
        $loop->run();
            
        } catch (Exception $e) {
            
        $this->stdout("Cannot start notification server...\n", Console::FG_RED);
        }

    }
}
