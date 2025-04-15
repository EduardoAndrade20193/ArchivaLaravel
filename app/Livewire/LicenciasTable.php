<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Licencia;
use Livewire\Attributes\On;


class LicenciasTable extends Component
{
    use WithPagination;

    public $fechaDesde = null;
    public $fechaHasta = null;
    public $filtrar = false;
    public $search = '';

    public $selectedLicenciaId = null;
    public $selectedLicencia = null;

    public $editando = false;
    public $licenciaEditable;



    protected $listeners = ['refreshModal' => 'refresh'];


    public function refresh()
    {
        if ($this->selectedLicenciaId) {
            $this->selectedLicencia = Licencia::find($this->selectedLicenciaId);
        } else {
            $this->selectedLicencia = null;
        }
    }

    public function hydrate()
    {
        $this->refresh();
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }

     public function selectLicencia($licenciaId)
    {
        $this->selectedLicencia = $licenciaId ? Licencia::find($licenciaId) : null;
    }


     public function resetFiltros()
    {
        $this->search = '';
        $this->fechaDesde = null;
        $this->fechaHasta = null;
        $this->filtrar = false;
    }


    public function render()
    {
        $licencias = Licencia::query();
    
        if (!empty($this->search)) {
            $licencias->where(function($query) {
                $query->where('Nombre', 'like', '%' . $this->search . '%')
                      ->orWhere('Id', 'like', '%' . $this->search . '%')
                      ->orWhere('Codigo', 'like', '%' . $this->search . '%')
                      ->orWhere('Municipio', 'like', '%' . $this->search . '%')
                      ->orWhere('Diagnostico', 'like', '%' . $this->search . '%')
                      ->orWhere('Nivel', 'like', '%' . $this->search . '%')
                      ->orWhere('Serie', 'like', '%' . $this->search . '%');
            });
        }
    
        // 👉 Se activan solo si se presionó el botón o si el buscador tiene contenido
        if ($this->filtrar || !empty($this->search)) {
            if ($this->fechaDesde) {
                $licencias->whereRaw("STR_TO_DATE(Fecha, '%d/%m/%Y') >= STR_TO_DATE(?, '%Y-%m-%d')", [$this->fechaDesde]);
            }
    
            if ($this->fechaHasta) {
                $licencias->whereRaw("STR_TO_DATE(Fecha, '%d/%m/%Y') <= STR_TO_DATE(?, '%Y-%m-%d')", [$this->fechaHasta]);
            }
    
            $licencias->whereRaw("STR_TO_DATE(Fecha, '%d/%m/%Y') IS NOT NULL");
        }
    
        $licencias = $licencias->orderByRaw("STR_TO_DATE(Fecha, '%d/%m/%Y') DESC")
                               ->paginate(20);
    
        return view('livewire.licencias-table', [
            'licencias' => $licencias,
        ]);
    }
    


       
    public function editar($id)
    {
        $licencia = Licencia::findOrFail($id);

        $this->licenciaEditable = [
            'Id' => $licencia->Id,
            'Nombre' => $licencia->Nombre,
            'Fecha' => $licencia->Fecha,
            'Municipio' => $licencia->Municipio,
            'Diagnostico' => $licencia->Diagnostico,
            'DiasInc' => $licencia->DiasInc,
            'Nivel' => $licencia->Nivel,
            'Serie' => $licencia->Serie,
        ];

        $this->editando = true;
    }

    public function actualizar()
    {
        $licencia = Licencia::findOrFail($this->licenciaEditable['Id']);
        $licencia->update($this->licenciaEditable);

        session()->flash('message', 'Licencia actualizada correctamente.');
        $this->editando = false;
    }
    


}
