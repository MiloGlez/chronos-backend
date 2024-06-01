<?php

namespace App\Repository\Stop\Interfaces;
interface StopRepositoryInterface
{
    public function getAll();
    public function create($data);
    public function update($id, $data);
}


