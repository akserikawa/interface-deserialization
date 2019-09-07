<?php

declare(strict_types=1);

namespace App\Event\EventSubscriber;

use App\Model\FooModel;
use App\Model\ModelInterface;
use JMS\Serializer\EventDispatcher\Events;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use App\Service\Mapping\InterfaceImplementationMapper;

class SerializerSubscriber implements EventSubscriberInterface
{
    /**
     * @var InterfaceImplementationMapper
     */
    private $interfaceImplementationMapper;

    public function __construct(InterfaceImplementationMapper $interfaceImplementationMapper)
    {
        $this->interfaceImplementationMapper = $interfaceImplementationMapper;
    }

    public static function getSubscribedEvents(): array
    {
        return array(
            array(
                'event' => Events::PRE_DESERIALIZE, 
                'method' => 'replaceInterfaceWithImplementation'
            )
        );
    }

    public function replaceInterfaceWithImplementation(PreDeserializeEvent $event): void
    {
        $class = $event->getData()['class'];
        $type = $event->getType(); // interface name

        $event->setType(
            $this->interfaceImplementationMapper->mapInterface($type['name'], $class),
            $type['params']
        );
    }
}
