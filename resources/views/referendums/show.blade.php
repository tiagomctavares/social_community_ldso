@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ elixir('css/referendumShow.css') }}"/>
@endsection

@section('content')
    <div class="col-xs-12 printing-content">
        <div class="print-main">
            <h3>Referendum</h3>
            <a>{{ $referendum->title }}</a>
            <p class="sub_head">Started on {{ $referendum->created_at->format('jS F \of Y') }}</p>
            <p class="ptext">{{ $referendum->description }}</p>

            <div class="referendum-chart">
                @foreach($answers as $answer)
                    <div class="chart-bar">
                        <div class="col-sm-5 col-xs-12 text-left">
                            <span>{{ $answer->description }}</span>
                        </div>
                        <div class="col-sm-5 col-xs-12 text-center">
                            <div class="progress">
                                <div class="progress-bar {{ $answer->id == $userAnswerId ? '' : 'progress-bar-info' }}"
                                     role="progressbar"
                                     aria-valuenow="{{ $answer->number_of_votes }}"
                                     aria-valuemin="0"
                                     aria-valuemax="{{ $totalVotes }}"
                                     style="width: {{ $totalVotes == 0 ? 0 : round($answer->number_of_votes*100/$totalVotes, 2) }}%;"
                                     data-toggle="tooltip" data-placement="top"
                                     title="{{ $answer->number_of_votes.' of '.$totalVotes }}">
                                    <span class="sr-only"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 col-xs-12 text-right">
                            @if(!$userAnswerId)
                                <a href="{{action('ReferendumsController@submitVote', [$referendum->id, $answer->id]) }}"
                                   class="btn btn-info btn-xs"><i class="fa fa-thumbs-up"></i> Vote</a>
                            @else
                                @if($answer->id == $userAnswerId)
                                    <span class="label label-success" disabled="disabled">My vote</span>
                                @endif
                            @endif
                            <span>{{ $answer->number_of_votes.' votes' }}</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="print-grids">
            <div class="print-grid">
                <ul class="list-group">
                    @foreach($comments as $comment)
                        <li class="list-group-item">
                            <h4 class="list-group-item-heading">
                                {{ $comment->user->name }}
                            </h4>
                            <p class="sub_head">
                                @if($comment->created_at->isToday() )
                                    {{ $comment->created_at->diffForHumans() }}
                                @else
                                    {{ $comment->created_at->format('jS F \of Y \a\t H:i') }}
                                @endif
                            </p>
                            <p class="list-group-item-text">
                                {{ $comment->content }}
                            </p>
                        </li>
                    @endforeach
                </ul>
                <div class="row">
                    <div class="text-center">
                        {{ $comments->links() }}
                    </div>
                </div>
                <div class="row">
                    <form action="{{action('ReferendumsController@submitComment', $referendum->id )}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="content">Write a comment:</label>
                            <textarea class="form-control" rows="4" name="content"></textarea>
                            <button type="submit" class="btn btn-primary">Submit comment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection