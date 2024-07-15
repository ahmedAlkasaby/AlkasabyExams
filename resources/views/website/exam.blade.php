@extends('website.master')

@section('title')
Exam
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
                    <li><a href="category.html">{{json_decode( $exam->skill->name)->en }}</a></li>
                    <li>Exam name</li>
                </ul>
                <h1 class="white-text">{{ json_decode($exam->name)->en }}</h1>
                <ul class="blog-post-meta">
                    <li>{{ $exam->created_at->format('Y-M-D') }}</li>
                    <li class="blog-meta-comments"><a href="#"><i class="fa fa-users"></i> {{ $exam->users->count() }}</a></li>
                </ul>
            </div>
        </div>
    </div>

</div>

<div id="blog" class="section">

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">

            <!-- main blog -->
            <div id="main" class="col-md-9">

                <!-- blog post -->
                <div class="blog-post mb-5">
                    <p>
                        An aeterno percipit per. His minim maiestatis consetetur et, brute tantas iracundia id sea.
                        Vim tota nostrum reformidans te. Nam ad appareat mediocritatem, mediocrem similique usu ex,
                        scaevola invidunt eu sed.
                        An aeterno percipit per. His minim maiestatis consetetur et, brute tantas iracundia id sea.
                        Vim tota nostrum reformidans te. Nam ad appareat mediocritatem, mediocrem similique usu ex,
                        scaevola invidunt eu sed.
                        An aeterno percipit per. His minim maiestatis consetetur et, brute tantas iracundia id sea.
                        Vim tota nostrum reformidans te. Nam ad appareat mediocritatem, mediocrem similique usu ex,
                        scaevola invidunt eu sed.
                        An aeterno percipit per. His minim maiestatis consetetur et, brute tantas iracundia id sea.
                        Vim tota nostrum reformidans te. Nam ad appareat mediocritatem, mediocrem similique usu ex,
                        scaevola invidunt eu sed.
                        An aeterno percipit per. His minim maiestatis consetetur et, brute tantas iracundia id sea.
                        Vim tota nostrum reformidans te. Nam ad appareat mediocritatem, mediocrem similique usu ex,
                        scaevola invidunt eu sed.
                    </p>
                </div>
                <!-- /blog post -->

                @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                      </div>
                @endif








                @if ($pivoteRecord== null || $pivoteRecord->satus=="open" )
                <form action="{{ route('questions',['slug'=>$exam->slug]) }}" method="post">
                    @csrf
                <div>
                    <button type="submit" class="main-button icon-button pull-left">Start Exam</button>
                </div>
                </form>
                @endif



            </div>
            <!-- /main blog -->

            <!-- aside blog -->
            <div id="aside" class="col-md-3">

                <!-- exam details widget -->
                <ul class="list-group">
                    <li class="list-group-item">Skill: {{ json_decode($exam->name)->en }}</li>
                    <li class="list-group-item">Questions: {{ $exam->questions}}</li>
                    <li class="list-group-item">Duration: {{ $exam->duration_minates }} mins</li>
                    <li class="list-group-item">Difficulty:{{ $exam->difficulty }}/5
                        <span class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        </span>
                    </li>
                </ul>
                <!-- /exam details widget -->



            </div>
            <!-- /aside blog -->

        </div>
        <!-- row -->

    </div>
    <!-- container -->

</div>
@endsection
@section('css')
<link rel="stylesheet" href="css\star.css">
@endsection
