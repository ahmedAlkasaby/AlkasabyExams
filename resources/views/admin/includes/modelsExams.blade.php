<div class="modal fade" id="create-question" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Question</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Create Question</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('question.store',['examId'=>$exam->id]) }}" method="post">
                            @csrf

                           <div class="form-group">
                            <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i>Head Of Question</label>
                            <input type="text" name="head_of_question" class="form-control is-valid" id="inputSuccess" placeholder="Enter ..." required>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">

                                <div class="form-group">
                                    <label>Choice_1</label>
                                    <input type="text" name="choice_1" class="form-control" placeholder="Enter ..." required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Choice_2</label>
                                    <input type="text" name="choice_2" class="form-control" placeholder="Enter ..."required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Choice_3</label>
                                    <input type="text" name="choice_3" class="form-control" placeholder="Enter ..."required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Choice_4</label>
                                    <input type="text" name="choice_4" class="form-control" placeholder="Enter ..." required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Right Ans</label>
                            <select name="correct_anscer" class="form-control" required>
                                <option value="1">Choice 1</option>
                                <option value="2">Choice 2</option>
                                <option value="3">Choice 3</option>
                                <option value="4">Choice 4</option>
                            </select>
                        </div>

                           @include('layouts.displayingErrors')
                           <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>

</div>


<div class="modal fade" id="edit-question" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Question</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Create Question</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('question.update') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" id="question_id">
                           <div class="form-group">
                            <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i>Head Of Question</label>
                            <input type="text" name="head_of_question" class="form-control is-valid" id="head_of_question"  required>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">

                                <div class="form-group">
                                    <label>Choice_1</label>
                                    <input type="text" name="choice_1" class="form-control" id="choice_1"  required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Choice_2</label>
                                    <input type="text" name="choice_2" class="form-control" id="choice_2" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Choice_3</label>
                                    <input type="text" name="choice_3" class="form-control" id="choice_3" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Choice_4</label>
                                    <input type="text" name="choice_4" class="form-control" id="choice_4"  required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Right Ans</label>
                            <select name="correct_anscer" id="correct_anscer" class="form-control" required>
                                <option value="1">Choice 1</option>
                                <option value="2">Choice 2</option>
                                <option value="3">Choice 3</option>
                                <option value="4">Choice 4</option>
                            </select>
                        </div>

                           @include('layouts.displayingErrors')
                           <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>

</div>
