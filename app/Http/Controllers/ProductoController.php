<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::get();
        $categorias = Categoria::get();
        return view('admin.producto.index', compact('productos','categorias'));
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
        $reglas = [
            'nombre' => 'required|unique:productos|max:200',
            'cantidad' => 'required',
            'estado' => 'required'
        ];
        $validator = Validator::make($request->all(), $reglas);

        if ($validator->fails()) {
            return redirect('/producto/create')
                ->withErrors($validator)
                ->withInput();
        }
        /*
        //return back()->with('datos',$request);
        Categoria::findorFail($request->categoria_id);
        //Validar
        $reglas = [
            "nombre" => "required|min:2|max:200|unique:productos",

        ];
         $validator = $request->validate($reglas);*/

        //guardar en la base de datos
        $prod = new Producto;
        $prod->nombre = $request->nombre;
        $prod->precio = $request->precio;
        $prod->cantidad = $request->cantidad;
        $prod->descripcion = $request->descripcion;
        $prod->categoria_id = $request->categoria_id;
        $prod->estado = $request->estado;
        $prod->save();

        return redirect()->route('producto.index')->with("status", "Datos de Producto registrado exitosamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $reglas = [
            'nombre' => 'required|unique:productos|max:200',
            'cantidad' => 'required',
        ];
        $validator = Validator::make($request->all(), $reglas);

        if ($validator->fails()) {
            return redirect()->route('producto.index')
                ->withErrors($validator)
                ->withInput();
        }

        // $prod = Producto::find($id);
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->cantidad = $request->cantidad;
        $producto->descripcion = $request->descripcion;
        $producto->categoria_id = $request->categoria_id;
        $producto->save();

        return redirect()->route('producto.index')->with("status", "Datos de Producto Actualizados exitosamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('producto.index')->with("status", "Datos de Producto Eliminado exitosamente");
    }
}
