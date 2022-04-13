<?php

namespace App\Http\Livewire\Dashboard;

trait OrderTrait
{
    public $columns = [
        'id' => 'Id',
        'category_id' => 'Categoría',
        'title' => 'Título',
        'date' => 'Fecha',
        'description' => 'Descripción',
        'posted' => 'Posteado',
        'type' => 'Típo'
    ];

    public $sortColumn = "id";
    public $sortDirection = "desc";

    public function sort($column)
    {
        $this->sortColumn = $column;
        $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
    }
}