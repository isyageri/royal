<div class="inner-content-title">
    <i class="fa fa-home"></i>
    <span>{$content_title}</span>
</div>
<div class="content-list">
    {foreach name=data from=$whyus item=why}

        <div class="content-list-desc">{$why.Description}</div>

    {/foreach}
</div>
