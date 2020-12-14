@extends('layouts.main')

@section('cabecera')
    @include('web.parts._featurePhoto')
@endsection

@section('css')
    <script src="https://cdn.tiny.cloud/1/mxfjns42tuc016btwfprk1iji4bne983t6p2gt3dyvabc47d/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: "#mytextarea",
            plugins: "emoticons",
            toolbar: "emoticons",
            toolbar_location: "bottom",
            menubar: false
        });

    </script>
@endsection


@section('content')

    <div class="col-lg-6">
        <div class="central-meta">
            <div class="new-postbox">
                <figure>
                    @if ($user->picture)
                        <img src="{{ asset('styleWeb/users/' . $user->number_member) }}" alt="">
                    @else
                        <img src="{{ asset('styleWeb/images/logo.png') }}" alt="">
                    @endif
                </figure>
                <div class="newpst-input">
                    <form method="post">
                        <textarea rows="2" placeholder="Escribe algo... {{ $user->name }}" id="mytextarea"></textarea>
                        <div class="attachments">
                            <ul>
                                <li>
                                    <i class="fa fa-music"></i>
                                    <label class="fileContainer">
                                        <input type="file">
                                    </label>
                                </li>
                                <li>
                                    <i class="fa fa-image"></i>
                                    <label class="fileContainer">
                                        <input type="file">
                                    </label>
                                </li>
                                <li>
                                    <i class="fa fa-video-camera"></i>
                                    <label class="fileContainer">
                                        <input type="file">
                                    </label>
                                </li>
                                <li>
                                    <i class="fa fa-camera"></i>
                                    <label class="fileContainer">
                                        <input type="file">
                                    </label>
                                </li>
                                <li>
                                    <button type="submit">Post</button>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- add post new box -->
        <div class="loadMore">
            @foreach ($posts as $post)
                <div class="central-meta item">
                    <div class="user-post">
                        <div class="friend-info">
                            <figure>
                                @if ($user->picture)
                                    <img src="{{ asset('styleWeb/users/' . $user->number_member) }}" alt="">
                                @else
                                    <img src="{{ asset('styleWeb/images/logo.png') }}" alt="">
                                @endif
                            </figure>
                            <div class="friend-name">
                                <ins><a href="time-line.html" title="">{{ $post->user->name }}</a></ins>
                                <span>publicado: {{ \Carbon\Carbon::parse($post->created_at)->format('d-M-Y') }}</span>
                            </div>
                            <div class="post-meta">
                                <img src="{{ $post->picture }}" alt="">
                                <div class="we-video-info">
                                    <ul>
                                        <li>
                                            <span class="comment" data-toggle="tooltip" title="Comments">
                                                <i class="fa fa-comments-o"></i>
                                                <ins>{{ count($post->comment) }}</ins>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="like" data-toggle="tooltip" title="like">
                                                <i class="ti-heart"></i>
                                                <ins>{{ $post->like }}</ins>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="dislike" data-toggle="tooltip" title="dislike">
                                                <i class="ti-heart-broken"></i>
                                                <ins>{{ $post->dislike }}</ins>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="description">
                                    <p>{{ $post->text }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="coment-area">
                            <ul class="we-comet">
                                @foreach ($post->comment as $comment)
                                    <li>
                                        <div class="comet-avatar">
                                            @if ($user->picture)
                                                <img src="{{ asset('styleWeb/users/' . $user->number_member) }}" alt="">
                                            @else
                                                <img src="{{ asset('styleWeb/images/logo.png') }}" alt="">
                                            @endif
                                        </div>
                                        <div class="we-comment">
                                            <div class="coment-head">
                                                <h5><a href="{{ route('post.index', $comment->user->profile_number) }}"
                                                        title="">{{ $comment->user->name }}</a></h5>
                                                <span>{{ \Carbon\Carbon::parse($comment->created_at)->format('d-M-Y') }}</span>
                                            </div>
                                            <p>{{ $comment->comment }}</p>
                                        </div>
                                    </li>
                                @endforeach
                                <li class="post-comment">
                                    <div class="comet-avatar">
                                        @if ($user->picture)
                                            <img src="{{ asset('styleWeb/users/' . $user->number_member) }}" alt="">
                                        @else
                                            <img src="{{ asset('styleWeb/images/logo.png') }}" alt="">
                                        @endif
                                    </div>
                                    <div class="post-comt-box">
                                        <form method="post">
                                            <textarea placeholder="Post your comment"></textarea>
                                            <div class="add-smiles">
                                                <span class="em em-expressionless" title="add icon"></span>
                                            </div>
                                            <div class="smiles-bunch">
                                                <i class="em em---1"></i>
                                                <i class="em em-smiley"></i>
                                                <i class="em em-anguished"></i>
                                                <i class="em em-laughing"></i>
                                                <i class="em em-angry"></i>
                                                <i class="em em-astonished"></i>
                                                <i class="em em-blush"></i>
                                                <i class="em em-disappointed"></i>
                                                <i class="em em-worried"></i>
                                                <i class="em em-kissing_heart"></i>
                                                <i class="em em-rage"></i>
                                                <i class="em em-stuck_out_tongue"></i>
                                            </div>
                                            <button type="submit"></button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
