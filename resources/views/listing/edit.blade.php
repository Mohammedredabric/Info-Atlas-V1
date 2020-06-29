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
        <div class="card-body">
            <form class="text-sm text-secondary" action="{{route('listing.update',$listing->id)}}" method="POST" enctype="multipart/form-data">
                @csrf()
                @method('PUT')
                <div class="card card-secondary card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab"role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-four-basic-tab" data-toggle="pill" href="#custom-tabs-four-basic" role="tab" aria-controls="custom-tabs-four-basic" aria-selected="true">Basic</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-location-tab" data-toggle="pill" href="#custom-tabs-four-location" role="tab" aria-controls="custom-tabs-four-location" aria-selected="false">Location</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-amenities-tab" data-toggle="pill" href="#custom-tabs-four-amenities" role="tab" aria-controls="custom-tabs-four-amenities" aria-selected="false">Amenities</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-media-tab" data-toggle="pill" href="#custom-tabs-four-media" role="tab" aria-controls="custom-tabs-four-media" aria-selected="false">Media</a>
                            </li>
                            <!-- <li class="nav-item">
                                   <a class="nav-link" id="custom-tabs-four-seo-tab" data-toggle="pill" href="#custom-tabs-four-seo" role="tab" aria-controls="custom-tabs-four-seo" aria-selected="false">SEO</a>
                               </li>-->
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-schedule-tab" data-toggle="pill" href="#custom-tabs-four-schedule" role="tab" aria-controls="custom-tabs-four-schedule" aria-selected="false">Schedule</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-contact-tab" data-toggle="pill" href="#custom-tabs-four-contact" role="tab" aria-controls="custom-tabs-four-contact" aria-selected="false">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-type-tab" data-toggle="pill" href="#custom-tabs-four-type" role="tab" aria-controls="custom-tabs-four-type" aria-selected="false">Type</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="finish-tabs-four-type-tab" data-toggle="pill" href="#finish-tabs-four-type" role="tab" aria-controls="finish-tabs-four-type" aria-selected="false">finish</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="tab-pane fade active show" id="custom-tabs-four-basic" role="tabpanel" aria-labelledby="custom-tabs-four-basic-tab">
                                <fieldset class="my-4">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="title" value="{{$listing->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control form-control-sm" name="description" id="description">{{$listing->description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="googl-analytics-id">Google Analytics Id</label>
                                        <input type="text" name="googl-analytics-id" id="googl-analytics-id"  value="{{old("googl-analytics-id")}}" class="form-control form-control-sm" placeholder="googl analytics ">
                                    </div>
                                    <div class="form-group overflow-hidden">
                                        <label for="category">Category</label>
                                        <select class=" form-control-sm custom-select " name="category[]" id="multicat"  multiple="multiple" >
                                            @for ($i = 1; $i < $categories -> Count() ; $i++)
                                                @if (isset($listing->categories[$i-1]))
                                                    <option value="{{  $categories[$i]['id']}}" selected >{{$categories[$i]['name']}}</option>
                                                @else
                                                    <option value="{{  $categories[$i]['id']}}" >{{$categories[$i]['name']}}</option>
                                                @endif
                                            @endfor
                                        </select>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-four-location" role="tabpanel" aria-labelledby="custom-tabs-four-location-tab">
                                <fieldset  class="my-4">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <select class="form-control   form-control-sm custom-select " name="city" id="city" >
                                            <option value="0" >None</option>
                                            @foreach($cities as $City)
                                                <option value="{{old($City->id,$City->id)}}" {{ ($City->id == $listing->city_id ? 'selected':'' ) }} >{{$City->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea class="form-control form-control-sm" name="adress" id="adress">{{$listing->adress}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="latitude">Latitude</label>
                                        <input type="number" name="latitude" id="latitude"  step="any"  value="{{$listing->latitude}}" class="form-control form-control-sm" placeholder="You Can Provider latitude For Getting the Result">
                                    </div>
                                    <div class="form-group">
                                        <label for="longitude">langitude</label>
                                        <input type="number" name="longitude" id="longitude"  step="any"   value="{{$listing->longitude}}" class="form-control form-control-sm" placeholder="You Can Provider latitude For Getting the Result">
                                    </div>
                                </fieldset>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-four-amenities" role="tabpanel" aria-labelledby="custom-tabs-four-amenities-tab">
                              <fieldset  class="my-4">
                                  <div class="row">
                                      @for ($i = 1; $i < $amenities -> Count() ; $i++)
                                          <div class="col-md-4 col-lg-4 col-sm-12">
                                              <div class="custom-control custom-switch">
                                                  @if (isset($listing->amenities[$i-1]))
                                                      <input type="checkbox" class="custom-control-input py-2" checked id="customSwitches-{{$amenities[$i]['name']}}" name="amenities[]" value="{{ $amenities[$i]['id']}}">
                                                      <label class="custom-control-label" for="customSwitches-{{$amenities[$i]['name']}}"><i class="{{$amenities[$i]['icon_class']}}"></i> {{$amenities[$i]['name']}}</label>
                                                  @else
                                                      <input type="checkbox" class="custom-control-input py-2" id="customSwitches-{{$amenities[$i]['name']}}" name="amenities[]" value="{{ $amenities[$i]['id']}}">
                                                      <label class="custom-control-label" for="customSwitches-{{$amenities[$i]['name']}}"><i class="{{$amenities[$i]['icon_class']}}"></i> {{$amenities[$i]['name']}}</label>
                                                  @endif

                                              </div>
                                          </div>
                                      @endfor
                                  </div>

                              </fieldset>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-four-media" role="tabpanel" aria-labelledby="custom-tabs-four-media-tab">
                                <fieldset  class="my-4">
                                    <div class="form-group">
                                        <label for="Thumbnail">Thumbnail</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input " id="thumbnail" name="listing_thumbnail" value=" {{old('listing_thumbnail')}}">
                                                <label class="custom-file-label" for="thumbnail">Listing Thumbnail <span class="text-muted">(460 X 306)</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Cover">Cover</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="cover" name="listing_cover" value="{{old('listing_cover')}}">
                                                <label class="custom-file-label" for="cover">Listing Cover
                                                    <span class="text-muted">(1600 X 600)</span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Gallery"> Gallery Images <span class="text-muted">(multiple images)</span></label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="Gallery" name="Gallery" multiple value="{{old('Gallery')}}">
                                                <label class="custom-file-label" for="Gallery">Listing Gallery Images
                                                    <span class="text-muted">(960 X 640)</span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="video-url">Video Url</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="video_url" name="video_url"  placeholder="https://www.youtube.com" value="{{$listing->video_url}}">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-link"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <!--  <div class="tab-pane fade" id="custom-tabs-four-seo" role="tabpanel" aria-labelledby="custom-tabs-four-seo-tab">
                                   <div class="form-group">
                                       <label for="tags">Tags</label>
                                     <textarea class="form-control form-control-sm " name="tags"></textarea>
                                   </div>
                                   <div class="form-group">
                                       <label for="tags">Tags</label>
                                       <textarea class="form-control form-control-sm " name="tags"></textarea>
                                   </div>
                               </div>
                               -->
                            <div class="tab-pane fade" id="custom-tabs-four-schedule" role="tabpanel" aria-labelledby="custom-tabs-four-schedule-tab">
                                <fieldset  class="my-4">
                                  <div class="row">
                                      @include('panles.listing_schedule')
                                  </div>
                                </fieldset>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-four-contact" role="tabpanel" aria-labelledby="custom-tabs-four-contact-tab">
                                <fieldset  class="my-4" >
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="website">Website</label>
                                                <input type="url" id="website" name="website" class="form-control form-control-sm" value="{{$listing->website}}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" id="mail" name="email" class="form-control form-control-sm" value="{{$listing->email}}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="facebook">Facebook</label>
                                                <input type="url" id="" name="social[][facebook]" class="form-control form-control-sm" value="{{ $listing->social[0]['facebook'] }}" >
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="twitter">Twitter</label>
                                                <input type="url" id="twitter" name="social[][twitter]" class="form-control form-control-sm" value="{{ $listing->social[1]['twitter'] }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="instagram">Instagram</label>
                                                <input type="url" id="instgram" name="social[][instgram]" class="form-control form-control-sm"  value="{{ $listing->social[2]['instgram'] }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input type="tel" id="phone" name="phone" class="form-control form-control-sm" value="{{$listing->phone}}" >
                                            </div>

                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-four-type" role="tabpanel" aria-labelledby="custom-tabs-four-type-tab">
                                <fieldset  class="my-4">
                                    <div class="row">
                                        @foreach($categories as $category)
                                            @if ($category->parebt==0)
                                                <div class="col-md-4 col-lg-4 col-sm-12">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input py-2" name="listing_type" id="customSwitches-{{$category->name}}" value="{{$category->id}}" {{ ($listing->listing_type == $category->id)? "checked":" "   }}>
                                                        <label class="custom-control-label" for="customSwitches-{{$category->name}}"><i class="{{$category->icon_class}}"></i> {{$category->name}}</label>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </fieldset>
                            </div>
                            <div class="tab-pane fade" id="finish-tabs-four-type" role="tabpanel" aria-labelledby="finish-tabs-four-type-tab">
                                <fieldset  class="my-4">
                                    <div class="row my-4">
                                        <div class="col-md-12 col-lg-12 col-sm-12 my-4">
                                            <h3 class="text-secondary text-center">Thank You !</h3>
                                        </div>
                                        <div class="col-md-12 col-lg-12 col-sm-12">
                                            <h6 class="text-secondary text-center">You Are Almost There. Please Check If You Have Provided All The Necessary Things.</h6>
                                        </div>
                                        <div class="col-md-12 col-lg-12 col-sm-12 text-center mt-2">
                                            <input type="submit" class="btn btn-outline-primary m-auto ">
                                        </div>

                                    </div>
                                </fieldset>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

