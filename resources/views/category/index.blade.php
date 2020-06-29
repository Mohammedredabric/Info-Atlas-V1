@extends('layouts.fullLayoutMaster')
@section('content')


    @if (session('category'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Success</h5>
             Category {{ session('category') }}
        </div>
    @endif
    <div class="row">
        @foreach($categories as $category)
            @if($category->parebt == 0)
            <div class="col-md-4">
                <!-- Widget: user widget style 2 -->
                <div class="card card-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-header bg-secondary">
                        <div class="position-relative">
                            <img src="{{asset("images/".$category->thumbnail)}}" alt="Photo 2" class="img-fluid">
                            <div class="ribbon-wrapper ribbon-xl">
                                <div class="ribbon bg-secondary text-lg"><i class="{{$category->icon_class}}"></i>
                                        {{$category->name}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer p-0">
                        <ul class="list-group list-group-flush text-secondary text-sm">
                            <li class="list-group-item">
                                <div  class="">
                                    <div class="float-left mt-2">
                                        <i class="{{$category->icon_class}}"></i> {{$category->name}}
                                    </div>
                                    <div class="float-right d-flex ">
                                        <div class="text-secondary"  >
                                            <a href="{{ route('category.edit',$category->id) }}" class="text-secondary text-sm btn btn-outline-light border-0">
                                                <i class="  fa fa-cog"></i>
                                            </a>
                                            <form class="d-inline" action="{{ route('category.destroy',$category->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-secondary text-sm btn btn-outline-light border-0">
                                                    <i class=" fa fa-trash"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </li>


                        @foreach($categories as $sub_category )
                                @if ( $sub_category->parebt == $category->id)
                                    <li class="list-group-item">
                                        <div  class="">
                                            <div class="float-left mt-2">
                                                <i class="{{$sub_category->icon_class}}"></i> {{$sub_category->name}}
                                            </div>
                                            <div class="float-right d-flex ">
                                                <div class="text-secondary"  >
                                                    <a href="{{ route('category.edit',$sub_category->id) }}" class="text-secondary text-sm btn btn-outline-light border-0">
                                                      <i class="  fa fa-cog"></i>
                                                    </a>
                                                    <form class="d-inline" action="{{ route('category.destroy',$sub_category->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                         <button type="submit" class="text-secondary text-sm btn btn-outline-light border-0">
                                                      <i class=" fa fa-trash"></i>
                                                    </button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                @endif

                            @endforeach

                        </ul>
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
            @endif
        @endforeach
    </div>
@endsection
