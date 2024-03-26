<?php

namespace App\Http\Controllers;

use App\Models\DetailDowntime;
use App\Models\Downtime;
use Illuminate\Http\Request;

class DowntimeDetailController extends Controller
{
    public function index($id){
        $downtimeDetails = DetailDowntime::with('typeDowntime')->where('downtime_id', $id)->get();

        $html = view('components.table-detail-downtime', ['downtimeDetail'=>$downtimeDetails])->render();

        return response()->json(['html' => $html]);
    }

    public function store(Request $request){
        DetailDowntime::create([
            'downtime_id' => $request->downtimeId,
            'type_downtime_id'=> $request->type,
            'start_time' => $request->startTime,
            'end_time' => $request->endTime,
            'description' => $request->description,
        ]);

        $downtimeDetail = DetailDowntime::with('typeDowntime')->where('downtime_id', $request->downtimeId)->get();

        $html = view('components.table-detail-downtime', ['downtimeDetail'=>$downtimeDetail])->render();


        return response()->json(['html' => $html]);
    }

    public function destroy($id){
        $downtimeDetail = DetailDowntime::with('downtime')->find($id);
        DetailDowntime::destroy($id);

        $downtimeDetails = DetailDowntime::with('typeDowntime')->where('downtime_id', $downtimeDetail->downtime->id)->get();

        // dd($downtimeDetails);

        $html = view('components.table-detail-downtime', ['downtimeDetail'=>$downtimeDetails])->render();

        return response()->json(['html' => $html]);
    }
}
