@if (session('categoryCreate'))
<div class="alert alert-success" role="alert">
    {{ session('categoryCreate') }}
</div>
@endif
@if (session('categoryEdit'))
<div class="alert alert-success" role="alert">
    {{ session('categoryEdit') }}
</div>
@endif

@if (session('skillCreate'))
<div class="alert alert-success" role="alert">
    {{ session('skillCreate') }}
</div>
@endif

@if (session('skillNotDelete'))
<div class="alert alert-danger" role="alert">
    {{ session('skillNotDelete') }}
</div>
@endif

@if (session('skillEdit'))
<div class="alert alert-success" role="alert">
    {{ session('skillEdit') }}
</div>
@endif

@if (session('examEdit'))
<div class="alert alert-success" role="alert">
    {{ session('examEdit') }}
</div>
@endif

@if (session('examDelete'))
<div class="alert alert-success" role="alert">
    {{ session('examDelete') }}
</div>
@endif

@if (session('CantDeleteExam'))
<div class="alert alert-danger" role="alert">
    {{ session('CantDeleteExam') }}
</div>
@endif

@if (session('createQuestions'))
<div class="alert alert-success" role="alert">
    {{ session('createQuestions') }}
</div>
@endif

@if (session('questionCreate'))
<div class="alert alert-success" role="alert">
    {{ session('questionCreate') }}
</div>
@endif

@if (session('questionUpdate'))
<div class="alert alert-success" role="alert">
    {{ session('questionUpdate') }}
</div>
@endif

@if (session('questionDelete'))
<div class="alert alert-success" role="alert">
    {{ session('questionDelete') }}
</div>
@endif

@if (session('CantDeleteQuestion'))
<div class="alert alert-danger" role="alert">
    {{ session('CantDeleteQuestion') }}
</div>
@endif

@if (session('NotDeleteStudent'))
<div class="alert alert-danger" role="alert">
    {{ session('NotDeleteStudent') }}
</div>
@endif


@if (session('studentDelete'))
<div class="alert alert-success" role="alert">
    {{ session('studentDelete') }}
</div>
@endif


@if (session('deleteExamStudent'))
<div class="alert alert-success" role="alert">
    {{ session('deleteExamStudent') }}
</div>
@endif

@if (session('createAdmin'))
<div class="alert alert-success" role="alert">
    {{ session('createAdmin') }}
</div>
@endif

@if (session('upAdmin'))
<div class="alert alert-success" role="alert">
    {{ session('upAdmin') }}
</div>
@endif

@if (session('downAdmin'))
<div class="alert alert-success" role="alert">
    {{ session('downAdmin') }}
</div>
@endif
