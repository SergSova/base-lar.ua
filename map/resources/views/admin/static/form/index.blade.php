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
                {{ Form::label('title_'.$lang, 'Скрытый текст (2 слова)') }}
                {{ Form::text('title_'.$lang, NULL ,['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('longtitle_'.$lang,'Текст ответа') }}
                {{ Form::text('longtitle_'.$lang,NULL, ['class'=>'form-control']) }}
                <small class="form-text text-muted">/ - символ разделения строк</small>
            </div>
            <div class="form-group">
                {{ Form::label('description_'.$lang,'Текст подсказки') }}
                {{ Form::text('description_'.$lang,NULL, ['class'=>'form-control']) }}
            </div>
        </div>
    @endforeach
</div>



