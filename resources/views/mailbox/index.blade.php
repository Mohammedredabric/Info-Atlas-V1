@extends('layouts.fullLayoutMaster')
@section('content')
    <div class="card">
        <div class="card-header">
            Compose New Message
        </div>
        <div class="card-body">
           <form action="{{ route('mailbox.store')  }}" method="post">
               @csrf
               <div class="row">
                   <div class="col-md-12 col-md-12 col-lg-12 mt-2">
                       <div class="form-group">
                           <input name="to" class="form-control" id="to" placeholder="TO" >
                       </div>
                       <div class="form-group">
                           <input name="subject" class="form-control" id="subject" placeholder="Subject">
                       </div>
                       <div class="form-group">
                       </div>
                       </div>
                   <div class="col-md-12 col-md-12 col-lg-12">
                       <div class="form-group">
                           <textarea class="form-control form-control-sm" name="msg" id="about_us" rows="5" ></textarea>
                       </div>
                   </div>
                   <div class="col-md-12 col-md-12 col-lg-12">
                       <button class="btn btn-sm btn-primary " type="submit"><i class="fa fa-envelope"></i> Send</button>
                   </div>

               </div>

           </form>
        </div>
    </div>

@endsection
