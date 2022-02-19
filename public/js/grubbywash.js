$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
    }
});

function get_index(dict, indexfilter, filter){
    if(dict.length <= 0){
        return false
    } 

    for(i = 0; i < dict.length; i++){
        if(dict[i][indexfilter] == filter){
            return i
        }
    }
}

function sift_table(table, filter){
    let tr = document.getElementById(table).querySelectorAll('tr')

    for(i = 0; i < tr.length; i++){
        if(tr[i].querySelectorAll('th')[0].innerHTML == filter){
            tr[i].querySelectorAll('th')[1].querySelector('button').classList.remove('pointer-events-none')
            tr[i].querySelectorAll('th')[1].querySelector('button').classList.remove('opacity-50')
        }
    }
}