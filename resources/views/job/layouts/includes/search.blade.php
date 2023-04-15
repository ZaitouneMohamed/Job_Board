<div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
    <div class="container">
        <form action="{{route('job.search')}}" method="post">
            @csrf
            @method("GET")
            <div class="row g-2">
                <div class="col-md-10">
                    <div class="row g-2">
                        <div class="col-md-4">
                            <input type="text" class="form-control border-0" name="keyword" placeholder="Keyword" />
                        </div>
                        <div class="col-md-4">
                            <select class="form-select border-0" name="categorie">
                                @foreach (\App\Models\Categorie::all() as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select border-0" name="location">
                                @foreach (\App\Models\Company::select("city")->groupBy('city')->get() as $item)
                                    <option value="{{$item->city}}">{{$item->city}}</option> 
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-dark border-0 w-100" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>