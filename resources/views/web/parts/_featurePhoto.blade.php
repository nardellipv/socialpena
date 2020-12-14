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
                            @if ($user->picture)
                                <img src="{{ asset('styleWeb/users/' . $user->number_member) }}" alt="">
                            @else
                                <img src="{{ asset('styleWeb/images/logo.png') }}" alt="" style="width: 65%;">
                            @endif
                            <form class="edit-phto">
                                <i class="fa fa-camera-retro"></i>
                                <label class="fileContainer">
                                    Cambiar foto perfil
                                    <input type="file" />
                                </label>
                            </form>
                        </figure>
                    </div>
                </div>
                <div class="col-lg-10 col-sm-9">
                    <div class="timeline-info">
                        <ul>
                            <li class="admin-name">
                                <h5>{{ $user->name }}</h5>
                                <span>Socio {{ $user->category }}</span>
                            </li>
                            <li>
                                <a class="{{ route::is('post.index') ? 'active' : '' }}" href="{{ route('post.index', $user->profile_number) }}" title="" data-ripple="">time line</a>
                                <a class="" href="timeline-photos.html" title="" data-ripple="">Fotos</a>
                                <a class="" href="timeline-videos.html" title="" data-ripple="">Videos</a> 
                                @if (Auth::user()->profile_number != $user->profile_number)                               
                                <a class="{{ route::is('profile.index') ? 'active' : '' }}" href="{{ route('profile.index', $user->profile_number) }}" title="" data-ripple="">Sobre {{ $user->name }}</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
