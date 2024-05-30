<?php
declare(strict_types=1);
namespace App\Http\Controllers\Status;

use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Repository\Status\EloquentStatusRepository;
use Exception;


class GetAllStatusController extends Controller
{

    private EloquentStatusRepository $eloquentStatusRepository;

    public function __construct(EloquentStatusRepository $repository)
    {
        $this->eloquentStatusRepository = $repository;
    }

    public function __invoke()
    {
        try {
            $return = $this->eloquentStatusRepository->getAll();
            return $this->responseSuccess($return);
        } catch (Exception $e) {
            return $this->responseFail([], $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}