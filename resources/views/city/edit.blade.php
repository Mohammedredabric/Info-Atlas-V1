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

            <form class="text-secondary text-sm" action="{{route('city.update',$city->id)}}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    @csrf()
                    @method('PUT')
                    <div class="col-md-12 col-sm-12 col-lg-12 ">
                        <div class="form-group">
                            <label for="name">City Name</label>
                            <input type="text" id="name" name="name" class="form-control form-control-sm"  value="{{old($city->name,$city->name)}}">
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Country</label>
                                <select class="form-control Country form-control-sm " name="country_id" id="country_id">
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}" {{ ($country->id=== $city->country_id) ? 'selected':'' }}>{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>

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

