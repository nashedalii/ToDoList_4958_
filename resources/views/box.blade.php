@extends('layouts.app2')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Box</h1>
        <button class="btn btn-primary" id="addTaskButton">Add Task</button>
    </div>
    <div class="text-center">
        <img src="img/emptybox.png" alt="Your Image" class="img-fluid mb-3 mx-auto">
        <p>Your to-do list is empty. <br> It's time to dream big and make it happen.</p>
    </div>

    <!-- Pop-up form untuk menambahkan task -->
    <div class="modal" tabindex="-1" role="dialog" id="addTaskModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addTaskForm">
                        <div class="form-group">
                            <label for="taskName">Task Name</label>
                            <input type="text" class="form-control" id="taskName" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="dueDate">Due Date</label>
                            <input type="text" class="form-control" id="dueDate" required>
                        </div>
                        <div class="form-group">
                            <label for="priority">Priority</label>
                            <select class="form-control" id="priority" required>
                                <option>Low</option>
                                <option>Medium</option>
                                <option>High</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Initialize datepicker
        $('#dueDate').datepicker();

        // Show the modal when the add task button is clicked
        $('#addTaskButton').on('click', function() {
            $('#addTaskModal').modal('show');
        });

        // Handle the form submission
        $('#addTaskForm').on('submit', function(event) {
            event.preventDefault();
            // Here you can add the code to handle the form submission,
            // such as sending an AJAX request to store the task.
            $('#addTaskModal').modal('hide');
        });
    });
</script>
@endpush
