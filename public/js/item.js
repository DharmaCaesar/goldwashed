document.addEventListener('DOMContentLoaded', () => {
    $('#databTable').DataTable({
        info: false
    })

    document.getElementById('addDataBtn').addEventListener('click', function () {
        openModal('datab-create')
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
    const id = row.getElementsByTagName('td')[0].getElementsByTagName('span')[1].innerText
    const status = entity.value

    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/dashboard/update-status',
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
        url: '/editdatab',
        data: { id: id },
        success: function (response) {
            document.getElementById('idInput').value = response.id
            document.getElementById('dateTimeEditInput').value = new Date(response.paydate).toJSON().slice(0, 19)
            document.getElementById('statusEditInput').value = response.item_status
            document.getElementById('supplierEditInput').value = response.item_supplier
            document.getElementById('nameEditInput').value = response.item_name
            document.getElementById('quantityEditInput').value = response.item_quantity
            document.getElementById('priceEditInput').value = response.item_price

            openModal('edit_datab')
        }
    })
}

const deleteRow = (entity) => {
    const row = entity.parentElement.parentElement
    const id = row.getElementsByTagName('td')[0].getElementsByTagName('span')[1].innerText

    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/deletedatab',
        data: { id: id },
        success: function (response) {
            document.getElementById('deleteIdInput').value = response.id

            openModal('delete_datab')
        }
    })
}