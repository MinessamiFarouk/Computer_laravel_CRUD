<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;

class ComputerController extends Controller
{
    //array of static data
    // private static function getData() {
    //     return [
    //         ['id' => 1, 'name' => 'LG', 'origin' => 'KORIA', 'price' => 99],
    //         ['id' => 2, 'name' => 'HP', 'origin' => 'USA', 'price' => 99],
    //         ['id' => 3, 'name' => 'SIEMENS', 'origin' => 'GERMANY', 'price' => 99],
    //         ['id' => 4, 'name' => 'LENOVO', 'origin' => 'FRANCE', 'price' => 99]
    //     ];
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("computer/index", ['computers' => Computer::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("computer.create");
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
            'computer_name' => 'required',
            'computer_origin' => 'required',
            'computer_price' => 'required | integer'
        ]);

        $computer = new Computer();

        $computer->name = strip_tags($request->input("computer_name"));
        $computer->origin = strip_tags($request->input("computer_origin"));
        $computer->price = strip_tags($request->input("computer_price"));
        $computer->save();

        return redirect()->route('computer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($computer_id)
    {
        // this is code below is working
        // $computers = [...Computer::all()];
        // $index = array_search($computer, array_column($computers, 'id'));

        // if($index === false) {
        //     abort(404);
        // }
        
        // return view("computer.show", ["computer" => $computers[$index]]);

        // or we can try this code to

        return view("computer.show", ["computer" => Computer::findOrFail($computer_id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("computer.edit", ["computer" => Computer::findOrFail($id)]);
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
        $request->validate([
            'computer_name' => 'required',
            'computer_origin' => 'required',
            'computer_price' => 'required | integer'
        ]);

        $to_update = Computer::findOrFail($id);

        $to_update->name = strip_tags($request->input("computer_name"));
        $to_update->origin = strip_tags($request->input("computer_origin"));
        $to_update->price = strip_tags($request->input("computer_price"));
        $to_update->save();

        return redirect()->route('computer.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $to_delete = Computer::findOrFail($id);
        $to_delete->delete();
        return redirect()->route("computer.index");
    }
}
