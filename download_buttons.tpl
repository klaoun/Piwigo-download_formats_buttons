<div id="download-content">
    <h4>Download</h4>
{foreach from=$current.formats item=$format}
      <a class="btn btn-dark btn-raised" href="{$format.download_url}">{$format.label}</button></a>
{/foreach}
</div>