<?php

namespace Invoicer\App\Domain\Repositories;

interface RepositoryInterface
{
    /**
     * @param int $id
     * @return mixed
     */
    public function getById(int $id);

    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @param $entity
     * @return mixed
     */
    public function persist($entity);

    /**
     * @return mixed
     */
    public function begin();

    /**
     * @return mixed
     */
    public function commit();
}
