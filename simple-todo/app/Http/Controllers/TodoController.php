<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    protected $todo;
    public function __construct() {
        $this->todo = new Todo();
    }
    #
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response['todos'] = $this->todo->all();
        return view('pages.index')->with($response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->todo->create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {
        $response['todos'] = $this->todo->find($id);
        return view('pages.edit')->with($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $todo = $this->todo->find($id);
        $todo->update(array_merge($todo->toArray(), $request->toArray()));
        return redirect('todo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->todo->find($id)->delete();
        return redirect()->back();
    }
}
