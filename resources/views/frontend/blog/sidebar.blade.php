<aside class="sidebar span4">
    <ul class="list row-fluid">

        {{-- TAGS --}}
        @if($tags)
            <li class="item tags span12">
                <h2 class="label tc12 bold">#Теги</h2>

                <ul class="clearfix">
                    @foreach($tags as $tag)
                        <li class="tag">
                            <a class="item" href="/blog/tag/{{ $tag->slug }}">
                                {{ $tag->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endif

    </ul>
</aside>