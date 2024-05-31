<?php
namespace App\Http\Controllers\Stop;

use App\Http\Controllers\Controller;
use App\Repository\Stop\EloquentStopRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class CreateStopController extends Controller {

    private EloquentStopRepository $eloquentStopRepository;

    public function __construct(EloquentStopRepository $repository)
    {
        $this->eloquentStopRepository = $repository;
    }

    public function __invoke(Request $request)
    {
        try {
            try {
                $request->validate(
                    [
                        'employee_id'=> 'required|integer|exists:chrono_employees,id',
                        'status_id' => 'required|integer',
                        'start_date' => 'required|date',
                        
                        [
                            'required' => 'El  campo :attribute es requerido',
                            'exists' => 'El campo :attribute no existe',
                            'integer' => 'El campo :attribute debe ser tipo entero',
                            'date' => 'El campo :attribute debe ser tipo fecha',

                        ]
                    ]
                );
            } catch (ValidationException $e) {
                return $this->responseFail([], $e->errors(), Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            $data = array(
                'employee_id'=> $request->get('employee_id'),
                'status_id' => $request->get('status_id'),
                'start_date' => $request->get('start_date'),
                'end_date' => $request->get('end_date'),
            ); 

            $return = $this->eloquentStopRepository->create($data);
            return $this->responseSuccess($data);

        } catch (Exception $e) {
            return $this->responseFail([], $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
            
        }
    }
} 