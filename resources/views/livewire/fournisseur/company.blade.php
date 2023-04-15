<div class="container-fluid" x-data="{ open:false }" wire:poll.750ms>
    <!-- DataTales Example -->
    <div class="card shadow mb-4" >
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            <div class="d-flex justify-content-center">
                <button class="btn btn-primary" style="margin-right: 5px" @click="open = false">show table</button>
                <button class="btn btn-primary" @click="open = true">show form</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive" x-show="!open">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>city</th>
                            <th>adresse</th>
                            <th>email</th>
                            <th>detail</th>
                            <th>contact info</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($this->Categories as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->city}}</td>
                                <td>{{$item->adresse}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{Str::limit($item->detail, 20, '...') }}</td>
                                <td>{{$item->contact_info}}</td>
                                <td>61</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="container">
                    {{$this->Categories->links()}}
                </div>
            </div>
            <div x-show="open" x-transition>
                <h1 class="text text-center">Add company</h1>
                <form wire:submit.prevent="add">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">name :</label>
                        <input type="text" class="form-control" wire:model="name">
                        @error('name') <span class="test text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">city :</label>
                        <input type="text" class="form-control" wire:model="city">
                        @error('city') <span class="test text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">email :</label>
                        <input type="text" class="form-control" wire:model="email">
                        @error('email') <span class="test text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">detail :</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" wire:model="detail" rows="3"></textarea>
                        @error('detail') <span class="test text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">adresse :</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" wire:model="adresse" rows="3"></textarea>
                        @error('adresse') <span class="test text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">contact info :</label>
                        <input type="text" class="form-control" wire:model="contact">
                        @error('contact') <span class="test text-danger">{{ $message }}</span> @enderror
                    </div>
                    {{-- @if ($editing)
                        <a type="button" wire:click="update()" class="btn btn-warning">update</a>
                        <a class="btn btn-danger" type="button" wire:click="cancel()">cancel</a>
                    @else--}}
                        <button type="submit" class="btn btn-primary">submit</button>
                    {{-- @endif  --}}
                </form>
            </div>
        </div>
    </div>

</div>
