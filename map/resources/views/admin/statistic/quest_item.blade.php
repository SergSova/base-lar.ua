<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 12.04.2018
 * Time: 14:30
 */

$all_count = $model->count;

//dd($quests);
?>
@foreach($quests as $quest=>$variants)
    @php
        if ($variants['models']->count())
                   $if_multi = $variants['multi'] ? $all_count / $variants['models']->count() : 1;
    @endphp
    <div class="card">
        <div class="card-header">
            <p class="card-title">{!! $quest !!} </p>
            <p class="card-subtitle">(вариантов <b>{{$variants['models']->count()}}</b>{{$variants['multi']?', множественный выбор коэффициент '.$if_multi:''}})</p>
        </div>
        <div class="card-body">
            @foreach($variants['models'] as $var=>$answers)
                <div class="row">
                    <div class="col-3">{!! $var !!}</div>
                    <?php
                    $percent = round($answers->count() / $all_count * 100 * $if_multi);
                    ?>
                    <div class="col">
                        <div class="progress ">
                            <div class="progress-bar"
                                 role="progressbar"
                                 style="width: {{$percent}}%"
                                 aria-valuenow="{{$percent}}"
                                 aria-valuemin="0"
                                 aria-valuemax="100">{{$percent}}%
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endforeach
