@if($role)
    @if($role->name =='admin')
        <span class="badge badge-danger" style="width: 75px">{{$role->name}}</span>
    @elseif($role->name =='manager')
        <span class="badge badge-warning" style="width: 75px">{{$role->name}}</span>
    @else
        <span class="badge badge-info" style="width: 75px">{{$role->name}}</span>
    @endif
@else
    <span class="badge badge-default" style="width: 75px">{{__('No role')}}</span>
@endif