@extends('admin.master')



@section('contect_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Categories</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">category</a></li>
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


                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
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
                            <th>Name </th>

                            <th>Created At</th>
                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=1;
                        @endphp
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $category->name($lang)}}</td>

                            <td>{{ $category->created_at->format('Y-M-D') }}</td>
                            <td>
                                {{-- <button type="button" class="btn btn-secondary">Edit</button> --}}
                                <button type="button" class="btn btn-secondary edit-btn" data-id="{{ $category->id }}"
                                    data-Name-ar="{{ json_decode($category->name)->ar }}"
                                    data-Name-en="{{ json_decode($category->name)->en }}" data-toggle="modal"
                                    data-target="#modal-Edit">
                                    Edit
                                </button>
                                <a href="{{ route('deleteCategory',['id'=>$category->id]) }}">
                                    <button onclick="return confirm('Are You Sure From Delete')" type="button"
                                        class="btn btn-danger ">Delete</button>
                                </a>

                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
                {{ $categories->links() }}
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
        $('#edit-name-ar').val(NameAr);
        $('#edit-name-en').val(NameEn);
        $('#category-id').val(id);
    })
</script>

@endsection
