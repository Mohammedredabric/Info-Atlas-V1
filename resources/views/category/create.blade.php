@extends('layouts.fullLayoutMaster')
@section('content')
    <div class="card ">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Error!</h5>
                <ul class="text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-body" >
            <div id="toast-container" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Lorem ipsum dolor sit amet, consetetur sadipscing elitr.</div></div></div>

                <form class="text-sm text-secondary" action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                    <div class="row">
                    @csrf()
                    <div class="col-md-6 col-sm-12 col-lg-6 ">
                        <div class="form-group">
                            <label for="name">Category Title</label>
                            <input type="text" id="name" name="name" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="parebt">Parent Category</label>
                            <select class="form-control form-control-sm custom-select" name="parebt" id="parebt">
                                <option value="0" selected="true">None</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" >{{$category->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Category Thumbnail (400 X 255)</label>

                            <div class=" custom-file">
                                <label for="thumbnail">Category Thumbnail (400 X 255)</label>
                                <input type="file" class="custom-file-input form-control-sm" id="thumbnail" name="thumbnail">
                                <label class="custom-file-label" for="thumbnail">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-lg-6">
                        <div class="form-group mt-md-5- mt-lg-5 mt-sm-1">
                            <div class="align-self-center" data-name="icon_class" data-rows="3" data-cols="6" role="iconpicker"></div>
                        </div>

                    </div>
                    <div class="col-md-12col-sm-12 col-lg-12">
                        <div class="form-group">
                            <button class="btn bg-primary btn-sm" type="submit" >Add Category</button>
                        </div>
                    </div>
                    </div>
                </form>


        </div>
        <!-- /.card-body -->
    </div>
@endsection
@section('page-scripts')

@endsection
