@extends('job.layouts.master')

@section('content')
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gy-5 gx-4">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center mb-5">
                        <img class="flex-shrink-0 img-fluid border rounded" src="{{ asset('landing/img/com-logo-2.jpg') }}"
                            alt="" style="width: 80px; height: 80px;">
                        <div class="text-start ps-4">
                            <h3 class="mb-3">{{ $job->title }}</h3>
                            <span class="text-truncate me-3"><i
                                    class="fa fa-map-marker-alt text-primary me-2"></i>{{ $job->company->adresse }}</span>
                            <span class="text-truncate me-3"><i
                                    class="far fa-clock text-primary me-2"></i>{{ $job->nature }}</span>
                            <span class="text-truncate me-0"><i
                                    class="far fa-money-bill-alt text-primary me-2"></i>${{ $job->salary }}</span>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h4 class="mb-3">Description</h4>
                        <p>{{ $job->description }}</p>
                        <h4 class="mb-3">Responsibility</h4>
                        <p>{{ $job->responsibility }}</p>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-angle-right text-primary me-2"></i>Dolor justo tempor duo ipsum accusam</li>
                            <li><i class="fa fa-angle-right text-primary me-2"></i>Elitr stet dolor vero clita labore
                                gubergren</li>
                            <li><i class="fa fa-angle-right text-primary me-2"></i>Rebum vero dolores dolores elitr</li>
                            <li><i class="fa fa-angle-right text-primary me-2"></i>Est voluptua et sanctus at sanctus erat
                            </li>
                            <li><i class="fa fa-angle-right text-primary me-2"></i>Diam diam stet erat no est est</li>
                        </ul>
                        <h4 class="mb-3">Qualifications</h4>
                        <p>{{ $job->qualification }}</p>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-angle-right text-primary me-2"></i>Dolor justo tempor duo ipsum accusam</li>
                            <li><i class="fa fa-angle-right text-primary me-2"></i>Elitr stet dolor vero clita labore
                                gubergren</li>
                            <li><i class="fa fa-angle-right text-primary me-2"></i>Rebum vero dolores dolores elitr</li>
                            <li><i class="fa fa-angle-right text-primary me-2"></i>Est voluptua et sanctus at sanctus erat
                            </li>
                            <li><i class="fa fa-angle-right text-primary me-2"></i>Diam diam stet erat no est est</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="mb-4">Tags</h4>
                        @foreach ($job->tags as $tag)
                            <a href="#">#{{ $tag->name }}</a>
                        @endforeach
                    </div>
                    <br>
                    <div class="">
                        @auth
                            @if (auth()->user()->hasRole('user'))
                                <h4 class="mb-4">Apply For The Job</h4>
                                @auth
                                    @if (!auth()->user()->info)
                                        <div class="row g-3">
                                            <div class="col-12 col-sm-6">
                                                <input type="text" class="form-control" placeholder="Your Name">
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <input type="email" class="form-control" placeholder="Your Email">
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <input type="text" class="form-control" placeholder="Portfolio Website">
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <input type="file" class="form-control bg-white">
                                            </div>
                                            <div class="col-12">
                                                <textarea class="form-control" rows="5" placeholder="Coverletter"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary w-100" type="submit">Apply Now</button>
                                            </div>
                                        </div>
                                    @else
                                        @if (auth()->user()->job->contains($job->id))
                                            <h1>you already postuled on this job</h1>
                                        @else
                                            <a href="{{ route('user.apply_job', ['user_id' => auth()->user()->id, 'job_id' => $job->id]) }}"
                                                class="btn btn-primary w-100">Apply Now</a>
                                        @endif
                                    @endif
                                @endauth
                            @endif
                        @endauth
                        @guest
                            <a href="/login" class="btn btn-primary w-100">please login or sign up</a>
                        @endguest
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Job Summery</h4>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Published {{ $job->created_at }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Vacancy: {{ $job->users()->count() }}
                            Position</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: {{ $job->nature }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: ${{ $job->salary }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Location: {{ $job->company->description }}
                        </p>
                        <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>Duration: {{ $job->duration }}
                            mois</p>
                    </div>
                    <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Company Detail</h4>
                        <p class="m-0">
                            {{ $job->company->contact_info }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
