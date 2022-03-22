var CHOOSEN = []

$('#penjemputanTable').DataTable({
    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'copy',
            exportOptions: {
                columns: ':visible:not(:last-child)'
            }
        },

        {
            extend: 'pdf',
            exportOptions: {
                columns: ':visible:not(:last-child)'
            }
        }
    ]
 })

 $('#memetable').DataTable()

 function takepenjemputan(entity, index){
     let table = entity.parentElement.parentElement
     let id = table.querySelectorAll('th')[index].innerText
     
     $.ajax({
         type: 'POST',
         url: '/catch-penjemputan',
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         data: {id:id},
         success: function(response){
            // CREATE FORM
            document.getElementById('membersInput').value=response.response.id
            document.getElementById('namesInput').value=response.response.member_name
            document.getElementById('alamatInput').value=response.response.member_address
            document.getElementById('nomorInput').value=response.response.member_phone
            
            // EDIT FORM
            document.getElementById('memberInput').value=response.response.id
            document.getElementById('namasInput').value=response.response.member_name
            document.getElementById('addInput').value=response.response.member_address
            document.getElementById('noInput').value=response.response.member_phone
            document.getElementById('fin_member').classList.remove('modal-open')
         }
     })
 }

document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("view-btn").addEventListener("click", function(e){
        e.preventDefault()
        if(document.getElementById("penjemputan-view").classList.contains("hidden")){
            document.getElementById("view-btn").classList.add("btn-active")
            document.getElementById("create-btn").classList.remove("btn-active")
            document.getElementById("log-btn").classList.remove("btn-active")
            document.getElementById("penjemputan-view").classList.remove("hidden")
            document.getElementById("penjemputan-create").classList.add("hidden")
            document.getElementById("penjemputan-log").classList.add("hidden")
        }
    })

    document.getElementById("create-btn").addEventListener("click", function(e){
        e.preventDefault()
        if(document.getElementById("penjemputan-create").classList.contains("hidden")){
            document.getElementById("create-btn").classList.add("btn-active")
            document.getElementById("view-btn").classList.remove("btn-active")
            document.getElementById("log-btn").classList.remove("btn-active")
            document.getElementById("penjemputan-view").classList.add("hidden")
            document.getElementById("penjemputan-create").classList.remove("hidden")
            document.getElementById("penjemputan-log").classList.add("hidden")
        }
    })

    document.getElementById("log-btn").addEventListener("click", function(e){
        e.preventDefault()
        if(document.getElementById("penjemputan-log").classList.contains("hidden")){
            document.getElementById("log-btn").classList.add("btn-active")
            document.getElementById("view-btn").classList.remove("btn-active")
            document.getElementById("create-btn").classList.remove("btn-active")
            document.getElementById("penjemputan-view").classList.add("hidden")
            document.getElementById("penjemputan-create").classList.add("hidden")
            document.getElementById("penjemputan-log").classList.remove("hidden")
        }
    })
})

function editpenjemputan(entity){
    let tableedit = entity.parentElement.parentElement
    let id = tableedit.querySelectorAll('th')[0].innerText
    $.ajax({
        type: 'POST', 
        url: '/takepenjemputan',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {id:id},
        success: function(response){
            console.log(response)
            document.getElementById('edit_penjemputan').classList.add('modal-open')

            document.getElementById('Idinput').value = response.response.id
            document.getElementById('memberInput').value = response.response.member_id
            document.getElementById('addInput').value = response.response.member_address
            document.getElementById('noInput').value = response.response.member_phone
            document.getElementById('namasInput').value = response.response.member_name 
            document.getElementById('namiInput').value = response.response.petugas_penjemputan
            document.getElementById('sInput').value = response.response.status
            document.getElementById('delId').value = response.response.id
        }
    })
}