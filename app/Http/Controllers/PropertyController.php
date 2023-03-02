<?php

namespace App\Http\Controllers;

use App\Exports\PropertyExport;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.properties.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.properties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'                        => 'required|unique:properties',
            'project_name'                => 'required',
            'commission_percentage'       => 'numeric',
            'price'                       => 'required|numeric',
            'commission_amount'           => 'numeric',
            'agent_commission_percentage' =>'numeric',
            'agent_commission_amount'     => 'numeric',
            'leader_commission_percentage' => 'numeric',
            'leader_commission_amount'     => 'numeric',

        ]);

        DB::beginTransaction();

        $property = new Property();
        $property->name = $request->input('name');
        $property->project_name = $request->input('project_name');
        $property->commission_percentage = $request->input('commission_percentage');
        $property->commission_amount  = $request->input('commission_amount');
        $property->agent_commission_percentage  = $request->input('agent_commission_percentage');
        $property->agent_commission_amount      = $request->input('agent_commission_amount');
        $property->leader_commission_percentage = $request->input('leader_commission_percentage');
        $property->leader_commission_amount      = $request->input('leader_commission_amount');
        $property->save();

        DB::commit();

        return Redirect::back()->with('success', 'Property Commission details added successfully');


    }
    public function exportToExcel(Request $request)
    {
        $fields = $request->fields ?? [];
        return Excel::download(new PropertyExport($fields), 'property.xlsx');

    }
}
