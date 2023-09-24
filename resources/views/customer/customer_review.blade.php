@extends('layouts.fontend_master');
@section('content')
    <div class="container mt-5">
        <h2>Leave a Review</h2>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form method="POST" action="{{ route('customer.review.add') }}">
            <!-- Rating Input -->
            @csrf
            <input type="hidden" name="product_id" value="{{ $product_id }}">
            <div class="mb-3">
                <label for="rating" class="form-label">Rating:</label>
                <div class="rating-stars">
                    <input type="radio" id="star5" name="rating" value="1">
                    <label for="star5" class="star"><i class="fas fa-star"></i></label>
                    <input type="radio" id="star4" name="rating" value="2">
                    <label for="star4" class="star"><i class="fas fa-star"></i></label>
                    <input type="radio" id="star3" name="rating" value="3">
                    <label for="star3" class="star"><i class="fas fa-star"></i></label>
                    <input type="radio" id="star2" name="rating" value="4">
                    <label for="star2" class="star"><i class="fas fa-star"></i></label>
                    <input type="radio" id="star1" name="rating" value="5">
                    <label for="star1" class="star"><i class="fas fa-star"></i></label>
                    @error('rating')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Comment Input -->
            <div class="mb-3">
                <label for="comment" class="form-label">Comment (30 words max):</label>
                <textarea class="form-control" id="comment" name="comment" rows="4" placeholder="Write your review here"></textarea>
                <p><span id="word-count">0</span>/30 words</p>
                @error('comment')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary" id="submit-button">Submit Review</button>
        </form>
    </div>
@endsection

@section('fotter_scprit')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const commentTextarea = document.getElementById('comment');
        const wordCountElement = document.getElementById('word-count');

        const maxWordCount = 30;

        commentTextarea.addEventListener('input', () => {
            const wordCount = commentTextarea.value.split(/\s+/).filter(Boolean).length;
            wordCountElement.textContent = wordCount;

            if (wordCount > maxWordCount) {
                commentTextarea.classList.add('is-invalid');

            } else {
                commentTextarea.classList.remove('is-invalid');

            }
        });
    </script>
@endsection
