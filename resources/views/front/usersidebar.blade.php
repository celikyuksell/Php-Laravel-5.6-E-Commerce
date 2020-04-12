
<div id="sidebar" class="span3">
    <div class="well well-small">
        @if (Auth::check())
        {{Auth::user()->name}}
        <ul class="nav nav-list">
            <li> <a href="{{url('/')}}/user/profil"><span class="icon-chevron-right"></span>User Profile</a></li>
            <li> <a href="{{url('/')}}/sepetim"><span class="icon-chevron-right"></span>Sepetim</a></li>
            <li> <a href="{{url('/')}}/siparisler"><span class="icon-chevron-right"></span>Siparişlerim</a></li>
            <li><a href="{{url('/')}}/user/comments"><span class="icon-chevron-right"></span>User Comments</a></li>
            <li><a href="{{url('/')}}/user/favori"><span class="icon-chevron-right"></span>User Favori</a></li>
            <li><a href="{{url('/')}}/logout"><span class="icon-chevron-right"></span>Logout</a></li>


        </ul>
            @endif
    </div>




</div>
