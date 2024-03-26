<?php

namespace App\View\Components;

use App\Models\DetailDowntime;
use Illuminate\View\Component;

class TableDetailDowntime extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $downtimeId;

    public function __construct($downtimeId)
    {
        $this->downtimeId = $downtimeId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $downtimeDetail = DetailDowntime::with('typeDowntime')->where('downtime_id', $this->downtimeId)->get();
        
        return view('components.table-detail-downtime', ['downtimeDetail'=> $downtimeDetail]);
    }
}
