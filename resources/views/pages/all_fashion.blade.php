@extends('../master')
@section('all_fashion','active')
@section('contains')
    <h1 class="text-center heading_text">All Fashion Tex Style</h1>
    <h1 class="text-center success_text">
        @if(Session::has('success'))
            {{Session::get('success')}}
            @endif
    </h1>
        <div class="container container_design_appointment">
            <h4 class="heading_text_two">Images</h4>
            <hr/>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @foreach($fashions as $fashion)
                        @if($fashion->type == 'image')
                        <div class="col-md-3 card_box card-1">
                            <img class="fashion_image_pre_size" src="{{asset('fashion_images/'.$fashion->image)}}" alt="fashion"/>
                            <div class="text-center">
                                <br/>
                                {!! Form::open(['route'=>['fashion.destroy',$fashion->id],'method'=>'DELETE'])!!}
                                <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
            <h4 class="heading_text_two">Videos</h4>
            <hr/>
        <div class="card">
                <div class="card-body">
                    <div class="row">
                        @foreach($fashions as $fashion)
                            @if($fashion->type == 'video')
                                <div class="col-md-3 card_box card-1">
                                    <video class="fashion_image_pre_size" controls>
                                        <source src="{{asset('fashion_video/'.$fashion->image)}}" type="video/mp4">
                                    </video>
                                    <div class="text-center">
                                        <br/>
                                        {!! Form::open(['route'=>['fashion.destroy',$fashion->id],'method'=>'DELETE'])!!}
                                        <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            {!! $fashions->links() !!}
         </div>
    @endsection