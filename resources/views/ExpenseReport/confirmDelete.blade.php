@extends('Layouts.app')
@section('content')
<div class="row">
    <div class="col">
    <h1>Delete Report {{ $report->id }}</h1>
    </div>
</div>

<div class="row">
    <div class="col">
        <a 
        href="http://localhost/LaravelProject/public/expense_reports" 
        class="btn btn-secondary">
        Back
        </a>
    </div>
</div>
<div 
class="row">
    <div 
    class="col">
<form action="http://localhost/LaravelProject/public/expense_reports/{{ $report->id }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>
@endsection