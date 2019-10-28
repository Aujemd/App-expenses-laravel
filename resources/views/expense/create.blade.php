@extends('Layouts.app')
@section('content')
<div class="row">
    <div class="col">
        <h1>New Expense</h1>
    </div>
</div>

<div class="row">
    <div class="col">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <a 
        href="http://localhost/LaravelProject/public/expense_reports/{{$report->id}}" 
        class="btn btn-secondary">
        Back
        </a>
    </div>
</div>
<div 
class="row">
    <div 
    class="col">
<form action="http://localhost/LaravelProject/public/expense_reports/{{$report->id}}/expenses" method="POST">
            @csrf 
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Type a description" value="{{old('description')}}">
                <label for="amount">amount:</label>
                <input type="text" class="form-control" id="amount" name="amount" placeholder="Type a amount" value="{{old('amount')}}">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</div>
@endsection