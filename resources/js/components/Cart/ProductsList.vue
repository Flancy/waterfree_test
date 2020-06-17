<template>
    <div>
        <div class="row" v-if="products.data.length">
            <div class="col-sm-3" v-for="product in products.data" :key="product.id">
                <div class="product">
                    <div class="product-head">
                        <img :src="origin_url + product.firms.logo" class="product__liter">
                        <img :src="product.logo" alt="" class="img-fluid product__image">
                    </div>
                    <div class="product-body">
                        <h3 class="product__title">{{ product.name }}</h3>
                        <p class="product__price">{{ product.price }} <i class="fa fa-rub" aria-hidden="true"></i></p>
                    </div>
                    <div class="product-foot">
                        <div class="product-count">
                            <span class="product-minus">-</span>
                            <input type="text" value="1" min="1" class="product-input">
                            <span class="product-plus">+</span>
                        </div>
                        <div class="product-btn">
                            <a href="#" class="btn btn-cart btn-outline-primary" data-count="1" @click.prevent="addToCart(product, $event)">{{ btnText }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <pagination :data="products" @pagination-change-page="getResults"></pagination>
            </div>
        </div>
        <div class="row" v-else>
            <div class="col-sm-12 text-center">
                <h4>В вашем городе/районе товаров не найдено</h4>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            products: {
                data: {}
            },
            firm_id: null,
            liter: null,
            query: '',
            btnText: 'В корзину',
            origin_url: window.location.origin
        };
    },
    mounted() {
        this.getResults()
    },
    methods: {
        getResults(page = 1) {
            this.firm_id = this.getQueryVariable('firm_id');
            this.liter = this.getQueryVariable('liter');

            if(this.firm_id !== undefined && this.firm_id !== '') {
                this.query += 'firm_id=' + this.firm_id
            }
            if(this.liter !== undefined && this.liter !== '') {
                this.query += '&liter=' + this.liter
            }

            axios.get(window.location.origin + '/products/?'+ this.query + '&page=' + page)
                .then(response => {
                    this.products = response.data;
                }).
                catch((error) => {
                    console.log(error)
                });
        },
        addToCart(product, event) {
            let value = $(event.target).closest('.product-foot').find('input').val();

            while (value != 0) {
                console.log(value);
                this.$store.commit('addToCart', product);

                value--;
            }

            event.target.innerText = 'Добавлено';

            setTimeout(() => event.target.innerText = 'В корзину', 3000)
        },
        getQueryVariable(variable) {
            let query = window.location.search.substring(1);

            let vars = query.split("&");
            for (let i=0; i<vars.length; i++) {
                let pair = vars[i].split("=");

                if (pair[0] == variable) {
                    return pair[1];
                }
            }
        }
    }
}


</script>