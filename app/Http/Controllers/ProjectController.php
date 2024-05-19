<?php

namespace App\Http\Controllers;


use App\Models\Client;
use Akaunting\Money\Money;
use Illuminate\Http\Request;

use Akaunting\Money\Currency;
use Kantorge\CurrencyExchangeRates\Facades\CurrencyExchangeRates;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('dashboard.project.projectlist');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $client = Client::all();
        return view('dashboard.project.create',[
            'client' => $client,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('dashboard.project.project_overview');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
