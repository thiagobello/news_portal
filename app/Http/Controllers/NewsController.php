<?php namespace news_portal\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Validator;
use news_portal\News;
use news_portal\Category;
use Illuminate\Http\Request;
use news_portal\Http\Requests\NewsRequest;
use Auth;
use Storage;
use File;
use Image;
use Response;


class NewsController extends Controller

{
 /*   public function _construct()
    {
        $this->middleware('Authorizer');        
    }
*/
//Criar a noticia e retornar o ID
    public function create(NewsRequest $request)
    {   

       // return json_encode($request->all());
   
        $user = $request->input('user');
        $category = $request->input('category');
        $title = $request->input('title');
        $date = $request->input('date');
        $notice = $request->input('notice');


		$done = DB::table('news')->insertGetId(array('users_id'=>$user, 'category_id'=>$category, 'title'=>$title, 'date'=>$date, 'notice'=>$notice));

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
//Pegar a imagem do form e salvar o caminho na noticia correspondente do BD
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
                $upload = $request->image->storeAs('public/img', $nameFile);
                DB::table('news')->where('id',$request->id)->update(array('image'=>$upload));
            }
    }
//Receber o ID da rota, pesquisar o caminho do BD e exibir a imagem
    public function getImage($id)
    {
        $url = DB::table('news')->where('id', $id)->value('image');
        $arquivo = Storage::get($url);

        $image = Image::make($arquivo);
        $response = Response::make($image->encode('jpeg'));

        $response->header('Content-Type', 'image/jpeg');
 
        return $response;
    }

    public function editNews($id)
    {
        $news = News::find($id);
        $category = DB::select('select * from category');
        $selected = $news->category_id;
        //dd($selected);
        //return view('edit-news')->with('news', $news);
        return view('edit-news', array('news' => $news,'category' => $category,'selected' => $selected));
    }

    public function saveEditNews(NewsRequest $request)
    {
        //dd($request->id);
        $id = $request->input('id');
        $category = $request->input('category');
        $title = $request->input('title');
        $date = $request->input('date');
        $notice = $request->input('notice');

        DB::table('news')->where('id',$request->id)->update(array('category_id'=>$category, 'title'=>$title, 'date'=>$date, 'notice'=>$notice));

       return $this->returnId($id);
    }

    public function list()
    {
         if (Auth::Guest()) {

            return redirect('/login');
        }
    	return view('create-news')->with('category', Category::all());
    }

    public function view($id)
    {
    	$vn = News::find($id);
        if($vn){
            $vn->views++;
            $vn ->save();
        }
    	return view('view-news')->with('n',$vn);
    }

    public function home()
    {
        $news = News::where('status', '1') ->paginate(2);
        $category = DB::select('select * from category');
        return  view('home', array('news' => $news,'category' => $category));

    }


    public function SearchNews(){
       $txt = Request::input('txt');
       $news = DB::table('news')->where('notice', 'like', '%' . $txt . '%')
        ->orWhere('title', 'like', '%' . $txt . '%') ->where('status', '1') ->get();
        $error = "Nenhuma notícia foi encontrada!";
        if (empty($news)) {
            return view('search-news') -> with ('news', $error);
        }
       return view('search-news') -> with ('news', $news);
    }

    public function MostAcessed(){
        $news = DB::table('news') ->where('status','1') ->orderBy('views', 'desc') ->paginate(2);
        return view('most-acessed') ->with ('news', $news);
    }

    public function NewsWaiting(){
        $news = News::where('status', 'P') ->paginate(2);
        return view('news-waiting') -> with('news', $news);
    }

        public function ViewWaiting($id)
    {
        $vn = News::find($id);
        return view('view-news-waiting')->with('n',$vn);
    }

    public function ApproveNews($id){
        if (!Auth::Guest()) {
            $news = News::find($id);
            $id = Auth()->user()->id;
        if ($news) {
         $news->status = "A";
         $news->approved_by = $id;
         $news-> save();
        }
    return redirect('/noticias/pendentes');  
        }
      return redirect('/home');

    }

    public function ReproveNews($id){
        if (!Auth::Guest()) {
            $news = News::find($id);
            $id = Auth()->user()->id;
        if ($news) {
         $news->status = "R";
         $news->reproved_by = $id;
         $news-> save();
        }
    return redirect('/noticias/pendentes');  
        }
      return redirect('/home');

    }
}    

