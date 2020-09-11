@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="d-flex align-items-center">
                            <h3>Edit Answer</h3>
                            <h3 class="ml-auto">
                                <a class="btn btn-outline-secondary" href="{{route('questions.show')}}">Back to All
                                    Questions</a>
                            </h3>
                        </div>
                    </div>


                    <div class="panel-body">
                        <form action="{{route('questions.answer.update',[$question->id,$answer->id])}}" method="post">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PATCH">

                            <div class="form-group">
                                <label for="question-body">Update your Answer</label>
                                <textarea name="body" rows="10" id="question-body" class="form-control"  required autofocus>{{old('body',$answer->body)}}</textarea>
                                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary btn-lg">Update This Answer</button>
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



