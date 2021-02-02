<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCategoriaRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::get();
        return view('admin.categoria.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validacion del lado del servidor
        $validator = Validator::make($request->all(), [
            "nombre" => "required|unique:categorias|max:30",
        ]);

        if ($validator->fails()) {
            return redirect()->route('categoria.index')
                ->withErrors($validator)
                ->withInput();
        }
        // Validacion del lado del servidor
        /*$request->validate([
            "nombre" => "required"
        ]);*/

        $cat = new Categoria;
        $cat->nombre = $request->nombre;
        $cat->detalle = $request->detalle;
        $cat->save();

        // Categoria::create($request->validated());

        return redirect()->route('categoria.index')->with('status', 'Datos de Categoria guardados correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Categoria $categoria, Request $request)
    {
        // return $request;
        // Validacion del lado del servidor
        $request->validate([
            "nombre" => "required"
        ]);
        // $categoria = Categoria::find($id);
        $categoria->nombre = $request->nombre;
        $categoria->detalle = $request->detalle;
        $categoria->save();

        // $categoria->update($request->validated());

        return redirect()->route('categoria.index')->with('status', 'Datos de Categoria actualizados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categoria.index')->with('status', 'Datos de Categoria eliminados correctamente');
    }

    public function categoria_por_producto($id)
    {
        $categoria = Categoria::find($id);
        return view('admin.categoria.mostrar_prod', compact('categoria'));
    }
}
