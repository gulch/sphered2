<div class="works_filters">
    <div class="container">
        <div class="row">
            <div class="filters span10 offset1">
                <ul class="list tc2">
                    <li class="item dib">
                        <a class="button {{ Request::segment(2) ? '' : 'active' }}"
                           href="/{{ $slug }}"
                        >
                            Все работы
                        </a>
                    </li>
                    @if(sizeof($types))
                        @foreach($types as $type)
                            <li class="item dib">
                                <a class="button {{ Request::segment(2) == $type->url_segment ? 'active' : '' }}"
                                   href="/{{ $slug }}/{{ $type->url_segment }}">
                                    {{ $type->title }}
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>

    @if(isset($selected_type))
        <div class="container margin-top36">
            <div class="row">
                <div class="filters span10 offset1">
                    <ul class="list tc2">
                        <li class="item dib">
                            <a class="button {{ Request::segment(3) ? '' : 'active category_active_btn' }}"
                               href="/{{ $slug }}/{{ $selected_type->url_segment }}"
                            >
                                Все категории
                            </a>
                        </li>
                        @if(sizeof($categories))
                            @foreach($categories as $category)
                                <li class="item dib">
                                    <a class="button {{ Request::segment(3) == $category->url_segment ? 'active category_active_btn' : ''}}"
                                       href="/{{ $slug }}/{{ $selected_type->url_segment }}/{{ $category->url_segment }}"
                                    >
                                        {{ $category->title }}
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    @endif
</div>