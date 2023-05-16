<?php

namespace App\Http\Controllers;

use App\Models\DetalleVentum;
use Illuminate\Http\Request;

/**
 * Class DetalleVentumController
 * @package App\Http\Controllers
 */
class DetalleVentumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detalleVenta = DetalleVentum::paginate();

        return view('detalle-ventum.index', compact('detalleVenta'))
            ->with('i', (request()->input('page', 1) - 1) * $detalleVenta->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detalleVentum = new DetalleVentum();
        return view('detalle-ventum.create', compact('detalleVentum'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DetalleVentum::$rules);

        $detalleVentum = DetalleVentum::create($request->all());

        return redirect()->route('detalle-venta.index')
            ->with('success', 'DetalleVentum created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalleVentum = DetalleVentum::find($id);

        return view('detalle-ventum.show', compact('detalleVentum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detalleVentum = DetalleVentum::find($id);

        return view('detalle-ventum.edit', compact('detalleVentum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DetalleVentum $detalleVentum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetalleVentum $detalleVentum)
    {
        request()->validate(DetalleVentum::$rules);

        $detalleVentum->update($request->all());

        return redirect()->route('detalle-venta.index')
            ->with('success', 'DetalleVentum updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $detalleVentum = DetalleVentum::find($id)->delete();

        return redirect()->route('detalle-venta.index')
            ->with('success', 'DetalleVentum deleted successfully');
    }
}
