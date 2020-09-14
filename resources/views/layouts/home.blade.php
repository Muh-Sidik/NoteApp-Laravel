@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">My notes</div>
                    <div class="panel-body">
                        @if($user->isEmpty())
                            <p>
                                You have not created any notes! <a href="{{ url('create') }}">Create one</a> now.
                            </p>
                        @else
                        <ul class="list-group">
                            @foreach($user as $note)
                                <li class="list-group-item">
                                    <a href="{{ url('note', $note->slug) }}">
                                        {{ $note->title }}
                                    </a>
                                    <span class="pull-right">{{ $note->updated_at->diffForHumans() }}</span>
                                    <form action="{{ route('note.destroy', $note->slug) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">delete</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
