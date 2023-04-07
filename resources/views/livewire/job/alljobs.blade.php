@extends("job.layouts.master")

@section("content")


<div class="container-xxl py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Job List</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Search</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Job List</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    @foreach ($this->Annonces as $item)
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded" src="landing/img/com-logo-5.jpg" alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">{{$item->title}}</h5>
                                        <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$item->company->adresse}}</span>
                                        <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{$item->nature}}</span>
                                        <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>${{$item->salary}}</span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        @auth
                                            {{-- @if (\App\Models\user_fav_annonce::where('user_id',auth()->user()->id)->where('annonce_id',$item->id)->count() == 1 ) --}}
                                            {{-- <button style="background-color: white;border: none"><i class="far fa-heart text-danger"></i></button> --}}
                                            {{-- @else --}}
                                                <button class="btn btn-light btn-square me-3"><i class="far fa-heart text-primary"></i></button>
                                            {{-- @endif --}}
                                        @endauth
                                        <a class="btn btn-primary" href="{{route('job_detail',$item->id)}}">view job</a>
                                    </div>
                                    <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Datee Line: {{$item->created_at}}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="container">
                    {{$this->annonces->links()}}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
