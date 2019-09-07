<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\FooModel;
use App\Model\BarModel;
use App\Model\ModelInterface;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    const DEFAULT_FORMAT = 'json';

    public function __invoke(SerializerInterface $serializer)
    {
        $fooData = $serializer->serialize(new FooModel(), self::DEFAULT_FORMAT);
        $fooModel = $serializer->deserialize($fooData, ModelInterface::class, self::DEFAULT_FORMAT);
        
        $barData = \json_encode(array('class'=>'App\Model\BarModel', 'baz' => 'baz'));
        $barModel = $serializer->deserialize($barData, ModelInterface::class, self::DEFAULT_FORMAT);

        return $this->json(array(
            'deserialized_models' => array(
                array($fooModel->getClass() => $fooModel->getQux()),
                array($barModel->getClass() => $barModel->getBaz()),
            )
        ));
    }
}
