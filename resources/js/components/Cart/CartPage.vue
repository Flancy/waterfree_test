<template>
    <div class="container-cart">
        <cart-modal-order :totalPrice="totalPrice" :cities="cities"></cart-modal-order>
        <div class="container">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                        <div v-if="$store.state.cartCount == 0">
                            <h3 class="h3 text-center">Корзина пустая</h3>
                        </div>
                        <div class="table-responsive" v-else>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 bg-light">
                                            <div class="p-2 px-3 text-uppercase">Товар</div>
                                        </th>
                                        <th class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Цена</div>
                                        </th>
                                        <th class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Количество</div>
                                        </th>
                                        <th class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Удалить</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="item in $store.state.cart" :key="item.id">
                                        <td>
                                            <div class="p-2">
                                                <img :src="item.logo" alt="" width="70" class="img-fluid rounded">
                                                <div class="ml-3 d-inline-block align-middle">
                                                    <h5 class="mb-0"><a href="#" class="text-dark d-inline-block">{{ item.name }}</a></h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle"><strong>{{ item.totalPrice }} <i class="fa fa-rub" aria-hidden="true"></i></strong></td>
                                        <td class="align-middle">
                                            <div class="product-count">
                                                <span class="minus" @click="minus(item)">-</span>
                                                <input type="text" min="1" class="product-input" @change="changeCount(item)" v-model="item.quantity">
                                                <span class="plus" @click="plus(item)">+</span>
                                            </div>
                                        </td>
                                        <td class="align-middle"><a href="#" class="text-dark"><i class="fa fa-trash" @click.prevent="removeFromCart(item)"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" v-show="$store.state.cartCount != 0">
            <div class="row py-5 p-4 bg-white rounded shadow-sm">
                <div class="col-lg-6">
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Код купона</div>
                    <div class="p-4">
                        <p class="font-italic mb-4">Если у вас есть код купона, пожалуйста, введите его в поле ниже</p>
                        <div class="input-group mb-4 border rounded-pill p-2">
                            <input type="text" placeholder="Код" aria-describedby="button-addon3" class="form-control border-0">
                            <div class="input-group-append border-0">
                                <button id="button-addon3" type="button" class="btn btn-dark px-4 rounded-pill"><i class="fa fa-gift mr-2"></i>Применить купон</button>
                            </div>
                        </div>
                    </div>
                    <!--<div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Ваш комментарий</div>
                    <div class="p-4">
                        <p class="font-italic mb-4">Если у вас есть какая-то информация для продавца, вы можете оставить их в поле ниже</p>
                        <textarea name="" cols="30" rows="2" class="form-control"></textarea>
                    </div>-->
                </div>
                <div class="col-lg-6">
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Данные заказа</div>
                    <div class="p-4">
                        <p class="font-italic mb-4">Доставка и дополнительные расходы рассчитываются на основе введенных значений.</p>
                        <ul class="list-unstyled mb-4">
                            <!--<li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Промежуточный итог</strong><strong>390.00 <i class="fa fa-rub" aria-hidden="true"></i></strong></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Доставка и обработка</strong><strong>10.00 <i class="fa fa-rub" aria-hidden="true"></i></strong></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Налог</strong><strong>0.00 <i class="fa fa-rub" aria-hidden="true"></i></strong></li>-->
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Итого</strong>
                                <h5 class="font-weight-bold">{{ totalPrice }} <i class="fa fa-rub" aria-hidden="true"></i></h5>
                            </li>
                        </ul>
                            <a data-toggle="modal" data-target="#modal-order" class="btn btn-dark rounded-pill py-2 btn-block">Перейти к оформлению заказа</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ['cities'],
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
        },
        changeCount(item) {
            this.$store.commit('changeCount', item);
        },
        minus(item) {
            let count = parseInt(item.quantity) - 1;
            count = count < 1 ? 1 : count;

            item.quantity = count;

            this.changeCount(item);
        },
        plus(item) {
            let count = parseInt(item.quantity) + 1;

            item.quantity = count;
            
            this.changeCount(item);
        }
    }
}
</script>