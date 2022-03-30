const key = 5000
const hair = 2500

let default_item = JSON.parse(localStorage.getItem('aksesorisData'))

if(localStorage.getItem('aksesorisData')){
    updateTable(default_item)
}

//create function that will update the table
function updateTable(data){
    let table = document.getElementById('aksesorisBody')
    let total = 0
    let totalDisc = 0
    let totalPaid = 0
    let totalQty = 0
    let totalPack = 0
    let totalColor = 0
    let totalName = 0

    for(let i = 0; i < data.length; i++){
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
    }
}
