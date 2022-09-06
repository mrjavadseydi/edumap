<div>
    <div class="mt-4">

        <x-jet-label for="province" value="{{ __('استان محل خدمت') }}"/>
        <select id="province" class="block mt-1 w-full rounded border-gray-300 shadow-sm" wire:change="updateState" wire:model="province_id"
                name="province_id" required>
            <option value="">یک استان را انتخاب کنید</option>
            @foreach($provinces as $province)
                <option value="{{ $province->id }}">{{ $province->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="mt-4">

        <x-jet-label for="state_id" value="{{ __('منطقه محل خدمت') }}"/>
        <select id="state_id" class="block mt-1 w-full rounded shadow-sm border-gray-300"
                name="state_id" required>
            <option value="">یک منطقه را انتخاب کنید</option>
            @foreach($states as $state)
                <option value="{{ $state->id }}">{{ $state->title }}</option>
            @endforeach
        </select>
    </div>
</div>
