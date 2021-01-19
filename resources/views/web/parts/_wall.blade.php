@section('css')
    <script src="https://cdn.tiny.cloud/1/mxfjns42tuc016btwfprk1iji4bne983t6p2gt3dyvabc47d/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: "#mytextarea",
            plugins: "emoticons media image",
            toolbar: 'bold italic underline | forecolor backcolor casechange permanentpen formatpainter removeformat | emoticons | media image',
            toolbar_location: "bottom",
            menubar: false
        });

    </script>
@endsection

<div class="col-lg-6">
    <div class="central-meta">
        @include('alerts.error')
        <div class="new-postbox">
            <figure>
                @if ($user->photo)
                    <img src="{{ asset('users/' . $user->profile_number . '/57x89-' . $user->photo) }}" alt="">
                @else
                    <img src="{{ asset('styleWeb/images/logo.png') }}" alt="">
                @endif
            </figure>
            <div class="newpst-input">
                <form method="post" action="{{ route('post.newPost') }}" enctype="multipart/form-data">
                    @csrf
                    <textarea rows="1" placeholder="Escribe algo... {{ $user->nickname }}" name="text"
                        id="mytextarea"></textarea>
                    <div class="attachments">
                        <ul>
                            <li>
                                <i class="fa fa-image"></i>
                                <label class="fileContainer">
                                    <input type="file" name="picture">
                                </label>
                            </li>
                            <li>
                                <button type="submit">Publicar</button>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>

        </div>
    </div><!-- add post new box -->
    <div class="loadMore">
        @foreach ($posts as $key => $post)
            <div class="central-meta item" id='{{ $key }}'>
                <div class="user-post">
                    <div class="friend-info">
                        <figure>
                            @if ($post->user->photo)
                                <img src="{{ asset('users/' . $post->user->profile_number . '/57x89-' . $post->user->photo) }}"
                                    alt="">
                            @else
                                <img src="{{ asset('styleWeb/images/logo.png') }}" alt="">
                            @endif
                        </figure>
                        <div class="friend-name">
                            <ins><a href="{{ route('post.index', $post->user->profile_number) }}"
                                    title="">{{ $post->user->nickname }}</a></ins>
                            <span>publicado: {{ \Carbon\Carbon::parse($post->created_at)->format('d-M-Y') }}</span>
                        </div>
                        <div class="post-meta">
                            <img src="{{ asset('users/' . $user->profile_number . '/592x320-' . $post->picture) }}"
                                alt="">
                            <div class="description">
                                <p>{!! $post->text !!}</p>
                            </div>
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
                                            <a href="{{ route('post.likePost', [$post, 'idLike' => $key]) }}"><i
                                                    class="ti-heart"></i></a>
                                            <ins>{{ $post->like }}</ins>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="dislike" data-toggle="tooltip" title="dislike">
                                            <a href="{{ route('post.disLikePost', [$post, 'idDislike' => $key]) }}"><i
                                                    class="ti-heart-broken"></i></a>
                                            <ins>{{ $post->dislike }}</ins>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="coment-area">
                        <ul class="we-comet">
                            @foreach ($post->comment as $comment)
                                <li>
                                    <div class="comet-avatar">
                                        @if ($post->user->photo)
                                            <img src="{{ asset('users/' . $comment->user->profile_number . '/57x89-' . $comment->user->photo) }}"
                                                alt="">
                                        @else
                                            <img src="{{ asset('styleWeb/images/logo.png') }}" alt="">
                                        @endif
                                    </div>
                                    <div class="we-comment">
                                        <div class="coment-head">
                                            <h5><a href="{{ route('post.index', $comment->user->profile_number) }}"
                                                    title="">{{ $comment->user->nickname }}</a></h5>
                                            <span>{{ \Carbon\Carbon::parse($comment->created_at)->format('d-M-Y') }}</span>
                                        </div>
                                        <p>{!! $comment->comment !!}</p>
                                    </div>
                                </li>
                            @endforeach
                            <li class="post-comment">
                                <div class="comet-avatar">
                                    @if ($user->photo)
                                        <img src="{{ asset('users/' . $user->profile_number . '/57x89-' . $user->photo) }}"
                                            alt="">
                                    @else
                                        <img src="{{ asset('styleWeb/images/logo.png') }}" alt="">
                                    @endif
                                </div>
                                <div class="newpst-input">
                                    <form method="post"
                                        action="{{ route('post.commentPost', [$post, 'idComment' => $key]) }}">
                                        @csrf
                                        <textarea id="{{ $key }}comment" name="comment"
                                            placeholder="Comentar Publicación"></textarea>
                                        <div class="attachments">
                                            <ul>
                                                <li>
                                                    <button type="submit">Comentar Publicacion</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </form>
                                    <script>
                                        tinymce.init({
                                            selector: "#{{ $key }}comment",
                                            height: 100,
                                            plugins: "emoticons image",
                                            toolbar: 'emoticons | media image',
                                            toolbar_location: "top",
                                            menubar: false
                                        });

                                    </script>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
