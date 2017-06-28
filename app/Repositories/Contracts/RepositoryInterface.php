<?php

namespace App\Repositories\Contracts;

interface RepositoryInterface
{
    public function getAll();

    public function getById($id);

    public function add($data);
}