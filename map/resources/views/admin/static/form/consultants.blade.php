<?php

/**
 * @var $model \App\StaticPage
 */
?>
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
                {{ Form::label("title_".$lang,'Заголвок') }}
                {{ Form::text("title_".$lang, NULL, ['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label("longtitle_".$lang,'Полный заголовок') }}
                {{ Form::text("longtitle_".$lang, NULL, ['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label("description_".$lang,'Описание') }}
                {{ Form::textarea("description_".$lang, NULL, ['class'=>'form-control','rows'=>3]) }}
            </div>
            <div id="accordion{{$lang}}">
                <div class="card">
                    <div class="card-header" id="headingDays{{$lang}}">
                        <h5 class="mb-0">
                            <a class="btn btn-primary" data-toggle="collapse" href="#collapseDays{{$lang}}"
                               role="button"
                               aria-expanded="false" aria-controls="collapseDays{{$lang}}">
                                Заголовки дней
                            </a>
                        </h5>
                    </div>
                    <div id="collapseDays{{$lang}}" class="collapse" aria-labelledby="headingDays{{$lang}}"
                         data-parent="#accordion{{$lang}}">
                        <div class="card-body">
                            <div class="form-row">
                                @for($i=1;$i<=7;$i++)
                                    <div class="col form-group">
                                        {{ Form::label("consHeader_{$i}".'_'.$lang, 'День '.$i) }}
                                        {{ Form::text("consHeader_{$i}".'_'.$lang, $model->{'consHeader_'.$i.'_'.$lang}??NULL, ['class'=>'form-control']) }}
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="accordion1{{$lang}}">
                <div class="card">
                    <div class="card-header" id="headingConsultants{{$lang}}">
                        <h5 class="mb-0">
                            <a class="btn btn-primary" data-toggle="collapse" href="#collapseConsultants{{$lang}}" role="button"
                               aria-expanded="false" aria-controls="collapseConsultants{{$lang}}">
                                Консультанты
                            </a>
                        </h5>
                    </div>
                    <div id="collapseConsultants{{$lang}}" class="collapse" aria-labelledby="headingConsultants{{$lang}}"
                         data-parent="#accordion1{{$lang}}">
                        <div class="card-body">
                            <div class="form-row">
                                @forelse($model->{'Consultant_'.$lang} as $key=>$consultant)
                                    <div class="row consultant-wrap">
                                        <div class="col">
                                            <div class="form-group ">
                                                {{ Form::label("Consultant_".$lang."[$key][title]",'Консультант') }}
                                                {{ Form::text("Consultant_".$lang."[$key][title]", $consultant->title,['class'=>'form-control']) }}
                                            </div>
                                            <div class="form-row">
                                                @foreach($consultant->days??[] as $inx=>$day)
                                                    <div class="col form-group">
                                                        {{ Form::label("Consultant_".$lang."[$key][days][$inx]",'День '.$i) }}
                                                        {{ Form::text("Consultant_".$lang."[$key][days][$inx]", $day , ['class'=>'form-control']) }}
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="index-change col-lg-1">
                                            <span class="btn btn-sm btn-info btn-upp">&uarr;</span>
                                            <span class="btn btn-sm btn-info btn-down">&darr;</span>
                                        </div>
                                    </div>
                                @empty
                                    <div class="row consultant-wrap">
                                        <div class="col">
                                            <div class="form-group ">
                                                {{ Form::label("Consultant_".$lang."[0][title]",'Консультант') }}
                                                {{ Form::text("Consultant_".$lang."[0][title]", NULL,['class'=>'form-control']) }}
                                            </div>
                                            <div class="form-row">
                                                @for($i=1;$i<=7;$i++)
                                                    <div class="col form-group">
                                                        {{ Form::label("Consultant_".$lang."[0][days][$i]",'День '.$i) }}
                                                        {{ Form::text("Consultant_".$lang."[0][days][$i]",NULL, ['class'=>'form-control']) }}
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="index-change col-lg-1">
                                            <span class="btn btn-sm btn-info btn-upp">&uarr;</span>
                                            <span class="btn btn-sm btn-info btn-down">&darr;</span>
                                        </div>
                                    </div>
                                @endforelse
                                <div class="form-group add-consultant btn btn-success">Добавить консультанта</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="accordion2{{$lang}}">
                <div class="card">
                    <div class="card-header" id="headingList{{$lang}}">
                        <h5 class="mb-0">
                            <a class="btn btn-primary" data-toggle="collapse" href="#collapseList{{$lang}}" role="button"
                               aria-expanded="false" aria-controls="collapseList{{$lang}}">
                                Список подсказок
                            </a>
                        </h5>
                    </div>
                    <div id="collapseList{{$lang}}" class="collapse" aria-labelledby="headingList{{$lang}}" data-parent="#accordion2{{$lang}}">
                        <div class="card-body">
                            <div class="form-row">
                                @for($i=1;$i<=4;$i++)
                                    <div class="col form-group">
                                        {{ Form::label("list_".$lang."[$i]",'Текст '.$i) }}
                                        {{ Form::textarea("list_".$lang."[$i]",$model->{'list_'.$lang.$i}??NULL, ['class'=>'form-control','rows'=>8]) }}
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@section('scripts')
    <script>
        $(function () {
            $('.add-consultant').on('click', function () {
                var consultant = $('.consultant-wrap').first().clone();
                var count = $('.consultant-wrap').length;
                consultant.find('input,textarea').each(function () {
                    var name = $(this).attr('name').replace(/\d+/, count);
                    $(this).attr('name', name);
                    $(this).val(null);
                });
                consultant.insertBefore($(this));
                checkConsult();
            });

            checkConsult();

            function downConsult() {
                var quest = $(this).parents('.row');
                quest.insertAfter(quest.next('.consultant-wrap'));
            }

            function upConsult() {
                var quest = $(this).parents('.row');
                quest.insertBefore(quest.prev('.consultant-wrap'));
            }

            function checkConsult() {
                $('.btn-upp').on('click', downConsult);
                $('.btn-down').on('click', upConsult);
                var count = $('.consultant-wrap').length;
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
        });
    </script>
@endsection