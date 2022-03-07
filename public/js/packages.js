$('#packagesTable').DataTable({
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

document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("view-btn").addEventListener("click", function(e){
        e.preventDefault()
        if(document.getElementById("packages-view").classList.contains("hidden")){
            document.getElementById("view-btn").classList.add("btn-active")
            document.getElementById("create-btn").classList.remove("btn-active")
            document.getElementById("log-btn").classList.remove("btn-active")
            document.getElementById("packages-view").classList.remove("hidden")
            document.getElementById("packages-create").classList.add("hidden")
            document.getElementById("packages-log").classList.add("hidden")
        }
    })

    document.getElementById("create-btn").addEventListener("click", function(e){
        e.preventDefault()
        if(document.getElementById("packages-create").classList.contains("hidden")){
            document.getElementById("create-btn").classList.add("btn-active")
            document.getElementById("view-btn").classList.remove("btn-active")
            document.getElementById("log-btn").classList.remove("btn-active")
            document.getElementById("packages-view").classList.add("hidden")
            document.getElementById("packages-create").classList.remove("hidden")
            document.getElementById("packages-log").classList.add("hidden")
        }
    })

    document.getElementById("log-btn").addEventListener("click", function(e){
        e.preventDefault()
        if(document.getElementById("packages-log").classList.contains("hidden")){
            document.getElementById("log-btn").classList.add("btn-active")
            document.getElementById("view-btn").classList.remove("btn-active")
            document.getElementById("create-btn").classList.remove("btn-active")
            document.getElementById("packages-view").classList.add("hidden")
            document.getElementById("packages-create").classList.add("hidden")
            document.getElementById("packages-log").classList.remove("hidden")
        }
    })
})

function editpackage(entity){
    let tableedit = entity.parentElement.parentElement
    let id = tableedit.querySelectorAll('th')[0].innerText
    $.ajax({
        type: 'POST', 
        url: '/catch-package',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {id:id},
        success: function(response){
            console.log(response)
            document.getElementById('edit_package').classList.add('modal-open')

            document.getElementById('idInput').value = response.response.id
            document.getElementById('nameInput').value = response.response.package_name
            document.getElementById('typeInput').value = response.response.package_type
            document.getElementById('priceInput').value = response.response.package_price
            document.getElementById('deleteId').value = response.response.id
        }
    })
}