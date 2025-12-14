<div class="filter__item open">
    <div class="filter__header">
        <p>{{ $property->getFullTitle() }}</p>
        <img src="/temple/images/category/str.svg" alt="str">
    </div>
    <button class="filter__clear">Очистить</button>
    <div class="filter__body ion_rangeslider__body" data-property-id="{{ $property->id }}">
        <div class="filter__range_inputs">
            <input type="number" name="min" placeholder="0000" class="input">
            <span>–</span>
            <input type="number" name="max" placeholder="0000" class="input">
        </div>
        <div class="filter__range">
            <input class="ion_rangeslider" type="text" />
        </div>
    </div>
</div>
