document.addEventListener('DOMContentLoaded', function(e){

    document.getElementById('barventaris-btn').addEventListener('click', function(e){
        e.preventDefault()

        if(document.getElementById('barventaris-view').classList.contains('hidden')){
            document.getElementById('barventaris-view').classList.remove('hidden')
            document.getElementById('barventaris-btn').classList.add('btn-active')
            document.getElementById('barventaris-create').classList.add('hidden')
            document.getElementById('barventaris-create-btn').classList.remove('btn-active')
        }
    })

    document.getElementById('barventaris-create-btn').addEventListener('click', function (e) {
        e.preventDefault()

        if(document.getElementById('barventaris-create').classList.contains('hidden')){
            document.getElementById('barventaris-create').classList.remove('hidden')
            document.getElementById('barventaris-create-btn').classList.add('btn-active')
            document.getElementById('barventaris-view').classList.add('hidden')
            document.getElementById('barventaris-btn').classList.remove('btn-active')
        }
    })
})

function request_info(el, id_input, modal){
    let table = el.parentElement.parentElement
    let id = table.querySelector('th').innerHTML

    document.getElementById(modal).classList.add('modal-open')

    $.ajax({
        type: 'POST',
        url: '/takebarventaris',
        data: {id:id},
        success: function(response){
            console.log(response)

            document.getElementById(id_input).value = response.response.id
            document.getElementById('nameInput').value = response.response.nama_barang
            document.getElementById('brandInput').value = response.response.merk_barang
            document.getElementById('qtyInput').value = response.response.qty
            document.getElementById('conditionInput').value = response.response.kondisi
            document.getElementById('dateInput').value = response.response.tanggal_pengadaan
        }
    })
}

function deleteItem(id_element, modal){
    let id = document.getElementById(id_element).value

    document.getElementById(modal).classList.remove('modal-open')
    document.getElementById('deletebarventarisModal').classList.add('modal-open')

    document.getElementById('barventaris_delete').value = id
}