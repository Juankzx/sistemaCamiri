<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::all();

        return view('proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'correo_electronico' => 'required|email',
            'ciudad' => 'required',
            'comuna' => 'required',
        ]);

        Proveedor::create([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'correo_electronico' => $request->correo_electronico,
            'ciudad' => $request->ciudad,
            'comuna' => $request->comuna,
        ]);

        return redirect()->route('proveedores.index')->with('success', 'Proveedor creado exitosamente');
    }
}
