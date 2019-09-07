<?php

declare(strict_types=1);

namespace App\Model;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Discriminator;

abstract class AbstractModel implements ModelInterface
{
    /**
     * @Type("string")
     *
     * @var string
     */
    protected $class;

    public function __construct()
    {
        $this->class = static::class;    
    }

    public function getClass(): string
    {
        return $this->class;
    }
}