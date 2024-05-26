<?php
declare(strict_types=1);
namespace App\Http\Controllers\Job;

use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Repository\Job\EloquentJobRepository;
use Exception;


class GetAllJobController extends Controller
{

    private EloquentJobRepository $eloquentJobRepository;

    public function __construct(EloquentJobRepository $repository)
    {
        $this->eloquentJobRepository = $repository;
    }

    public function __invoke()
    {
        try {
            $return = $this->eloquentJobRepository->getAll();
            return $this->responseSuccess($return);
        } catch (Exception $e) {
            return $this->responseFail([], $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}