<?php

declare(strict_types=1);

namespace App\Service\Mapping;

class InterfaceImplementationMapper
{
    private $interfaceImplementations = array();

    public function __construct(array $interfaceImplementations)
    {
        $this->interfaceImplementations = $interfaceImplementations;
    }

    public function mapInterface(string $interface, string $classname): string
    {
        if (\array_key_exists($interface, $this->interfaceImplementations)) {
            if (\in_array($classname, \array_keys($this->interfaceImplementations[$interface]))) {
                return $classname;
            }
        }

        return $interface;
    }
}
