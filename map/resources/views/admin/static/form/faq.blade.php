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
                {{ Form::label('longtitle_'.$lang,'Длинный заголовок') }}
                {{ Form::text('longtitle_'.$lang,null, ['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('description_'.$lang,'Описание') }}
                {{ Form::textarea('description_'.$lang,null,['class'=>'form-control']) }}
            </div>
{{--            <div class="row">
                <div class="form-group col">
                    {{ Form::label('menutitle','Заголовок меню') }}
                    {{ Form::text('menutitle',null, ['class'=>'form-control']) }}
                </div>
                <div class="form-check col">
                    {{ Form::checkbox('published',1,true,['class'=>'form-check-input']) }}
                    {{ Form::label('published','Опубликовано',['class'=>'form-check-label']) }}
                </div>
            </div>--}}

            @include('admin.question_form',$model)
        </div>
    @endforeach
</div>

