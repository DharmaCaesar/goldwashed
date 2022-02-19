const { type } = require("jquery")

var CHOOSEN = []

$('#membertable').DataTable()

function takemember(entity, index){
    let table = entity.parentElement.parentElement
    let id = table.querySelectorAll('th')[index].innerText
    $.ajax({
        type: 'POST',
        url: '/takemember',
        data: {id:id},
        success: function(response){
            document.getElementById('memberInput').value=response.response.id
            document.getElementById('nameInput').value=response.response.member_name
            document.getElementById('addressInput').value=response.response.member_address
            document.getElementById('numberInput').value=response.response.member_phone
            document.getElementById('genderInput').value=response.response.member_gender
            document.getElementById('find_member').classList.remove('modal-open')
        }
    })
}

function packages_available(id){
    if(CHOOSEN.length > 0){
        for(i = 0; i < CHOOSEN.length; i++){
            if(CHOOSEN[i]['id'] == Number(id)){
                return true
            }
        }
        return false
    } else {
        return false
    }
}

function add_package(entity){
    let table = entity.parentElement.parentElement
    let id = table.querySelectorAll('th')[index].innerText
    entity.classList.add('pointer-events-none')
    entity.classList.add('opacity-50')
    if(!packages_available(id)){
        $.ajax({
            type: 'POST',
            url: '/addpackage',
            data: {id:id},
            success: function(response){
                let buffer = document.getElementById('packagebuffer')
                let form = document.getElementById('packinfo')
                let tr = document.createElement('tr')
                let input_id = document.createElement('input')
                let input_qty = document.createElement('input')
                let id_element = document.createElement('td')
                let package_name = document.createElement('td')
                let package_type = document.createElement('td')
                let prefix_price = document.createElement('td')
                let package_qty = document.createElement('td')
                let action = document.createElement('td')
                let qty_input = document.createElement('input')
                let drop_input = document.createElement('input')
                let package_price = document.createElement('span')

                buffer.appendChild(tr)
                tr.appendChild(id_element)
                tr.appendChild(package_name)
                tr.appendChild(package_type)
                tr.appendChild(prefix_price)
                tr.appendChild(package_qty)
                tr.appendChild(action)
                
                prefix_price.innerText = '$'
                prefix_price.appendChild(package_price)

                id_element.innerText = response.response.id
                package_name.innerText = response.response.package_name
                package_type.innerText = response.response.package_type
                package_price.innerText = response.response.package_price
                package_qty.appendChild(qty_input)
                action.appendChild(drop_input)
                qty_input.type = 'number'
                
            }
        })
    }
}