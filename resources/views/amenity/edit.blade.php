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

            <form class="text-secondary text-sm" action="{{route('amenities.update',$amenity->id)}}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    @csrf()
                    @method('PUT')
                    <div class="col-md-12 col-sm-12 col-lg-12 ">
                        <div class="form-group">
                            <label for="name">Amenity Title</label>
                            <input type="text" id="name" name="name" class="form-control form-control-sm" value="{{old($amenity->name,$amenity->name)}}">
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="form-group">
                            <label for="icon_class">Amenity Icon </label>
                            <input type="text" id="icon_class" name="icon_class" class="form-control form-control-sm" value="{{old($amenity->icon_class,$amenity->icon_class)}}">
                            <small class="test-musted"><a href="https://fontawesome.com/icons" target="_blank">get icon fontawesome here</a> </small>
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

