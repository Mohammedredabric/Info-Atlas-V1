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
            <form class="text-sm text-secondary" action="{{route('quality.store')}}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    @csrf()
                    <div class="col-md-12 col-sm-12 col-lg-12 ">
                        <div class="form-group">
                            <label for="rating_from">Rating From</label>
                            <input type="text" id="rating_from" name="rating_from" class="form-control form-control-sm" >
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-lg-12 ">
                        <div class="form-group">
                            <label for="name">Rating To</label>
                            <input type="text" id="rating_to" name="rating_to" class="form-control form-control-sm" >
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-lg-12 ">
                        <div class="form-group">
                            <label for="quality">Quality</label>
                            <input type="text" id="quality" name="quality" class="form-control form-control-sm" >
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="form-group">
                            <button class="btn bg-primary btn-sm" type="submit" >Save</button>
                        </div>
                    </div>
                </div>
            </form>


        </div>
        <!-- /.card-body -->
    </div>
@endsection

