<?php namespace news_portal\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use news_portal\News;
use Storage;
use File;
use Image;
use Response;

class PartnersController extends Controller
{
	public function partners()
	{
		
		return view ('partner');
	}

	public function partnersCreate(Request $request)
	{
		$name = $request->input('partner');
		$link = $request->input('link');

		$done = DB::table('partners')->insertGetId(array('name'=>$name, 'link'=>$link));

		return $this->returnId($done);
	}
//Pegar o ID e devolver pro AJAX
    public function returnId($id)
    {
        return response()->json(
            array(
                'id' => $id
            )
        );
    }

    public function saveImage(Request $request)
    {

        $image = $request->file('image'); 
        $nameFile = null;
 
            // Verifica se o arquivo retornado pelo AJAX é valido
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                 
                // Define um aleatório para o arquivo baseado no timestamps atual
                $name = uniqid(date('HisYmd'));
         
                // Recupera a extensão do arquivo
                $extension = $image->extension();
         
                // Defineo nome a ser salvo
                $nameFile = "{$name}.{$extension}";
         
                // Faz o upload:
                $upload = $request->image->storeAs('public/partners', $nameFile);
                DB::table('partners')->where('id',$request->id)->update(array('logo'=>$upload));
            }
    }
//Receber o ID da rota, pesquisar o caminho do BD e exibir a imagem
    public function getImageP($id)
    {
        $url = DB::table('partners')->where('id', $id)->value('logo');
        $arquivo = Storage::get($url);
        $image = Image::make($arquivo);
        $response = Response::make($image->encode('jpeg'));

        $response->header('Content-Type', 'image/jpeg');
 
        return $response;
    }
    
}
