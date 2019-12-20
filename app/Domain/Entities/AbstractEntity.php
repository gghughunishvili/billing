<?php

namespace Invoicer\App\Domain\Entities;

abstract class AbstractEntity
{
    protected $id;

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }
}
