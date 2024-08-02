@extends('admin.master')
@section('contect_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Admins</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Admins</a></li>
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


                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-admin">
                    New
                </button>


            </div>
            @include('layouts.displayingErrors')
            @include('admin.includes.modelsAdmins')
            @include('admin.includes.sessions')


            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name </th>
                            <th>Email</th>
                            <th>Verfy</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=1;
                        @endphp
                        @foreach ($admins as $admin)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>
                                @if ($admin->email_verified_at != null)
                                <button type="button" class="btn btn-primary">Yes</button>
                                @else
                                <button type="button" class="btn btn-danger">No</button>
                                @endif
                            </td>
                            <td>{{ $admin->role->name }}</td>

                            <td>
                                @if ($admin->role_id==2)
                                <a href="{{ route('upAdmin',['userId'=>$admin->id]) }}"><button type="button" class="btn btn-primary">Up</button></a>
                                <a href="{{ route('downAdmin',['userId'=>$admin->id]) }}"><button type="button" class="btn btn-danger">Down</button></a>
                                @endif

                            </td>

                        </tr>
                        @endforeach


                    </tbody>
                </table>

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
