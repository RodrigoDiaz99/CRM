<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Product;

class SearchProducts extends Component
{
    public $search;
    public $model;
    public $fields;
    public $relationships;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function mount()
    {
        // Definimos los campos de la tabla en los que queremos buscar
        $this->fields = ['name'];
        // Si queremos añadir relaciones para evitar el N+1
        $this->relationships = ['relationship'];
        //Definimos el modelo 
        $this->model = Product::class;
    }

    public function render()
    {
        return view('livewire.search-products', [
            'producs' => empty($this->search) ? collect() : $this->query(),
        ]);
    }

    public function clearSearch()
    {
        $this->reset('search');
    }

    private function query()
    {
        return $this->whereConditions()
            // Si no queremos añadir relationships lo quitamos...
            //->with($this->relationships)
            // Por ejemplo...
            ->take(10)
            ->get();
    }

    private function whereConditions()
    {
        $query = $this->model::Query();

        foreach($this->fields as $field) {
            $query = $query->orWhere($field, 'like', '%' . $this->search . '%');
        }

        return $query;
    }
}
