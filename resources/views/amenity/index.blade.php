@extends('layouts.fullLayoutMaster')
@section('content')
    @if (session('amenity'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Success</h5>
            Amenity {{ session('amenity') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table id="DataTableAmenities" class="table table-sm text-sm table-hover text-secondary">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Icon</th>
                    <th>Amenity Name</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach($amenities as $amenity)
                    <tr>
                        <td scope="row">{{$amenity->id}}</td>
                        <td><i class=" {{$amenity->icon_class}}"></i></td>
                        <td>{{$amenity->name}}</td>
                        <td>
                            <div class="d-flex justify-content-center ">
                                <a class="btn btn-sm  btn-outline-info " href="{{route('amenities.edit',$amenity->id )}}"><i class="fa fa-edit"></i></a>
                                <form class="ml-1" method="Post" action="{{ route('amenities.destroy',$amenity->id) }}" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger "><i class="fa fa-trash-alt"></i></button>
                                </form>
                            </div>

                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Icon</th>
                    <th>Amenity Name</th>
                    <th>Option</th>
                </tr>
                </tfoot>
            </table>

        </div>
    </div>
@endsection
