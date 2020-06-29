@extends('layouts.fullLayoutMaster')
@section('content')
    @if (session('quality'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Success</h5>
            Quality {{ session('quality') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <a class="btn btn-block btn-outline-primary btn-xs" href="{{route(("quality.create"))}}"><i class="fa fa-plus"></i> Add New quality</a>
                </div>
            </div>
            <table id="DataTableAmenities" class="table table-sm text-sm table-hover text-secondary">
                <thead>
                <tr>
                    <th>Rating From</th>
                    <th>Rating To </th>
                    <th>Quality</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reviewwisequalities as $reviewquality)
                    <tr>
                        <td>{{$reviewquality->rating_from}}</td>
                        <td>{{$reviewquality->rating_to}}</td>
                        <td scope="row">{{$reviewquality->quality}}</td>
                        <td>
                            <div class="d-flex justify-content-center ">
                                <a class="btn btn-sm  btn-outline-info " href="{{route('quality.edit',$reviewquality->id )}}"><i class="fa fa-edit"></i></a>
                                <form class="ml-1" method="Post" action="{{ route('quality.destroy',$reviewquality->id) }}" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger "><i class="fa fa-trash-alt"></i></button>
                                </form>
                            </div>

                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
