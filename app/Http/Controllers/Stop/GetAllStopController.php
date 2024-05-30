<?php
declare(strict_types=1);
namespace App\Http\Controllers\Stop;

use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Repository\Stop\EloquentStopRepository;
use Exception;


class GetAllStopController extends Controller
{

    private EloquentStopRepository $eloquentStopRepository;

    public function __construct(EloquentStopRepository $repository)
    {
        $this->eloquentStopRepository = $repository;
    }

    public function __invoke()
    {
        try {
            $return = $this->eloquentStopRepository->getAll();
            return $this->responseSuccess($return);
        } catch (Exception $e) {
            return $this->responseFail([], $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}