<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 12.04.2018
 * Time: 16:02
 */

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>{{$subject}}</title>
    <style type="text/css">
        * {
            font-size: 20px;
            margin: 0;
            padding: 0;
        }

        table {
            width: 100%;
            background: transparent;
        }

        td {
            width: 50%;
            background: transparent;
            padding: 10px;
        }

        td:first-child {
            font-weight: 700;
        }

        caption {
            padding: 10px;
            font-size: 25px;
            font-weight: 700;
            text-align: left;
            border-bottom: 1px dotted #000;
            width: 100%;
        }
    </style>
</head>
<body>
<table>
    <caption style="width: 100%">
        {{$subject}}
    </caption>

    @foreach($arr as $answer)
        <tr>
            <td>
                {{strip_tags($answer['label'])}}
            </td>
            <td>
                {{strip_tags( join(' и ', $answer['answer']))}}
            </td>
        </tr>
    @endforeach
</table>
</body>
</html>
