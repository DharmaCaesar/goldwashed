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
        data: { id: id, status: status },
        success: function (response) {
            // notify(response.success)
            if(status == 'CUTI' || status == 'SAKIT'){
                row.getElementsByTagName('td')[5].innerHTML = '00:00:00'
                row.getElementsByTagName('td')[3].innerHTML = '00:00:00'
            } else {
                row.getElementsByTagName('td')[5].innerHTML = '<button class="btn btn-outline" onclick="selesaiBtn(this)">selesai</button>'
            }
        }
    })
}

const selesaiBtn = (entity) => {
    const row = entity.parentElement.parentElement
    const id = row.getElementsByTagName('td')[0].innerText

    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/selesaiBtn',
        data: { id: id },
        success: function (response) {
            // notify(response.success)
            row.getElementsByTagName('td')[5].innerHTML = response.waktu_akhir_kerja
        }
    })
}

const updateRow = (entity) => {
    const row = entity.parentElement.parentElement
    const id = row.getElementsByTagName('td')[0].innerText

    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/editabsen',
        data: { id: id },
        success: function (response) {
            document.getElementById('Idinput').value = response.id
            document.getElementById('NakarInput').value = response.nama_karyawan
            document.getElementById('SInput').value = response.status
            document.getElementById('TInput').value = response.tanggal_masuk
            document.getElementById('WInput').value = response.waktu_masuk_kerja
            document.getElementById('WasekeInput').value = response.waktu_akhir_kerja

            openModal('edit_absen')
        }
    })
}

const deleteRow = (entity) => {
    const row = entity.parentElement.parentElement
    const id = row.getElementsByTagName('td')[0].innerText

    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/deleteabsen',
        data: { id: id },
        success: function (response) {
            document.getElementById('deleteIdInput').value = response.id

            openModal('deleteModal')
        }
    })
}