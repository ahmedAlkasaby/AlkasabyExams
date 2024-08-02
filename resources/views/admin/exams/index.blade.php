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


                <a href="{{ route('createExam') }}" type="button" class="btn btn-primary">
                    New
                </a>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <form action="{{ route('allExams') }}" method="GET">
                            <input type="text" name="search" class="form-control float-right" placeholder="Search"
                                value="{{ request('search') }}">
                                <select  name="skill"  class="custom-select">
                                    <option value="">select skill</option>
                                    @foreach ($skills as $skill)


                                    <option value="{{ $skill->id }}">{{ $skill->name($lang) }}</option>

                                    @endforeach
                                </select>

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            @include('admin.includes.sessions')


            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name AR</th>

                            <th>Skill</th>
                            <th>Question_no</th>
                            <th>Duration Mins</th>
                            <th>Difficulty</th>
                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=1;
                        @endphp
                        @foreach ($exams as $exam)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $exam->name($lang) }}</td>

                            <td>{{ json_decode($exam->skill->name)->en}}</td>
                            <td>{{ $exam->questions }}</td>
                            <td>{{ $exam->duration_minates }}</td>
                            <td>{{ $exam->difficulty }}</td>
                            <td>

                                <a href="{{ route('allQuestions',['examId'=>$exam->id]) }}"><button type="button"
                                        class="btn btn-info">Questions</button></a>


                                <a href="{{ route('showExam',['id'=>$exam->id]) }}"><button type="button"
                                        class="btn btn-primary">show</button></a>

                                <a href="{{ route('editExam',['id'=>$exam->id]) }}"><button type="button"
                                        class="btn btn-secondary">edit</button></a>

                                <a href="{{ route('deleteExam',['id'=>$exam->id]) }}"><button type="button"
                                        onclick="return confirm('Are You Sure From Delete')"
                                        class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
                {{ $exams->links() }}
            </div>

        </div>

    </div>
</div>
@endsection
