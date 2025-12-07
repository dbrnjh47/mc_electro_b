<div class="contacts__content">

    @foreach ($points as $point)
        <x-sample.main.point.card
                                    :point="$point">
        </x-sample.main.point.card>
    @endforeach

</div>
