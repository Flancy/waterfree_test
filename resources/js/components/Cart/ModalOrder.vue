<template>
	<div class="modal fade" id="modal-order" tabindex="-1" role="dialog" aria-labelledby="modal-order" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title text-center" id="modal-orderLabel">Оформление заказа</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="alert alert-success" role="alert" v-if="status">
						Спасибо за заявку! Наш менеджер скоро свяжется с Вами!
					</div>
					<form @submit.prevent="submitForm()">
						<div class="form-group" :class="{ 'form-group--error': $v.phone.$error }">
							<label for="phone">Ваш телефон:*</label>
							<input type="tel" class="form-control rounded-pill" id="phone" placeholder="Телефон" v-model.trim="$v.phone.$model">
						</div>
						<div class="form-group" :class="{ 'form-group--error': $v.name.$error }">
							<label for="name">Ваше имя:*</label>
							<input type="text" class="form-control rounded-pill" id="name" placeholder="Имя" v-model.trim="$v.name.$model">
						</div>
						<div class="form-group form-group-flex" :class="{ 'form-group--error': $v.city.$error }">
							<label for="city">Ваш город/район</label>
							<select class="selectpicker" data-live-search="true" name="city" data-style="btn-secondary" @change="changeSelect($event)">
                                <option v-for="city in cities" :data-tokens="city.name" :value="city.id">{{ city.name }}</option>
                            </select>
						</div>
						<div class="form-group" :class="{ 'form-group--error': $v.code.$error }">
							<label for="name">Код из СМС:*</label>
							<input type="text" class="form-control rounded-pill" id="code" placeholder="Код из смс..." v-model.trim="$v.code.$model">
						</div>
						<div class="form-group text-center">
							<button type="submit" class="btn btn-primary rounded-pill" :disabled="this.$v.$invalid">Заказать</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	const { required, minLength } = require('vuelidate/lib/validators')

	export default {
		props: ['totalPrice', 'cities'],
		data() {
			return {
				name: '',
				phone: '',
				products: {},
				city: 0,
				code: '',
				status: false,
			}
		},
	    mounted() {
	        this.products = this.$store.state.cart
	        this.city = this.cities[0].id
	    },
		validations: {
			name: {
				required,
				minLength: minLength(4)
			},
			phone: {
				required,
				minLength: minLength(4)
			},
			city: {
				required
			}
		},
		methods: {
			changeSelect(event) {
				this.$v.city.$model = event.target.value
			},
			submitForm() {
				let data = {
					'name': this.name,
					'phone': this.phone,
					'products': this.products,
					'city': this.city,
					'totalPrice': this.totalPrice
				};
				axios.post('/cart/order/store', data)
					.then((response) => {
						console.log(response.data)
						if(response.data.status) {
							this.status = true

							this.$store.commit('removeAllCart')
						}
					})
					.catch((error) => {
						console.log(error.data)
					})
			}
		}
	}
</script>
<style>
.form-group-flex {
	display: flex;
	flex-direction: column;
}
.form-group-flex .bootstrap-select {
	width: 100% !important;
	border-radius: 50rem !important;
}
</style>