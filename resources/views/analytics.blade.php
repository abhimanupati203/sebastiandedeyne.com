@component('layouts.page', [
    'title' => 'Analytics',
])
    <div class="analytics">
        @foreach($weeks as $week)
            <div class="analytics__bar"
                 style="width: {{ $week->popularity }}%"
                 title="{{ $week->date->format('Y-m-d') }}"
            >
                @foreach($week->posts as $post)
                    <div class="analytics__bar__item">
                        {{ $post->title }}
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endcomponent
