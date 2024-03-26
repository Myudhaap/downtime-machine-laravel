<?php

namespace App\View\Components;

use App\Models\Downtime;
use App\Models\TypeDowntime;
use Illuminate\View\Component;

class AddDetailDowntime extends Component
{
    public $dowtimeId;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($dowtimeId)
    {
        $this->dowtimeId = $dowtimeId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $downtime = Downtime::with('machine', 'detailDowntime')->find($this->dowtimeId);
        $typeDowntime = TypeDowntime::all();

        return view('components.add-detail-downtime', [
            'downtime' => $downtime,
            'typeDowntime'=> $typeDowntime
        ]);
    }
}
