<?php
namespace App\Http\Controllers\Time;

use App\Http\Controllers\Controller;
use App\Repository\Time\EloquentTimeRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class CreateTimeController extends Controller {

    private EloquentTimeRepository $EloquentTimeRepository;

    public function __construct(EloquentTimeRepository $repository)
    {
        $this->EloquentTimeRepository = $repository;
    }

    public function __invoke(Request $request)
    {
        try {
            try {
                $request->validate(
                    [
                        'employee_id'=> 'required|integer|exists:chrono_employees,id',
                        'date_of_entry' => 'required|date',
                        'observation' => 'required|string',
                        
                        
                        [
                            'required' => 'El  campo :attribute es requerido',
                            'exists' => 'El campo :attribute no existe',
                            'integer' => 'El campo :attribute debe ser tipo entero',
                            'date' => 'El campo :attribute debe ser tipo fecha',
                            'string' => 'El campo :attribute debe ser string',

                        ]
                    ]
                );
            } catch (ValidationException $e) {
                return $this->responseFail([], $e->errors(), Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            $data = array(
                'employee_id'=> $request->get('employee_id'),
                'date_of_entry' => $request->get('date_of_entry'),                
                'observation' => $request->get('observation'),
            ); 

            $return = $this->EloquentTimeRepository->create($data);
            return $this->responseSuccess($data);

        } catch (Exception $e) {
            return $this->responseFail([], $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
            
        }
    }
} 