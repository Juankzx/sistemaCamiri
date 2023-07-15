<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caja;
use App\Models\Venta;
use Illuminate\Support\Facades\Auth;


class CajaController extends Controller
{
    public function index()
    {
        $cajas = Caja::all();
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
        $caja->save();
            

        return redirect()->route('cajas.index')->with('success', 'Caja abierta exitosamente.');
    }

    public function apertura()
    {
        return view('caja.apertura');
    }

    public function cierre(Caja $caja, $id)
    {
        $caja = Caja::find($id);
        $ventas = Venta::whereDate('created_at', now()->toDateString())->get();
        $totalVentas = $ventas->sum('total');

        $caja->fecha_cierre = now();
        $caja->monto_cierre = $totalVentas;
        $caja->save();

        return redirect()->route('cajas.index')->with('success', 'Caja cerrada exitosamente.');
    }

    public function balance()
    {
        $cajas = Caja::all();
        return view('caja.balance', compact('cajas'));
    }

    public function show($id)
{
    // Obtener la caja por su ID
    $caja = Caja::find($id);

    if ($caja) {
        // Retornar la vista de detalle de la caja con los datos necesarios
        return view('cajas.show', compact('caja'));
    } else {
        // Si la caja no existe, redireccionar o mostrar un mensaje de error
        return redirect()->route('cajas.index')->with('error', 'La caja no existe.');
    }
}
}