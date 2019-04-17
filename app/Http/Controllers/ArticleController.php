<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use KubAT\PhpSimple\HtmlDomParser;

class ArticleController extends Controller
{
    
    public function index()
    {

        $articles = Article::all();

        return view('index')->with('articles', $articles);
    }


    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        $articles = Article::all();

        return redirect('/')->with('articles', $articles);
    }

    public function form(){
        return view('form');
    }

    public function curl(){
        return view('curl');
    }

    public function search(Request $request)
    {
        $curl = curl_init();

        $request['param'] = preg_replace('/[ -]+/' , '+' , $request['param']); //Converter espaço em +

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.uplexis.com.br/blog/?s=" . $request->param,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 1000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $dom = new HTMLDomParser();
            
            $postsList = $dom->str_get_html($response)->find('div.post');
        
            $postsResult = [];
            // dd($response);
            foreach ($postsList as $index => $post) {
                $titleList = $post->find('div.title');
                $urlList = $post->find('a.orange');
                $imageList = $post->find('div.image');

                foreach ($urlList as $url) {
                    $postsResult[$index]['url'] = trim($url->getAttribute('href'));
                }

                foreach ($imageList as $url) {
                    $postsResult[$index]['img'] = substr(trim($url->getAttribute('style')), 23, -2);
                    
                }


                foreach ($titleList as $title) {
                    $postsResult[$index]['title'] = trim($title->plaintext);
                }
                
            }
            
            if(empty($postsResult)){
                return back()->with('warning','Nenhum artigo encontrado para essa pesquisa!');
            }else{

                // Gravar resultado no BD
                foreach ($postsResult as $result) {
                    Article::create([
                        'id_user' => 6,
                        'image' => $result['img'],
                        'title' => $result['title'],
                        'link' => $result['url'],
                    ]);
            }
            
                return back()->with('success','Cadastro feito com sucesso!');

            }
            
        }
    }
}
