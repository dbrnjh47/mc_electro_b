<div class="contacts__content">

    @foreach ($points as $point)
        @include('sample.main.pages.сontact.components.card')
        <x-sample.main.point.card
                                    :point="$point">
        </x-sample.main.point.card>
    @endforeach

</div>
