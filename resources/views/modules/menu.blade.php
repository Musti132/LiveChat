<div class="ui secondary inverted menu">
    <a class="item" href="{{route('home')}}">
        Home
    </a>
    <a class="item" href="{{route('chat.index')}}">
        Chat
    </a>
    <a class="item" href="{{route('friends.index')}}">
        Friends
    </a>
    <div class="right menu">
        <a class="ui item inverted" href="#">
            <div class="ui animated button inverted" tabindex="0">
                <div class="visible content">Profile</div>
                <div class="hidden content">
                    <i class="right user icon"></i>
                </div>
            </div>
        </a>
        <a class="ui item" href="">
            <div class="ui animated inverted red button" tabindex="0">
                <div class="visible content">Logout</div>
                <div class="hidden content">
                    <i class="sign out alternate icon"></i>
                </div>
            </div>
        </a>
    </div>
</div>