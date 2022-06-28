
@php
$arr = array();
if ($cart) {
    foreach ($cart as $key => $value) {
        array_push($arr, $value['id']);
    } 
}
@endphp

@foreach ($products as $item)
    <x-product_component :item="$item" :arr="$arr" />
@endforeach