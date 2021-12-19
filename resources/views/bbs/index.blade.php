@extends('layouts.base')
@section('title', 'Ajax実験用BBS')

@section('main')
<article>
    <div class="playContainer">
        <div class="playBack"></div>
        <section class="questionForm">
            <h2 class="play-title">掲示板</h2>
            <div id="bbsapp">
                <bbs></bbs>
            </div>
        </section><!-- END questionForm -->
        <p class="credit">
            loading animation icon : Created using "<a href="https://loading.io/">loading.io</a>"<br>
            textarea background : Created using "<a href="https://patternpad.com/">PatternPad</a>"
        </p>
    </div><!-- END playContainer -->
</article>
@endsection
