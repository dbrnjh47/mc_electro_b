<div class="filter__item">
    <div class="filter__header">
        <p>{{ $property->getFullTitle() }}</p>
        <img src="/temple/images/category/str.svg" alt="str">
    </div>
    <button class="filter__clear">Очистить</button>

    <div class="filter__body" data-property-id="{{ $property->id }}">
        <div class="filter__checkbox">
            @foreach ($property->values as $value)
            <div class="checkbox">
                <input name="filter_" id="filter_{{ $property->id }}_{{ $value->id }}" value="{{ $value->id }}" type="checkbox">
                <label for="filter_{{ $property->id }}_{{ $value->id }}">
                    {{ $value->getVal($property) }}<sup>{{ $value->product_count }}</sup>
                </label>
            </div>
            @endforeach
        </div>
    </div>
</div>
