<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class fileController extends Controller
{
    public function storeFile(Request $request)
    {
        $contents=new Blog();

        //*Requisitando todos os dados do request
        $contents->Title=$request->input('Title');
        $contents->Title_blog=$request->input('Title_blog');
        $contents->Subtitle_blog=$request->input('Subtitle_blog');
        $contents->Category=$request->input('Category');

        //?Inicio do metodo responsavel por fazer a insercao da imagem
        if ($request->file('Another')->isValid()) {
            $filename = $request->file('Another')->getClientOriginalName();
            $link = "Ficheiros/" . $filename;
            $contents->Another = $link;
            $foto = $request->file('Another');
            $foto->move('Ficheiros/', $filename);
        }

        //*Inicio do metodo para fazer a insercao dos dados na base de dados
        $contents->save();

        //*Inicio do metodo para fazer o redirecionamento
        return response();
    }
}
