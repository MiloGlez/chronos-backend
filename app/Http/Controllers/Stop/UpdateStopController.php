<?php



namespace App\Http\Controllers\Stop;
use App\Http\Controllers\Controller;
use App\Repository\Stop\EloquentStopRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class UpdateStopController extends Controller
{
    private EloquentStopRepository $eloquentStopRepository;

    public function __construct(EloquentStopRepository $repository)
    {
        $this->eloquentStopRepository = $repository;
    }

    public function __invoke($id, Request $request)
    {
        try {

            $data = array(
                'employee_id'=> $request->get('employee_id'),
                'status_id' => $request->get('status_id'),
                'start_date' => $request->get('start_date'),
                'end_date' => $request->get('end_date'),
            );
            try {
                foreach ($data as $clave => $valor) {
                    if (empty($valor) || is_null($valor) ||  $valor == '') {
                        unset($data[$clave]);
                    }
                    $request->validate(
                        [
                            'end_date' => 'required|date',
                        ],
                        [
                            'required' => 'El campo :attribute es requerido.',
                            'date' => 'El campo :attribute debe ser tipo fecha',
                        ]
                    );
                }
            } catch (ValidationException $e) {
                return $this->responseFail([], $e->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            $user = $this->eloquentStopRepository->GetById($id);

            if (!$user) {

                return $this->responseFail([], "id stop not found", Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            $return = $this->eloquentStopRepository->update($id, $data);

            return response()->json($return, 200);
        } catch (Exception $e) {
            return $this->responseFail([], $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}