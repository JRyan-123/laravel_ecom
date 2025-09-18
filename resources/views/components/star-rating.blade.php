<div class="flex items-center space-x-1">
    @for ($i = 1; $i <= 5; $i++)
        @if ($i <= floor($rating))
            <i class="bi bi-star-fill text-warning"></i>
        @elseif ($i == ceil($rating) && $rating - floor($rating) >= 0.5)
            <i class="bi bi-star-half text-warning"></i>
        @else
            <i class="bi bi-star text-warning"></i>
        @endif
    @endfor

    @if ($showValue ?? false)
        <span class="ml-2 text-sm text-muted">
            {{ number_format($rating, 1) }} / 5
        </span>
    @endif

    @if (!empty($reviews))
        <span class="ml-1 text-sm text-muted">
            ({{ $reviews }} reviews)
        </span>
    @endif
</div>
