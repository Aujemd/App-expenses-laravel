@extends('Layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Reports</h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <a 
            href="http://localhost/LaravelProject/public/expense_reports/create" 
            class="btn btn-primary">
            Create new reports
            </a>
        </div>
    </div>
    <div 
    class="row">
        <div 
        class="col">
            <table 
            class="table">
                @foreach ($expenseReports as $report)
                    <tr>
                    <td><a href="http://localhost/LaravelProject/public/expense_reports/{{$report->id}}">{{$report->title}}</a></td>
                    <td><a href="http://localhost/LaravelProject/public/expense_reports/{{$report->id}}/edit">Edit</a></td>
                    <td><a href="http://localhost/LaravelProject/public/expense_reports/{{$report->id}}/confirmDelete">Delete</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>  </div>
    </div>
</div>
@endsection