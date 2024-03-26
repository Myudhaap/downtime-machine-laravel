<?php

namespace App\Http\Controllers;

use App\Models\Downtime;
use App\Models\Employee;
use App\Models\Machine;
use App\Models\TypeDowntime;
use Facade\FlareClient\View;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DowntimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Downtime::with("detailDowntime", "machine", "user")->get();

        return view("pages.downtime.index", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $machine = Machine::all();

        return view("pages.downtime.create", compact("machine"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = Employee::all()->firstWhere("user_id", Auth::user()->id);
        $typeDowntime = TypeDowntime::all();
        $result = Downtime::create([
            'machine_id' => $request->machineId,
            'user_id' => $employee->id,
            'date' => $request->date
        ]);

        $html = view('components.add-detail-downtime', ['downtime'=>$result, 'typeDowntime'=> $typeDowntime])->render();

        return response()->json(['html'=>$html]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $machine = Machine::all();
        $data = Downtime::find($id);
        $typeDowntime = TypeDowntime::all();

        return view("pages.downtime.edit", compact("machine","data","typeDowntime"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Downtime::destroy($id);

        return redirect()->route("downtime.index")->with("success","Deleted Succesfully");
    }
}
