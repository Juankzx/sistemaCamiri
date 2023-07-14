@extends('adminlte::page')

@section('template_title')
    {{ __('Crear') }} Venta
@endsection

@section('content')
<h1>Crear Venta</h1>

<form action="{{ route('ventas.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="proveedor_id">Cliente:</label>
        <select name="proveedor_id" id="proveedor_id" class="form-control">
            <option value="">Seleccione un cliente</option>
            @foreach ($proveedores as $proveedor)
                <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
            @endforeach
        </select>
    </div>

    <h2>Detalles de la Venta</h2>

    <table class="table" id="detalles_table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <select name="productos[]" class="form-control">
                        <option value="">Seleccione un producto</option>
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->id }}" data-precio="{{ $producto->precioVenta }}">{{ $producto->nombre }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" name="cantidades[]" class="form-control cantidad" min="1" value="1">

                </td>
                <td>
                    <input type="number" name="precios_unitarios[]" class="form-control precio-unitario" min="0" step="0.01" readonly>
                </td>
                <td>
                    <input type="number" name="subtotales[]" class="form-control subtotal" min="0" step="0.01" readonly>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="form-group">
        <button type="button" class="btn btn-primary" id="agregar-detalle">Agregar Producto</button>
    </div>

    <div class="form-group">
        <label for="total">Total:</label>
        <input type="number" name="total" id="total" class="form-control" readonly>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>

<script>
    // Calcular subtotal y total al cambiar los valores de los detalles de venta
    const detallesTable = document.getElementById('detalles_table');
    const cantidadInputs = document.getElementsByClassName('cantidad');
    const precioUnitarioInputs = document.getElementsByClassName('precio-unitario');
    const subtotalInputs = document.getElementsByClassName('subtotal');
    const totalInput = document.getElementById('total');

    detallesTable.addEventListener('input', calcularTotales);
    detallesTable.addEventListener('change', calcularTotales);

    function calcularTotales() {
        let total = 0;
        for (let i = 0; i < cantidadInputs.length; i++) {
            const cantidad = cantidadInputs[i].value;
            const precioUnitario = precioUnitarioInputs[i].value;
            const subtotal = cantidad * precioUnitario;
            subtotalInputs[i].value = subtotal.toFixed(2);
            total += subtotal;
        }
        totalInput.value = total.toFixed(2);
    }

    // Agregar una nueva fila de detalle de venta
    const agregarDetalleBtn = document.getElementById('agregar-detalle');
    agregarDetalleBtn.addEventListener('click', agregarDetalle);

    function agregarDetalle() {
        const nuevaFila = `
            <tr>
                <td>
                    <select name="productos[]" class="form-control">
                        <option value="">Seleccione un producto</option>
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->id }}" data-precio="{{ $producto->precioVenta }}">{{ $producto->nombre }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" name="cantidades[]" class="form-control cantidad" min="1" value="1">
                </td>
                <td>
                    <input type="number" name="precios_unitarios[]" class="form-control precio-unitario" min="0" step="0.01" readonly>
                </td>
                <td>
                    <input type="number" name="subtotales[]" class="form-control subtotal" min="0" step="0.01" readonly>
                </td>
            </tr>
        `;
        const detallesTableBody = document.querySelector('#detalles_table tbody');
        detallesTableBody.innerHTML += nuevaFila;
        actualizarPrecios();
    }

    // Actualizar precios unitarios al cambiar el producto seleccionado
    detallesTable.addEventListener('change', actualizarPrecios);

    function actualizarPrecios() {
        const selectProductos = detallesTable.querySelectorAll('select[name="productos[]"]');
        for (let i = 0; i < selectProductos.length; i++) {
            const selectProducto = selectProductos[i];
            const precioUnitarioInput = selectProducto.parentNode.nextElementSibling.nextElementSibling.querySelector('.precio-unitario');
            const selectedOption = selectProducto.options[selectProducto.selectedIndex];
            const precioUnitario = selectedOption.getAttribute('data-precio');
            precioUnitarioInput.value = precioUnitario;
        }
        calcularTotales();
    }
</script>
@endsection

@section('js')
<script>
    const productoSelect = document.getElementById('producto_id');
    const precioInput = document.getElementById('precioVenta');

    productoSelect.addEventListener('change', function() {
        // Obtener el precio del producto seleccionado
        const selectedOption = this.options[this.selectedIndex];
        const precioVenta = selectedOption.getAttribute('data-precio');

        // Establecer el precio en el input correspondiente
        precioInput.value = precioVenta;
    });
</script>
@endsection
@section('js')
<script>
    // Validar cantidad al cambiar el valor
    const cantidadInputs = document.getElementsByClassName('cantidad');
    for (let i = 0; i < cantidadInputs.length; i++) {
        cantidadInputs[i].addEventListener('change', validarCantidad);
    }

    function validarCantidad(event) {
        const input = event.target;
        const cantidad = parseInt(input.value);
        const stock = parseInt(input.getAttribute('data-stock'));

        if (isNaN(cantidad) || cantidad < 1) {
            // La cantidad no es válida
            input.value = 1;
        } else if (cantidad > stock) {
            // La cantidad excede el stock disponible
            input.value = stock;
        }
    }
</script>
@endsection

@section('css')
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
@stop