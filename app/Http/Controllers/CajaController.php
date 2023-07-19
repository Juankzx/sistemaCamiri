<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caja;
use App\Models\Venta;
use App\Models\DetalleVenta;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;


class CajaController extends Controller
{
    public function index(Request $request)
    {
        // Obtener todas las cajas
        $cajas = Caja::all();

        // Crear una instancia de consulta
        $query = Caja::query();

        // Obtener los valores de los filtros de fechas
        $fechaInicio = $request->input('fecha_inicio');
        $fechaCierre = $request->input('fecha_cierre');

        // Aplicar filtros de fechas si se proporcionan
        if ($fechaInicio) {
            $query->whereDate('fecha_apertura', '>=', $fechaInicio);
        }

        if ($fechaCierre) {
            $query->whereDate('fecha_cierre', '<=', $fechaCierre);
        }

        // Obtener las cajas filtradas
        $cajas = $query->get();

        return view('caja.index', compact('cajas'));
    }


    public function create()
    {
        return view('caja.create');
    }

    public function store(Request $request)
    {
        $caja = new Caja();
        $caja->fecha_apertura = now();
        $caja->monto_apertura = $request->monto_apertura;
        $caja->user_id = Auth::id();
        $caja->cerrada = false;
        $caja->save();


        return redirect()->route('cajas.index')->with('success', 'Caja abierta exitosamente.');
    }

    public function apertura()
    {
        return view('caja.apertura');
    }

   public function cierre($id)
{
    $caja = Caja::find($id);

    if (!$caja) {
        return redirect()->route('cajas.index')->with('error', 'La caja no existe.');
    }

    // Obtener las ventas realizadas durante el periodo de apertura de la caja
    $ventas = Venta::whereBetween('created_at', [$caja->fecha_apertura, now()])->get();

    // Calcular el total de las ventas
    $totalVentas = $ventas->sum('total');

    return view('caja.cierre', compact('caja', 'ventas', 'totalVentas'));
}

public function cerrar(Request $request)
{
    // Validar los datos del formulario de cierre de caja
    $request->validate([
        'caja_id' => 'required|exists:cajas,id',
        'monto_cierre' => 'required|numeric|min:0',
    ]);

    $caja = Caja::find($request->caja_id);

    if (!$caja) {
        return redirect()->route('cajas.index')->with('error', 'La caja no existe.');
    }

    // Verificar que la caja esté abierta antes de cerrarla
    if ($caja->cerrada) {
        return redirect()->route('cajas.cierre', $caja->id)->with('error', 'La caja ya está cerrada.');
    }

    // Obtener las ventas realizadas durante el periodo de apertura de la caja
    $ventas = Venta::whereBetween('created_at', [$caja->fecha_apertura, now()])->get();

    // Calcular el total de las ventas
    $totalVentas = $ventas->sum('total');

    // Verificar que el monto de cierre coincida con el total de las ventas
    if ($request->monto_cierre != $totalVentas) {
        return redirect()->route('cajas.cierre', $caja->id)->with('error', 'El monto de cierre no coincide con el total de ventas.');
    }

    // Actualizar los campos de la caja para realizar el cierre
    $caja->fecha_cierre = now();
    $caja->monto_cierre = $request->monto_cierre;
    $caja->cerrada = true;
    $caja->save();

    return redirect()->route('cajas.balance')->with('success', 'Caja cerrada exitosamente.');
}
public function show($id)
{
    // Obtener la caja por su ID
    $caja = Caja::findOrFail($id);

    // Obtener las ventas realizadas durante el periodo de apertura de la caja
    $ventas = Venta::whereBetween('created_at', [$caja->fecha_apertura, now()])->get();

    // Calcular el total de ventas durante el periodo de apertura de la caja
    $totalVentas = $ventas->sum('total');

    // Obtener el detalle de ventas de la caja
    $detalleVentas = DetalleVenta::whereIn('venta_id', $ventas->pluck('id'))->get();

    // Obtener los productos vendidos durante el periodo de apertura de la caja
    $productosVendidos = Producto::whereIn('id', $detalleVentas->pluck('producto_id'))->get();

    return view('caja.show', compact('caja', 'ventas', 'totalVentas', 'detalleVentas', 'productosVendidos'));
}
}