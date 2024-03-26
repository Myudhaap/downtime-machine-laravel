<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Machine::with("warehouse")->get();

        return view('pages.machine.index', [
            'data'=> $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $warehouse = Warehouse::all();

        return view('pages.machine.create', [
            'warehouse' => $warehouse
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Machine::create([
            'machine_name' => $request->machine_name,
            'warehouse_id' => $request->warehouse,
            'status' => $request->status
        ]);
        return redirect()->route('machine.index')->with('success','Successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $machine = Machine::find($id);

        return view('pages.machine.detail', [
            'data' => $machine
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $machine = Machine::find($id);
        $warehouse = Warehouse::all();


        return view('pages.machine.edit', [
            'data'=> $machine,
            'warehouse' => $warehouse
        ]);
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

        // dd($request->all(0));
        
        $Machine = Machine::find($id);
        $Machine->machine_name = $request->machine_name;
        $Machine->warehouse_id = $request->warehouse;
        $Machine->status = $request->status;
        $Machine->save();

        return redirect()->route('machine.index')->with('success', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Machine::destroy($id);

        return redirect()->back()->with('success', 'Deleted successfully.');
    }
}
