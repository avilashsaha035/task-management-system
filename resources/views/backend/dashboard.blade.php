@extends('backend.layouts.app')

@push('title')
    Dashboard
@endpush

@section('page_title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalTasks }}</h3>
                    <p>Total Tasks</p>
                </div>
                <div class="icon"><i class="ion ion-bag"></i></div>
                <a href="{{ route('admin.tasks.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $pendingTasks }}</h3>
                    <p>Pending Tasks</p>
                </div>
                <div class="icon"><i class="ion ion-stats-bars"></i></div>
                <a href="{{ route('admin.tasks.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $completedTasks }}</h3>
                    <p>Completed Tasks</p>
                </div>
                <div class="icon"><i class="ion ion-person-add"></i></div>
                <a href="{{ route('admin.tasks.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $highPriority }}</h3>
                    <p>High Priority Tasks</p>
                </div>
                <div class="icon"><i class="ion ion-pie-graph"></i></div>
                <a href="{{ route('admin.tasks.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
@endsection
