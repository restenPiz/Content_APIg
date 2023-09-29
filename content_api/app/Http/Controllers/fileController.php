<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class fileController extends Controller
{
    //*Inicio do metodo para salvar os dados
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
    //*Inicio do metodo para fazer o update dos dados
    public function updateFile($id, Request $request)
    {
        //*Recuperando os dados usando o id
        $contents=Blog::findOrFail($id);

        $contents->Title=$request->input('Title');
        $contents->Title_blog=$request->input('Title_blog');
        $contents->Subtitle_blog=$request->input('Subtitle_blog');
        $contents->Category=$request->input('Category');
        $local=$contents->Another;

        //?Inicio do metodo que e responsavel por eliminar uma imagem ja existente
        if (File::exists($local)) {
            File::delete($local);
        }

        //?Inicio do metodo que e responsavel por salvar uma imagem
        if ($request->file('Another')->isValid()) {
            $filename = $request->file('Another')->getClientOriginalName();
            $link = "Ficheiros/" . $filename;
            $contents->Another = $link;
            $foto = $request->file('Another');
            $foto->move('Ficheiros/', $filename);
        }
        $contents->save();

        return response();
    }
    //*Inicio do metodo para eliminar os dados
    public function deleteFile($id)
    {
        //*Encontrando os dados
        $contents=Blog::findOrFail($id);

        $contents->delete();

        return response();
    }
    //*Inicio do metodo que retorna todos os dados
    public function allFile()
    {
        //*Selecionando todos os dados
        $contents=Blog::all();

        return response([
            'contents'=>$contents
        ]);
    }
}
