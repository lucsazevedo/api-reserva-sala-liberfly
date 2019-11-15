<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Agendamento;
use Illuminate\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;

class AgendamentoController extends Controller
{
    private $model;

    public function __construct(Agendamento $agendamento)
    {
        $this->model = $agendamento;
    }

    public function listarDia($dia){
        $agendamento = $this->model
                            ->whereRaw("DATE_FORMAT(`dt_inicio`, \"%Y-%m-%d\") = DATE_FORMAT('$dia', \"%Y-%m-%d\")")
                            ->where('inativo', false)
                            ->get();
        return response()->json($agendamento, Response::HTTP_OK);
    }

    public function agendar(Request $request){
        $agendado = $this->model
                    ->whereRaw('(DATE_FORMAT(`dt_inicio`, "%Y-%m-%d %H:%i")
                                    between DATE_FORMAT("'.$request->input('dt_inicio').'", "%Y-%m-%d %H:%i")
                                        and DATE_FORMAT("'.$request->input('dt_fim').'", "%Y-%m-%d %H:%i")
                                    or
                                DATE_FORMAT(`dt_fim`, "%Y-%m-%d %H:%i")
                                    between DATE_FORMAT("'.$request->input('dt_inicio').'", "%Y-%m-%d %H:%i")
                                        and DATE_FORMAT("'.$request->input('dt_fim').'", "%Y-%m-%d %H:%i") )')
                    ->where('id_sala', $request->input('id_sala'))
                    ->where('inativo', '0')
                    ->first();

        if(empty($agendado))
        {
            $agendamento = $this->model->create($request->all());
            return response()->json($agendamento, Response::HTTP_CREATED);
        }else{
            return response()->json('Horario já reservado', Response::HTTP_OK);
        }
    }

    public function desmarcar($id){
        $agendamento = $this->model->find($id);
        if(!empty($agendamento)){
            $agendamento->update(['inativo'=>true]);
            return response()->json($agendamento, Response::HTTP_OK);
        }else{
            return response()->json('Agendamento não encontrado', Response::HTTP_OK);
        }
    }
}
