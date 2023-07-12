<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Producto;
use App\Models\User;
use Dompdf\Dompdf;

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
        $users = User::all();
        $proveedores = Proveedor::all();

        return view('ventas.create', compact('productos', 'users', 'proveedores'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'producto_id' => 'required|exists:productos,id',
            'user_id' => 'required|exists:users,id',
            'proveedor_id' => 'required|exists:proveedores,id',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
            'metodo_pago' => 'required|string',
        ], [], [
            'producto_id' => 'ID del producto',
            'user_id' => 'ID del usuario',
            'proveedor_id' => 'ID del proveedor',
            'cantidad' => 'cantidad',
            'precio' => 'precio',
            'metodo_pago' => 'método de pago',
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
        $venta->proveedor_id = $request->proveedor_id;
        $venta->cantidad = $request->cantidad;
        $venta->precio = $producto->precioVenta;
        $venta->metodo_pago = $request->metodo_pago;
        $venta->save();

        $producto->cantidad -= $request->cantidad;
        $producto->save();

        return redirect()->route('ventas.index')->with('success', 'La venta se ha registrado correctamente.');
    }

    public function show($id)
    {
        $venta = Venta::find($id);

        return view('ventas.show', compact('venta'));
    }


    public function exportarPDF($id)
{
    $venta = Venta::find($id);

    if (!$venta) {
        return redirect()->back()->with('error', 'La venta no existe.');
    }

    // Generar el contenido del PDF utilizando los datos de la venta
    $contenidoPDF = '
        <div style="font-family: monospace; font-size: 12px;">
            <h1 style="text-align: center;">Boleta de Venta</h1>
            <p><strong>ID:</strong> ' . $venta->id . '</p>
            <p><strong>Producto:</strong> ' . $venta->producto->nombre . '</p>
            <p><strong>Usuario:</strong> ' . $venta->user->name . '</p>
            <p><strong>Proveedor:</strong> ' . $venta->proveedor->nombre . '</p>
            <p><strong>Cantidad:</strong> ' . $venta->cantidad . '</p>
            <p><strong>Precio:</strong> ' . $venta->precio . '</p>
            <p><strong>Método de Pago:</strong> ' . $venta->metodo_pago . '</p>
            <p><strong>Fecha:</strong> ' . $venta->created_at . '</p>
            <hr style="border: 1px dashed;">
            <p style="text-align: center;">¡Gracias por su compra!</p>
            <br>
            <br> <!-- Agrega espacio en blanco con elementos de salto de línea (<br>) -->
            <hr style="border: 1px dashed;">
            
        </div>
    ';

    $dompdf = new Dompdf();
    $dompdf->loadHtml($contenidoPDF);
    $dompdf->setPaper('A7', 'portrait'); // Ajustar el tamaño del papel a A7 para impresión térmica
    $dompdf->set_option('isRemoteEnabled', true);
    $dompdf->render();

    $output = $dompdf->output();
    return response($output)->header('Content-Type', 'application/pdf');
}

}