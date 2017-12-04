@if($role)
    @if($role->name =='admin')
        <span class="uk-badge">{{str_limit($role->name, 10)}}</span>
    @elseif($role->name =='manager')
        <span class="uk-badge">{{str_limit($role->name, 10)}}</span>
    @else
        <span class="uk-badge">{{str_limit($role->name, 10)}}</span>
    @endif
@else
    <span class="uk-badge">{{__('No role')}}</span>
@endif