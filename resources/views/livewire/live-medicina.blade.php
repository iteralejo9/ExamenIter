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

    
</div>

</div>
