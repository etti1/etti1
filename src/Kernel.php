<?php

namespace App;

use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use JMS\SerializerBundle\JMSSerializerBundle;


class Kernel extends BaseKernel
{
    use MicroKernelTrait;

}


