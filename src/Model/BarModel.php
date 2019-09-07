<?php

declare(strict_types=1);

namespace App\Model;

use JMS\Serializer\Annotation\Type;

class BarModel extends AbstractModel
{
    /**
     * @Type("string")
     *
     * @var string
     */
    private $baz;

    public function __construct()
    {
        parent::__construct();
        $this->baz = 'baz';
    }

    public function getBaz(): string
    {
        return $this->baz;
    }
}
