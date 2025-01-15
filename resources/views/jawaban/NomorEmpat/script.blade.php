<script type="text/javascript">

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    calendarEl.style.minHeight = '500px';
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        height: 'auto',

        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        
        events: "{{ route('event.get-json') }}", // Mengambil data dari endpoint kita
        eventTimeFormat: {
            hour: '2-digit',
            minute: '2-digit',
            hour12: false
        },
        // Kustomisasi tampilan event
        eventDidMount: function(info) {
            // Menambahkan tooltip saat hover
            $(info.el).tooltip({
                title: info.event.title + '\n' +
                       'Mulai: ' + moment(info.event.start).format('DD/MM/YYYY HH:mm') + '\n' +
                       'Selesai: ' + moment(info.event.end).format('DD/MM/YYYY HH:mm'),
                placement: 'top',
                trigger: 'hover',
                container: 'body'
            });
        }
    });

    calendar.render();

    // Memperbarui kalender ketika ada perubahan data
    // (setelah menambah, mengedit, atau menghapus event)
    function refreshCalendar() {
        calendar.refetchEvents();
    }

    // Pasang listener untuk modal tambah/edit
    $('#addModal, #editModal').on('hidden.bs.modal', function () {
        refreshCalendar();
    });
});

</script>
