@extends('admin.master')



@section('contect_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Exams</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">{{ json_decode($exam->name)->en }}</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div>
@endsection

@section('contect_body')
<form action="{{ route('updateExam',['id'=>$exam->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col">
            <label for="">Name En</label>
            <input type="text" class="form-control" placeholder="Name En" name="name_en" value="{{ json_decode($exam->name)->en }}">
        </div>
        <div class="col">
            <label for="">Name Ar</label>
            <input type="text" class="form-control" placeholder="Name Ar" name="name_ar" value="{{ json_decode($exam->name)->ar}}">
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col">
            <label for="">Duration Of Mins</label>
            <input type="number" class="form-control" placeholder="Duration Of Mins" name="duration_minates" value="{{ $exam->duration_minates }}">
        </div>
        <div class="col">
            <label for="">Deficalty</label>
            <input type="number" class="form-control" name="difficulty" placeholder="Deficalty" value="{{ $exam->difficulty }}">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <input type="number" class="form-control" name="questions" placeholder="Questions_NO" value="{{ $exam->questions }}">
        </div>

    </div>
    <br>
    <div>
        <img src="{{ asset('uploads/'.$exam->image) }}" class="rounded mx-auto d-block" alt="..." width="200" height="200" alt="...">
    </div>
    <div class="row">
        <div class="form-group">
            <label for="exampleInputFile">Image</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <select class="form-control select2 select2-hidden-accessible" value='{{ $exam->skill_id }}' name="skill_id" style="width: 100%;" data-select2-id="1"
            tabindex="-1" aria-hidden="true" >
            @foreach ($skills as $skill)
            <option  value="{{ $skill->id }}" {{ $skill->id == $exam->skill_id ?  "selected" : '' }} >{{ json_decode($skill->name)->en}}</option>
            @endforeach
        </select>
    </div>

    <br>
    @include('layouts.displayingErrors')
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
