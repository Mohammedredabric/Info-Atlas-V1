
@extends('layouts.fullLayoutMaster')
@section('content')
    @if (session('stg'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Success</h5>
            setttings has  {{ session('stg') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{ route('backsettings') }}" method="post" enctype="multipart/form-data" role="form" class="  text-sm text-secondary form-horizontal form-groups-bordered">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label for="website_title" class="col-sm-3 control-label">Website Title</label>
                            <input type="text" class="form-control form-control-sm" name="website_title" id="website_title" placeholder="Website Title" value="{{ (isset($settings['website_title']))?$settings['website_title']:''  }}" required="">
                        </div>
                        <div class="form-group">
                            <label for="system_title" class="col-sm-3 control-label">System Title</label>
                            <input type="text" class="form-control form-control-sm" name="system_title" id="system_title" placeholder="System Title" value="{{ (isset($settings['system_title']))?$settings['system_title']:''  }}" required="">
                        </div>
                        <div class="form-group">
                            <label for="system_email" class="col-sm-3 control-label">System Email</label>
                            <input type="email" class="form-control form-control-sm" name="system_email" id="system_email" placeholder="System Email" value="{{ (isset($settings['system_email']))?$settings['system_email']:''  }}" required="">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label for="address" class="col-sm-3 control-label">Address</label>
                            <textarea name="address" class="form-control form-control-sm"  rows="1">{{ (isset($settings['address']))?$settings['address']:''  }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-sm-3 control-label">Phone</label>
                            <input type="text" class="form-control form-control-sm" name="phone" id="phone" placeholder="Phone" value="{{ (isset($settings['phone']))?$settings['phone']:''  }}">
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label>Country</label>
                                <select class="form-control form-control-sm Country " name="country_id" id="country_id">
                                    <option value="0">None</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}" {{ isset($settings['country_id'])? (($settings['country_id']=$country->id)? 'selected':'') :'' }} >{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
                    <button type="submit" class="btn btn-info">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection

