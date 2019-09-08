@extends('main')

@section('title', 'Page Title')

@section('sidebar')
    @parent
    <h4>Iulian Craciun</h4>
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="/">Home</a></li>
    </ul>
@endsection

@section('content')
    <h4><small>TEST</small></h4>
    <hr>
    <h2>Insert </h2>
    <form>
        <div class="form-group">
            <label for="stringInput">String:</label>
            <textarea class="form-control" rows="2" name="stringInput" id="stringInput"></textarea>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <div class="container">
        <div class="row">
            <div class="col-12">
                &nbsp;
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                Input
            </div>
            <div class="col-10">
                {{ $input }}
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                &nbsp;
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                Response
            </div>
            <div class="col-10">
                {{ $response }}
            </div>
        </div>
    </div>
@endsection
