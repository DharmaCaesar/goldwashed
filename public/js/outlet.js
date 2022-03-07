document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("view-btn").addEventListener("click", function(e){
        e.preventDefault()
        if(document.getElementById("outlet-view").classList.contains("hidden")){
            document.getElementById("view-btn").classList.add("btn-active")
            // document.getElementById("create-btn").classList.remove("btn-active")
            document.getElementById("log-btn").classList.remove("btn-active")
            document.getElementById("outlet-view").classList.remove("hidden")
            // document.getElementById("outlet-create").classList.add("hidden")
            document.getElementById("outlet-log").classList.add("hidden")
        }
    })

    // document.getElementById("create-btn").addEventListener("click", function(e){
    //     e.preventDefault()
        // if(document.getElementById("outlet-create").classList.contains("hidden")){
            // document.getElementById("create-btn").classList.add("btn-active")
    //         document.getElementById("view-btn").classList.remove("btn-active")
    //         document.getElementById("log-btn").classList.remove("btn-active")
    //         document.getElementById("outlet-view").classList.add("hidden")
            // document.getElementById("outlet-create").classList.remove("hidden")
    //         document.getElementById("outlet-log").classList.add("hidden")
    //     }
    // })

    document.getElementById("log-btn").addEventListener("click", function(e){
        e.preventDefault()
        if(document.getElementById("outlet-log").classList.contains("hidden")){
            document.getElementById("log-btn").classList.add("btn-active")
            document.getElementById("view-btn").classList.remove("btn-active")
            // document.getElementById("create-btn").classList.remove("btn-active")
            document.getElementById("outlet-view").classList.add("hidden")
            // document.getElementById("outlet-create").classList.add("hidden")
            document.getElementById("outlet-log").classList.remove("hidden")
        }
    })
})

function editoutlet(entity){
    let id = document.getElementById('table_outlet_id').innerText
    $.ajax({
        type: 'POST', 
        url: '/catch-outlet',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {id:id},
        success: function(response){
            console.log(response)
            document.getElementById('edit_outlet').classList.add('modal-open')

            document.getElementById('statusInput').value = response.response.status
            document.getElementById('nameInput').value = response.response.outlet_name
            document.getElementById('addressInput').value = response.response.outlet_address
            document.getElementById('numberInput').value = response.response.outlet_phone
        }
    })
}