<section>
    <div class="feature-photo">
        <figure>
            @if($user->picture)
                <img src="{{ asset('styleWeb/users/' . $user->number_member) }}" alt="" >
                @else
                <img src="{{ asset('styleWeb/images/header.png') }}" alt="" >
            @endif
        </figure>
        {{--  <div class="add-btn">
            <span>1205 followers</span>
            <a href="#" title="" data-ripple="">Add Friend</a>
        </div>  --}}
        {{--  <form class="edit-phto">
            <i class="fa fa-camera-retro"></i>
            <label class="fileContainer">
                Cambiar Foto cabecera
                <input type="file" />
            </label>
        </form>  --}}
        <div class="container-fluid">
            <div class="row merged">
                <div class="col-lg-2 col-sm-3">
                    <div class="user-avatar">
                        <figure>
                            @if ($user->photo)
                                <img src="{{ asset('users/' . $user->profile_number . '/195x195-' . $user->photo) }}" alt="">
                            @else
                                <img src="{{ asset('styleWeb/images/logo.png') }}" alt="" style="width: 65%;">
                            @endif
                            @if(Auth::user()->profile_number == $user->profile_number)
                            <form class="edit-phto" action="{{ route('photo.update', $user->profile_number) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <i class="fa fa-camera-retro"></i>
                                <label class="fileContainer">
                                    Cambiar foto perfil
                                    <input type="file" name="picture" onchange="this.form.submit()" />
                                </label>
                            </form>
                            @endif
                        </figure>
                    </div>
                </div>
                <div class="col-lg-10 col-sm-9">
                    <div class="timeline-info">
                        <ul>
                            <li class="admin-name">
                                <h5>{{ $user->nickname }}</h5>
                                <span>Socio {{ $user->category }}</span>
                            </li>
                            <li>
                                <a class="{{ Route::is('post.index') ? 'active' : '' }}" href="{{ route('post.index', $user->profile_number) }}" title="" data-ripple="">time line</a>
                                <a class="" href="timeline-photos.html" title="" data-ripple="">Fotos</a>
                                <a class="" href="timeline-videos.html" title="" data-ripple="">Videos</a> 
                                @if (Auth::user()->profile_number != $user->profile_number)                               
                                <a class="{{ Route::is('profile.index') ? 'active' : '' }}" href="{{ route('profile.index', $user->profile_number) }}" title="" data-ripple="">Sobre {{ $user->nickname }}</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
