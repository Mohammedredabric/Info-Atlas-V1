@extends('layouts.fullLayoutMaster')
@section('content')
    @if (session('User'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Success</h5>
            User {{ session('User') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table id="DataTableAmenities" class="table table-sm text-sm table-hover text-secondary">
                <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Solcial Links</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach($Users as $user)
                    <tr>
                        <td scope="row">{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>
                                <a class="text-secondary" href="{{$user->link['facebook']}}" target="_blank"><i class="fab fa-facebook-square"></i></a>
                                <a class="text-secondary" href="{{$user->link['twitter']}}" target="_blank"><i class="fab fa-twitter-square"></i></a>
                                <a class="text-secondary" href="{{$user->link['instgram']}}" target="_blank"><i class="fab fa-instagram-square"></i></a>
                                <a class="text-secondary" href="{{$user->link['linkedin']}}" target="_blank"><i class="fab fa-linkedin"></i></a>

                        </td>
                        <td>
                            <div class="d-flex justify-content-center ">
                                <a class="btn btn-sm  btn-outline-info " href="{{route('user.edit',$user->id )}}"><i class="fa fa-edit"></i></a>
                                <form class="ml-1" method="Post" action="{{ route('user.destroy',$user->id) }}" >
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
