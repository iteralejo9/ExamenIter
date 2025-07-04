<div>
    <div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Gestión de Medicinas</h1>

    @if (session()->has('mensaje'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('mensaje') }}
        </div>
    @endif

    <form wire:submit.prevent="store" class="grid gap-4 mb-6 bg-white p-6 rounded shadow">
        <div class="grid md:grid-cols-3 gap-4">
            <input wire:model="nombre" type="text" placeholder="Nombre*" class="border p-2 rounded">
            <input wire:model="principio_activo" type="text" placeholder="Principio Activo*" class="border p-2 rounded">
            <input wire:model="concentracion" type="text" placeholder="Concentración*" class="border p-2 rounded">
            <input wire:model="laboratorio" type="text" placeholder="Laboratorio*" class="border p-2 rounded">
            <input wire:model="stock" type="number" placeholder="Stock*" class="border p-2 rounded">
            <input wire:model="precio" type="number" step="0.01" placeholder="Precio*" class="border p-2 rounded">
            <input wire:model="fecha_vencimiento" type="date" class="border p-2 rounded">
            <input wire:model="categoria" type="text" placeholder="Categoría*" class="border p-2 rounded">
            <label class="flex items-center">
                <input type="checkbox" wire:model="estado" class="mr-2"> Activo
            </label>
        </div>

        <div class="flex gap-4 mt-4">
            <button type="submit" class="bg-red-600 text-black px-4 py-2 rounded hover:bg-red-700">
                {{ $medicina_id ? 'Actualizar Medicina' : 'Guardar Medicina' }}
            </button>
            <button type="button" wire:click="resetFields" class="bg-red-600 text-balck px-4 py-2 rounded hover:bg-red-600">Limpiar</button>
        </div>
    </form>
    tabla:<table class="w-full bg-white border">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2 border">ID</th>
                <th class="p-2 border">Nombre</th>
                <th class="p-2 border">Principio Activo</th>
                <th class="p-2 border">Concentración</th>
                <th class="p-2 border">Laboratorio</th>
                <th class="p-2 border">Stock</th>
                <th class="p-2 border">Precio</th>
                <th class="p-2 border">Vencimiento</th>
                <th class="p-2 border">Categoría</th>
                <th class="p-2 border">Estado</th>
                <th class="p-2 border">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($medicinas as $m)
                <tr class="text-center">
                    <td class="border p-1">{{ $m->id }}</td>
                    <td class="border p-1">{{ $m->nombre }}</td>
                    <td class="border p-1">{{ $m->principio_activo }}</td>
                    <td class="border p-1">{{ $m->concentracion }}</td>
                    <td class="border p-1">{{ $m->laboratorio }}</td>
                    <td class="border p-1">{{ $m->stock }}</td>
                    <td class="border p-1">${{ number_format($m->precio, 2) }}</td>
                    <td class="border p-1">{{ $m->fecha_vencimiento }}</td>
                    <td class="border p-1">{{ $m->categoria }}</td>
                    <td class="border p-1">{{ $m->estado ? 'Activo' : 'Descontinuado' }}</td>
                    <td class="border p-1 space-x-2">
                        <button wire:click="edit({{ $m->id }})" class="text-green-600 hover:underline">Editar</button>
                        <button wire:click="delete({{ $m->id }})" class="text-red-600 hover:underline">Eliminar</button>
                    </td>
                </tr>
            @empty
                <tr><td colspan="11" class="text-center py-4 text-gray-500">No hay medicinas registradas.</td></tr>
            @endforelse
        </tbody>
    </table>

    
</div>

</div>
