@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="d-flex align-items-center">
                            <h3>Edit Questions</h3>
                            <h3 class="ml-auto">
                                <a class="btn btn-outline-secondary" href="{{route('questions.index')}}">Back to All
                                    Questions</a>
                            </h3>
                        </div>
                    </div>


                    <div class="panel-body">
                        <form action="{{route('questions.update',$question->id)}}" method="post">
                            <input name="_method" type="hidden" value="PUT">


                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="question-title">Question Tile</label>
                                <input  class="form-control" value="{{ old('title',$question->title) }}" required autofocus type="text" name="title" id="question-title">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="question-body">Explain your Question</label>
                                <textarea name="body" rows="10" id="question-body" class="form-control"  required autofocus>{{old('body',$question->body)}}</textarea>
                                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary btn-lg">Update This Question</button>
                            </div>

                        </form>
                    </div>
                    <hr>

                    {{--                    {{$questions->links()}}--}}

                </div>
            </div>
        </div>
    </div>
@endsection



