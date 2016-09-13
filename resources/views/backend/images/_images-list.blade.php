<div class="ui four doubling cards">
    @if (sizeof($images))
        @foreach($images as $image)
            <div class="card segment">
                <div class="image text-centered">
                    <img src="{{ config('app.thumb_image_upload_path') . $image->path }}">
                </div>
                <div class="content">
                    <div class="description">
                        {{ $image->alt }}

                        @if(!$image->alt)
                            <div class="ui ribbon red large label">
                                <i class="fi-warning sign icon"></i> Отсутствует описание
                            </div>
                        @endif
                    </div>
                </div>
                <div class="extra content">
                    <span>
                        <i class="history icon"></i>
                        {{ $image->created_at->format('d.m.Y H:i:s') }}
                    </span>

                </div>
                <div class="extra content">
                        {{-- Редактировать --}}
                        <a href="/{{ config('app.admin_segment_name') }}/images/{{  $image->id }}/edit">
                            <i class="edit icon"></i>Редактировать
                        </a>

                        {{-- Удалить --}}
                        <a data-popup="1">
                            <i class="remove circle icon"></i>Удалить
                        </a>
                        <div class="ui custom popup">
                            <div class="ui huge header center aligned">Точно удалить?</div>
                            <span class="ui negative button" data-action-name="remove"
                                  data-action="/{{ config('app.admin_segment_name') }}/images/{{ $image->id }}"
                                  data-method="DELETE">Да</span>
                            <span class="ui button">Нет</span>
                        </div>
                </div>
            </div>
        @endforeach
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @else
        @include('backend._partials.nothingfound')
    @endif
</div>