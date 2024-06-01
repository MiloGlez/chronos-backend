<?php


namespace App\Http\Controllers\Time;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Repository\Time\EloquentTimeRepository;
use Exception;
use Illuminate\Http\Response;

class GetByIdTimeController extends Controller
{

    private EloquentTimeRepository $eloquentTimeRepository;

    public function __construct(EloquentTimeRepository $repository)
    {
        $this->eloquentTimeRepository = $repository;
    }

    public function __invoke($id)
    {
        try {


            $return = $this->eloquentTimeRepository->GetById($id);
            if (!$return) {

                return $this->responseFail([], "Carnet no encontrado", Response::HTTP_NOT_FOUND);
            }
            return $this->responseSuccess($return);
        } catch (Exception $e) {
            return $this->responseFail([], $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}