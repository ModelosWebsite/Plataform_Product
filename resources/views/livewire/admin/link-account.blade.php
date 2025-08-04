<div class="d-flex">
    <div class="form-group col-md-4">
        <select wire:model="mylocation" class="form-control selectLocation2" id="location-select">
            <option value="">--Selecione a localização da sua loja--</option>
            @forelse ($locationMap as $locationValue)
                <option value="{{ $locationValue['location'] ?? "" }}">{{ $locationValue['location'] ?? "" }}</option>
            @empty
            @endforelse
        </select>
    </div>

    <div class="form-group">
        <button wire:click="linkAccount" class="btn btn-outline-primary">Vincular</button>
    </div>

</div>