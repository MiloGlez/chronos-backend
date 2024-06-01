<?php
namespace App\Repository\Status;

use App\Models\ChronoStatus;
use App\Repository\Status\Interfaces\StatusRepositoryInterface;

class EloquentStatusRepository implements StatusRepositoryInterface
{
    public function getAll()
    {
        return ChronoStatus::all();    
    }    
    

}