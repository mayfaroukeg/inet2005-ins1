@extends ('layout')

@section('content')

    <h1>edit the note </h1>

    <form method="POST" action="/notes/{{$note->id}}">

        {{ csrf_field() }}

        {{method_field('PATCH')}}


        <div class="form-group" >

            <textarea name="body" class="form-control">{{$note->body}}</textarea>

        </div>


        <div class="form-group" >

            <button type="submit" class="btn btn-primary"  >Update Note</button>

        </div>
    </form>

    @stop