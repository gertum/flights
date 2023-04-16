<div class="card">
    <div class="card-body">
        <form >
            <div class="form-group mb-3">
                <label for="code">Code:</label>
                <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" placeholder="Enter Code" wire:model="code">
                @error('code')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="name">Name:</label>
                <input class="form-control @error('name') is-invalid @enderror" id="name" wire:model="name" placeholder="Enter Name"></input>
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="city_id">City:</label>
                <input class="form-control @error('name') is-invalid @enderror" id="city_id" wire:model="city_id" placeholder="Enter city id"></input>
                @error('city_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="d-grid gap-2">
                <button wire:click.prevent="storePort()" class="btn btn-success btn-block">Save</button>
                <button wire:click.prevent="cancelPort()" class="btn btn-secondary btn-block">Cancel</button>
            </div>
        </form>
    </div>
</div>
