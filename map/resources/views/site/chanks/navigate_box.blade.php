<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 30.03.2018
 * Time: 9:32
 */
?>

<div class="navigate-box">
    <div class="navigate-box__left">
        <div class="navigate-box__left-wrap">
            <span class="navigate-box__line"></span>
            <span class="navigate-box__line"></span>
        </div>
        <div class="navigate-box__text">@lang('site.prev_page')</div>
    </div>
    <div class="navigate-box__right">
        <div class="navigate-box__right-wrap">
            <span class="navigate-box__line"></span>
            <span class="navigate-box__line"></span>
        </div>
        <div class="navigate-box__text">@lang('site.next_page')</div>
    </div>
</div>

@section('scripts')
    @parent
    <script>
        $(function () {
            if (prev_page.length) {
                $('.navigate-box__left').on('click', function() {
                    location.assign( prev_page);
                });
            }

            if (!prev_page.length) {
                $('.navigate-box__left').css('display', 'none');
            }

            if (next_page.length) {
                $('.navigate-box__right').on('click', function() {
                    location.assign( next_page);
                });
            }

            if (!next_page.length) {
                $('.navigate-box__right').css('display', 'none');
            }
        });
    </script>
@endsection