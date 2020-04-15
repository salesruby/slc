@extends('layout.app')


@section('content')

<div class="sales-report-area mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-4">
<form action="{{route('import')}}" method="post" enctype="multipart/form-data">
@csrf
<div class="form-group">
<label for="file">File</label>
<input type="file" class="form-control" name="file" id="file">
</div>

<button type="submit">Submit</button>
</form>
                        </div>
                    </div>
                </div>
@stop