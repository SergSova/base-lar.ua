<?php
/**
 * Created by PhpStorm.
 * User: sergs
 * Date: 06.04.2018
 * Time: 10:22
 */

$base = $base ?? "City_" . $lang . "[$key][centers][$c_key]";
?>

<div class="center-wrap">
    <div class="form-row">
        <div class="col form-group">
            {{ Form::label($base."[title]", 'Название') }}
            {{ Form::text($base."[title]", NULL ,['class'=>'form-control']) }}
        </div>
        <div class="col form-group">
            {{ Form::label($base."[dopInfo]", 'Дополнительное инфо') }}
            {{ Form::text($base."[dopInfo]", NULL ,['class'=>'form-control']) }}
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            {{ Form::label($base."[info]", 'Инфо') }}
            {{ Form::textarea($base."[info]", NULL ,['class'=>'form-control','rows'=>3]) }}
        </div>
        <div class=" form-horizontal">
            <div class="form-check ">
                {{ Form::checkbox($base."[ico_condom]",1, NULL ,['class'=>'form-check-input','id'=>$base."[ico_condom]"]) }}
                {{ Form::label($base."[ico_condom]", 'презерватив') }}
            </div>
            <div class="form-check ">
                {{ Form::checkbox($base."[ico_miki]",1, NULL ,['class'=>'form-check-input','id'=>$base."[ico_miki]"]) }}
                {{ Form::label($base."[ico_miki]", 'мики') }}
            </div>
        </div>

    </div>
    <div class="form-row">
        <div class="col">
            {{ Form::label($base."[lat]", 'lat') }}
            {{ Form::text($base."[lat]", NULL ,['class'=>'form-control']) }}
        </div>
        <div class="col">
            {{ Form::label($base."[lng]", 'lng') }}
            {{ Form::text($base."[lng]", NULL ,['class'=>'form-control']) }}
        </div>
        <div class="col">
            <a class="btn btn-danger btn-sm btn-remove">X</a>
        </div>
    </div>

</div>
