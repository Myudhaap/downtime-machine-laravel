<?php

namespace App\Http\Controllers;

use App\Models\TypeDowntime;
use Illuminate\Http\Request;

class TypeDowntimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = TypeDowntime::all();
        return view("pages.type-downtime.index", ["data"=> $types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.type-downtime.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TypeDowntime::create([
            "name"=> $request->name,
        ]);

        return redirect()->route("type-downtime.index")->with("success","Created successfully");
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
        $types = TypeDowntime::find($id);

        return view('pages.type-downtime.edit', ['data'=> $types]);
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
        $types = TypeDowntime::find($id);
        $types->name = $request->name;
        $types->save();

        return redirect()->route("type-downtime.index")->with("success","Updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TypeDowntime::destroy($id);
        return redirect()->route("type-downtime.index")->with("success","Deleted successfully");
    }
}
