@extends('backend.layouts.app')

@push('title')
    Create Task
@endpush

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3><i class="fas fa-plus-square"></i> Create Task</h3>
        </div>

        <form action="{{ route('admin.tasks.store') }}" method="POST">
            @csrf

            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-12 mb-3">
                        <label>Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" required>
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-12 mb-3">
                        <label>Description</label>
                        <textarea name="description"  id="description" class=""></textarea>
                    </div>

                    <div class="form-group col-md-4 mb-3">
                        <label>Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control" required>
                            <option value="pending">Pending</option>
                            <option value="in_progress">In Progress</option>
                            <option value="completed">Completed</option>
                        </select>
                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-md-4 mb-3">
                        <label>Priority <span class="text-danger">*</span></label>
                        <select name="priority" class="form-control" required>
                            <option value="low">--Select--</option>
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
                        @error('priority')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-md-4 mb-3">
                        <label>Due Date</label>
                        <input type="date" name="due_date" class="form-control">
                        @error('due_date')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <a href="{{ route('admin.tasks.index') }}" class="btn btn-dark float-start">
                    <i class="fas fa-backward"></i> Back
                </a>
                <button type="submit" class="btn btn-success float-end">
                    <i class="fas fa-plus-square"></i> Create
                </button>
            </div>
        </form>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            // summernote
            $('#description').summernote({
                height: 200,
                placeholder: 'Write description here...',
            });
        });
    </script>
@endpush
