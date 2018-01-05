<a class="grid-link" href="{{ route('content.post', ['id' => $ownPost->id]) }}">
    <div id="grid-item{{ $ownPost->id }}" class="grid-item text-center">
        <div class="blogPicsDiv">
            @if(!$ownPost->image == "")
                <img id="photo{{ $ownPost->id }}" class="blogPics withId"
                     src="{{ asset('uploads/images/') }}/{{ $ownPost->image }}">
            @else
                <img class="blogPics" src="{{ asset('uploads/images/default.jpg') }}"/>
            @endif
        </div>
        <div class="grid-item-content">
            <a class="userLink"
               href="{{ route('profile.index', ['id' => $ownPost->user->id]) }}"><img
                        class="blogPics userLink blogPicProfile"
                        src="{{ asset('uploads/avatars/') }}/{{ empty($ownPost->user->avatar) ? 'default.png' : $ownPost->user->avatar }}"></a>
            <a href="{{ route('profile.index', ['id' => $ownPost->user->id]) }}"><p
                        class="byUser">@lang('general.by') {{ empty($ownPost->user->name) ? 'No user' : $ownPost->user->name }}</p>
            </a>
            <h1 class="post-title">{{ $ownPost->title }}</h1>
            <div class="tags">
                @foreach($ownPost->tags as $tag)
                    <a class="tagblock"
                       href="{{ route('content.sortByTag', ['name' => $tag->name]) }}">#{{ $tag->name }}</a>
                @endforeach
            </div>
            <p class="indexContent">{{ $ownPost->content }}</p>
        </div>
    </div>
</a>