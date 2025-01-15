<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" method="POST" action="{{ route('event.submit') }}">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="form-group">
                    <label for="event">Event</label>
                    <input type="text" class="form-control" id="event" name="event"
                        placeholder="Masukkan nama kegiatan/agenda Anda" required>
                </div>

                <div class="form-group">
                    <label for="start">Start</label>
                    <input type="datetime-local" class="form-control" id="start" name="start" required>
                </div>

                <div class="form-group">
                    <label for="end">End</label>
                    <input type="datetime-local" class="form-control" id="end" name="end" required>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
