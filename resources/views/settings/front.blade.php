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
            <form action="{{ route('frontsettings') }}" method="post" enctype="multipart/form-data" role="form" class="  text-sm text-secondary form-horizontal form-groups-bordered">
                @csrf
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="form-group">
                            <label for="banner_title" class="col-sm-3 control-label">Banner Title</label>
                            <input type="text" class="form-control form-control-sm" name="banner_title" id="banner_title" placeholder="Banner Title" value="{{ (isset($settings['banner_title']))?$settings['banner_title']:''  }}" required="">
                        </div>
                        <div class="form-group">
                            <label for="banner_sub_title" class="col-sm-3 control-label">Banner Sub Title</label>
                            <input type="text" class="form-control form-control-sm" name="banner_sub_title" id="banner_sub_title" placeholder="Banner Sub Title" value="{{ (isset($settings['banner_sub_title']))?$settings['banner_sub_title']:''  }}" required="">
                        </div>
                        <div class="form-group">
                            <label for="slogan" class="col-sm-3 control-label">Slogan</label>
                            <input type="text" class="form-control form-control-sm" name="slogan" id="slogan" placeholder="Slogan" value="{{ (isset($settings['slogan']))?$settings['slogan']:''  }}">
                        </div>
                        <div class="form-group">
                            <label for="facebook" class="control-label">Facebook Link</label>
                            <input type="text" name="facebook" id="facebook" class="form-control form-control-sm" placeholder="Write Down Facebook Url" value="{{ (isset($settings['facebook']))?$settings['facebook']:''  }}">
                        </div>
                        <div class="form-group">
                            <label for="twitter" class="control-label">Twitter Link</label>
                            <input type="text" name="twitter" id="twitter" class="form-control form-control-sm" placeholder="Write Down Twitter Url" value="{{ (isset($settings['twitter']))?$settings['twitter']:''  }}">

                        </div>
                        <div class="form-group">
                            <label for="linkedin" class=" control-label">Linkedin Link</label>
                            <input type="text" name="linkedin" id="linkedin" class="form-control form-control-sm" placeholder="Write Down Linkedin Url" value="{{ (isset($settings['linkedin']))?$settings['linkedin']:''  }}">
                        </div>
                        <div class="form-group">
                            <label for="instagram" class=" control-label">Instagram Link</label>
                            <input type="text" name="instagram" id="instagram" class="form-control form-control-sm" placeholder="Write Down Instagram Url" value="{{ (isset($settings['instagram']))?$settings['instagram']:''  }}">
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="form-group">
                            <label for="about_us" class=" control-label">About Us</label>
                            <textarea class="form-control form-control-sm" name="about_us" id="about_us" rows="5" >{!! (isset($settings['about_us']))?$settings['about_us']:''!!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="terms_and_condition" class=" control-label">Terms And Condition</label>
                            <textarea class="form-control form-control-sm" name="terms_and_condition" id="terms_and_condition" >{!! (isset($settings['terms_and_condition']))?$settings['terms_and_condition']:''!!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="privacy_policy" class=" control-label">Privacy Policy</label>
                            <textarea class="form-control form-control-sm" name="privacy_policy" id="privacy_policy" >{!! (isset($settings['privacy_policy']))?$settings['privacy_policy']:''!!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="faq" class=" control-label">Faq</label>
                            <textarea class="form-control form-control-sm" name="faq" id="faq" >{!! (isset($settings['faq']))?$settings['faq']:''!!}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
