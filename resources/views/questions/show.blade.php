@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="d-flex align-items-center">
                            <h3>{{$question->title}}</h3>
                            <h3 class="ml-auto">
                                <a class="btn btn-outline-secondary" href="{{route('questions.index')}}">Back to All
                                    Questions</a>
                            </h3>
                        </div>
                    </div>


                    <div class="panel-body">
                        <div class="d-flex flex-column votes-control">
                            <a class="vote-up">
                                <i class="fas fa-caret-up fa-3x"></i>
                            </a>
                            <span class="votes-count">1234</span>
                            <a class="vote-down Off">
                                <i class="fas fa-caret-down fa-3x"></i>
                            </a>
                            <a class="favorite mt-3 fabs">
                                <i class="fas fa-star fa-2x"></i>
                                <span class="faboritted">12345</span>

                            </a>

                        </div>
                        {!! $question->body_html !!}
                        <div class="float-right">
                                                <span class="text-muted">
                                                   Answered {{$question->create_date}}
                                                </span>
                            <div class="media">
                                <a href="{{$question->user->url}}">
                                    <img src="{{$question->user->avatar}}" alt="">
                                </a>
                                <div class="media-body">
                                    <a href="{{$question->user->url}}">
                                        {{$question->user->name}}

                                    </a>

                                </div>

                            </div>

                        </div>
                    </div>
                    <hr>

                    {{--                    {{$questions->links()}}--}}

                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h2>Your answer is here</h2>
                                @include('layouts._message')
                                <form action="{{route('questions.answers.store',$question->id)}}" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <textarea rows="7" class="form-control" name="body" required
                                                  autofocus>{{old('body')}}</textarea>
                                        @if ($errors->has('body'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline-secondary">Submit</button>
                                    </div>

                                </form>
                                <h3>
                                    {!! $question->answers_count !!}
                                    {{str_plural('Answer',$question->answers_count)}}
                                </h3>
                                @foreach($question->answers as $answer)
                                    <div class="media">
                                        <div class="d-flex flex-column votes-control">
                                            <a class="vote-up">
                                                <i class="fas fa-caret-up fa-3x"></i>
                                            </a>
                                            <span class="votes-count">1234</span>
                                            <a class="vote-down Off">
                                                <i class="fas fa-caret-down fa-3x"></i>
                                            </a>
                                            <a class="favorite mt-3 {{$answer->status}}"
                                            onclick="event.preventDefault(); document.getElementById('accept-answer-{{$answer->id}}').submit()">
                                                <i class="fas fa-check fa-2x"></i>
                                                <form action="{{ route('accept.answers'.$answer->id) }}" id="accept-answer-{{$answer->id}}')" method="post" style="display: none;">
                                                	{{ csrf_field() }}
                                                </form>


                                            </a>

                                        </div>
                                        <div class="media-body">
                                            {!! $answer->body_html !!}
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="ml-auto">
                                                        @can('update',$answer)
                                                            <a class="btn btn-outline-primary btn-sm"
                                                               href="{{route('questions.answers.edit',[$answer->id,$question->id])}}">
                                                                Edit
                                                            </a>
                                                        @endcan
                                                        @can('delete',$answer)
                                                            <form class="form-delete"
                                                                  action="{{route('questions.answers.destroy',[$answer->id,$question->id])}}"
                                                                  method="post">
                                                                <input name="_method" type="hidden" value="DELETE">
                                                                {{ csrf_field() }}
                                                                <button onclick="return confirm('are you sure to delete ?')"
                                                                        class="btn btn-outline-danger btn-sm"
                                                                        type="submit">Delete
                                                                </button>

                                                            </form>
                                                        @endcan
                                                    </div>
                                                </div>
                                                <div class="col-md-4"></div>
                                                <div class="col-md-4">
                                                    <div class="float-right">
                                                <span class="text-muted">
                                                   Answered {{$answer->create_date}}
                                                </span>
                                                        <div class="media">
                                                            <a href="{{$answer->user->url}}">
                                                                <img src="{{$answer->user->avatar}}" alt="">
                                                            </a>
                                                            <div class="media-body">
                                                                <a href="{{$answer->user->url}}">
                                                                    {{$answer->user->name}}

                                                                </a>

                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>

                                            </div>


                                        </div>

                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>


    </div>

@endsection



