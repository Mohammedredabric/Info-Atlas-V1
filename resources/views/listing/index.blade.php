@extends('layouts.fullLayoutMaster')
@section('content')
    @if (session('listing'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Success</h5>
            listing  {{ session('listing') }}
        </div>
    @endif

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DataTable with default features</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table  table-striped  " id="dataTable">
                        <thead class="">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Categories</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Option</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if ($listings)
                            @foreach($listings as $listing)
                                <tr role="row" class="odd">
                                    <td >{{$listing->id}}</td>
                                    <td>{{$listing->name}}</td>
                                    <td class="wrap">
                                        @foreach($listing->categories as $category)
                                            <span class="badge badge-secondary">{{$category->name}}</span>

                                        @endforeach
                                    </td>
                                    <td>
                                        {{$listing->city->country->name}},  {{$listing->city->name}}
                                    </td>
                                    <td>{{$listing->status}}</td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <button class="btn  btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                <a class="dropdown-item" href="{{route('listing.edit',$listing->id)}}">Edit</a>
                                                <form action="{{route('listing.destroy',$listing->id)}}" method="POST">
                                                    @csrf()
                                                    @method('DELETE')
                                                    <button class="dropdown-item" type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
