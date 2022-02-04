document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("view-btn").addEventListener("click", function(e){
        e.preventDefault()
        if(document.getElementById("membership-view").classList.contains("hidden")){
            document.getElementById("view-btn").classList.add("btn-active")
            document.getElementById("create-btn").classList.remove("btn-active")
            document.getElementById("log-btn").classList.remove("btn-active")
            document.getElementById("membership-view").classList.remove("hidden")
            document.getElementById("membership-create").classList.add("hidden")
            document.getElementById("membership-log").classList.add("hidden")
        }
    })

    document.getElementById("create-btn").addEventListener("click", function(e){
        e.preventDefault()
        if(document.getElementById("membership-create").classList.contains("hidden")){
            document.getElementById("create-btn").classList.add("btn-active")
            document.getElementById("view-btn").classList.remove("btn-active")
            document.getElementById("log-btn").classList.remove("btn-active")
            document.getElementById("membership-view").classList.add("hidden")
            document.getElementById("membership-create").classList.remove("hidden")
            document.getElementById("membership-log").classList.add("hidden")
        }
    })

    document.getElementById("log-btn").addEventListener("click", function(e){
        e.preventDefault()
        if(document.getElementById("membership-log").classList.contains("hidden")){
            document.getElementById("log-btn").classList.add("btn-active")
            document.getElementById("view-btn").classList.remove("btn-active")
            document.getElementById("create-btn").classList.remove("btn-active")
            document.getElementById("membership-view").classList.add("hidden")
            document.getElementById("membership-create").classList.add("hidden")
            document.getElementById("membership-log").classList.remove("hidden")
        }
    })
})

function editmember(entity){
    let tableedit = entity.parentElement.parentElement
    let id = tableedit.querySelectorAll('th')[0].innerText
    $.ajax({
        type: 'POST', 
        url: '/catch-member',
        data: {id:id},
        success: function(response){
            console.log(response)
            document.getElementById('edit_member').classList.add('modal-open')

            document.getElementById('idInput').value = response.response.id
            document.getElementById('genderInput').value = response.response.member_gender
            document.getElementById('nameInput').value = response.response.member_name
            document.getElementById('addressInput').value = response.response.member_address
            document.getElementById('numberInput').value = response.response.member_phone
            document.getElementById('namaInput').value = response.response.member_name            
            document.getElementById('deleteId').value = response.response.id
        }
    })
}