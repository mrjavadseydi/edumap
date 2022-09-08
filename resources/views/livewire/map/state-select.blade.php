<div class="row">
    <div class="col-md-6">
        <label>استان</label>
        <select name="province_id" class="form-control" wire:change="updateState"
                wire:model="province_id" {{!$user->hasRole('admin')?"disables":""}}>
            <option>
                انتخاب کنید
            </option>
            @foreach($provinces as $province)
                <option value="{{$province->id}}"
                @if(!$map)
                    {{$user->province_id==
                    $province->id?"selected":""}}
                    @else

                    {{$province_id==$province->id?"selected":""}}
                    @endif
                >{{$province->title}}</option>

            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label>منطقه</label>
        <select name="state_id" class="form-control" {{!$user->hasRole('admin')?"disables":""}}>
            @foreach($states as $state)
                <option value="{{$state->id}}"
                @if(!$map)
                    {{$state->id==$user->state_id?"selected":""}}
                    @else
                    {{$state->id==$state_id?"selected":""}}
                    @endif

                >{{$state->title}}</option>
            @endforeach
        </select>
    </div>
</div>
