<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Producto;
use App\Models\User;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::all();
        return view('ventas.index', compact('ventas'));
    }

    public function create()
{
    $productos = Producto::all();
    $users = User::all(); // Obtener todos los usuarios

    return view('ventas.create', compact('productos', 'users'));
}


    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'user_id' => 'required|exists:users,id',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
            'metodo_pago' => 'required|string',
            'fecha' => 'required|date',
        ]);

        $venta = new Venta();
        $venta->producto_id = $request->producto_id;
        $venta->user_id = $request->user_id;
        $venta->cantidad = $request->cantidad;
        $venta->precio = $request->precio;
        $venta->metodo_pago = $request->metodo_pago;
        $venta->fecha = $request->fecha;
        $venta->save();

        // Actualizar la cantidad de productos restantes
        $producto = Producto::find($request->producto_id);
        $producto->cantidad -= $request->cantidad;
        $producto->save();

        return redirect()->route('ventas.index')->with('success', 'La venta se ha registrado correctamente.');
    }
}

