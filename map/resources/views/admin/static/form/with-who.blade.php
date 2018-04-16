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
                <small class="form-text text-muted">/ - символ разделения строк</small>
            </div>
            <div class="form-group">
                {{ Form::label('modal_text_'.$lang,'Текст подсказки') }}
                {{ Form::text('modal_text_'.$lang,null, ['class'=>'form-control']) }}
                <small class="form-text text-muted">/ - символ разделения строк</small>
            </div>
            <div class="form-group">
                {{ Form::label('modal_btn_'.$lang,'Текст кнопки') }}
                {{ Form::text('modal_btn_'.$lang,null, ['class'=>'form-control']) }}
            </div>

            <div id="accordion_{{$lang}}">
                <div class="card">
                    <div class="card-header" id="headingForms_{{$lang}}">
                        <h5 class="mb-0">
                            <a class="btn btn-primary" data-toggle="collapse" href="#collapseForms_{{$lang}}" role="button" aria-expanded="false" aria-controls="collapseForms_{{$lang}}">
                                Форма
                            </a>
                        </h5>
                    </div>
                    <div id="collapseForms_{{$lang}}" class="collapse" aria-labelledby="headingForms_{{$lang}}" data-parent="#accordion_{{$lang}}">
                        <div class="card-body">
                            <div class="form-group">
                                {{ Form::label('pop_title_'.$lang,'Заголовок всплывающих окон') }}
                                {{ Form::text('pop_title_'.$lang,null, ['class'=>'form-control']) }}
                                <small class="form-text text-muted">А чего <span class="text-danger text-uppercase">*ты*</span> не знаешь о себе? (** -звездочки для выделения слова)</small>
                            </div>
                            @for($i=1;$i<=6;$i++)
                                <div class="form-group">
                                    {{ Form::label('chk_'.$i.'_'.$lang,'Текст '.$i) }}
                                    {{ Form::text('chk_'.$i.'_'.$lang,null, ['class'=>'form-control']) }}
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
            <div id="accordion2_{{$lang}}">
                <div class="card">
                    <div class="card-header" id="headingHumans_{{$lang}}">
                        <h5 class="mb-0">
                            <a class="btn btn-primary" data-toggle="collapse" href="#collapseHumans_{{$lang}}" role="button" aria-expanded="false" aria-controls="collapseHumans_{{$lang}}">
                                Люди
                            </a>
                        </h5>
                    </div>
                    <div id="collapseHumans_{{$lang}}" class="collapse" aria-labelledby="headingHumans_{{$lang}}" data-parent="#accordion2_{{$lang}}">
                        <div class="card-body">
                            @forelse($model->{'Humans_'.$lang} as $key=>$human)
                                <div class="form-row human-wrap">
                                    <div class="col-lg-2 form-group ">
                                        {{ Form::label("Humans_".$lang."[$key][title]",'Имя') }}
                                        {{ Form::text("Humans_".$lang."[$key][title]", $human->title,['class'=>'form-control']) }}
                                    </div>
                                    <div class="col-lg-2 form-group">
                                        {{ Form::label("Humans_".$lang."[$key][illness]",'Заболевание') }}
                                        {{ Form::text("Humans_".$lang."[$key][illness]",$human->illness,['class'=>'form-control']) }}
                                    </div>
                                    @include('admin.chanks.img_lfm',['id'=>'humanImage'.$key.$lang,'name'=>"Humans_".$lang."[$key][images]",'title'=>'Картинка','value'=>$human->images])
                                </div>
                            @empty
                                <div class="form-row human-wrap">
                                    <div class="col form-group">
                                        {{ Form::text("Humans_".$lang."[0][title]",null,['class'=>'form-control','placeholder'=>'Имя']) }}
                                    </div>
                                    <div class="col form-group ">
                                        {{ Form::text("Humans_".$lang."[0][illness]",null,['class'=>'form-control','placeholder'=>'Заболевание']) }}
                                    </div>
                                    @include('admin.chanks.img_lfm',['id'=>'humanImage0'.$lang,'name'=>"Humans_".$lang."[0][images]",'title'=>'Картинка'])
                                </div>
                            @endforelse
                            @if(isset($model->{'Humans_'.$lang})&& count($model->{'Humans_'.$lang})<=6)
                                <div class="form-group add-human btn btn-success">Добавить человека</div>
                            @endif
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
            $('.add-human').on('click', function () {
                var human = $('.human-wrap').first().clone();
                var count = $('.human-wrap').length;
                if (count >= 8) return;
                human.find('input,textarea').each(function () {
                    var name = $(this).attr('name').replace(/\d+/, count);
                    $(this).attr('name', name);
                    $(this).val(null);
                });
                human.insertBefore($(this));
            });
        });
    </script>
@endsection