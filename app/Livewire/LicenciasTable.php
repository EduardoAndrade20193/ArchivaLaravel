<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Licencia;
use Livewire\Attributes\On;


class LicenciasTable extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedLicenciaId = null;
    public $selectedLicencia = null;

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

    public function render()
{
    $licencias = Licencia::query()
        ->where(function($query) {
            $query->where('Nombre', 'like', '%' . $this->search . '%')
                  ->orWhere('Id', 'like', '%' . $this->search . '%')
                  ->orWhere('Codigo', 'like', '%' . $this->search . '%')
                  ->orWhere('Municipio', 'like', '%' . $this->search . '%')
                  ->orWhere('Diagnostico', 'like', '%' . $this->search . '%')
                  ->orWhere('Nivel', 'like', '%' . $this->search . '%')
                  ->orWhere('Serie', 'like', '%' . $this->search . '%');
        })
        ->orderBy('Id', 'desc')
        ->paginate(20);

    return view('livewire.licencias-table', [
        'licencias' => $licencias,
    ]);
}

}
