@extends('admin.master')



@section('contect_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Students</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">students</a></li>
                <li class="breadcrumb-item active">index</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div>
@endsection

@section('contect_body')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">





            </div>
            @include('admin.includes.sessions')


            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Exam Name </th>
                            <th>Duration</th>
                            <th>Score</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Actions</th>


                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=1;
                        @endphp
                        @foreach ($examsStudent as $exam)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ json_decode($exam->name)->en }}</td>
                            <td>{{ $exam->pivot->duration_min }}</td>
                            <td>{{ $exam->pivot->result }}</td>
                            <td>{{ $exam->pivot->satus }}</td>
                            <td>{{ $exam->pivot->created_at }}</td>

                            <td>
                                <a href="{{ route('deleteExamStudent',['examId'=>$exam->id,'studentId'=>$student->id]) }}"><button type="button" class="btn btn-danger">cancel</button></a>
                            </td>

                        </tr>
                        @endforeach


                    </tbody>
                </table>

            </div>

        </div>

    </div>
</div>
@endsection
