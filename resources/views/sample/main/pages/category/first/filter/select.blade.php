<div class="filter__item">
    <div class="filter__header">
        <p>{{ $property->getFullTitle() }}</p>
        <img src="/temple/images/category/str.svg" alt="str">
    </div>
    <button class="filter__clear">Очистить</button>

    <div class="filter__body select2_sample_more" data-property-id="{{ $property->id }}">
        <select class="select2_custom off_select2" name="filter_{{ $property->id }}">
            <option value="" selected="">Все</option>
            @foreach ($property->values as $value)
                <option value="{{ $value->id }}" data-count="{{ $value->product_count }}">{{ ($value->getVal($property)) }}</option>
            @endforeach
        </select>
    </div>
</div>
