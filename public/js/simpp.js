document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("view-btn").addEventListener("click", function(e){
        e.preventDefault()
        if(document.getElementById("simpp-view").classList.contains("hidden")){
            document.getElementById("view-btn").classList.add("btn-active")
            document.getElementById("create-btn").classList.remove("btn-active")
            document.getElementById("simpp-view").classList.remove("hidden")
            document.getElementById("simpp-create").classList.add("hidden")
        }
    })

    document.getElementById("create-btn").addEventListener("click", function(e){
        e.preventDefault()
        if(document.getElementById("simpp-create").classList.contains("hidden")){
            document.getElementById("create-btn").classList.add("btn-active")
            document.getElementById("view-btn").classList.remove("btn-active")
            document.getElementById("simpp-view").classList.add("hidden")
            document.getElementById("simpp-create").classList.remove("hidden")
        }
    })
})

let default_item = JSON.parse(localStorage.getItem('simppData'))

if (localStorage.getItem('simppData')){ 
updateTable(default_item)
ftotal()
}

function calcuAge(works){
    let work = new Date(works)
    let ageDifMs = Date.now() - work.getTime()
    let ageDate = new Date(ageDifMs)
    return Math.abs(ageDate.getUTCFullYear() - 1970)
}

function submit_simulation() {
    let table = document.getElementById('simppBody')
    let id = document.getElementById('idInput').value
    let name = document.getElementById('nameInput').value
    let gender = document.getElementById('genderInput').value
    let status = document.getElementById('statusInput').value
    let son = document.getElementById('sonInput').value
    let date = document.getElementById('dateInput').value
    let temp = 0
    let daob = new Date(date).getFullYear()
    let curdat = new Date()

    
        document.getElementById('idInput').value = ''
        document.getElementById('nameInput').value = ''
        document.getElementById('genderInput').value = ''
        document.getElementById('statusInput').value = ''
        document.getElementById('sonInput').value = ''
        document.getElementById('dateInput').value = ''

        let tr = document.createElement('tr')
        let idElement = document.createElement('td')
        let nameElement = document.createElement('td')
        let genderElement = document.createElement('td')
        let statusElement = document.createElement('td')
        let sonElement = document.createElement('td')
        let dateElement = document.createElement('td')
        let gajiElement = document.createElement('td')
        let tElement = document.createElement('td')
        let totalElement = document.createElement('td')

        table.appendChild(tr)
        tr.appendChild(idElement)
        tr.appendChild(nameElement)
        tr.appendChild(genderElement)
        tr.appendChild(statusElement)
        tr.appendChild(sonElement)
        tr.appendChild(dateElement)
        tr.appendChild(gajiElement)
        tr.appendChild(tElement)
        tr.appendChild(totalElement)

        idElement.innerText = id
        nameElement.innerText = name
        genderElement.innerText = gender
        statusElement.innerText = status
        sonElement.innerText = son
        dateElement.innerText = date

        if(curdat > daob){
            for(let i = 0; i < calcuAge(date); i++){
                temp += 150000
            }
        }

        if(statusElement.innerText == 'Couple'){
            temp += 250000
        }

        if(Number(sonElement.innerText) > 0){
            for (let i = 0; i < Number(sonElement.innerText); i++){
                if(i < 2){
                    temp += 150000
                }
            }
        }

        gajiElement.innerText = '2000000'
        tElement.innerText = temp
        totalElement.innerText = Number(gajiElement.innerText) + Number(tElement.innerText)
    
        ftotal()

        insertToStorage()
}

function jomblo(){
    if(document.getElementById('statusInput').value == 'Single'){
        document.getElementById('sonInput').value = 0
        document.getElementById('sonInput').disabled = true
    } else {
        document.getElementById('sonInput').disabled = false
    }
}

function ftotal(){
    let table = document.getElementById('simppTable').getElementsByTagName('tbody')[0]
    let tgaji = 0
    let tt = 0
    let ttotal = 0

    for(let i = 0; i < table.children.length; i++){
        tgaji += Number(table.getElementsByTagName('tr')[i].getElementsByTagName('td')[6].innerText)
        tt += Number(table.getElementsByTagName('tr')[i].getElementsByTagName('td')[7].innerText)
        ttotal += Number(table.getElementsByTagName('tr')[i].getElementsByTagName('td')[8].innerText)
    }

    document.getElementById('tgaji').innerText = tgaji
    document.getElementById('tt').innerText = tt
    document.getElementById('ttotal').innerText = ttotal
}

function insertToStorage() {
    let tmp_arr = []
    let table = document.getElementById('simppBody')

    for (let i = 0; i < table.children.length; i++) {
        const id = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[0].innerText
        const name = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[1].innerText
        const gender = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[2].innerText
        const status = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[3].innerText
        const son = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[4].innerText
        const date = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[5].innerText
        const gaji = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[6].innerText
        const t = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[7].innerText
        const total = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[8].innerText

        tmp_arr.push({
            'id': Number(id),
            'name': name,
            'gender': gender,
            'status': status,
            'son': Number(son),
            'date': date,
            'gaji': Number(gaji),
            't': Number(t),
            'total': Number(total)
        })
    }

    localStorage.setItem('simppData', JSON.stringify([...tmp_arr]))
}

function get_id() {
    // let tmp_arr = []
    // let tbody = document.getElementById('simppBody')

    // for (i = 0; i < tbody.children.length; i++) {
    //     let elements = tbody.getElementsByTagName('tr')[i].getElementsByTagName('td')[0].innerText
    //     let name = tbody.getElementsByTagName('tr')[i].getElementsByTagName('td')[1].innerText
    //     let gender = tbody.getElementsByTagName('tr')[i].getElementsByTagName('td')[2].innerText
    //     let status = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[3].innerText
    //     let son = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[4].innerText
    //     let date = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[5].innerText
    //     let gaji = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[6].innerText
    //     let t = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[7].innerText
    //     let total = table.getElementsByTagName('tr')[i].getElementsByTagName('td')[8].innerText

    //     tmp_arr.push({
    //         "id": Number(elements),
    //         "name": String(name),
    //         "gender": String(gender),
    //         "status": status,
    //         "son": Number(son),
    //         "date": date,
    //         "gaji": Number(gaji),
    //         "t": Number(t),
    //         "total": Number(total)
    //     })
    // }

    // return tmp_arr

    return JSON.parse(localStorage.getItem('simppData'))
}

function updateTable(arr) {
    const table = document.getElementById('simppTable')
    let tbody = document.createElement('tbody')
    tbody.id = 'simppBody'

    table.removeChild(table.getElementsByTagName('tbody')[0])
    table.appendChild(tbody)

    arr.forEach(arr => {
        let tr = document.createElement('tr')
        let id = document.createElement('td')
        let name = document.createElement('td')
        let gender = document.createElement('td')
        let status = document.createElement('td')
        let son = document.createElement('td')
        let date = document.createElement('td')
        let gaji = document.createElement('td')
        let t = document.createElement('td')
        let total = document.createElement('td')

        tbody.appendChild(tr)
        tr.appendChild(id)
        tr.appendChild(name)
        tr.appendChild(gender)
        tr.appendChild(status)
        tr.appendChild(son)
        tr.appendChild(date)
        tr.appendChild(gaji)
        tr.appendChild(t)
        tr.appendChild(total)

        id.innerText = arr['id']
        name.innerText = arr['name']
        gender.innerText = arr['gender']
        status.innerText = arr['status']
        son.innerText = arr['son']
        date.innerText = arr['date']
        gaji.innerText = arr['gaji']
        t.innerText = arr['t']
        total.innerText = arr['total']
    });

    insertToStorage()
}

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
