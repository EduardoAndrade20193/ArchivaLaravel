<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Licencia;


class LicenciasTable extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedLicencia = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function selectLicencia($id)
    {
        $this->selectedLicencia = Licencia::find($id);
    }

    public function render()
    {
        $licencias = Licencia::where('Nombre', 'like', '%' . $this->search . '%')
            ->orWhere('Diagnostico', 'like', '%' . $this->search . '%')
            ->orWhere('Municipio', 'like', '%' . $this->search . '%')
            ->orderBy('Fecha', 'desc')
            ->paginate(10);

        return view('livewire.licencias-table', compact('licencias'));
    }
}
