<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class InstitucionesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $data;
    public function collection()
    {
        return User::all();
    }
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.instituciones', ['data' => $this->data]);
    }
}
