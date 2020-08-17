@section('title', 'Test')

<div class="px-4 sm:px-6 lg:px-8">
    @unless (is_null($questionIndex))
        @include('test.questions')
    @else
        @include('test.splash')
    @endunless
</div>
