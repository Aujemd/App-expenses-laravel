<?php

namespace App\Http\Controllers;

use App\ExpenseReport;
use App\Mail\SummaryReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ExpenseReportController extends Controller
{

    public function __construct(){
        $this->middleware('auth');//Controlador para tener ruta protegida
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ExpenseReport.index',[
            'expenseReports' => ExpenseReport::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ExpenseReport.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'title' => 'required|min:3',
        ]);

        $report = new ExpenseReport();
        $report->title = $validData['title'];
        $report->save();

        return redirect('http://localhost/LaravelProject/public/expense_reports');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseReport $expenseReport)
    {
        //$report = ExpenseReport::findOrFail($id);
        return view('ExpenseReport.show', [
            'report' => $expenseReport,
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
        $report = ExpenseReport::findOrFail($id);
        return view('ExpenseReport.edit', [
            'report' => $report,
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

        $validData = $request->validate([
            'title' => 'required|min:3',
        ]);


        $report = ExpenseReport::findOrFail($id);
        $report->title = $validData['title'];
        $report->save();
        return redirect('http://localhost/LaravelProject/public/expense_reports');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = ExpenseReport::find($id);
        $report->delete();

        return redirect('http://localhost/LaravelProject/public/expense_reports');

    }

    public function confirmDelete($id)
    {
        $report = ExpenseReport::findOrFail($id);
        return view('ExpenseReport.confirmDelete', [
            'report' => $report,
        ]);
    }

    public function confirmSendEmail($id){
        $report = ExpenseReport::findOrFail($id);
        return view('ExpenseReport.confirmSendEmail', [
            'report' => $report,
        ]);
    }

    public function sendEmail(Request $request, $id){
        $report = ExpenseReport::findOrFail($id);
        Mail::to($request->get('email'))->send(new SummaryReport($report));
        return redirect('http://localhost/LaravelProject/public/expense_reports/'.$id);
    }
}
