@extends('admin.master')



@section('contect_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Questions</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Questions</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div>
@endsection

@section('contect_body')
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">General Elements</h3>
    </div>

    <div class="card-body">
        <form action="{{ route('storeQuestions',['id'=>$exam->id]) }}" method="post">
            @csrf
           @for ($i=0;$i<$exam->questions;$i++)
           <div class="form-group">
            <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i>Head Of Question</label>
            <input type="text" name="head_of_question[{{$i}}]" class="form-control is-valid" id="inputSuccess" placeholder="Enter ...">
        </div>
        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label>Choice_1</label>
                    <input type="text" name=" choice_1[{{$i}}] " class="form-control" placeholder="Enter ...">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Choice_2</label>
                    <input type="text" name=" choice_2[{{ $i}}] " class="form-control" placeholder="Enter ...">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Choice_3</label>
                    <input type="text" name="choice_3[{{$i}}] " class="form-control" placeholder="Enter ...">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Choice_4</label>
                    <input type="text" name=" choice_4[{{$i}}] " class="form-control" placeholder="Enter ...">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Right Ans</label>
            <select name="correct_anscer[{{$i}}]" class="form-control">
                <option value="1">Choice 1</option>
                <option value="2">Choice 2</option>
                <option value="3">Choice 3</option>
                <option value="4">Choice 4</option>
            </select>
        </div>
           @endfor
           @include('layouts.displayingErrors')
           <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</div>
@endsection
