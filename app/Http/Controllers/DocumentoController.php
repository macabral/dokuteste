<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documentos;
use Ramsey\Uuid\Uuid;
use ZipArchive;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

        $this->validate($request, [
            'titulo' => 'required|max:254',
            'datadoc' => 'required'
        ]);

        $doc = $request->all();

        try {

            $arqs = $request->file('arquivos');

            if (isset($arqs)) {

                $dt = strtotime($doc['datadoc']);
                $year = date('Y', $dt);
                $destinationPath = 'uploads/' . auth('sanctum')->user()->id . '/' . $year . '/';
                @mkdir($destinationPath, 0777, true);

                $zip_file = Uuid::uuid4() . '.zip';
                while (file_exists($destinationPath . $zip_file)) {
                    $zip_file = Uuid::uuid4() . 'zip';
                }

                $zip_file = $destinationPath . $zip_file;

                $zip = new ZipArchive();

                if ($zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {

                    $password = 'secret';
                    $zip->setPassword($password);

                    foreach($arqs as $file) {
                        
                        $zip->addFile($file, basename($file->getClientOriginalName()));
                        $zip->setEncryptionName(basename($file->getClientOriginalName()), ZipArchive::EM_AES_256, $password);

                    }

                    $zip->close();

                } else {

                    return "An error occurred creating your ZIP file." . $zip;

                }
            } else {
                $zip_file = '';
            }

            $input = array(
                'titulo' => $doc['titulo'],
                'descricao' => $doc['descricao'],
                'datadoc' => $doc['datadoc'],
                'datavencto' => $doc['datavencto'],
                'user_id' => auth('sanctum')->user()->id,
                'nomearq' => $zip_file
            );

            Documentos::create($input);

        } catch (\Exception $e) {

            var_dump($e);
        }

        return view('novoDoc')->with('painelName', 'Novo Documento');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

