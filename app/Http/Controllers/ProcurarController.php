<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documentos;

class ProcurarController extends Controller
{
    public $showDeleteModal = false;

    public function index(Request $request)
    {
        //
      
        $input = $request->all();
        $user_id = auth('sanctum')->user()->id;

        $query = Documentos::select();

        if (! $input['datadoc1'] == '') {
            $dt1 = date_create($input['datadoc1']);
            $dt2 = date_create($input['datadoc2']);
            $query = $query->whereBetween('datadoc', [$dt1, $dt2]);
        }

        if (! $input['search'] == '') {
            $search = $input['search'];
            $query = $query->where('titulo', 'like', "%$search%")->orwhere('descricao', 'like', "%$search%");
        }


        
        $ret = $query->orderBy('datadoc', 'DESC')->orderBy('titulo', 'ASC')->get();

        foreach ($ret as $key => $value) {
            $value['datadoc'] = date('d/m/Y',strtotime($value['datadoc']));
        }

        return view('resultado')->with('painelName', 'Resultado da Procura')->with('ret', $ret)->with('showDeleteModal', $this->showDeleteModal);

    }

    public function showDeleteModal() 
    {
        $this->showDeleteModal = true;
    }
}
