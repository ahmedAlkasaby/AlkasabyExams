@extends('admin.master')



@section('contect_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Students</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">students</a></li>
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


                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-skill">
                    New
                </button> --}}


            </div>
            @include('admin.includes.sessions')


            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name </th>
                            <th>Email</th>
                            <th>Verfy</th>
                            <th>Actions</th>


                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=1;
                        @endphp
                        @foreach ($students as $student)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>
                                @if ($student->email_verified_at != null)
                                <button type="button" class="btn btn-primary">Yes</button>
                                @else
                                <button type="button" class="btn btn-danger">No</button>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('studentScores',['studentId'=>$student->id]) }}"><button type="button" class="btn btn-success">Scors</button></a>
                                <a href="{{ route('studentDelete',['studentId'=>$student->id]) }}"><button type="button" class="btn btn-danger">Delete</button></a>
                            </td>

                        </tr>
                        @endforeach


                    </tbody>
                </table>
                {{ $students->links() }}
            </div>

        </div>

    </div>
</div>
@endsection


