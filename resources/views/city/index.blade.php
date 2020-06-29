@extends('layouts.fullLayoutMaster')
@section('content')
    @if (session('city'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Success</h5>
            City {{ session('city') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table id="DataTableAmenities" class="table table-sm text-sm table-hover text-secondary">
                <thead>
                <tr>
                    <th>#</th>
                    <th>City Name</th>
                    <th>Country</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cities as $city)
                    <tr>
                        <td scope="row">{{$city->id}}</td>
                        <td>{{$city->name}}</td>
                        <td>{{$city->country->name}}</td>
                        <td>
                            <div class="d-flex justify-content-center ">
                                <a class="btn btn-sm  btn-outline-info " href="{{route('city.edit',$city->id )}}"><i class="fa fa-edit"></i></a>
                                <form class="ml-1" method="Post" action="{{ route('city.destroy',$city->id) }}" >
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
                    <th>City Name</th>
                    <th>Country</th>
                    <th>Option</th>
                </tr>
                </tfoot>
            </table>

        </div>
    </div>
@endsection
