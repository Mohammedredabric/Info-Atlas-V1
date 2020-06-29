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
                <form class="text-sm text-secondary" action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        @csrf()
                        <fieldset class="col-sm-12 col-md-6 col-lg-6">
                        <div class="col-md-12 col-sm-12 col-lg-12 ">
                            <div class="form-group ">
                                <label  for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control form-control-sm" >
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-12 ">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control form-control-sm" >
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-12 ">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control form-control-sm" >
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-12 ">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="tel" id="phone" name="phone" class="form-control form-control-sm" >
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-12 ">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control form-control-sm" name="address" id="address"  rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-12 ">
                            <div class="form-group">
                                <label for="websit">WebSit</label>
                                <input type="url" id="websit" name="websit" class="form-control form-control-sm" >
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-12 ">
                            <div class="form-group">
                                <label for="about">About</label>
                                <textarea class="form-control form-control-sm" name="about" id="about"  rows="3"></textarea>
                            </div>
                        </div>
                        </fieldset>
                        <fieldset class="col-sm-12 col-md-6 col-lg-6">
                        <div class="col-md-12 col-sm-12 col-lg-12 ">

                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input type="url" id="facebook" name="facebook" class="form-control form-control-sm" >
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-12 ">
                            <div class="form-group">
                                <label for="twitter">Twitter</label>
                                <input type="url" id="twitter" name="twitter" class="form-control form-control-sm" >
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-12 ">
                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <input type="url" id="instgram" name="instgram" class="form-control form-control-sm" >
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-12 ">
                            <div class="form-group">
                                <label for="linkedin">Linkedin</label>
                                <input type="url" id="linkedin" name="linkedin" class="form-control form-control-sm" >
                            </div>
                        </div>
                        </fieldset>
                        <fieldset class="col-sm-12 col-md-6 col-lg-6">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="form-group">
                                <button class="btn bg-primary btn-sm" type="submit" >Save</button>
                            </div>
                        </div>
                        </fieldset>
                    </div>
                </form>

        </div>
        <!-- /.card-body -->
    </div>
@endsection

