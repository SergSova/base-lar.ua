<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 19.04.2018
 * Time: 9:02
 */

?>
@if ($paginator->hasPages())
    <ul class="pagination justify-content-center">
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"><span>&laquo;</span></a></li>
        @else
            <li class=page-item><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
        @endif
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"><span>{{ $element }}</span></a></li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active"><a class="page-link" href="#" tabindex="-1"><span>{{ $page }}</span></a></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
        @else
            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"><span>&raquo;</span></a></li>
        @endif
    </ul>
@endif
