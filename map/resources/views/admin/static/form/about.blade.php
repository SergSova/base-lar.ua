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
            <div class="form-group">
                {{ Form::label('title_'.$lang, 'Заголовок') }}
                {{ Form::text('title_'.$lang, null ,['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('supported_'.$lang, 'Заголовок поддержки') }}
                {{ Form::text('supported_'.$lang, null ,['class'=>'form-control ']) }}
            </div>
            <div class="form-group">
                {{ Form::label('desc_title_'.$lang, 'Заголовок контента') }}
                {{ Form::text('desc_title_'.$lang, null ,['class'=>'form-control ']) }}
            </div>
            <div class="form-group">
                {{ Form::label('description_'.$lang, 'Содержимое') }}
                {{ Form::textarea('description_'.$lang, null ,['class'=>'form-control my-editor']) }}
            </div>
        </div>
    @endforeach
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
                @forelse($model->slider as $key=>$photo)
                    <div class="row photo-wrap">
                        <div class="form-group col-lg-1">
                            {{ Form::text("Photo[$key][index]", $key,['class'=>'index-text form-control-plaintext','readonly'=>1]) }}
                        </div>
                        <div class="form-inline">
                            <div class="form-group">
                                {{ Form::label("Photo[$key][max-height]", 'max-height') }}
                                {{ Form::text("Photo[$key][max-height]", $photo->{'max-height'} ,['class'=>'form-control ']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label("Photo[$key][max-width]", 'max-width') }}
                                {{ Form::text("Photo[$key][max-width]", $photo->{'max-width'} ,['class'=>'form-control ']) }}
                            </div>
                        </div>
                        <div class="col">
                            @include('admin.chanks.img_lfm',[
                            'id'=>'photo'.$key,
                            'name'=>"Photo[$key][path]",
                            'title'=>'Фото '.$key,
                            'value'=> $photo->path
                            ])
                        </div>
                        <div class="index-change col-lg-1">
                            <span class="btn btn-sm btn-info btn-upp">&uarr;</span>
                            <span class="btn btn-sm btn-info btn-down">&darr;</span>
                            <span class="btn btn-sm btn-danger btn-rem">X</span>
                        </div>
                    </div>
                @empty
                    <div class="row photo-wrap">
                        <div class="form-group col-lg-1">
                            {{ Form::text('Photo[0][index]',null,['class'=>'index-text form-control-plaintext','readonly'=>1]) }}
                        </div>
                        <div class="col">
                            @include('admin.chanks.img_lfm',['id'=>'photo0','name'=>"Photo[0][path]",'title'=>'Фото 0'])
                        </div>
                        <div class="index-change col-lg-1">
                            <span class="btn btn-sm btn-info btn-upp">&uarr;</span>
                            <span class="btn btn-sm btn-info btn-down">&darr;</span>
                            <span class="btn btn-sm btn-danger btn-rem">X</span>
                        </div>
                    </div>
                @endforelse
                <div class="form-group add-photo btn btn-success">Добавить фото</div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script type="text/javascript" src="{{ asset('/assets/js/tinymce/tinymce.min.js') }}"></script>
    <script>
        var editor_config = {
            path_absolute: "/",
            selector: "textarea.my-editor",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
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
        function changeAttr(_this, count, att) {
            if (_this.attr(att)) {
                var name = _this.attr(att).replace(/\d+/, count);
                _this.attr(att, name);
            }
        }

        $('.add-photo').on('click', function () {
            var photo = $('.photo-wrap').first().clone();
            var count = $('.photo-wrap').length;

            photo.find('input,label,img,a,.index-text').each(function () {
                var _this = $(this);
                changeAttr(_this, count, 'name');
                changeAttr(_this, count, 'id');
                changeAttr(_this, count, 'for');
                changeAttr(_this, count, 'data-input');
                changeAttr(_this, count, 'data-preview');

                if (this.localName === 'a') {
                    _this.html(_this.html().replace(/\d+/, count));
                }
                if (this.localName === 'img') {
                    _this.attr('src', '');
                }
                _this.val(null);
            });

            photo.insertBefore($(this));
            $('#lfmphoto' + count).filemanager('image');
            checkPhoto();
        });

        checkPhoto();

        function removePhoto() {
            if (confirm('Удалить фото?'))
                $(this).parents('.row').remove();
        }

        function downPhoto() {
            var photo = $(this).parents('.row');
            photo.insertAfter(photo.next('.photo-wrap'));
            indexChange();
        }

        function upPhoto() {
            var photo = $(this).parents('.row');
            photo.insertBefore(photo.prev('.photo-wrap'));
            indexChange();
        }

        function indexChange() {
            $('.photo-wrap').each(function (inx) {
                $(this).find('input,label,img,a').each(function () {
                    var _this = $(this);
                    if ($(this).hasClass('index-text'))
                        $(this).val(inx);
                    if (this.localName === 'a') {
                        _this.html(_this.html().replace(/\d+/, inx));
                    }
                    changeAttr(_this, inx, 'name');
                    changeAttr(_this, inx, 'id');
                    changeAttr(_this, inx, 'for');
                    changeAttr(_this, inx, 'data-input');
                    changeAttr(_this, inx, 'data-preview');
                })
            })
        }

        function checkPhoto() {
            $('.btn-upp').on('click', upPhoto);
            $('.btn-down').on('click', downPhoto);
            $('.btn-rem').on('click', removePhoto);
            var count = $('.photo-wrap').length;
            if (count <= 1) {
                $('.index-change').each(function (inx) {
                    $(this).fadeOut();
                });
            } else {
                $('.index-change').each(function (inx) {
                    $(this).fadeIn();
                });
            }
        }

    </script>
@endsection