@extends('../master')
@section('create_fashion','active')
@section('contains')
    <div class="container">
        <h2 class="text-center heading_text">Create Fashion Tex Style</h2>
        <h1 class="text-center success_text">
            @if(Session::has('success'))
                {{Session::get('success')}}
            @endif
        </h1>
    {!! Form::open(['class' => 'form-horizontal','route' => 'fashion.store' ,'method' => 'post','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        <label class="control-label col-sm-2 text_align" for="fashion_image">Image : </label>
        <div class="col-sm-8">
            <input type="file" class="form-control" id="fashion_image" placeholder="Enter Your Image" name="fashion_image">
        </div>
    </div>
        <div class="form-group">
            <label class="control-label col-sm-2 text_align" for="fashion_image">Video : </label>
            <div class="col-sm-8">
                <input type="file" class="form-control" id="fashion_video" placeholder="Enter Your Image" name="fashion_video">
            </div>
        </div>
    <div class="col-md-8 col-md-offset-2">
        <br/>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Upload</button>
    </div>
    {!! Form::close() !!}
    </div>
@endsection
