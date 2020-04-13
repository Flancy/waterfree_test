<template>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarCart" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Корзина ({{ $store.state.cartCount }})
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarCart">
            <a v-for="item in $store.state.cart"
                :key="item.id"
                class="dropdown-item dropdown-item-cart"
                href="/cart" @click.prevent>

                <i class="fa fa-trash removeBtn" aria-hidden="true" title="Удалить из корзины" @click.prevent="removeFromCart(item)"></i>

                <img :src="item.logo" alt="" class="img-fluid cart-img">

                <span class="cart-name">{{ item.name }} </span>
                <span class="cart-price">{{ item.totalPrice }} <i class="fa fa-rub" aria-hidden="true"></i></span>

                <span class="cart-count">{{ item.quantity }}</span>
            </a>

            <a href="#" class="dropdown-item">
                Итого: {{ totalPrice }} <i class="fa fa-rub" aria-hidden="true"></i>
            </a>

            <div class="dropdown-divider"></div>

            <a class="dropdown-item" href="/cart">
                Перейти в корзину
            </a>
        </div>

        <div class="dropdown-menu" aria-labelledby="navbarCart">
            <a class="dropdown-item" href="#">
                Корзина пуста
            </a>
        </div>
    </li>
</template>

<script>
export default {
    computed: {
        totalPrice() {
            let total = 0;

            for (let item of this.$store.state.cart) {
                total += item.totalPrice;
            }

            return total.toFixed(2);
        }
    },
    methods: {
        removeFromCart(item) {
            this.$store.commit('removeFromCart', item);
        }
    }
}
</script>