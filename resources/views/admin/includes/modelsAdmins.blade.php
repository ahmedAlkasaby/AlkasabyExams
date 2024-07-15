<div class="modal fade" id="create-admin" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Skill</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <form action="{{ route('storeAdmin') }}" id="create-admin" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                                     required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="email" class="form-control" id="exampleInputPassword1" name="email"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                                required>
                            </div>


                            <div class="form-group">
                                <label for="select-skill">Role</label>
                                <select  name="role_id" class="custom-select form-control-border border-width-2"
                                    id="select-role" required>
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            @include('layouts.displayingErrors')
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>

                        <div class="card-footer">
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>

</div>

<div class="modal fade" id="skill-Edit" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Skill</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <form action="{{ route('updateSkill') }}" method="post" id="edit-skill" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name AR</label>
                                <input type="text" class="form-control" id="edit-name-ar-skill" name="name_ar" required>
                            </div>
                            <input type="hidden" id="skill-id" name="id">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Name EN</label>
                                <input type="text" class="form-control" id="edit-name-en-skill" name="name_en" required>
                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Image</label>
                                    <input class="form-control" name="image" type="file" id="formFile" >
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label for="select-skill">Category</label>
                                <select  name="category_id" class="custom-select form-control-border border-width-2"
                                    id="select-category" required>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ json_decode($category->name)->en }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            @include('layouts.displayingErrors')
                        </div>

                        <div class="card-footer">
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" form="edit-skill" class="btn btn-primary"
                    form="edit-skill">Submit</button>
            </div>
        </div>

    </div>

</div>
