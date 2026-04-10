@extends('backend.layouts.app')

@push('title')
    Edit Task
@endpush

@section('content')
    <div class="card card-warning">
        <div class="card-header">
            <h3><i class="fas fa-edit"></i> Edit Task</h3>
        </div>

        <form action="{{ route('admin.tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-12 mb-3">
                        <label>Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $task->title) }}" required>
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-12 mb-3">
                        <label>Description</label>
                        <textarea name="description" id="description">{{ old('description', $task->description) }}</textarea>
                    </div>

                    <div class="form-group col-md-4 mb-3">
                        <label>Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control" required>
                            <option value="pending" {{ old('status', $task->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="in_progress" {{ old('status', $task->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="completed" {{ old('status', $task->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-md-4 mb-3">
                        <label>Priority <span class="text-danger">*</span></label>
                        <select name="priority" class="form-control" required>
                            <option value="low" {{ old('priority', $task->priority) == 'low' ? 'selected' : '' }}>Low</option>
                            <option value="medium" {{ old('priority', $task->priority) == 'medium' ? 'selected' : '' }}>Medium</option>
                            <option value="high" {{ old('priority', $task->priority) == 'high' ? 'selected' : '' }}>High</option>
                        </select>
                        @error('priority')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-md-4 mb-3">
                        <label>Due Date</label>
                        <input type="date" name="due_date" class="form-control" value="{{ old('due_date', $task->due_date ? $task->due_date->format('Y-m-d') : '') }}">
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
                <button type="submit" class="btn btn-primary float-end">
                    <i class="fas fa-save"></i> Update
                </button>
            </div>
        </form>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#description').summernote({
                height: 200,
            });
        });
    </script>
@endpush
