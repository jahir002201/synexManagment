<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Employee;
use App\Models\Expenses;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees =  User::has('employees')->pluck('name', 'id')->toArray();
        $expenses = Expenses::orderBy('id', 'desc')->get();

        return view('dashboard.expenses.index',[
            'employees' => $employees,
            'expenses' => $expenses,
        ]);
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

        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'amount' => 'required|numeric',
            'purchased_by' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            foreach ($errors->messages() as  $messages) {
                foreach ($messages as $message) {
                    flash()->options([
                        'position' => 'bottom-right',
                    ])->error($message);
                }
            }
            return back()->withErrors($validator)->withInput();
        }
        $expenses = new Expenses();
        $expenses->type = $request->type;
        $expenses->employee_id = $request->employee_id;
        $expenses->date = $request->date;
        $expenses->purchase_by = $request->purchased_by;
        $expenses->amount = $request->amount;
        $expenses->note = $request->note;
        $expenses->save();
        flash()->options([
            'position' => 'bottom-right',
        ])->success('Expense added successfully');
        return back();


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employees = User::has('employees')->pluck('name', 'id')->toArray();
        $expenses = expenses::find($id);
        return view('dashboard.expenses.edit',[
            'expenses' => $expenses,
            'employees' => $employees,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'amount' => 'required|numeric',
            'purchased_by' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            foreach ($errors->messages() as  $messages) {
                foreach ($messages as $message) {
                    flash()->options([
                        'position' => 'bottom-right',
                    ])->error($message);
                }
            }
            return back()->withErrors($validator)->withInput();
        }
        $expenses = expenses::find($id);
        $expenses->type = $request->type;
        $expenses->employee_id = $request->employee_id;
        $expenses->date = $request->date;
        $expenses->purchase_by = $request->purchased_by;
        $expenses->amount = $request->amount;
        $expenses->note = $request->note;
        $expenses->save();
        flash()->options([
            'position' => 'bottom-right',
        ])->success('Expense updated successfully');
        return redirect(route('expenses.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Expenses::find($id)->delete();
        flash()->options([
            'position' => 'bottom-right',
        ])->success('Expense deleted successfully');
        return back();
    }
}
