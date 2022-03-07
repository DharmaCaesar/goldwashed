var PRICE = 0 
var FEE = 0 
var TAX = 0 

document.getElementById('discInput').addEventListener('change', function(e){
    e.preventDefault()

    update()
})

function toggle_note(entity){
    entity.checked != entity.checked

    document.getElementById('nude').classList.toggle('hidden')

    var fee_price = document.getElementById('fepay').value

    if(entity.checked){
        fee_price += 10
    } else {
        fee_price -= 10
    }

    FEE = parseInt(Number(fee_price))
    document.getElementById('fepay').value = parseInt(fee_price)
    document.getElementById('fe-view').innerText = document.getElementById('fepay').value 
}

function update(){
    if(CHOOSEN.length != 0){
        let choosen_id = CHOOSEN
        let discount = document.getElementById('discInput').value
        $.ajax({
            type: 'POST',
            url: '/calculate',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {id: choosen_id, discount: discount},
            success: function(response){
                PRICE = response.price
                PRICE = parseInt(Number(PRICE))
                TAX = response.tax
                TAX = parseInt(Number(TAX))

                document.getElementById('sumpay').value = PRICE
                document.getElementById('taxpay').value = TAX

                document.getElementById('price-view').innerText = PRICE
                document.getElementById('fe-view').innerText = FEE
                document.getElementById('tax-view').innerText = TAX

                document.getElementById('discount-view').innerText = document.getElementById('discInput').value
            }
        })
    } else {
        PRICE = 0
        TAX = 0

        document.getElementById('price-view').innerText = PRICE 
        document.getElementById('tax-view').innerText = TAX
        document.getElementById('discount-view').innerText = document.getElementById('discInput').value
    }
}

function update_qty(entity){
    let table = entity.parentElement.parentElement
    let id = Number(table.querySelectorAll('td')[0].innerText)
    let qty = Number(table.querySelectorAll('td')[4].querySelector('input').value)

    CHOOSEN[get_index(CHOOSEN, 'id', id)]['qty'] = qty
    document.getElementById('qty-input-' + id).value = qty

    update()
}