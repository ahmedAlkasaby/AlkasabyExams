
<ul class="dropdown-menu">
    @foreach ($categories as $category)

       <li><a href="{{ route('category',['slug'=>$category->slug]) }}">{{  json_decode($category->name)->ar}}</a></li>

    @endforeach
</ul>



