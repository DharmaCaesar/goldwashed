$('#icu').DataTable()

function viewInvoice(entity){
    let table = entity.parentElement.parentElement
    let id = table.querySelector('th').innerText

    $.ajax({
        type: 'POST',
        url: '/invoice',
        data: {id:id},
        success: function(response){
            let totalqty = 0
            let total = 0

            document.getElementById('takeInvoice').classList.add('modal-open')

            document.getElementById('code').innerText = response.response[1].invoice_code
            document.getElementById('date').innerText = response.response[1].transaction_date
            document.getElementById('disc').innerText = response.response[1].transaction_discount
            document.getElementById('name').innerText = response.response[2].member_name
            document.getElementById('gender').innerText = response.response[2].member_gender
            document.getElementById('number').innerText = response.response[2].member_phone
            document.getElementById('sento').innerText = response.response[2].member_address
            document.getElementById('outletName').innerText = response.response[4].outlet_name
            document.getElementById('outletPhone').innerText = response.response[4].outlet_phone
            document.getElementById('senrom').innerText = response.response[4].outlet_address

            for(i = 0; i < response.lists.length; i++){
                let buffer = document.getElementById('inbuff')
                let tr = document.createElement('tr')
                let id_element = document.createElement('th')
                let package_name = document.createElement('td')
                let package_type = document.createElement('td')
                let package_price = document.createElement('td')
                let package_qty = document.createElement('td')

                buffer.appendChild(tr)
                tr.appendChild(id_element)
                tr.appendChild(package_name)
                tr.appendChild(package_type)
                tr.appendChild(package_price)
                tr.appendChild(package_qty)

                id_element.innerText = response.lists[i]['id']
                package_name.innerText = response.lists[i]['packages']['package_name']
                package_type.innerText = response.lists[i]['packages']['package_type']
                package_price.innerText ='$' + response.lists[i]['packages']['package_price']
                package_qty.innerText = response.lists[i]['quantity']

                total += parseInt(Number(response.lists[i]['packages']['package_price'])) * parseInt(Number(response.lists[i]['quantity']))
                totalqty += parseInt(Number(response.lists[i]['quantity']))
            }

            document.getElementById('fe').innerText = response.response[1].transaction_paid_extra
            document.getElementById('total').innerText = total
            document.getElementById('totalqty').innerText = totalqty
            document.getElementById('sumtal').innerHTML = response.response[1].transaction_paid
            
            totalqty = 0
        }
    })
}

function exit(){
    let tbody = document.createElement('tbody')

    document.getElementById('takeInvoice').classList.remove('modal-open')
    document.getElementById('inbuff').remove()
    document.getElementById('inpaktab').appendChild(tbody)

    tbody.id = 'inbuff'
}