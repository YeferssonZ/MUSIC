<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musica;
use App\Models\Comentario;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class MusicaController extends Controller
{
    //
    public function index()
    {
        $id = auth()->user()->id;
        $musicas = Musica::where('user_id', $id)->get();
        return view('musicas.musicas', compact('musicas'));
    }

    public function mostrarMusica(string $ruta)
    {
        $file = Storage::disk('musicas')->get($ruta);
        return Image::make($file)->response();
    }

    public function subirMusica(Request $request)
    {
        if ($request->hasFile('musica')) {
            $id = auth()->user()->id;
            $image      = $request->file('musica');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('musicas')->put('/' . $fileName, file_get_contents($image));
            $musica = new Musica;
            $musica->user_id = $id;
            $musica->nombre_musica = $request->nombre_musica;
            $musica->ruta = $fileName;
            $musica->save();
            return redirect('/musicas');
        }
    }
    public function eliminarMusica(Request $request)
    {
        if ($request->id_musica) {
            $musica = Musica::find($request->id_musica);
            $musica->delete();

            Storage::disk('musicas')->delete($musica->ruta);
            return redirect('/musicas');
        }
    }
    public function subirComentario(Request $request)
    {
        if ($request->comentario) {
            $id = auth()->user()->id;
            $comentario = new Comentario;
            $comentario->user_id = $id;
            $comentario->musica_id = $request->id_musica;
            $comentario->comentario = $request->comentario;
            $comentario->estado = 1;
            $comentario->save();
            return redirect('/home');
        }
    }
    public function mostrarCancion(string $nombre){

       //$file = Storage::disk('musicas')->get($nombre);
       $file = storage_path() . '/app/musicas/' . $nombre;
  
  
    return response()->file( $file );
    }
}
