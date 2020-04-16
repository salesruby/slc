@extends('layout.app')


@section('content')
<div class="card p-5">


@foreach($errors->all() as $error)
                                <div class="alert alert-danger">
                                
                                {{$error}}
                                </div>
                                @endforeach

								@if(Session::has('error'))
                                <div class="alert alert-danger">
                                
                                {{Session::get('error')}}
                                </div>
                                @endif

								@if(Session::has('success'))
                                <div class="alert alert-success">
                                
                                {{Session::get('success')}}
                                </div>
                                @endif

                                <div class="alert alert-primary">
                                When Uploading Leads Please Note the following
                                <li>Delete Other Sheet Except the one you are Uploading</li>
                               <li> Remove the headers  </li>
                               <li>The format should be: Full Name, Email, Phone and Organisation</li>
                                </div>
<div class="sales-report-area mt-5 mb-5">

                    <div class="row">
                        <div class="col-md-4">
<form action="{{route('import')}}" method="post" enctype="multipart/form-data">
@csrf
<div class="form-group">
<label for="file">File</label>
<input type="file" class="form-control" name="file" id="file">
</div>

<button class="btn btn-primary" type="submit">Upload</button>
</form>
                        </div>
                    </div>
                    </div>
                </div>
@stop