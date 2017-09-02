<?php
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use Application\Controllers\Ratchet\Ratchet;

require APPPATH.'/../vendor/autoload.php';


class RatchetServer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $CI =& get_instance();

        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new Ratchet($CI)
                )
            ),
            WS_PORT
        );

        $server->run();
    }
}