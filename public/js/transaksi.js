const detergent = 15000
const parfume = 10000
const shoes = 25000

let default_item = JSON.parse(localStorage.getItem('transaksiData'))

if (localStorage.getItem('transaksiData')){ 
// updateTable(default_item)
}

function inputtrans() {
    let table = document.getElementById('transaksiBody')
    let id = document.getElementById('IdInput').value
    let buy = document.getElementById('buyInput').value
    let pack = document.getElementById('packInput').value
    let qty = document.getElementById('qtyInput').value
    let price = document.getElementById('priceInput').innerText
    let cash = document.getElementById('cashRadio').value
    let ecash = document.getElementById('eRadio').value
    // let tprice = document.getElementById('sump').value
    // let tqty = document.getElementById('sumq').value
    // let tdisc = document.getElementById('sumd').value
    // let ft = document.getElementById('fsum').value

    // console.log()

    let tr = document.createElement('tr')
    let idElement = document.createElement('td')
    let buyElement = document.createElement('td')
    let packElement = document.createElement('td')
    let priceElement = document.createElement('td')
    let qtyElement = document.createElement('td')
    let discElement = document.createElement('td')
    let totalElement = document.createElement('td')
    let typeElement = document.createElement('td')
    let cashElement = document.createElement('td')
    let eElement = document.createElement('td')
    // let sumpElement = document.createElement('td')
    // let sumqElement = document.createElement('td')
    // let sumdElement = document.createElement('td')
    // let fsumElement = document.createElement('td')

        table.appendChild(tr)
        tr.appendChild(idElement)
        tr.appendChild(buyElement)
        tr.appendChild(packElement)
        tr.appendChild(qtyElement)
        tr.appendChild(discElement)
        tr.appendChild(priceElement)
        tr.appendChild(totalElement)
        tr.appendChild(typeElement)
        // tr.appendChild(cashElement)
        // tr.appendChild(eElement)
        // tr.appendChild(sumpElement)
        // tr.appendChild(sumqElement)
        // tr.appendChild(sumdElement)
        // tr.appendChild(fsumElement)

        idElement.innerText = id
        buyElement.innerText = buy
        packElement.innerText = pack
        qtyElement.innerText = qty
        priceElement.innerText = price

        if(Number(priceInput) >= 50000){
            discElement.innerText = Number(priceInput)*(15/100)
        } else {
            discElement.innerText = 0
        }
        
        totalElement.innerText = Number(packprice())*Number(qty.value)

        typeElement.innerText = cash.checked ? "E-MONEY" : "CASH"

        // cashElement.innerText = cash
        // eElement.innerText = ecash
        // sumpElement.innerText = tprice
        // sumqElement.innerText = tqty
        // sumdElement.innerText = tdisc
        // fsumElement.innerText = ft
        
        insertToStorage()
}

function packprice(){
    const pack = document.getElementById('packInput')
    let price = 0

    if(pack.value == 'DEGEN'){
        price = detergent
    } else if(pack.value == 'PARFUM') {
        price = parfume
    } else if(pack.value == 'DETU'){
        price = shoes
    }

    return price
}

function changePack(entity) {
    if (entity.value == 'DEGEN') {
        document.getElementById('priceInput').innerText = detergent
    } else if (entity.value == 'PARFUM') {
        document.getElementById('priceInput').innerText = parfume
    } else if (entity.value == 'DETU') {
        document.getElementById('priceInput').innerText = shoes
    }

    calcuQty(document.getElementById('qtyInput'))
}

function calcuQty(entity) {
    const package = document.getElementById('packInput')
    let price = 0

    if (package.value == 'DEGEN') {
        price = detergent
    } else if (package.value == 'PARFUM') {
        price = parfume
    } else if (package.value == 'DETU') {
        price = shoes
    }

    const qty = entity.value

    document.getElementById('priceInput').innerText = Number(price)*Number(qty)
}

function insertToStorage() {
    let tmp_arr = []
    let table = document.getElementById('transaksiBody')

    for (let i = 0; i < table.children.length; i++) {
        const id = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[0].innerText
        const buy = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[1].innerText
        const pack = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[2].innerText
        const price = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[3].innerText
        const qty = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[4].innerText
        const disc = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[5].innerText
        const total = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[6].innerText
        const type = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[7].innerText
        
        tmp_arr.push({
            'id': Number(id),
            'buy': buy,
            'pack': pack,
            'price': Number(price),
            'qty': Number(qty),
            'disc': Number(disc),
            'total': Number(total),
            'type' : type
        })
    }

    localStorage.setItem('transaksiData', JSON.stringify([...tmp_arr]))
}

// function updateTable(arr) {
//     const table = document.getElementById('transaksiTable')
//     let tbody = document.createElement('tbody')
//     tbody.id = 'transaksiBody'

//     table.removeChild(table.getElementsByTagName('tbody')[0])
//     table.appendChild(tbody)

//     arr.forEach(arr => {
//         let tr = document.createElement('tr')
//         let id = document.createElement('td')
//         let name = document.createElement('td')
//         let gender = document.createElement('td')
//         let status = document.createElement('td')
//         let son = document.createElement('td')
//         let date = document.createElement('td')
//         let gaji = document.createElement('td')
//         let t = document.createElement('td')
//         let total = document.createElement('td')

//         tbody.appendChild(tr)
//         tr.appendChild(id)
//         tr.appendChild(name)
//         tr.appendChild(gender)
//         tr.appendChild(status)
//         tr.appendChild(son)
//         tr.appendChild(date)
//         tr.appendChild(gaji)
//         tr.appendChild(t)
//         tr.appendChild(total)

//         id.innerText = arr['id']
//         name.innerText = arr['name']
//         gender.innerText = arr['gender']
//         status.innerText = arr['status']
//         son.innerText = arr['son']
//         date.innerText = arr['date']
//         gaji.innerText = arr['gaji']
//         t.innerText = arr['t']
//         total.innerText = arr['total']
//     });

//     insertToStorage()
// }

// insertion sort
function sort(arr) { 
if(document.getElementById('fInput').value == 'ASC'){
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
