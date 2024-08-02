@extends('website.master')
@section('title')
Home
@endsection

@section('content')
<!-- Home -->
<div id="home" class="hero-area">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay" style="background-image:url(./img/home-background.jpg)"></div>
    <!-- /Backgound Image -->

    <div class="home-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="white-text">SkillsHub Free Online Skill Assessment</h1>
                    <p class="lead white-text">Libris vivendo eloquentiam ex ius, nec id splendide abhorreant, eu pro
                        alii error homero.</p>
                    <a class="main-button icon-button" href="#">Get Started!</a>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /Home -->

<!-- Courses -->
<div id="courses" class="section">

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">
            <div class="section-header text-center">
                <h2>Popular Exams</h2>
                <p class="lead">Libris vivendo eloquentiam ex ius, nec id splendide abhorreant.</p>
            </div>
        </div>
        <!-- /row -->

        <!-- courses -->
        <div id="courses-wrapper">
            <!-- row -->
            <div class="row">
                @foreach ($popularExams as $exam)
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="course">
                        <a href=" {{ route('exam',['slug'=>$exam->slug]) }} " class="course-img">
                            <img src="{{ asset($exam->image) }}" alt="">
                            <i class="course-link-icon fa fa-link"></i>
                        </a>
                        <a class="course-title" href="{{ route('exam',['slug'=>$exam->slug]) }}">{{$exam->name($lang)}}</a>
                        <div class="pull-right">
                            <span class="blog-meta-comments"><a href="#"><i class="fa fa-users"></i>{{ $exam->users->count() }}</a></span>
                        </div>
                        <div class="course-details">
                            <span class="course-category">{{ $exam->skill->category->name($lang) }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
       {{ $popularExams->links() }}
    <!-- container -->

</div>
<!-- /Courses -->



<!-- Contact CTA -->
<div id="contact-cta" class="section">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay" style="background-image:url(./img/cta.jpg)"></div>
    <!-- Backgound Image -->

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">

            <div class="col-md-8 col-md-offset-2 text-center">
                <h2 class="white-text">Contact Us</h2>
                <p class="lead white-text">Libris vivendo eloquentiam ex ius, nec id splendide abhorreant.</p>
                <a class="main-button icon-button" href="contact.html">Contact Us Now</a>
            </div>

        </div>
        <!-- /row -->

    </div>
    <!-- /container -->

</div>
<!-- /Contact CTA -->
@endsection
