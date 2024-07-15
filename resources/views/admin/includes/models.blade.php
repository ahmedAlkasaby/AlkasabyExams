<div class="modal fade" id="modal-lg" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <form action="{{ route('storeCategory') }}" method="post" id="create-category">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name AR</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="name_ar"
                                    placeholder="Name AR" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Name EN</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="name_en"
                                    placeholder="Name En" required>
                            </div>
                            @include('layouts.displayingErrors')
                        </div>

                        <div class="card-footer">
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="create-category">Submit</button>
            </div>
        </div>

    </div>

</div>
<div class="modal fade" id="modal-Edit" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <form action="{{ route('updateCategory') }}" method="post" id="edit-category">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name AR</label>
                                <input type="text" class="form-control" id="edit-name-ar" name="name_ar" required>
                            </div>
                            <input type="hidden" id="category-id" name="id">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Name EN</label>
                                <input type="text" class="form-control" id="edit-name-en" name="name_en" required>
                            </div>
                            @include('layouts.displayingErrors')
                        </div>

                        <div class="card-footer">
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" form="edit-category" class="btn btn-primary"
                    form="create-category">Submit</button>
            </div>
        </div>

    </div>

</div>



<div class="modal fade" id="create-skill" style="display: none;" aria-hidden="true">
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
                    <form action="{{ route('storeSkill') }}" id="create-skill" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name AR</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="name_ar"
                                    placeholder="Name AR" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Name EN</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="name_en"
                                    placeholder="Name En" required>
                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Image</label>
                                    <input class="form-control" name="image" type="file" id="formFile" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="select-skill">Category</label>
                                <select  name="category_id" class="custom-select form-control-border border-width-2"
                                    id="select-skill" required>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ json_decode($category->name)->en }}</option>
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
                            <div class="form-group">
                                <label for="select-skill">Category</label>
                                <select  name="category_id" class="custom-select form-control-border border-width-2"
                                    id="select-category" required>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ json_decode($category->name)->en }}</option>
                                    @endforeach
                                </select>
                            </div>
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



