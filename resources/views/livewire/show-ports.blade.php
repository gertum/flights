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
{{--        @if($addPost)--}}
{{--            @include('livewire.create')--}}
{{--        @endif--}}
{{--        @if($updatePost)--}}
{{--            @include('livewire.update')--}}
{{--        @endif--}}

            <div>
                <label>Code</label><input type="text" wire:model="filter.code">
            </div>
            <div>
                <label>Name</label><input type="text" wire:model="filter.name">
            </div>
            <div>
                <label>Limit</label><input type="text" wire:model.defer="limit">
            </div>
            <button wire:click="search">Search</button>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">

{{--                @if(!$addPost)--}}
{{--                    <button wire:click="addPost()" class="btn btn-primary btn-sm float-right">Add New Post</button>--}}
{{--                @endif--}}
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
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
{{--                                    <td>--}}
{{--                                        <button wire:click="editPost({{$post->id}})" class="btn btn-primary btn-sm">Edit</button>--}}
{{--                                        <button onclick="deletePost({{$post->id}})" class="btn btn-danger btn-sm">Delete</button>--}}
{{--                                    </td>--}}
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
