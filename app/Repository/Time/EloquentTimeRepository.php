<?php
namespace App\Repository\Time;

use App\Models\ChronoTime;
use App\Repository\Time\Interfaces\TimeRepositoryInterface;

class EloquentTimeRepository implements TimeRepositoryInterface
{
    public function create($data)
    {
        return ChronoTime::create($data);
    }
}