<?php
/**
 * @var Danshin\Guestbook\Models\Report $report 
 */
?>

<div>
    <p>{{ $report->date }}</p>
    <p>{{ $report->title }}</p>
    @foreach ($report->content as $item)
        <div>{{ $item }}</div>
        <br/>
    @endforeach
</div>