<?php



namespace App\Http\Controllers\Time;
use App\Http\Controllers\Controller;
use App\Repository\Time\EloquentTimeRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class UpdateTimeController extends Controller
{
    private EloquentTimeRepository $eloquentTimeRepository;

    public function __construct(EloquentTimeRepository $repository)
    {
        $this->eloquentTimeRepository = $repository;
    }

    public function __invoke($id, Request $request)
    {
        try {

            $data = array(
                'employee_id'=> $request->get('employee_id'),
                'date_of_entry' => $request->get('date_of_entry'),
                'departure_date' => $request->get('departure_date'),
                'observation' => $request->get('observation'),
            );
            try {
                foreach ($data as $clave => $valor) {
                    if (empty($valor) || is_null($valor) ||  $valor == '') {
                        unset($data[$clave]);
                    }
                    $request->validate(
                        [
                            'departure_date' => 'required|date',
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

            $user = $this->eloquentTimeRepository->GetById($id);

            if (!$user) {

                return $this->responseFail([], "id Time not found", Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            $return = $this->eloquentTimeRepository->update($id, $data);

            return response()->json($return, 200);
        } catch (Exception $e) {
            return $this->responseFail([], $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}