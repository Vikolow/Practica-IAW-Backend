let carrito = [];
let total = 0;

function agregarAlCarrito(producto, precio) {
    carrito.push({ producto, precio });
    total += precio;

    actualizarCarrito();
}

function actualizarCarrito() {
    const listaCarrito = document.getElementById('lista-carrito');
    const totalElement = document.getElementById('total');

    // Limpiar la lista
    listaCarrito.innerHTML = '';

    // Actualizar la lista
    carrito.forEach(item => {
        const li = document.createElement('li');
        li.textContent = `${item.producto} - $${item.precio.toFixed(2)}`;
        listaCarrito.appendChild(li);
    });

    // Actualizar el total
    totalElement.textContent = total.toFixed(2);
}

function ProdAdd(Prod, precio) {
    //Ingresamos un mensaje a mostrar
    var msg = "Producto '"  + Prod + "' añadido ¿Quieres seguir comprando?";
    var mensaje = confirm(msg);
    //Detectamos si el usuario acepto el mensaje
    if (mensaje) { // quieres seguri comprando
        location.href="catalogo.html"
    }
    //Quiere tramitar pedido
    else {
        location.href="login.html"
    }
}