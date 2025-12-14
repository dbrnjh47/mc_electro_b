<div class="filter__item">
    <div class="filter__header">
        <p>{{ $property->getFullTitle() }}</p>
        <img src="/temple/images/category/str.svg" alt="str">
    </div>
    <button class="filter__clear">Очистить</button>

    <div class="filter__body select2_more select2_sample_more">
        <select class="select2_custom" name="lang">
            <option value="" selected="">Все</option>
            <option value="1">Руский</option>
            <option value="2">Китайский</option>
            <option value="3">Английский</option>

        </select>
        <div class="select2_more__list">

        </div>
    </div>
</div>
