@extends('website.master')

@section('title')
Category
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
                    <li>{{ json_decode($category->name)->en }}</li>
                </ul>
                <h1 class="white-text">{{ json_decode($category->name)->en }}</h1>

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

                <!-- row -->
                <div class="row">
                    @foreach ($skills as $skill)
                    <!-- single skill -->
                    <div class="col-md-4">
                        <div class="single-blog">
                            <div class="blog-img">
                                <a href="{{ route('skill',['slug'=>$skill->slug]) }}">
                                    <img src="{{ asset($skill->image) }}" alt="">
                                </a>
                            </div>
                            <h4><a href="skill.html">{{ json_decode($skill->name)->en }}</a></h4>
                            <div class="blog-meta">
                                <span>{{ $skill->created_at->format('Y-M-D') }}</span>
                                <div class="pull-right">
                                    <span class="blog-meta-comments"><a href="#"><i class="fa fa-users"></i>
                                            {{ $skill->exams->count() }}</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /single skill -->
                    @endforeach




                </div>
                <!-- /row -->

                <!-- row -->
                <div class="row">

                    {{ $skills->links() }}

                </div>
                <!-- /row -->
            </div>
            <!-- /main blog -->

            <!-- aside blog -->
            <div id="aside" class="col-md-3">

                <!-- search widget -->
                <div class="widget search-widget">
                    <form>
                        <input class="input" type="text" name="search">
                        <button><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <!-- /search widget -->

                <!-- category widget -->
                <div class="widget category-widget">
                    <h3>Categories</h3>
                    @foreach ($categories as $category)
                    <a class="category" href="{{ route('category',['slug'=>$category->slug]) }}"> {{ json_decode($category->name)->en }}<span>{{ $category->skills->count() }}</span></a>

                    @endforeach

                </div>
                <!-- /category widget -->
            </div>
            <!-- /aside blog -->

        </div>
        <!-- row -->

    </div>
    <!-- container -->

</div>
@endsection


