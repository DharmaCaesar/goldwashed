document.addEventListener('DOMContentLoaded', function(e){

    document.getElemenById('barventaris-view-btn').addEventListener('click', function(e){
        e.preventDefault()

        if(document.getElementById('barventaris-view').classList.contains('hidden')){
            document.getElmentById('barventaris-view').classList.remove('hidden')
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
            document.getElementById('barventaris-view').classList.remove('hidden')
            document.getElementById('barventaris-btn').classList.add('btn-active')
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
            document.getElementById(nama_barang).value = response.response.nama_barang
            document.getElementById(merk_barang).value = response.response.merk_barang
            document.getElementById(qty).value = response.response.qty
            document.getElementById(kondisi).value = response.response.kondisi
            document.getElementById(tanggal_pengadaan).value = response.response.tanggal_pengadaan
        }
    })
}

function deleteItem(id_element, modal){
    let id = document.getElementById(id_element).value

    document.getElementById(modal).classList.remove('modal-open')
    document.getElementById('deleteInventoryModal').classList.add('modal-open')

    document.getElementById('inventory_delete').value = id
}