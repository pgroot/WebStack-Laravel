<div class="access_level">
    @if($access_level === 'private')
    <i>INTERNAL</i>
    @elseif($access_level === 'public')

    @elseif($access_level === 'limited')
    <i class="fa fa-lock"></i>
    @endif
</div>