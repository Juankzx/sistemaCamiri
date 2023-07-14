<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\DB;
use App\Models\Producto;
use App\Models\User;
use Dompdf\Dompdf;
use App\Models\DetalleVenta;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class VentaController extends Controller
{
    public function index()
    {
        // Lógica para mostrar todas las ventas
        $ventas = Venta::all();
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        // Lógica para mostrar el formulario de creación de una nueva venta
        $proveedores = Proveedor::all();
        $productos = Producto::all();

        return view('ventas.create', compact('proveedores', 'productos'));
    }

    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $validator = Validator::make($request->all(), [
            'proveedor_id' => 'required',
            'total' => 'required|numeric',
            'cantidades.*' => ['required', 'integer', function ($attribute, $value, $fail) use ($request) {
                // Obtener el índice del valor actual
                $index = str_replace('cantidades.', '', $attribute);
    
                // Verificar si la cantidad vendida es mayor al stock disponible
                $producto = Producto::find($request->productos[$index]);
                $stockDisponible = $producto->cantidad;
    
                if ($value > $stockDisponible) {
                    // Mostrar una alerta de error
                    Alert::error('Error', "La cantidad vendida para el producto '{$producto->nombre}' supera el stock disponible.");
                    $fail("La cantidad vendida para el producto '{$producto->nombre}' supera el stock disponible.");
                }
            }],
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Creación de una nueva venta
        $venta = Venta::create([
            'user_id' => Auth::id(),
            'proveedor_id' => $request->proveedor_id,
            'total' => $request->total,
        ]);
    
        // Lógica para guardar los detalles de la venta
        $productos = $request->input('productos');
        $cantidades = $request->input('cantidades');
        $preciosUnitarios = $request->input('precios_unitarios');
    
        if (!empty($productos) && count($productos) === count($cantidades) && count($productos) === count($preciosUnitarios)) {
            for ($i = 0; $i < count($productos); $i++) {
                DetalleVenta::create([
                    'venta_id' => $venta->id,
                    'producto_id' => $productos[$i],
                    'cantidad' => $cantidades[$i],
                    'precio_unitario' => $preciosUnitarios[$i],
                ]);
    
                // Actualizar el stock del producto
                $producto = Producto::find($productos[$i]);
                $producto->cantidad -= $cantidades[$i];
                $producto->save();
            }
        }
    
        // Redireccionar o mostrar un mensaje de éxito
        return redirect()->route('ventas.index')->with('success', 'La venta se ha registrado correctamente.');
    }


    // Otros métodos del controlador como show(), edit(), update(), delete(), etc.
    public function show($id)
    {
        $venta = Venta::with('detallesVentas.producto')->findOrFail($id);

        return view('ventas.show', compact('venta'));
    }
    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect()->route("ventas.index")
            ->with("mensaje", "Venta eliminada");
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