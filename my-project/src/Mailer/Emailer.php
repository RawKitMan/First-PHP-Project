<?php

namespace App\Mailer;

use Psr\Log\LoggerInterface;

class Emailer {

    /**
     * @var string
     */
    private $herpyDerp;

    //**@var LoggerInterface */

    //inject our services parameter using a constructor
    public function __construct(string $herpyDerp, LoggerInterface $logger){
        $this->herpyDerp = $herpyDerp;
        $this->logger = $logger;

        $logger->alert('Boom!');
        $logger->debug($herpyDerp);

        dump($herpyDerp);
    }
    public function create() : \Swift_Message{

    }
}

?>