@php
    $propertyValueModel = new \App\Models\Property\PropertyValue();
    $propertyValueModel->number = $property->min_value;
    $min = $propertyValueModel->proccessUnit($property->unit_rule_value, $property->unit_rule_action);

    $propertyValueModel->number = $property->max_value;
    $max = $propertyValueModel->proccessUnit($property->unit_rule_value, $property->unit_rule_action);
@endphp

<div class="filter__item open">
    <div class="filter__header">
        <p>{{ $property->getFullTitle() }}</p>
        <img src="/temple/images/category/str.svg" alt="str">
    </div>
    <button class="filter__clear">Очистить</button>
    <div class="filter__body ion_rangeslider__body" data-property-id="{{ $property->id }}">
        <div class="filter__range_inputs">
            <input type="text" name="min" placeholder="От {{ $min }}" class="input">
            <span>–</span>
            <input type="text" name="max" placeholder="До {{ $max }}" class="input">
        </div>
        <div class="filter__range">
            <input class="ion_rangeslider" type="text" data-step="0.1" data-min="{{ $min }}" data-max="{{$max}}" />
        </div>
    </div>
</div>
