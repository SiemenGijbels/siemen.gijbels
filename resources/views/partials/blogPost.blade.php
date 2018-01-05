<a class="grid-link" href="{{ route('content.post', ['id' => $blogPost->id]) }}">
    <div id="grid-item{{ $blogPost->id }}" class="grid-item text-center">
        <div class="blogPicsDiv">
            @if(!$blogPost->image == "")
                <img id="photo{{ $blogPost->id }}" class="blogPics withId"
                     src="{{ asset('uploads/images/') }}/{{ $blogPost->image }}">
            @else
                <img class="blogPics" src="{{ asset('uploads/images/default.jpg') }}"/>
            @endif
        </div>
        <div class="grid-item-content">
            <a class="userLink"
               href="{{ route('profile.index', ['id' => $blogPost->user->id]) }}"><img
                        class="blogPics userLink blogPicProfile"
                        src="{{ asset('uploads/avatars/') }}/{{ empty($blogPost->user->avatar) ? 'default.png' : $blogPost->user->avatar }}"></a>
            <a href="{{ route('profile.index', ['id' => $blogPost->user->id]) }}"><p
                        class="byUser">@lang('general.by') {{ empty($blogPost->user->name) ? 'No user' : $blogPost->user->name }}</p>
            </a>
            <h1 class="post-title">{{ $blogPost->title }}</h1>
            <div class="tags">
                @foreach($blogPost->tags as $tag)
                    <a class="tagblock"
                       href="{{ route('content.sortByTag', ['name' => $tag->name]) }}">#{{ $tag->name }}</a>
                @endforeach
            </div>
            <p class="indexContent">{{ $blogPost->content }}</p>
        </div>
    </div>
</a>