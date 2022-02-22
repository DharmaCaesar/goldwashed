document.addEventListener('DOMContentLoaded', function(){
    const buffer = document.getElementById('inbuff')
    let total = 0
    let totalqty = 0

    for(i = 0; i < buffer.children.length; i++){
        total += parseInt(Number(buffer.querySelectorAll('tr')[i].querySelectorAll('td')[2].innerText)) * parseInt(Number(buffer.querySelectorAll('tr')[i].querySelectorAll('td')[3].innerText))
        totalqty += parseInt(Number(buffer.querySelectorAll('tr')[i].querySelectorAll('td')[3].innerText))
    }

    document.getElementById('total').innerText = total
    document.getElementById('totalqty').innerText = totalqty
})