<?php

declare(strict_types=1);

namespace App\Model;

use JMS\Serializer\Annotation\Type;

class FooModel extends AbstractModel
{
    /**
     * @Type("string")
     *
     * @var string
     */
    private $qux;

    public function __construct()
    {
        parent::__construct();
        $this->qux = 'qux';
    }

    public function getQux(): string
    {
        return $this->qux;
    }
}
