@extends('frontend.template', [
    'seoTitle' => 'Блог проекта Sphered [сферед]',
    'seoDescription' => 'Блог о всем, что связано с панорамным фото, мультимедийных решених на основе панорам и 3D объектов. Виртуальные 3D туры, сферические и цилиндрические панорамы, 3D объекты, панорамное видео, и другие VR решения.',
    'seoKeywords' => 'блог, публикации, новости, фото, сферед, sphered, о 3Д панорамах, о виртуальных 3D турах, виртуальные 3D туры, 3D панорамы'
])

@section('content')
    <div class="blog">
        <div class="container">
            <div class="row-fluid">

                <div class="span8">
                    @include('frontend.blog.articles')
                </div>

                {{-- BLOG SIDEBAR --}}
                @include('frontend.blog.sidebar')

            </div>
        </div>
    </div>
@endsection