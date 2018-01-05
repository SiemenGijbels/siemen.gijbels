<a class="grid-link" href="{{ route('content.post', ['id' => $post->id]) }}">
    <div id="grid-item{{ $post->id }}" class="grid-item text-center">
        <div class="blogPicsDiv">
            @if(!$post->image == "")
                <img id="photo{{ $post->id }}" class="blogPics withId"
                     src="{{ asset('uploads/images/') }}/{{ $post->image }}">
            @else
                <img class="blogPics" src="{{ asset('uploads/images/default.jpg') }}"/>
            @endif
        </div>
        <div class="grid-item-content">
            <a class="userLink"
               href="{{ route('profile.index', ['id' => $post->user->id]) }}"><img
                        class="blogPics userLink blogPicProfile"
                        src="{{ asset('uploads/avatars/') }}/{{ empty($post->user->avatar) ? 'default.png' : $post->user->avatar }}"></a>
            <a href="{{ route('profile.index', ['id' => $post->user->id]) }}"><p
                        class="byUser">@lang('general.by') {{ empty($post->user->name) ? 'No user' : $post->user->name }}</p>
            </a>
            <h1 class="post-title">{{ $post->title }}</h1>
            <div class="tags">
                @foreach($post->tags as $tag)
                    <a class="tagblock"
                       href="{{ route('content.sortByTag', ['name' => $tag->name]) }}">#{{ $tag->name }}</a>
                @endforeach
            </div>
            <p class="indexContent">{{ $post->content }}</p>
        </div>
    </div>
</a>