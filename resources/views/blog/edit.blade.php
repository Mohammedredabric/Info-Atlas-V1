@extends('layouts.fullLayoutMaster')
@section('content')
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
    <div class="card">
        <div class="card-body">
            <form class="text-secondary text-sm" action="{{route('post.update',$post->id)}}" method="post">
                @csrf()
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control form-control-sm" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label for="sub_title">Sub Title</label>
                    <input type="text" name="sub_title" id="sub_title" class="form-control form-control-sm" value="{{$post->sub_title}}">
                </div>
                <div class="form-group">
                    <textarea class="form-control form-control-sm" name="content" id="content" rows="7" style="width: 200px" >{!! $post->content !!}</textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-sm" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>


@endsection
