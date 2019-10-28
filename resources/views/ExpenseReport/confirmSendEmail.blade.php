@extends('Layouts.app')
@section('content')
<div class="row">
    <div class="col">
        <h1>Send Report</h1>
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
<form action="http://localhost/LaravelProject/public/expense_reports/{{$report->id}}/sendEmail" method="POST">
            @csrf 
            <div class="form-group">
                <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Type a email" value="{{old('email')}}">
            </div>
            <button type="submit" class="btn btn-success">Send Email</button>
        </form>
    </div>
</div>
@endsection