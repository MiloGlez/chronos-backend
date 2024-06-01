<?php
namespace App\Repository\Stop;

use App\Models\ChronoStop;
use App\Repository\Stop\Interfaces\StopRepositoryInterface;

class EloquentStopRepository implements StopRepositoryInterface
{
    public function getAll()
    {
        return ChronoStop::all();    
    }
    public function create($data)
    {
        return ChronoStop::create($data);
    }
    
    public function update($id, $data)
    {
        return ChronoStop::find($id)->update($data);
    }

    public function getById($id)
    {
        return ChronoStop::find($id);
    }
    
}