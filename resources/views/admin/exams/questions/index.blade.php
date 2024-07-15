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


                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-question">
                    New
                </button>

            </div>
            @include('admin.includes.sessions')
            @include('admin.includes.modelsExams')


            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Head Of Question</th>
                            <th>Options</th>
                            <th>Correct_Ans</th>
                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=1;
                        @endphp
                        @foreach ($questions as $question)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $question->head_of_question}}</td>
                            <td>
                                1- {{ $question->choice_1 }} | <br>
                                2- {{ $question->choice_2 }} | <br>
                                3- {{ $question->choice_3 }} | <br>
                                4- {{ $question->choice_4 }} |
                            </td>
                            <td>{{ $question->correct_anscer }}</td>
                            <td>

                                {{-- {{-- <a href="{{ route('showExam',['id'=>$exam->id]) }}"><button type="button"
                                        class="btn btn-primary">show</button></a> --}}

                                <button type="button" class="btn btn-secondary btn-block" data-toggle="modal"
                                    data-target="#edit-question"
                                    data-id="{{ $question->id }}"
                                    data-choice_1="{{ $question->choice_1 }}"
                                    data-choice_2="{{ $question->choice_2 }}"
                                    data-choice_3="{{ $question->choice_3 }}"
                                    data-choice_4="{{ $question->choice_4 }}"
                                    data-correct_anscer="{{ $question->correct_anscer }}"
                                    data-head_of_question="{{ $question->head_of_question }}">edit</button></a>

                                <a href="{{ route('question.delete',['questionId'=>$question->id]) }}"><button type="button"
                                        onclick="return confirm('Are You Sure From Delete')"
                                        class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
                {{ $questions->links() }}
            </div>

        </div>

    </div>
</div>
@endsection

@section('js')
<script>
    $('.btn-block').click(function(){
        let question_id=$(this).attr('data-id')
        let head= $(this).attr('data-head_of_question');
        let choice_1=$(this).attr('data-choice_1');
        let choice_2=$(this).attr('data-choice_2');
        let choice_3=$(this).attr('data-choice_3');
        let choice_4=$(this).attr('data-choice_4');
        let correct_as=$(this).attr('data-correct_anscer')
        // console.log(head,choice_1,choice_2,correct_as);
        $('#question_id').val(question_id);
        $('#head_of_question').val(head);
        $('#choice_1').val(choice_1);
        $('#choice_2').val(choice_2);
        $('#choice_3').val(choice_3);
        $('#choice_4').val(choice_4);
        $('#correct_anscer').val(correct_as);

    })
</script>

@endsection
