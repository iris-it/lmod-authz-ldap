@if($role)
    @if($role->name =='admin')
        <span class="uk-badge">{{$role->name}}</span>
    @elseif($role->name =='manager')
        <span class="uk-badge">{{$role->name}}</span>
    @else
        <span class="uk-badge">{{$role->name}}</span>
    @endif
@else
    <span class="uk-badge">{{__('No role')}}</span>
@endif