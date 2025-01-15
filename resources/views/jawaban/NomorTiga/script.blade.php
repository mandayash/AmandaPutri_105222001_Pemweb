<script type="text/javascript">
    $(document).ready(function() {
        // Inisialisasi DataTable dengan konfigurasi bahasa
        $('.table-schedule').DataTable({
            language: {
                paginate: {
                    next: '<i class="bi bi-arrow-right"></i>',
                    previous: '<i class="bi bi-arrow-left"></i>'
                },
                emptyTable: "Data tidak ditemukan",
            },
        });

        // Menangani klik tombol edit
        $('.edit-btn').click(function() {
            var id = $(this).data('id');

            // Mengambil data jadwal yang akan diedit menggunakan AJAX
            $.get("{{ route('event.get-selected-data') }}", {id: id}, function(data) {
                // Mengisi form edit dengan data yang diambil dari server
                $('#edit_event_id').val(data.id);
                $('#edit_event').val(data.event);

                // Memformat tanggal dan waktu agar sesuai dengan input datetime-local
                // slice(0, 16) digunakan untuk mengambil format YYYY-MM-DDTHH:mm
                $('#edit_start').val(data.start.slice(0, 16));
                $('#edit_end').val(data.end.slice(0, 16));
            });
        });
    });
    </script>
