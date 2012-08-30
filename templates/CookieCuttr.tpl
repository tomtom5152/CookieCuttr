<script src="//code.jquery.com/jquery-latest.js"></script>
<script src="{$p}/lib/jquery.cookie.js"></script>
<script src="{$p}/lib/jquery.cookiecuttr.js"></script>
<link rel="stylesheet" href="{$p}/lib/cookiecuttr.css" />

{literal}
<script>
    $(document).ready(function () {
        $.cookieCuttr({
            {/literal}{$opt}{literal}
        });
    });
</script>
{/literal}