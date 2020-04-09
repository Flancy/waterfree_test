<nav class="row products-nav">
	<div class="col-sm-12">
		<div class="row justify-content-stretch mb-3">
			<h4 class="col-sm-12 mb-3">
				<div class="row">
					<div class="col-sm-2">
						Бренд:
					</div>
				</div>
			</h4>
			<h4 class="col-sm-12 mb-3">
				<div class="row">
					<div class="col-sm-2">
						<select id="inputState" class="form-control btn-primary
							@if(Request::has('liter'))
								active
							@endif
						">
		                    <option selected>Выберите литраж...</option>
		                    <option 
								@if('19' == Request::get('liter'))
									selected="selected" 
								@endif
		                    data-liter="19">19л.</option>
		                    <option  
								@if('5' == Request::get('liter'))
									selected="selected" 
								@endif
		                    data-liter="5">5л.</option>
		                    <option  
								@if('1.5' == Request::get('liter'))
									selected="selected" 
								@endif
		                    data-liter="1.5">1.5л.</option>
		                    <option  
								@if('0.5' == Request::get('liter'))
									selected="selected" 
								@endif
		                    data-liter="0.5">0.5л.</option>
		                </select>
					</div>
				</div>
			</h4>

			@foreach ($firms as $firm)
				<div class="col-sm-2"><a href="#" class="btn btn-primary btn-product
				@if($firm->id == Request::get('firm_id'))
					active
				@endif
				" data-firm="{{ $firm->id }}">{{ $firm->name }} <img src="{{ asset($firm->logo) }}" alt=""></a></div>
			@endforeach
		</div>
	</div>
	<div class="col-sm-12 text-center">
		<form action="{{ route('pages.products.index') }}" method="GET">
			@csrf
			
			<input type="hidden" name="firm_id" value="{{ Request::get('firm_id') }}">
			<input type="hidden" name="liter" value="{{ Request::get('liter') }}">

			<button type="submit" class="btn btn-success mb-4" id="btn-filter">Фильтровать</button>
		</form>
	</div>
</nav>