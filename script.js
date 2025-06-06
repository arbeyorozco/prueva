           document.addEventListener('DOMContentLoaded', function() {
            // Inicializar carrito
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            updateCartUI();
            
            // Mostrar/ocultar el dropdown del carrito
            const cartIcon = document.getElementById('cart-icon');
            const cartDropdown = document.getElementById('cart-dropdown');
            
            cartIcon.addEventListener('click', function(e) {
                e.stopPropagation();
                cartDropdown.classList.toggle('active');
            });
            
            // Cerrar el dropdown al hacer clic fuera de él
            document.addEventListener('click', function(e) {
                if (!cartIcon.contains(e.target)) {
                    cartDropdown.classList.remove('active');
                }
            });
            
            // Añadir productos al carrito
            const addToCartButtons = document.querySelectorAll('.add-to-cart');
            addToCartButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const name = this.getAttribute('data-name');
                    const price = parseFloat(this.getAttribute('data-price'));
                    const img = this.getAttribute('data-img');
                    
                    // Verificar si el producto ya está en el carrito
                    const existingItem = cart.find(item => item.id === id);
                    
                    if (existingItem) {
                        existingItem.quantity += 1;
                    } else {
                        cart.push({
                            id: id,
                            name: name,
                            price: price,
                            img: img,
                            quantity: 1
                        });
                    }
                    
                    // Guardar en localStorage
                    localStorage.setItem('cart', JSON.stringify(cart));
                    
                    // Actualizar la interfaz del carrito
                    updateCartUI();
                    
                    // Mostrar notificación
                    showNotification();
                });
            });
            
            // Función para actualizar la interfaz del carrito
            function updateCartUI() {
                const cartItemsContainer = document.getElementById('cart-items');
                const cartCountElement = document.getElementById('cart-count');
                const cartTotalElement = document.getElementById('cart-total-price');
                const emptyCartMessage = document.getElementById('empty-cart-message');
                
                // Actualizar contador de productos
                let totalItems = 0;
                cart.forEach(item => {
                    totalItems += item.quantity;
                });
                cartCountElement.textContent = totalItems;
                
                // Limpiar contenido del carrito
                cartItemsContainer.innerHTML = '';
                
                // Mostrar mensaje si el carrito está vacío
                if (cart.length === 0) {
                    cartItemsContainer.innerHTML = '<p id="empty-cart-message">Tu carrito está vacío</p>';
                } else {
                    // Añadir productos al carrito
                    let total = 0;
                    
                    cart.forEach(item => {
                        const cartItem = document.createElement('div');
                        cartItem.className = 'cart-item';
                        
                        const itemTotal = item.price * item.quantity;
                        total += itemTotal;
                        
                        cartItem.innerHTML = `
                            <img src="${item.img}" alt="${item.name}" class="cart-item-img">
                            <div class="cart-item-details">
                                <div class="cart-item-name">${item.name}</div>
                                <div class="cart-item-price">$${item.price.toFixed(2)}</div>
                                <div class="cart-item-quantity">
                                    <button class="quantity-btn decrease-quantity" data-id="${item.id}">-</button>
                                    <input type="number" class="quantity-input" value="${item.quantity}" min="1" readonly>
                                    <button class="quantity-btn increase-quantity" data-id="${item.id}">+</button>
                                </div>
                                <button class="remove-item" data-id="${item.id}">Eliminar</button>
                            </div>
                        `;
                        
                        cartItemsContainer.appendChild(cartItem);
                    });
                    
                    // Actualizar total
                    cartTotalElement.textContent = `$${total.toFixed(2)}`;
                    
                    // Añadir eventos a los botones de cantidad y eliminar
                    addCartItemEvents();
                }
            }
            
            // Función para añadir eventos a los botones de cantidad y eliminar
            function addCartItemEvents() {
                // Aumentar cantidad
                const increaseButtons = document.querySelectorAll('.increase-quantity');
                increaseButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        const item = cart.find(item => item.id === id);
                        if (item) {
                            item.quantity += 1;
                            localStorage.setItem('cart', JSON.stringify(cart));
                            updateCartUI();
                        }
                    });
                });
                
                // Disminuir cantidad
                const decreaseButtons = document.querySelectorAll('.decrease-quantity');
                decreaseButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        const item = cart.find(item => item.id === id);
                        if (item) {
                            if (item.quantity > 1) {
                                item.quantity -= 1;
                            } else {
                                // Eliminar si la cantidad llega a 0
                                cart = cart.filter(cartItem => cartItem.id !== id);
                            }
                            localStorage.setItem('cart', JSON.stringify(cart));
                            updateCartUI();
                        }
                    });
                });
                
                // Eliminar producto
                const removeButtons = document.querySelectorAll('.remove-item');
                removeButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        cart = cart.filter(item => item.id !== id);
                        localStorage.setItem('cart', JSON.stringify(cart));
                        updateCartUI();
                    });
                });
            }
            
            // Función para mostrar notificación
            function showNotification() {
                const notification = document.getElementById('notification');
                notification.style.display = 'block';
                
                setTimeout(function() {
                    notification.style.display = 'none';
                }, 3000);
            }
        });