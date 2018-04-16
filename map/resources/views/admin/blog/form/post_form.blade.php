<?php

/**
 * @var \App\Models\Post $model
 */


?>
@section('styles')
    @parent

@endsection



<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        @foreach(\App\Http\Middleware\Locale::$languages as $lang)
            <a class="nav-item nav-link {{$loop->first?'active':''}}" id="nav-{{$lang}}-tab" data-toggle="tab"
               role="tab" aria-controls="nav-{{$lang}}" aria-selected="true"
               href="#nav-{{$lang}}">{{$lang=='uk'?'ua':$lang}}</a>
        @endforeach
    </div>
</nav>

<div class="tab-content" id="nav-tabContent">
    @foreach(\App\Http\Middleware\Locale::$languages as $lang)
        <div class="tab-pane fade {{$loop->first?'show active':''}}" id="nav-{{$lang}}" role="tabpanel"
             aria-labelledby="nav-{{$lang}}-tab">
			<?php
			$langi = '';
			if ( $lang != \App\Http\Middleware\Locale::$mainLanguage )
				$langi = ' ' . ( $lang == 'uk' ? 'ua' : $lang );
			?>
            <div class="form-group col">
                {{ Form::label('title'.'_'.$lang, 'Заголовок'.$langi) }}
                {{ Form::text('title'.'_'.$lang, NULL ,['class'=>'form-control']) }}
                <small class="form-text text-muted">~ - символ разделения строк</small>
            </div>
            <div class="form-group ">
                {{ Form::label('content'.'_'.$lang,'Содержимое'.$langi) }}
                {{ Form::textarea('content'.'_'.$lang,NULL, ['class'=>'form-control my-editor']) }}
            </div>
            <div class="form-group">
                {{ Form::label('description'.'_'.$lang,'Краткое описание'.$langi) }}
                {{ Form::textarea('description'.'_'.$lang,NULL, ['class'=>'form-control']) }}
            </div>
            @include('admin.seo_form',['lang'=>$lang,'index'=>$lang])
        </div>
    @endforeach
</div>
<div class="form-group">
    {{ Form::label('category_id', 'Категория') }}
    {{ Form::select('category_id', $model->all_category, $model->category_id,['class'=>'custom-select','placeholder'=>'Выберете категорию']) }}
</div>
<div class="form-row">
    @include('admin.chanks.img_lfm',['id'=>'mainImage1','name'=>'mainImage','title'=>'Основная картинка'])

    <div class="form-check">
        <div class="form-check col">
            {{ Form::checkbox('isBlackTitle',1,$model->isBlackTitle??FALSE,['class'=>'form-check-input','id'=>'isBlackTitle']) }}
            {{ Form::label('isBlackTitle','Цвет заголовка черный',['class'=>'form-check-label']) }}
        </div>
        <div class="form-check col">
            {{ Form::checkbox('isBig',1,$model->isBig??FALSE,['class'=>'form-check-input','id'=>'isBig']) }}
            {{ Form::label('isBig','Важная статья',['class'=>'form-check-label']) }}
        </div>
        <div class="form-check col">
            {{ Form::checkbox('isVioletPostStyle',1,$model->isVioletPostStyle??FALSE,['class'=>'form-check-input','id'=>'isVioletPostStyle']) }}
            {{ Form::label('isVioletPostStyle','Фиолетовая статья',['class'=>'form-check-label']) }}
        </div>

        <div class="form-check col">
            {{ Form::checkbox('isVideo',1,$model->isVideo??FALSE,['class'=>'form-check-input','id'=>'isVideo']) }}
            {{ Form::label('isVideo','Видео статья',['class'=>'form-check-label']) }}
        </div>
        <div class="form-group">
            {{ Form::label('mainVideo','Youtube код') }}
            {{ Form::text('mainVideo',NULL, ['class'=>'form-control']) }}
        </div>
    </div>
</div>
<div class="form-row">
    <div class="form-group">
        {{ Form::label('author','Автор') }}
        {{ Form::text('author',NULL, ['class'=>'form-control']) }}
    </div>

    @include('admin.chanks.img_lfm',['id'=>'authorImage1','name'=>'authorImage','title'=>'Картинка автора','subClass'=>'col'])
</div>
<div id="accordion">
    <div class="card">
        <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseTwo" role="button"
                   aria-expanded="false" aria-controls="collapseTwo">
                    Слайдер
                </a>
            </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
                @if($model->slider->count())
                    @foreach($model->slider as $key=>$photo)
                        <div class="row photo-wrap">
                            <div class="form-group col-lg-1">
                                {{ Form::text("Photo[$key][index]", $key,['class'=>'index-text form-control-plaintext','readonly'=>1]) }}
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    {{ Form::checkbox("Photo[$key][isVideo]",1,$photo->isVideo??FALSE,['class'=>'form-check-input']) }}
                                    {{ Form::label("Photo[$key][isVideo]",'Видео',['class'=>'form-check-label']) }}
                                </div>
                                @include('admin.chanks.img_lfm',[
                                'id'=>'photo'.$key,
                                'name'=>"Photo[$key][path]",
                                'title'=>'Фото '.$key,
                                'value'=>$photo->path,
                                'isVideo'=>$photo->isVideo??FALSE
                                ])
                                <div class="form-row">
                                    <div class="form-group col">
                                        {{ Form::label("Photo[$key][title]",'Title') }}
                                        {{ Form::text("Photo[$key][title]",$photo->title,['class'=>'form-control']) }}
                                    </div>
                                    <div class="form-group col">
                                        {{ Form::label("Photo[$key][alt]",'Alt') }}
                                        {{ Form::text("Photo[$key][alt]",$photo->alt,['class'=>'form-control']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="index-change col-lg-1">
                                <span class="btn btn-sm btn-info btn-upp">&uarr;</span>
                                <span class="btn btn-sm btn-info btn-down">&darr;</span>
                                <span class="btn btn-sm btn-danger photo-remove">X</span>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="row photo-wrap">
                        <div class="form-group col-lg-1">
                            {{ Form::text('Photo[0][index]',NULL,['class'=>'index-text form-control-plaintext','readonly'=>1]) }}
                        </div>
                        <div class="col">
                            <div class="form-group">
                                {{ Form::checkbox("Photo[0][isVideo]",1,FALSE,['class'=>'form-check-input']) }}
                                {{ Form::label("Photo[0][isVideo]",'Видео',['class'=>'form-check-label']) }}
                            </div>
                            @include('admin.chanks.img_lfm',['id'=>'photo0','name'=>"Photo[0][path]",'title'=>'Фото 0'])
                            <div class="form-row">
                                <div class="form-group col">
                                    {{ Form::label("Photo[0][title]",'Title') }}
                                    {{ Form::text("Photo[0][title]",NULL,['class'=>'form-control']) }}
                                </div>
                                <div class="form-group col">
                                    {{ Form::label("Photo[0][alt]",'Alt') }}
                                    {{ Form::text("Photo[0][alt]",NULL,['class'=>'form-control']) }}
                                </div>
                            </div>
                        </div>
                        <div class="index-change col-lg-1">
                            <span class="btn btn-sm btn-info btn-upp">&uarr;</span>
                            <span class="btn btn-sm btn-info btn-down">&darr;</span>
                            <span class="btn btn-sm btn-danger photo-remove">X</span>
                        </div>
                    </div>
                @endif
                <div class="form-group add-photo btn btn-success">Добавить фото</div>
            </div>
        </div>
    </div>
</div>
<div class="form-row">
    <div class="form-check col">
        {{ Form::checkbox('published',1,TRUE,['class'=>'form-check-input']) }}
        {{ Form::label('published','Опубликовано',['class'=>'form-check-label']) }}
    </div>
    <div class="form-check col">
        {{ Form::datetime('publishedOn',$model->publishedOn?? date('Y-m-d H:i:s'),['class'=>'form-control']) }}
    </div>
</div>

@section('scripts')
    @parent
    <script type="text/javascript" src="{{ asset('/assets/js/tinymce/tinymce.min.js') }}"></script>
    <script>
        var editor_config = {
            path_absolute: "/",
            selector: "textarea.my-editor",
            language: "ru",
            content_css: "{{ asset('assets/css/blog/blog.css') }},{{asset('assets/css/blog/one-blog.css')}}",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            rel_list: [
                {title: 'follow', value: 'follow'},
                {title: 'nofollow', value: 'nofollow'}
            ],
            importcss_file_filter: "{{asset('assets/css/blog/one-blog.css')}}",
            importcss_append: true,
            style_formats: [
                {
                    title: 'Шаблоны', items: [

                        {title: 'Две колонки', block: 'div', classes: 'blog-two-column', exact: true, wrapper: 1},
                        {title: 'Коментарий', block: 'div', classes: 'quotes', exact: true, wrapper: 0},
                        {title: 'Всторенное видео', block: 'iframe', classes: 'blog-video', exact: true, wrapper: 1},
                    ]
                },
            ],
            templates: [
                {
                    title: 'Слайдер',
                    description: 'Место куда будет вставлен слайдер',
                    content: '<div class="slide-insert"><h2 style="color: red">Слайдер</h2></div>'
                },
            ],

            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback: function (field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            }
        };

        tinymce.init(editor_config);
    </script>
    <script>
        $(function () {
            function changeAttr(_this, count, att) {
                if (_this.attr(att)) {
                    var name = _this.attr(att).replace(/\d+/, count);
                    _this.attr(att, name);
                }
            }

            $('.add-photo').on('click', function () {
                var photo = $('.photo-wrap').first().clone();
                var count = $('.photo-wrap').length;
                photo.find('input,img').each(function () {
                    var _this = $(this);
                    changeAttr(_this, count, 'name');
                    changeAttr(_this, count, 'id');
                    _this.removeAttr('src');
                    _this.removeAttr('checked');
                    _this.val(null);
                });
                photo.find('a').each(function () {
                    var _this = $(this);
                    changeAttr(_this, count, 'id');
                    changeAttr(_this, count, 'data-input');
                    changeAttr(_this, count, 'data-preview');
                    _this.html(_this.html().replace(/\d+/, count));

                });
                photo.find('.photo-remove').on('click', removePhoto);
                photo.find('.index-text').val(count);
                photo.insertBefore($(this));
                $('#lfmphoto' + count).filemanager('image')
            });

            function removePhoto() {
                if (confirm('Удалить фото?'))
                    $(this).parents('.photo-wrap').remove();
            }

            $('.photo-remove').on('click', removePhoto);
        });

    </script>
@endsection