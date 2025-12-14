<div class="filter__item">
    <div class="filter__header">
        <p>{{ $property->getFullTitle() }}</p>
        <img src="/temple/images/category/str.svg" alt="str">
    </div>
    <button class="filter__clear">Очистить</button>

    <div class="filter__body">
        <div class="filter__radio">
            <div class="radio">
                <input name="agreement" id="filter_name2_1" name="name_filter" type="radio">
                <label for="filter_name2_1">
                    Любой
                </label>
            </div>
            <div class="radio">
                <input name="agreement" id="filter_name2_2" name="name_filter" type="radio">
                <label for="filter_name2_2">
                    5% и больше
                </label>
            </div>
            <div class="radio">
                <input name="agreement" id="filter_name2_3" name="name_filter" type="radio">
                <label for="filter_name2_3">
                    15% и больше
                </label>
            </div>
        </div>
    </div>
</div>
