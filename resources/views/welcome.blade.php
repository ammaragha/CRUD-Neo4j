@extends('layouts.app')
@section('content')
    <h1 class="text-center">Students CRUD</h1>
    <div class="row d-flex ">
        <h3>Imports & exports</h3>
        {!! Form::open(['route' => 'student.import', 'files' => true]) !!}
        <input type="file" name="excel" id="excel" class="form-control" required>
        <button class="btn btn-primary col-2" >Import</button>
        <a class="btn btn-secondary col-2" href="{{ Route('student.export') }}">Export</a>
        {!! Form::close() !!}
    </div>
    <hr>
    <h3>Add new student</h3>
    <form id='storeForm'>
        <div class="row">
            <input type="text" name="name" id="name" class="form-control col" placeholder="name">
            <input type="text" max="11" name="phone" id="phone" class="form-control col" placeholder="phone">
            <input type="submit" name="name" id="store" class=" btn btn-primary col">
        </div>
    </form>
    <hr>
    <h3>edit student</h3>
    <form id='updateForm'>
        <div class="row">
            <input type="text" name="name" id="name" class="form-control col" placeholder="name">
            <input type="text" max="11" name="phone" id="phone" class="form-control col" placeholder="phone">
            <input type="submit" name="name" id="store" class=" btn btn-primary col">
        </div>
    </form>
    <hr>
    <table class="table table-dark table-striped" id="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">phone</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>


        </tbody>
    </table>
@endsection

@section('js')
    <script src="{{ asset('js/main.js') }}"></script>
@endsection
