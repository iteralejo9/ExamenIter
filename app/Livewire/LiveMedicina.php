<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Medicina;

class LiveMedicina extends Component
{
    public $medicina_id, $nombre, $principio_activo, $concentracion, $laboratorio;
    public $stock, $precio, $fecha_vencimiento, $categoria, $estado = true;

    public function render()
    {
        return view('livewire.live-medicina', [
            'medicinas' => Medicina::orderByDesc('id')->get()
        ]);
    }

    public function store()
    {
        $this->validate([
            'nombre' => 'required|max:150',
            'principio_activo' => 'required|max:200',
            'concentracion' => 'required|max:50',
            'laboratorio' => 'required|max:100',
            'stock' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0.01',
            'fecha_vencimiento' => 'required|date',
            'categoria' => 'required|max:50',
            'estado' => 'boolean',
        ]);

        if ($this->medicina_id) {
            Medicina::findOrFail($this->medicina_id)->update($this->only([
                'nombre', 'principio_activo', 'concentracion', 'laboratorio', 'stock', 'precio', 'fecha_vencimiento', 'categoria', 'estado'
            ]));
            session()->flash('mensaje', 'Medicina actualizada exitosamente.');
        } else {
            Medicina::create($this->only([
                'nombre', 'principio_activo', 'concentracion', 'laboratorio', 'stock', 'precio', 'fecha_vencimiento', 'categoria', 'estado'
            ]));
            session()->flash('mensaje', 'Medicina guardada exitosamente.');
        }

        $this->resetFields();
    }

  
}