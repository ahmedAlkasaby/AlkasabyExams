@extends('website.master')
@section('title')
Exam Questions
@endsection

@section('content')
<div class="hero-area section">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay" style="background-image:url(./img/blog-post-background.jpg)"></div>
    <!-- /Backgound Image -->

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <ul class="hero-area-tree">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="category.html">{{ json_decode($exam->skill->category->name)->en }}</a></li>
                    <li><a href="category.html">{{ json_decode($exam->skill->name)->en }}</a></li>
                    <li>{{ json_decode($exam->name)->en }}</li>
                </ul>
                <h1 class="white-text">{{ json_decode($exam->name)->en }}</h1>
                <ul class="blog-post-meta">
                    <li>{{ $exam->created_at->format('Y-M-D') }}</li>
                    <li class="blog-meta-comments"><a href="#"><i class="fa fa-users"></i> {{ $exam->users->count()
                            }}</a></li>
                </ul>
            </div>
        </div>
    </div>

</div>
<form action="{{ route('submitExam',['slug'=>$exam->slug]) }}"  method="post" id="submitForm">
@csrf
<div id="blog" class="section">

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">

            <!-- main blog -->
            <div id="main" class="col-md-9">

                <!-- blog post -->
                <div class="blog-post mb-5">
                    @php
                        $i=1
                    @endphp
                    @foreach ($questions as $question)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ $i++ }}- {{ $question->head_of_question }}?</h3>
                        </div>
                        <div class="panel-body">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="ans[{{ $question->id }}]" id="optionsRadios1" value="1">
                                    {{ $question->choice_1 }}
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="ans[{{ $question->id }}]" id="optionsRadios2" value="2">
                                    {{ $question->choice_2 }}
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="ans[{{ $question->id }}]" id="optionsRadios3" value="3">
                                    {{ $question->choice_3 }}
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="ans[{{ $question->id }}]" id="optionsRadios3" value="4">
                                    {{ $question->choice_4 }}
                                </label>
                            </div>
                        </div>
                    </div>
                    @endforeach



                    <p></p>
                </div>
                <!-- /blog post -->

                <div>
                    <button id="submitButton" type="submit"   class="main-button icon-button pull-left">Submit</button>
                    <button class="main-button icon-button btn-danger pull-left ml-sm">Cancel</button>
                </div>
            </div>
        </form>
            <!-- /main blog -->

            <!-- aside blog -->
            <div id="aside" class="col-md-3">

                <!-- exam details widget -->
                <ul class="list-group">
                    <li class="list-group-item">Skill: {{ json_decode($exam->skill->name)->en }}</li>
                    <li class="list-group-item">Questions: {{ $exam->questions }}</li>
                    <li class="list-group-item">Duration: {{ $exam->duration_minates }} mins</li>
                    <li class="list-group-item">Difficulty:{{ $exam->difficulty /5 }}</li>
                </ul>
                <!-- /exam details widget -->

                <div class="ahha" data-timer="30">

                </div>


            </div>

            <!-- /aside blog -->

        </div>
        <!-- row -->

    </div>
    <!-- container -->

</div>
@endsection

@section('css')
<link href={{ asset("css/TimeCircles.css")}} rel="stylesheet">
@endsection

@section('js')
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src={{ asset("js/TimeCircles.js")}}></script>

<script>
    $(".ahha").TimeCircles({ time: {
        Days: {
            show:false
         }
    },count_past_zero: false}).addListener(function(unit, value, total)
    {
        if(total<=0){
            $('#submitForm').submit();
        }
    })
</script>
@endsection

