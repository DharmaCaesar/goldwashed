$('#penjemputanTable').DataTable({
    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'pdf',
            exportOptions: {
                columns: ':visible:not(:last-child)'
            }
        }
    ]
})

document.addEventListener('DOMContentLoaded', () => {
    $('#absenTable').DataTable({
        info: false
    })

    document.getElementById('addDataBtn').addEventListener('click', function () {
        openModal('addModal')
    })
})

const openModal = (modal) => {
    document.getElementById(modal).classList.add('modal-open')
}

const closeModal = (modal) => {
    document.getElementById(modal).classList.remove('modal-open')
}

const updateStatus = (entity) => {
    const row = entity.parentElement.parentElement
    const id = row.getElementsByTagName('td')[0].innerText
    const status = entity.value

    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/update-status',
        data: { id: id, item_status: status },
        success: function (response) {
            notify(response.success)
        }
    })
}

const updateRow = (entity) => {
    const row = entity.parentElement.parentElement
    const id = row.getElementsByTagName('td')[0].getElementsByTagName('span')[1].innerText

    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/editabsen',
        data: { id: id },
        success: function (response) {
            document.getElementById('Idinput').value = response.id
            document.getElementById('nakarInput').value = response.nama_karyawan
            document.getElementById('statusInput').value = response.tanggal_masuk
            document.getElementById('tamaInput').value = response.waktu_masuk_kerja
            document.getElementById('wamaInput').value = response.status
            document.getElementById('wasekeInput').value = response.waktu_akhir_kerja

            openModal('edit_absen')
        }
    })
}