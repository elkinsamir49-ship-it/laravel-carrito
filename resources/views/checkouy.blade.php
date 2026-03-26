<h1>PRODUCTS</h1>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f6f9;
        margin: 0;
        padding: 20px;
    }

    h1 {
        text-align: center;
        color: #333;
    }

    .resumen {
        max-width: 600px;
        margin: 0 auto;
        background: #ffffff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    #product p {
        background: #f9fafb;
        padding: 12px;
        border-radius: 8px;
        margin: 10px 0;
        border: 1px solid #e5e7eb;
        color: #444;
    }

    button {
        width: 100%;
        padding: 12px;
        margin-top: 15px;
        border: none;
        border-radius: 8px;
        background-color: #4CAF50;
        color: white;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    button:hover {
        background-color: #45a049;
    }
</style>

</head>
<body>



<div class="resumen">
    <form action="/procesar" method="post">
        <div id="product">
        
      </div> 
         <button type="submit">Procesar Compra</button>
         
    </form>
</div>
<script>
let carrito = JSON.parse(localStorage.getItem('carrito'))
let divproduct = document.getElementById("product")

carrito.map(product => {
    divproduct.innerHTML += `
        <p>${product.name} - Cantidad: ${product.cantidad} - $${product.cantidad * product.price}</p> `
    divproduct.innerHTML += `<input type="hidden" name="products_id[]" value='${product.id}'>`
    divproduct.innerHTML += `<input type="hidden" name="price[]" value='${product.price}'>`
    divproduct.innerHTML += `<input type="hidden" name="cantidad[]" value='${product.cantidad}'>`

})

</script>