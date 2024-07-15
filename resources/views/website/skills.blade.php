@extends('website.master')
@section('title')
Skills
@endsection
@section('content')
<div class="hero-area section">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay" style="background-image:url(./img/page-background.jpg)"></div>
    <!-- /Backgound Image -->

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <ul class="hero-area-tree">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="category.html">{{ json_decode($skill->category->name)->en }}</a></li>
                    <li> {{ json_decode($skill->name)->en }}</li>
                </ul>
                <h1 class="white-text">{{ json_decode($skill->name)->en }}</h1>

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
            <div id="main" class="col-md-12">

                <!-- row -->
                <div class="row">

                    @foreach ($exams as $exam)
                    <!-- single exam -->
                    <div class="col-md-3">
                        <div class="single-blog">
                            <div class="blog-img">
                                <a href="{{ route('exam',['slug'=>$exam->slug]) }}">
                                    <img src="{{ asset($exam->image) }}" alt="">
                                </a>
                            </div>
                            <h4><a href="{{ route('exam',['slug'=>$exam->slug]) }}">{{ json_decode($exam->name)->en }}</a></h4>
                            <div class="blog-meta">
                                <span>{{ $exam->created_at->format('Y-M-D') }}</span>
                                <div class="pull-right">
                                    <span class="blog-meta-comments"><a href="#"><i class="fa fa-users"></i>
                                            {{ $exam->users->count() }}</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /single exam -->
                    @endforeach





                </div>
                <!-- /row -->

                <!-- row -->
                <div class="row">

                   {{ $exams->links() }}

                </div>
                <!-- /row -->
            </div>
            <!-- /main blog -->

        </div>
        <!-- row -->

    </div>
    <!-- container -->

</div>
@endsection
