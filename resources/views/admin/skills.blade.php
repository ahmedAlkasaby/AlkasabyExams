@extends('admin.master')



@section('contect_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Skills</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Skill</a></li>
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


                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-skill">
                    New
                </button>

               @include('admin.includes.models')
            </div>
           @include('admin.includes.sessions')


            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name AR</th>
                            <th>Name EN</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=1;
                        @endphp
                        @foreach ($skills as $skill)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ json_decode($skill->name)->ar }}</td>
                            <td>{{ json_decode($skill->name)->en }}</td>
                            <td>{{ json_decode($skill->category->name)->en }}</td>
                            <td>
                                <img src="{{ asset('uploads/'.$skill->image) }}" class="rounded mx-auto d-block" alt="..." width="50" height="50">

                            </td>
                            <td>{{ $skill->created_at->format('Y-M-D') }}</td>
                            <td>

                                <button type="button" class="btn btn-secondary edit-btn" data-id="{{ $skill->id }}"
                                    data-Name-ar="{{ json_decode($skill->name)->ar }}"
                                    data-Name-en="{{ json_decode($skill->name)->en }}"
                                    data-category_id="{{ $skill->category_id }}"
                                     data-toggle="modal"
                                    data-target="#skill-Edit">
                                    Edit
                                </button>
                                <a href="{{ route('deleteSkill',['id'=>$skill->id]) }}">
                                    <button onclick="return confirm('Are You Sure From Delete')" type="button"
                                        class="btn btn-danger ">Delete</button>
                                </a>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
                {{ $skills->links() }}
            </div>

        </div>

    </div>
</div>
@endsection

@section('js')
<script>
    $('.edit-btn').click(function(){
        let id= $(this).attr('data-id');
        let NameAr=$(this).attr('data-Name-ar');
        let NameEn=$(this).attr('data-Name-en');
        let SelectCategory=$(this).attr('data-category_id');
        // console.log(id,NameAr,NameEn,SelectCategory);
        $('#edit-name-ar-skill').val(NameAr);
        $('#edit-name-en-skill').val(NameEn);
        $('#skill-id').val(id);
        $('#select-category').val(SelectCategory);
    })
</script>

@endsection
