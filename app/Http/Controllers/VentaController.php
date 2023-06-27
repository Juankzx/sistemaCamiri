<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
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
    $validator = Validator::make($request->all(), [
        'producto_id' => 'required|exists:productos,id',
        'user_id' => 'required|exists:users,id',
        'cantidad' => 'required|integer|min:1',
        'precio' => 'required|numeric|min:0',
        'metodo_pago' => 'required|string',
        'fecha' => 'required|date',
    ], [], [
        'producto_id' => 'ID del producto',
        'user_id' => 'ID del usuario',
        'cantidad' => 'cantidad',
        'precio' => 'precio',
        'metodo_pago' => 'método de pago',
        'fecha' => 'fecha',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $producto = Producto::findOrFail($request->producto_id);

    if ($request->cantidad > $producto->cantidad) {
        return redirect()->back()->with('error', 'La cantidad solicitada excede el stock disponible.');
    }

    $venta = new Venta();
    $venta->producto_id = $request->producto_id;
    $venta->user_id = $request->user_id;
    $venta->cantidad = $request->cantidad;
    $venta->precio = $request->precio;
    $venta->metodo_pago = $request->metodo_pago;
    $venta->fecha = $request->fecha;
    $venta->save();

    $producto->cantidad -= $request->cantidad;
    $producto->save();

    return redirect()->route('ventas.index')->with('success', 'La venta se ha registrado correctamente.');
}
}


