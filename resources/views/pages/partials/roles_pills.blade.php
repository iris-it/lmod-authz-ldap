@if($role)
    @if($role->name =='admin')
        <span class="badge badge-danger">{{$role->name}}</span>
    @elseif($role->name =='manager')
        <span class="badge badge-warning">{{$role->name}}</span>
    @else
        <span class="badge badge-info">{{$role->name}}</span>
    @endif
@else
    <span class="badge badge-default">{{__('No role')}}</span>
@endif