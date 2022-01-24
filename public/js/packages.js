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