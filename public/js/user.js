document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("view-btn").addEventListener("click", function(e){
        e.preventDefault()
        if(document.getElementById("user-view").classList.contains("hidden")){
            document.getElementById("view-btn").classList.add("btn-active")
            document.getElementById("create-btn").classList.remove("btn-active")
            document.getElementById("log-btn").classList.remove("btn-active")
            document.getElementById("user-view").classList.remove("hidden")
            document.getElementById("user-create").classList.add("hidden")
            document.getElementById("user-log").classList.add("hidden")
        }
    })

    document.getElementById("create-btn").addEventListener("click", function(e){
        e.preventDefault()
        if(document.getElementById("user-create").classList.contains("hidden")){
            document.getElementById("create-btn").classList.add("btn-active")
            document.getElementById("view-btn").classList.remove("btn-active")
            document.getElementById("log-btn").classList.remove("btn-active")
            document.getElementById("user-view").classList.add("hidden")
            document.getElementById("user-create").classList.remove("hidden")
            document.getElementById("user-log").classList.add("hidden")
        }
    })

    document.getElementById("log-btn").addEventListener("click", function(e){
        e.preventDefault()
        if(document.getElementById("user-log").classList.contains("hidden")){
            document.getElementById("log-btn").classList.add("btn-active")
            document.getElementById("view-btn").classList.remove("btn-active")
            document.getElementById("create-btn").classList.remove("btn-active")
            document.getElementById("user-view").classList.add("hidden")
            document.getElementById("user-create").classList.add("hidden")
            document.getElementById("user-log").classList.remove("hidden")
        }
    })
})