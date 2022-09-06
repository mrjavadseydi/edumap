<div class="col-md-8 row">

    <div class="col-md-6">
        <label>استان</label>
        <select name="province_id" class="form-control" wire:change="updateState" wire:model="province_id">
            <option>
                انتخاب کنید
            </option>
            @foreach($provinces as $province)
                <option value="{{$province->id}}" {{$user->province_id==
                    $province->id?"selected":""}}>{{$province->title}}</option>

            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label>منطقه</label>
        <select name="state_id" class="form-control">
            @foreach($states as $state)
                <option value="{{$state->id}}" {{$state->id==$user->state_id?"selected":""}} >{{$state->title}}</option>
            @endforeach
        </select>
    </div>
</div>
