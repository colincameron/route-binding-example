<?php

namespace App\Http\Controllers;

use App\Models\Organisation;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Context;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organisation = Organisation::findOrFail(Context::get('organisation'));

        return $organisation->people->map(fn(Person $p) => '<a href="/people/' .  $p->id . '">' . $p->name . '</a>')->join('<br>');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Person $person)
    {
        return $person->name;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Person $person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        //
    }
}
