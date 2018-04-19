<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 19.04.2018
 * Time: 12:57
 */

/**
 * @var $gallery \App\InstGallery[]
 */
?>


<table class="table">
    @foreach($gallery as $item)
        <tr>
            <td>{{$item->index}}</td>
            <td><img src="{{asset($item->path)}}" alt=""></td>
            <td>{{$item->desc}}</td>
            <td>{{$item->title}}</td>
            <td>{{$item->alt}}</td>
        </tr>
    @endforeach
</table>
<nav aria-label="Page navigation example">
    {{$gallery->links('admin.blog.pagination')}}
</nav>
