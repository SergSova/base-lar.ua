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
            @for($i=1;$i<=3;$i++)
              <div id="accordion_{{$lang}}">
                    <div class="card">
                        <div class="card-header" id="headingForms_{{$i}}_{{$lang}}">
                            <h5 class="mb-0">
                                <a class="btn btn-primary" data-toggle="collapse" href="#collapseForms_{{$i}}_{{$lang}}"
                                   role="button" aria-expanded="false" aria-controls="collapseForms_{{$i}}_{{$lang}}">
                                    Таб {{$i}}
                                </a>
                            </h5>
                        </div>
                        <div id="collapseForms_{{$i}}_{{$lang}}" class="collapse" aria-labelledby="headingForms_{{$i}}_{{$lang}}"
                             data-parent="#accordion_{{$lang}}">
                            <div class="card-body">

                                    <div class="form-group">
                                        {{ Form::label('Tabs_'.$lang."[$i][title]",'Заголовок 1 таба') }}
                                        {{ Form::text('Tabs_'.$lang."[$i][title]",$model->{'Tabs_'.$lang}->{$i}->title??NULL, ['class'=>'form-control']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Tabs_'.$lang."[$i][menu_title]",'Заголовок меню') }}
                                        {{ Form::text('Tabs_'.$lang."[$i][menu_title]",$model->{'Tabs_'.$lang}->{$i}->menu_title??NULL, ['class'=>'form-control']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label("Tabs_".$lang."[$i][add_box1]",'Подсказака 1') }}
                                        {{ Form::text("Tabs_".$lang."[$i][add_box1]",$model->{'Tabs_'.$lang}->{$i}->add_box1??NULL, ['class'=>'form-control']) }}
                                        {{ Form::textarea("Tabs_".$lang."[$i][add_box1_text]",$model->{'Tabs_'.$lang}->{$i}->add_box1_text??NULL, ['class'=>'form-control','rows'=>2]) }}
                                    </div>
                                     <div class="form-group">
                                        {{ Form::label("Tabs_".$lang."[$i][add_box2]",'Подсказака 2') }}
                                        {{ Form::text("Tabs_".$lang."[$i][add_box2]",$model->{'Tabs_'.$lang}->{$i}->add_box2??NULL, ['class'=>'form-control']) }}
                                        {{ Form::textarea("Tabs_".$lang."[$i][add_box2_text]",$model->{'Tabs_'.$lang}->{$i}->add_box2_text??NULL, ['class'=>'form-control','rows'=>2]) }}
                                    </div>
                                    @for($j=1;$j<=6;$j++)
                                        <div class="form-group">
                                            {{ Form::hidden("Tabs_".$lang."[$i][texts][$j][index]",$j) }}
                                        </div>
                                        <div class="col form-group">
                                            {{ Form::label("Tabs_".$lang."[$i][texts][$j][title]","Заголовок $j") }}
                                            {{ Form::text("Tabs_".$lang."[$i][texts][$j][title]",$model->{'Tabs_'.$lang}->{$i}->texts->{$j}->title??NULL, ['class'=>'form-control']) }}
                                        </div>
                                        <div class="col form-group">
                                            {{ Form::label("Tabs_".$lang."[$i][texts][$j][text]","Текст $j") }}
                                            {{ Form::textarea("Tabs_".$lang."[$i][texts][$j][text]",$model->{'Tabs_'.$lang}->{$i}->texts->{$j}->text??NULL, ['class'=>'form-control','rows'=>2]) }}
                                        </div>
                                    @endfor
{{--                               --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    @endforeach
</div>


