<table class="table table-schedule">
    <thead>
        <tr>
            <th>Event</th>
            <th>Start</th>
            <th>End</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($events as $event)
        <tr>
            <td>{{ $event->event }}</td>
            <td>{{ \Carbon\Carbon::parse($event->start)->format('Y-m-d H:i') }}</td>
            <td>{{ \Carbon\Carbon::parse($event->end)->format('Y-m-d H:i') }}</td>
            <td>
                <button class="btn btn-sm btn-warning edit-btn"
                        data-id="{{ $event->id }}"
                        data-toggle="modal"
                        data-target="#editModal">
                    <i class="ni ni-ruler-pencil"></i>
                </button>
                <form action="{{ route('event.delete') }}" method="POST" class="d-inline">
                    @csrf
                    <input type="hidden" name="id" value="{{ $event->id }}">
                    <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">
                        <i class="ni ni-fat-remove"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" method="POST" action="{{ route('event.update') }}">
            @csrf
            <input type="hidden" name="id" id="edit_event_id">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="edit_event">Event</label>
                    <input type="text" class="form-control" id="edit_event" name="event" required>
                </div>
                <div class="form-group">
                    <label for="edit_start">Start</label>
                    <input type="datetime-local" class="form-control" id="edit_start" name="start" required>
                </div>
                <div class="form-group">
                    <label for="edit_end">End</label>
                    <input type="datetime-local" class="form-control" id="edit_end" name="end" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
