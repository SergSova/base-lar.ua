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
                {{ Form::text('title_'.$lang, NULL ,['class'=>'form-control']) }}
                <small class="form-text text-muted">/ - символ разделения строк</small>
            </div>
            <div class="form-group">
                {{ Form::label('modal_text_'.$lang,'Текст подсказки') }}
                {{ Form::text('modal_text_'.$lang,NULL, ['class'=>'form-control']) }}
                <small class="form-text text-muted">/ - символ разделения строк</small>
            </div>
            <div class="form-group">
                {{ Form::label('modal_btn_'.$lang,'Текст кнопки') }}
                {{ Form::text('modal_btn_'.$lang,NULL, ['class'=>'form-control']) }}
            </div>
            <div class="form-row">
                @for($i=1;$i<=4;$i++)
                    <div class="col form-group">
                        {{ Form::label('rotator'.$i.'_'.$lang,'Текст '.$i.' колонки') }}
                        {{ Form::text('rotator'.$i.'_'.$lang,NULL, ['class'=>'form-control']) }}
                        @if($i==4)
                            <small class="form-text text-muted">/ - символ разделения строк</small>
                        @endif
                    </div>
                @endfor
            </div>
            <div class="form-row">
                <div class="col form-group">
                    {{ Form::label('rocket_btn_'.$lang,'Кнопка не рисковать') }}
                    {{ Form::text('rocket_btn_'.$lang,NULL, ['class'=>'form-control']) }}
                </div>
                <div class="col form-group">
                    {{ Form::label('tumb_on_off_'.$lang,'Тумблер включить голову') }}
                    {{ Form::text('tumb_on_off_'.$lang,NULL, ['class'=>'form-control']) }}
                    <small class="form-text text-muted">/ - символ разделения строк</small>
                </div>
            </div>
        </div>
    @endforeach
</div>

