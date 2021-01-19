<aside class="sidebar static">
    <div class="widget">
        <h4 class="widget-title">Menú</h4>
        <ul class="naves">
            <li>
                <i class="ti-clipboard"></i>
                <a href="{{ route('home') }}" title="">Nuevos Posteos</a>
            </li>
            <li>
                <i class="ti-menu"></i>
                <a href="{{ route('post.index', Auth::user()->profile_number) }}" title="">Time Line</a>
            </li>
            <li>
                <i class="ti-user"></i>
                <a href="{{ route('profile.edit', Auth::user()->profile_number) }}" title="">Perfil</a>
            </li>
            <li>
                <i class="ti-power-off"></i>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="">Salir</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>

    <div class="widget">
        <h4 class="widget-title" style="margin-bottom: 0%;">últimas novedades</h4>
    </div>

    {{-- <div class="widget">
        <h4 class="widget-title">Recent Activity</h4>
        <ul class="activitiez">
            <li>
                <div class="activity-meta">
                    <i>10 hours Ago</i>
                    <span><a href="#" title="">Commented on Video posted </a></span>
                    <h6>by <a href="time-line.html">black demon.</a></h6>
                </div>
            </li>
            <li>
                <div class="activity-meta">
                    <i>30 Days Ago</i>
                    <span><a href="#" title="">Posted your status. “Hello guys, how are you?”</a></span>
                </div>
            </li>
            <li>
                <div class="activity-meta">
                    <i>2 Years Ago</i>
                    <span><a href="#" title="">Share a video on her timeline.</a></span>
                    <h6>"<a href="#">you are so funny mr.been.</a>"</h6>
                </div>
            </li>
        </ul>
    </div><!-- recent activites -->
    <div class="widget stick-widget">
        <h4 class="widget-title">Who's follownig</h4>
        <ul class="followers">
            <li>
                <figure><img src="{{ asset('styleWeb/images/resources/friend-avatar2.jpg') }}" alt=""></figure>
                <div class="friend-meta">
                    <h4><a href="time-line.html" title="">Kelly Bill</a></h4>
                    <a href="#" title="" class="underline">Add Friend</a>
                </div>
            </li>
            <li>
                <figure><img src="{{ asset('styleWeb/images/resources/friend-avatar4.jpg') }}" alt=""></figure>
                <div class="friend-meta">
                    <h4><a href="time-line.html" title="">Issabel</a></h4>
                    <a href="#" title="" class="underline">Add Friend</a>
                </div>
            </li>
            <li>
                <figure><img src="{{ asset('styleWeb/images/resources/friend-avatar6.jpg') }}" alt=""></figure>
                <div class="friend-meta">
                    <h4><a href="time-line.html" title="">Andrew</a></h4>
                    <a href="#" title="" class="underline">Add Friend</a>
                </div>
            </li>
            <li>
                <figure><img src="{{ asset('styleWeb/images/resources/friend-avatar8.jpg') }}" alt=""></figure>
                <div class="friend-meta">
                    <h4><a href="time-line.html" title="">Sophia</a></h4>
                    <a href="#" title="" class="underline">Add Friend</a>
                </div>
            </li>

        </ul>
    </div> --}}
</aside>
