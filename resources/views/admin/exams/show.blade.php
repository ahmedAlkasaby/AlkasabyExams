@extends('admin.master')



@section('contect_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Exams</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Exam</a></li>
                <li class="breadcrumb-item active">show</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div>
@endsection

@section('contect_body')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Bordered Table</h3>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Task</th>
                    <th>Progress</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1.</td>
                    <th> Name AR</th>
                    <td>{{ json_decode($exam->name)->ar }}</td>
                </tr>
                <tr>
                    <td>1.</td>
                    <th> Name En</th>
                    <td>{{ json_decode($exam->name)->en }}</td>
                </tr>
                <tr>
                    <td>1.</td>
                    <th> Name AR</th>
                    <td>{{ json_decode($exam->name)->ar }}</td>
                </tr>
                <tr>
                    <td>1.</td>
                    <th>Skill</th>
                    <td>{{ json_decode($exam->skill->name)->ar }}</td>
                </tr>
                <tr>
                    <td>1.</td>
                    <th> Image</th>
                    <td>
                        <img src="{{ asset('uploads/'.$exam->image) }}" class="rounded mx-auto d-block" alt="..." width="50" height="50">

                    </td>
                </tr>
                <tr>
                    <td>1.</td>
                    <th>Questions_no</th>
                    <td>{{ $exam->questions }}</td>
                </tr>
                <tr>
                    <td>1.</td>
                    <th>Duration Mins</th>
                    <td>{{ $exam->duration_minates }}</td>
                </tr>
                <tr>
                    <td>1.</td>
                    <th>Difficulty</th>
                    <td>{{ $exam->difficulty }}/5</td>
                </tr>
                <tr>
                    <td>1.</td>
                    <th>Created At</th>
                    <td>{{ $exam->created_at->format('Y-M-D') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        <button type="button" class="btn btn-primary">Questions</button>
        <a href="{{ url()->previous() }}">
<button type="button" class="btn btn-secondary">Back</button>
</a>
    </div>


</div>
@endsection
