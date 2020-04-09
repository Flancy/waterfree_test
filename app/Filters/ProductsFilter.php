<?php

namespace App\Filters;

class ProductsFilter extends QueryFilter {
    
    public function liter($liter) {
        return $this->builder->where('liter', $liter);
    }

    public function city_id($city_id) {
        return $this->builder->whereIn('city_id', $this->paramToArray($city_id));
    }

    public function firm_id($firm_id) {
        return $this->builder->whereIn('firm_id', $this->paramToArray($firm_id));
    }

    public function search($keyword) {
        return $this->builder->where('name', 'like', '%'.$keyword.'%');
    }

    public function price($order = 'asc') {
        return $this->builder->orderBy('price', $order);
    }
}
