
@extends('adminlte::page')

@section('content')

 <div class="container">
  @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
        @endif
        @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
    <h3 class="jumbotron">Laravel  Image Intervention </h3>
  <form method="post" action="{{url('uploadfile')}}" enctype="multipart/form-data">
          <input type="hidden" value="{{csrf_token()}}" name="_token" />


        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
          <input type="file" name="filename" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
          <button type="submit" class="btn btn-success" style="margin-top:10px">Upload Image</button>
          </div>
        </div>
        @if($image)
        <div class="row">
         <div class="col-md-8">
              <strong>Original Image:</strong>
              <br/>
              <img src="{{ url('/images/'.$image->filename) }}" />
        </div>
        <div class="col-md-4">
            <strong>Thumbnail Image:</strong>
            <br/>
            <img src="{{ url('/thumbnail/'.$image->filename) }}" />
         </div>
        </div>
        @endif       
  </form>
  </div>
@endsection
