@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="d-flex align-items-center">
                            <h3>All Questions</h3>
                            <h3 class="ml-auto">
                                <a class="btn btn-outline-secondary" href="{{route('questions.create')}}">Ask
                                    Questions</a>
                            </h3>
                        </div>
                    </div>

                    @include('layouts._message')
                    @foreach($questions as $question)
                        <div class="panel-body">

                            <div class="media">
                                <div class="d-flex flex-column counters">
                                    <div class="vote">
                                        <strong>{{$question->votes}}</strong>
                                        {{str_plural('vote',$question->votes)}}

                                    </div>
                                    <div class="status">
                                        <strong>{{$question->answers_count}}</strong>
                                        {{str_plural('answer',$question->answers_count)}}

                                    </div>
                                    <div class="views">
                                        <strong>{{$question->views}}</strong>
                                        {{str_plural('views',$question->views)}}

                                    </div>

                                </div>
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <h3 class="mt-0">
                                            <a href="{{$question->url}}">
                                                {{$question->title}}
                                            </a>
                                        </h3>
                                        <div class="ml-auto">

                                            @can('update',$question)
                                            <a class="btn btn-outline-primary btn-sm"
                                               href="{{route('questions.edit',$question->id)}}">
                                                Edit
                                            </a>
                                            @endcan


                                            @can('delete',$question)
                                            <form class="form-delete"
                                                  action="{{route('questions.destroy',$question->id)}}" method="post">
                                                <input name="_method" type="hidden" value="DELETE">
                                                {{ csrf_field() }}
                                                <button onclick="return confirm('are you sure to delete ?')"
                                                        class="btn btn-outline-danger btn-sm" type="submit">Delete
                                                </button>

                                            </form>
                                                @endcan


                                        </div>
                                    </div>

                                    <p class="lead">
                                        Asked By <a href="{{$question->user->url}}">
                                            {{$question->user->name}}
                                        </a>
                                        <small class="text-muted">
                                            {{$question->create_date}}
                                        </small>
                                    </p>


                                    {{str_limit($question->body,250)}}
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    <div class="text-center">
                        {{$questions->links()}}
                    </div>
                    {{--                    {{$questions->links()}}--}}

                </div>
            </div>
        </div>
    </div>
@endsection

