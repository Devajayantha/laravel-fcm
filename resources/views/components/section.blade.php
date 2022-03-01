<section class="section">
    {{ $title }}

    <div class="section-body positive">
        @include('admin.partials.loading')
        <div class="card">
            @if (isset($header))
            <div class="card-header">
                {{ $header }}
            </div>
            @endif

            <div class="card-body">
                {{ $body }}
            </div>

            <div class="card-footer text-right">
                {{ $footer }}
            </div>
    </div>
</section>