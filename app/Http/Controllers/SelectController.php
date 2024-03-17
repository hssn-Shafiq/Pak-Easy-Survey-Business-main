<?php

namespace App\Http\Controllers;

use App\Models\Select;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\File;

class SelectController extends Controller
{
    public function index()
    {
        $select = Select::all();
        return view('auth.register', compact('select'));
    }

    public function create()
    {
        return view('payment_name.create');
    }

    public function store(Request $request)
    {
        $select = new Select;
        $select->easyPaisa_name = $request->input('easyPaisa_name');
        $select->easyPaisa_number = $request->input('easyPaisa_number');

        $select->save();
        return redirect()->back()->with('status', 'select  Added Successfully');
    }

    public function edit($id)
    {
        $select = Select::find($id);
        return view('payment_name.edit', compact('select'));
    }

    public function update(Request $request, $id)
    {
        $select = Select::find($id);
        $select->name = $request->input('easyPaisa_name');
        $select->email = $request->input('easyPaisa_number');


        $select->update();
        return redirect()->back()->with('status', 'select  Updated Successfully');
    }

    public function destroy($id)
    {
        $select = Select::find($id);

        $select->delete();
        return redirect()->back()->with('status', 'select  Deleted Successfully');
    }
}
