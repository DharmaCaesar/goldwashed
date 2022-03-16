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

 $('#membertable').DataTable()

 function takepenjemputan(entity, index){
     let table = entity.parentElement.parentElement
     let id = table.querySelectorAll('th')[index].innerText
     
     $.ajax({
         type: 'POST',
         url: '/takepenjemputan',
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         data: {id:id},
         success: function(response){
             document.getElementById('membersInput').value=response.response.id
             document.getElementById('namesInput').value=response.response.member_name
             document.getElementById('alamatInput').value=response.response.member_address
             document.getElementById('nomorInput').value=response.response.member_phone
            //  document.getElementById('genderInput').value=response.response.member_gender
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
            // document.getElementById("log-btn").classList.remove("btn-active")
            document.getElementById("penjemputan-view").classList.remove("hidden")
            document.getElementById("penjemputan-create").classList.add("hidden")
            // document.getElementById("penjemputan-log").classList.add("hidden")
        }
    })

    document.getElementById("create-btn").addEventListener("click", function(e){
        e.preventDefault()
        if(document.getElementById("penjemputan-create").classList.contains("hidden")){
            document.getElementById("create-btn").classList.add("btn-active")
            document.getElementById("view-btn").classList.remove("btn-active")
            // document.getElementById("log-btn").classList.remove("btn-active")
            document.getElementById("penjemputan-view").classList.add("hidden")
            document.getElementById("penjemputan-create").classList.remove("hidden")
            // document.getElementById("penjemputan-log").classList.add("hidden")
        }
    })
})

function editpenjemputan(entity){
    let tableedit = entity.parentElement.parentElement
    let id = tableedit.querySelectorAll('th')[0].innerText
    $.ajax({
        type: 'POST', 
        url: '/catch-penjemputan',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {id:id},
        success: function(response){
            console.log(response)
            document.getElementById('edit_penjemputan').classList.add('modal-open')

            document.getElementById('Idinput').value = response.response.id
            // document.getElementById('genderInput').value = response.response.member_gender
            document.getElementById('namesInput').value = response.response.member_name
            document.getElementById('alamatInput').value = response.response.member_address
            document.getElementById('nomorInput').value = response.response.member_phone
            document.getElementById('namasInput').value = response.response.member_name            
            document.getElementById('delId').value = response.response.id
        }
    })
}