const key = 5000
const hair = 2500

let default_item = JSON.parse(localStorage.getItem('aksesorisData'))

if (localStorage.getItem('aksesorisData')){ 
updateTable(default_item)
// ftotal()
}

function inputtrans() {
    let table = document.getElementById('aksesorisBody')
    let id = document.getElementById('iInput').value
    let pack = document.getElementById('pakInput').value
    let qty = document.getElementById('QtyInput').value
    let paid = document.getElementById('paidInput').value
    let color = document.getElementById('coInput').value
    let name = document.getElementById('nemInput').value
    
    // console.log()

    let tr = document.createElement('tr')
    let idElement = document.createElement('td')
    let paidElement = document.createElement('td')
    let packElement = document.createElement('td')
    let colorElement = document.createElement('td')
    let priceElement = document.createElement('td')
    let qtyElement = document.createElement('td')
    let nameElement = document.createElement('td')
    let discElement = document.createElement('td')
    let totalElement = document.createElement('td')

        table.appendChild(tr)
        tr.appendChild(idElement)
        tr.appendChild(paidElement)
        tr.appendChild(packElement)
        tr.appendChild(colorElement)
        tr.appendChild(priceElement)
        tr.appendChild(qtyElement)
        tr.appendChild(nameElement)
        tr.appendChild(discElement)
        tr.appendChild(totalElement)

        idElement.innerText = id
        paidElement.innerText = paid
        packElement.innerText = pack
        colorElement.innerText = color
        priceElement.innerText = packprice()
        qtyElement.innerText = qty
        nameElement.innerText = name
        
        
        totalElement.innerText = Number(packprice())*Number(qtyElement.innerText)

        if(Number(totalElement.innerText) >= 30000){
            discElement.innerText = Number(totalElement.innerText)*(20/100)
        } else {
            discElement.innerText = 0
        }

        totalElement.innerText = Number(totalElement.innerText) - Number(discElement.innerText)

        ftotal()

        insertToStorage()
}


function packprice(){
    const pack = document.getElementById('pakInput')
    let price = 0
    
    if(pack.value == "KEYCHAIN"){
        price = key
    } else if(pack.value == "HAIRTIE") {
        price = hair
    } 
    
    return price
}

function ftotal(){
    let table = document.getElementById('aksesorisTable').getElementsByTagName('tbody')[0]
    let tprice = 0
    let tqty = 0
    let tdisc = 0
    let ft = 0

    for(let i = 0; i < table.children.length; i++){
        tprice += Number(table.getElementsByTagName('tr')[i].getElementsByTagName('td')[4].innerText)
        tqty += Number(table.getElementsByTagName('tr')[i].getElementsByTagName('td')[5].innerText)
        tdisc += Number(table.getElementsByTagName('tr')[i].getElementsByTagName('td')[7].innerText)
        ft += Number(table.getElementsByTagName('tr')[i].getElementsByTagName('td')[8].innerText)
    }

    document.getElementById('tprice').innerText = tprice
    document.getElementById('tqty').innerText = tqty
    document.getElementById('tdisc').innerText = tdisc
    document.getElementById('ft').innerText = ft
}

function insertToStorage() {
    let tmp_arr = []
    let table = document.getElementById('aksesorisBody')

    for (let i = 0; i < table.children.length; i++) {
        const id = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[0].innerText
        const paid = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[1].innerText
        const pack = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[2].innerText
        const color = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[3].innerText
        const price = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[4].innerText
        const qty = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[5].innerText
        const name = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[6].innerText
        const disc = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[7].innerText
        const total = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[8].innerText
        
        tmp_arr.push({
            'id': Number(id),
            'paid': paid,
            'pack': pack,
            'color': color,
            'price': Number(price),
            'qty': Number(qty),
            'name': name,
            'disc': Number(disc),
            'total': Number(total),
        })
    }

    localStorage.setItem('aksesorisData', JSON.stringify([...tmp_arr]))
}

function updateTable(arr) {
    const table = document.getElementById('aksesorisTable')
    let tbody = document.createElement('tbody')
    tbody.id = 'aksesorisBody'

    table.removeChild(table.getElementsByTagName('tbody')[0])
    table.appendChild(tbody)

    arr.forEach(arr => {
        let tr = document.createElement('tr')
        let idElement = document.createElement('td')
        let paidElement = document.createElement('td')
        let packElement = document.createElement('td')
        let colorElement = document.createElement('td')
        let priceElement = document.createElement('td')
        let qtyElement = document.createElement('td')
        let nameElement = document.createElement('td')
        let discElement = document.createElement('td')
        let totalElement = document.createElement('td')

        table.appendChild(tr)
        tr.appendChild(idElement)
        tr.appendChild(paidElement)
        tr.appendChild(packElement)
        tr.appendChild(colorElement)
        tr.appendChild(priceElement)
        tr.appendChild(qtyElement)
        tr.appendChild(nameElement)
        tr.appendChild(discElement)
        tr.appendChild(totalElement)

        idElement.innerText = arr['id']
        paidElement.innerText = arr['paid']
        packElement.innerText = arr['pack']
        colorElement.innerText = arr['color']
        priceElement.innerText = arr['price']
        qtyElement.innerText = arr['qty']
        nameElement.innerText = arr['name']
        discElement.innerText = arr['disc']
        totalElement.innerText = arr['total']

    });

    ftotal()

    insertToStorage()
}

function get_id() {
    // let tmp_arr = []
    // let tbody = document.getElementById('aksesorisBody')

    // for (i = 0; i < tbody.children.length; i++) {
        // const id = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[0].innerText
        // const paid = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[1].innerText
        // const pack = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[2].innerText
        // const color = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[3].innerText
        // const price = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[4].innerText
        // const qty = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[5].innerText
        // const name = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[6].innerText
        // const disc = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[7].innerText
        // const total = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[8].innerText
        
        // tmp_arr.push({
        //     'id': Number(id),
        //     'paid': paid,
        //     'pack': pack,
        //     'color': color,
        //     'price': Number(price),
        //     'qty': Number(qty),
        //     'name': name,
        //     'disc': Number(disc),
        //     'total': Number(total),
        // })
    // }

    // return tmp_arr

    return JSON.parse(localStorage.getItem('aksesorisData'))
}

// insertion sort
function sort(arr) { 
    if(document.getElementById('FInput').value == 'ASC'){
        let i, j, id, value
        for (i = 1; i < arr.length; i++) {
            value = arr[i]
            id = arr[i]['id']
            j = i - 1
    
            // console.log("X: " + arr[j]['id'] + " is larger than " + "Y: " + id + " is " + String(arr[j]['id'] > id))
    
            while (j >= 0 && arr[j]['id'] > id) {
                arr[j + 1] = arr[j]
                j -= 1
            }
            arr[j + 1] = value
        }
    
        updateTable(arr)
        } else {
            let i, j, id, value
            for (i = 1; i < arr.length; i++) {
            value = arr[i]
            id = arr[i]['id']
            j = i - 1
    
            // console.log("X: " + arr[j]['id'] + " is larger than " + "Y: " + id + " is " + String(arr[j]['id'] > id))
    
            while (j >= 0 && arr[j]['id'] < id) {
                arr[j + 1] = arr[j]
                j -= 1
            }
            arr[j + 1] = value
        }
    
        updateTable(arr)
        }
    }