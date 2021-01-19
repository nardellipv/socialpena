    <h4 class="widget-title">Editar Perfil</h4>
    <ul class="naves">
        <li>
            <i class="ti-info-alt"></i>
            <a href="{{ route('profile.edit', Auth::user()->profile_number) }}" title="">Información Básica</a>
        </li>
        {{--  <li>
            <i class="ti-mouse-alt"></i>
            <a href="edit-work-eductation.html" title="">Education & Work</a>
        </li>  --}}
        <li>
            <i class="ti-heart"></i>
            <a href="{{ route('interest.edit', Auth::user()->profile_number) }}" title="">Mis Intereses</a>
        </li>
        {{--  <li>
            <i class="ti-settings"></i>
            <a href="edit-account-setting.html" title="">account setting</a>
        </li>  --}}
        <li>
            <i class="ti-sharethis"></i>
            <a href="{{ route('social.edit', Auth::user()->profile_number) }}" title="">Redes Sociales</a>
        </li>
        <li>
            <i class="ti-lock"></i>
            <a href="{{ route('password.edit', Auth::user()->profile_number) }}" title="">Editar Contraseña</a>
        </li>
    </ul>