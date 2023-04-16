<div>
    <div class="col-md-8 mb-2">
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('error') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <form class="form-inline">
                    <div class="form-group mb-3">
                        <div class="form-group mb-3">
                            <label for="filter.code">Code: </label>
                            <input class="form-control" id="filter.code"
                                   type="text" wire:model="filter.code">
                        </div>
                        <div class="form-group mb-3">
                            <label for="filter.name">Name: </label>
                            <input class="form-control" id="filter.name"
                                   type="text" wire:model="filter.name">
                        </div>
                        <div>
                            <label>Limit: </label>
                            <input class="form-control" type="text" wire:model.defer="limit">
                        </div>
                        <button wire:click="search" class="btn btn-primary btn-sm float-right">Search</button>
                    </div>
                </form>
            </div>
        </div>

        <hr>

        @if($addPort)
            @include('livewire.create-port')
        @endif
        @if($updatePort)
            @include('livewire.update-port')
        @endif


    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">

                @if(!$addPort)
                    <button wire:click="addPort()" class="btn btn-primary btn-sm float-right">Add New Port</button>
                @endif
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>City</th>
                            <th>Updated at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($ports) > 0)
                            @foreach ($ports as $port)
                                <tr>
                                    <td>
                                        {{$port->code}}
                                    </td>
                                    <td>
                                        {{$port->name}}
                                    </td>
                                    <td>
                                        {{$port->city->id}}
                                        {{$port->city->name}}
                                    </td>
                                    <td>
                                        {{$port->updated_at}}
                                    </td>
                                    <td>
                                        <button wire:click="editPort('{{$port->code}}')" class="btn btn-primary btn-sm">Edit</button>
                                        <button wire:click="deletePort('{{$port->code}}')" class="btn btn-danger btn-sm">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3" align="center">
                                    No Ports found
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
