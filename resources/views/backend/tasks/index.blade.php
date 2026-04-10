@extends('backend.layouts.app')

@push('title')
    Tasks
@endpush

@push('css')
    <style>
        .task-desc.justify-text {
            text-align: justify;
            white-space: normal;
        }
        .cursor-pointer {
            cursor: pointer;
        }
    </style>
@endpush

@section('content')
<div class="card card-info">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0"><i class="fas fa-cogs"></i> Manage Tasks</h3>
            </div>
            <div class="col-auto">
                <a href="{{ route('admin.tasks.create') }}" class="btn btn-dark">
                    <i class="fas fa-plus-square"></i> Create
                </a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <table id="tasksTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Priority</th>
                    <th class="text-center">Due Date</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $key => $task)
                    <tr>
                        <td class="text-center">{{ $key+1 }}</td>
                        <td class="text-center">{{ $task->title }}</td>
                        <td class="text-center">
                            @php
                                $shortDesc = Str::limit($task->description, 50);
                            @endphp

                            <span class="task-desc d-inline-block text-truncate" data-full="{{ $task->description }}">{{ $shortDesc }}</span>

                            @if(strlen($task->description) > 50)
                                <a href="javascript:void(0);" class="show-toggle text-primary ms-2">Show More</a>
                            @endif
                        </td>
                        <td class="text-center">
                            <select class="form-control form-control-sm task-status text-center cursor-pointer
                                @if($task->status == 'pending') bg-secondary text-white
                                @elseif($task->status == 'in_progress') bg-info text-white
                                @else bg-success text-white @endif"
                                data-id="{{ $task->id }}">
                                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </td>

                        <td class="text-center">
                            <select class="form-control form-control-sm task-priority text-center cursor-pointer
                                @if($task->priority == 'low') bg-success text-white
                                @elseif($task->priority == 'medium') bg-warning text-dark
                                @else bg-danger text-white @endif"
                                data-id="{{ $task->id }}">
                                <option value="low" {{ $task->priority == 'low' ? 'selected' : '' }}>Low</option>
                                <option value="medium" {{ $task->priority == 'medium' ? 'selected' : '' }}>Medium</option>
                                <option value="high" {{ $task->priority == 'high' ? 'selected' : '' }}>High</option>
                            </select>
                        </td>
                        <td class="text-center">
                            {{ $task->due_date ? $task->due_date->format('F d, Y') : '-' }}
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.tasks.edit', $task->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                <i class="fas fa-pen"></i>
                            </a>
                            <form action="{{ route('admin.tasks.destroy', $task->id) }}" method="POST" style="display:inline;" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('#tasksTable').DataTable({
                pageLength: 10,
                ordering: true,
                responsive: true,
                language: {
                    emptyTable: "No tasks found",
                    zeroRecords: "No matching tasks found"
                },
                columnDefs: [
                    { orderable: false, targets: [6] }
                ]
            });

            // Delete confirmation
            $(document).on('submit', '.delete-form', function (e) {
                e.preventDefault();
                let form = this;

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to delete this task?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, delete it',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

            // Update status via AJAX
            $(document).on('change', '.task-status', function () {
                let select = $(this);
                let taskId = select.data('id');
                let status = select.val();

                let url = "{{ route('admin.tasks.update.status', ':id') }}".replace(':id', taskId);

                $.ajax({
                    url: url,
                    type: 'PUT',
                    data: {
                        _token: "{{ csrf_token() }}",
                        status: status
                    },
                    success: function () {
                        // Reset classes
                        select.removeClass('bg-secondary bg-info bg-success text-white');
                        if (status === 'pending') {
                            select.addClass('bg-secondary text-white');
                        } else if (status === 'in_progress') {
                            select.addClass('bg-info text-white');
                        } else {
                            select.addClass('bg-success text-white');
                        }

                        Swal.fire({
                            icon: 'success',
                            title: 'Updated!',
                            text: 'Task status updated successfully',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }
                });
            });

            // Update priority via AJAX
            $(document).on('change', '.task-priority', function () {
                let select = $(this);
                let taskId = select.data('id');
                let priority = select.val();

                let url = "{{ route('admin.tasks.update.priority', ':id') }}".replace(':id', taskId);

                $.ajax({
                    url: url,
                    type: 'PUT',
                    data: {
                        _token: "{{ csrf_token() }}",
                        priority: priority
                    },
                    success: function () {
                        // Reset classes
                        select.removeClass('bg-success bg-warning bg-danger text-white text-dark');
                        if (priority === 'low') {
                            select.addClass('bg-success text-white');
                        } else if (priority === 'medium') {
                            select.addClass('bg-warning text-dark');
                        } else {
                            select.addClass('bg-danger text-white');
                        }

                        Swal.fire({
                            icon: 'success',
                            title: 'Updated!',
                            text: 'Task priority updated successfully',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }
                });
            });

            // Show More / Show Less toggle
            $(document).on('click', '.show-toggle', function () {
                let link = $(this);
                let span = link.prev('.task-desc');
                let fullText = span.data('full');
                let shortText = fullText.length > 50 ? fullText.substring(0, 50) + '...' : fullText;

                if (link.text() === 'Show More') {
                    span.text(fullText).addClass('justify-text');
                    link.text('Show Less');
                } else {
                    span.text(shortText).removeClass('justify-text');
                    link.text('Show More');
                }
            });
        });
    </script>
@endpush

