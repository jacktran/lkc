<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 12/1/14
 * Time: 8:26 PM
 * To change this template use File | Settings | File Templates.
 */
?>
<ul class="left-menu">
@foreach($tools as $tool)
    <li data-action="{{$tool->name_url}}">
        <a  href="/tools/{{$tool->name_url}}">{{$tool->name}}</a>
    </li>

@endforeach
</ul>
