<h1 class="titulo">Listado De Productos</h1>

<div id="carrito" class="carrito"></div>

@foreach($products as $product)
    <ul class="lista-productos">
        <li class="producto-item">
            <span>{{ $product->name }}</span>
            <button class="btn-agregar" onclick='agregarAlCarrito(@json($product))'>
                Añadir al carrito
            </button>
        </li>
    </ul>
@endforeach

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        padding: 20px;
    }

    .titulo {
        text-align: center;
        color: #333;
    }

    .lista-productos {
        list-style: none;
        padding: 0;
        max-width: 400px;
        margin: 10px auto;
    }

    .producto-item {
        background: #fff;
        padding: 10px 15px;
        margin-bottom: 10px;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .btn-agregar {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 6px 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-agregar:hover {
        background-color: #218838;
    }

    .carrito {
        max-width: 400px;
        margin: 20px auto;
        background: #fff;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .carrito p {
        margin: 5px 0;
    }

    .carrito button {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 5px 8px;
        border-radius: 5px;
        cursor: pointer;
        margin-bottom: 10px;
    }

    .carrito button:hover {
        background-color: #c82333;
    }
</style>

<script>
let carrito = JSON.parse(localStorage.getItem('carrito'))
carrito = carrito ? carrito : []
console.log("carrito", carrito)
mostrarCarrito()

function agregarAlCarrito(product) {
    let posicion = carrito.findIndex(item => item.id === product.id)
    
    if(posicion !== -1){
        carrito[posicion].cantidad++
    }else{
        product.cantidad = 1
        carrito.push(product)
    }

    localStorage.setItem('carrito', JSON.stringify(carrito))
    mostrarCarrito()
}

function eliminarDelCarrito(id){
    let posicion = carrito.findIndex(item => item.id === id)

    if(posicion !== -1){
        carrito.splice(posicion,1)
    }

    localStorage.setItem('carrito', JSON.stringify(carrito))
    mostrarCarrito()
}

function mostrarCarrito (){
    let divCarrito = document.getElementById("carrito")
    divCarrito.innerHTML = '<h3>Carrito 🛒</h3>'

    let total = 0

    carrito.map(item => {
        let subtotal = item.price * item.cantidad
        total += subtotal

        divCarrito.innerHTML +=`
            <div style="display:flex; justify-content:space-between; align-items:center;">
                <p>${item.name} - Cantidad: ${item.cantidad} - $${subtotal}</p>
                <button onclick="eliminarDelCarrito(${item.id})">Eliminar</button>
            </div>
        `
    });

    divCarrito.innerHTML += `
        <hr>
        <h4>Total: $${total}</h4>
    `
    divCarrito.innerHTML += ` <a href="/checkout">Continuar pago</a> `
}
</script>