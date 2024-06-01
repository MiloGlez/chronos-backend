<?php


namespace App\Http\Controllers\Stop;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Repository\Stop\EloquentStopRepository;
use Exception;
use Illuminate\Http\Response;

class GetByIdStopController extends Controller
{

    private EloquentStopRepository $eloquentStopRepository;

    public function __construct(EloquentStopRepository $repository)
    {
        $this->eloquentStopRepository = $repository;
    }

    public function __invoke($id)
    {
        try {


            $return = $this->eloquentStopRepository->GetById($id);
            if (!$return) {

                return $this->responseFail([], "Carnet no encontrado", Response::HTTP_NOT_FOUND);
            }
            return $this->responseSuccess($return);
        } catch (Exception $e) {
            return $this->responseFail([], $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}