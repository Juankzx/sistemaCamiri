<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::paginate();

        return view('producto.index', compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());

        $producto = Producto::findOrFail($id);
        $stockMinimo = $productos->stock_minimo;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto();
        $categorias = Categoria::pluck('nombre', 'id');
        return view('producto.create', compact('producto', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoria_id' => 'required',
            'nombre' => 'required',
            'cantidad' => 'required|integer|min:1',
            'precioCompra' => 'required|numeric|min:0',
            'precioVenta' => 'required|numeric|min:0',
            'estado' => 'required',
        ]);

        $producto = Producto::create($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        $categorias = Categoria::pluck('nombre', 'id');
        return view('producto.edit', compact('producto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
{
    $producto->categoria_id = $request->categoria_id;
    $producto->nombre = $request->nombre;
    $producto->cantidad = $request->cantidad;
    $producto->precioCompra = $request->precioCompra;
    $producto->precioVenta = $request->precioVenta;
    $producto->estado = $request->estado;

    if (!$producto->update()) {
        return redirect()->back()->with('error', 'Disculpa, hay un problema mientras se actualiza el producto.');
    }
    return redirect()->route('productos.index')->with('Exito', 'Éxito, su producto ha sido actualizado.');
}


    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $producto = Producto::find($id)->delete();

        return redirect()->route('productos.index')
            ->with('Exito', 'Producto eliminado exitosamente');
    }
}