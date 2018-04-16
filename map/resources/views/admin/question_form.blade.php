<div id="accordion{{$lang}}">
    <div class="card">
        <div class="card-header" id="headingTwo{{$lang}}">
            <h5 class="mb-0">
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseTwo{{$lang}}" role="button" aria-expanded="false" aria-controls="collapseTwo{{$lang}}">
                    Вопросы
                </a>
            </h5>
        </div>
        <div id="collapseTwo{{$lang}}" class="collapse" aria-labelledby="headingTwo{{$lang}}" data-parent="#accordion{{$lang}}">
            <div class="card-body">
                @forelse($model->getQuestions() as $key=>$question)
                    <div class="row question-wrap">
                        {{ Form::hidden("Question[$key][id]",$question->id) }}
                        <div class="form-group col-lg-1">
                            {{ Form::text("Question[$key][index]", $key,['class'=>'index-text form-control-plaintext','readonly'=>1]) }}
                        </div>
                        <div class="col">
                            <div class="form-group ">

                                {{ Form::label("Question[$key][question_$lang]",'Вопрос') }}
                                {{ Form::text("Question[$key][question_$lang]", $question->{'question_'.$lang},['class'=>'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label("Question[$key][answer_$lang]",'Ответ') }}
                                {{ Form::textarea("Question[$key][answer_$lang]",$question->{'answer_'.$lang},['class'=>'form-control','rows'=>3]) }}
                            </div>
                        </div>
                        <div class="index-change col-lg-1">
                            <span class="btn btn-sm btn-info btn-upp">&uarr;</span>
                            <span class="btn btn-sm btn-info btn-down">&darr;</span>
                        </div>
                    </div>
                @empty
                    <div class="row question-wrap">
                        <div class="form-group col-lg-1">
                            {{ Form::text('Question[0][index]',null,['class'=>'index-text form-control-plaintext','readonly'=>1]) }}
                        </div>
                        <div class="col">
                            <div class="form-group">
                                {{ Form::label('Question[0][question]','Вопрос') }}
                                {{ Form::text('Question[0][question]',null,['class'=>'form-control']) }}
                            </div>
                            <div class="form-group ">
                                {{ Form::label('Question[0][answer]','Ответ') }}
                                {{ Form::textarea('Question[0][answer]',null,['class'=>'form-control','rows'=>3]) }}
                            </div>
                        </div>
                        <div class="index-change col-lg-1">
                            <span class="btn btn-sm btn-info btn-upp">&uarr;</span>
                            <span class="btn btn-sm btn-info btn-down">&darr;</span>
                        </div>
                    </div>
                @endforelse
                <div class="form-group add-question btn btn-success">Добавить вопрос</div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    @parent
    <script>
        $(function () {
            $('.add-question').on('click', function () {
                var question = $('.question-wrap').first().clone();
                var count = $('.question-wrap').length;
                question.find('input,textarea').each(function () {
                    var name = $(this).attr('name').replace(/\d+/, count);
                    $(this).attr('name', name);
                    $(this).val(null);
                });
                question.insertBefore($(this));
                checkQuest();
            });

            checkQuest();

            function downQuest() {
                var quest = $(this).parents('.row');
                quest.insertAfter(quest.next('.question-wrap'));
                pushIndexes();
            }

            function upQuest() {
                var quest = $(this).parents('.row');
                quest.insertBefore(quest.prev('.question-wrap'));
                pushIndexes();
            }

            function pushIndexes() {
                $(".tab-pane.active .index-text").each(function (inx) {
                    $(this).val(inx)
                });
            }

            function checkQuest() {
                $('.btn-upp').on('click', upQuest);
                $('.btn-down').on('click', downQuest);
                var count = $('.question-wrap').length;
                if (count <= 1) {
                    $('.index-change').each(function (inx) {
                        $(this).fadeOut();
                    });
                } else {
                    $('.index-change').each(function (inx) {
                        $(this).fadeIn();
                    });
                }
                pushIndexes();
            }
        });
    </script>
@endsection