<div class="pcoded-content">
    @include('Admin.Components.error')
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Basic Form Inputs card start -->
                            <form method='post'
                                action="{{ isset($data->post_id) ? url('/admin/posts/' . $data->post_id) : url('/admin/posts') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="font-weight-bold">Add Posts</h3>
                                    </div>
                                    <div class="card-block">

                                        <div class="row">
                                            <div class="col-lg-6 form-group row">
                                                <label class="col-sm-3 col-form-label">Post
                                                    Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="post_title"
                                                        class="form-control @error('post_title') is-invalid @enderror"
                                                        placeholder="Enter The Post Name"
                                                        value="{{ old('post_title', $data->post_title ?? '') }}">
                                                    @error('post_title')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 form-group row">
                                                <label class="col-sm-3 col-form-label">Category
                                                </label>
                                                <div class="col-sm-9">
                                                    <select name="category_id"
                                                        class="form-control @error('category_id') is-invalid @enderror">
                                                        <option value="category_id">Select Category</option>
                                                        @forelse($categoryData as $category)
                                                            <option value="{{ $category->category_id }}"
                                                                {{ isset($data) && $data->category_id == $category->category_id ? 'selected' : '' }}>
                                                                {{ $category->category_name }}
                                                            </option>
                                                        @empty
                                                            <option> No Category Exists </option>
                                                        @endforelse

                                                    </select>
                                                    @error('category_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 form-group row">
                                                <label class="col-sm-2 col-form-label">Featured
                                                    Image
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="featured_image"
                                                        class="form-control @error('featured_image') is-invalid @enderror">
                                                    @error('featured_image')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 form-group row">
                                                <label class="col-sm-2 col-form-label">Short
                                                    Description</label>
                                                <div class="col-sm-10">
                                                    <textarea rows="5" name="short_description" cols="5"
                                                        class="form-control @error('short_description') is-invalid @enderror" placeholder="Enter The Review Message">{{ old('short_description', $data->short_description ?? '') }}</textarea>
                                                    @error('short_description')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 form-group row">
                                                <label class="col-sm-2 col-form-label">
                                                    Description</label>
                                                <div class="col-sm-10">
                                                    <textarea rows="5" name="description" id="description" cols="5"
                                                        class="form-control @error('description') is-invalid @enderror" placeholder="Enter The Review Message">{{ old('description', $data->description ?? '') }}</textarea>
                                                    @error('description')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 form-group row">
                                                <label class="col-sm-2 col-form-label">Status
                                                </label>
                                                <div class="col-sm-10">
                                                    <select name="status"
                                                        class="form-control @error('status') is-invalid @enderror">
                                                        <option value="">Select Review Rating
                                                        </option>
                                                        <option value="draft"
                                                            {{ isset($data) && $data->status == 'draft' ? 'selected' : '' }}>
                                                            Draft
                                                        </option>

                                                        <option value="published"
                                                            {{ isset($data) && $data->status == 'published' ? 'selected' : '' }}>
                                                            Published
                                                        </option>
                                                    </select>
                                                    @error('status')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="font-weight-bold">Meta Data </h3>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-lg-12 form-group row">
                                                <label class="col-sm-3 col-form-label">Meta
                                                    Title</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="meta_title"
                                                        class="form-control  @error('meta_title') is-invalid @enderror"
                                                        placeholder="Enter The Meta Title"
                                                        value="{{ old('meta_title', $data->postMeta->meta_title ?? '') }}">
                                                    @error('meta_title')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 form-group row">
                                                <label class="col-sm-3 col-form-label">Meta
                                                    Description</label>
                                                <div class="col-sm-9">
                                                    <textarea rows="5" name="meta_description" id="description" cols="5"
                                                        class="form-control  @error('meta_description') is-invalid @enderror" placeholder="Enter The Meta Description">{{ old('meta_description', $data->postMeta->meta_description ?? '') }}</textarea>
                                                    @error('meta_description')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 form-group row">
                                                <label class="col-sm-3 col-form-label">Meta
                                                    Keywords</label>
                                                <div class="col-sm-9">
                                                    <textarea rows="5" name="keywords" id="description" cols="5"
                                                        class="form-control  @error('keywords') is-invalid @enderror" placeholder="Enter The Meta Keywords">{{ old('keywords', $data->postMeta->keywords ?? '') }}</textarea>
                                                    @error('keywords')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end m-3">
                                            <button type="submit" class="btn btn-primary btn-round ">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Basic Form Inputs card end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>