<?php
namespace Application\Controllers\Ratchet;

use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;


class Ratchet implements MessageComponentInterface
{
    private $CI;
    private $clients;

    public function __construct(\CI_Controller $CI)
    {
        // with this you can access models, libraries, helpers and other CI stuff
        $this->CI = $CI;

        //$this->CI->load->model('model_name');
        //$this->CI->load->library('library_name');
        //$this->CI->load->helper('helper_name');
        // ...

        $this->clients = new \SplObjectStorage();
    }

    public function onOpen(ConnectionInterface $conn)
    {
        echo "New connection: {$conn->resourceId}\n";

        $this->clients->attach($conn);
    }

    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);

        echo "Connection has disconnected: {$conn->resourceId}\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }

    public function onMessage(ConnectionInterface $conn, $data)
    {
        echo "Received: {$conn->resourceId}\n";

        $data = json_decode($data);

        foreach ($this->clients as $client) {
            $client->send(json_encode(array(
                    'nickname' => $data->nickname,
                    'message'  => $data->message)
            ));
        }
    }
}