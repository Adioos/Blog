@extends('layouts.main')

@section('content')
<main class="blog-post">
    <div class="container">
        <h1 class="edica-page-title">{{ $post->title }}</h1>
        <p class="edica-blog-post-meta" data-aos-delay="200">•{{ $date->translatedFormat('F') }} • {{ $date->day }} • {{ $date->year }} • {{ $date->format('H:i') }} • {{ $post->comments->count() }} Комментарии</p>
        <section class="blog-post-featured-img" data-aos-delay="300">
            <img src="{{ asset('storage/' . $post->main_image) }}" alt="featured image" class="w-100">
        </section>
        <section class="post-content">
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    {!! $post->content !!}
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-lg-9 mx-auto">
              
                <section class="comment-section">
                    <h2 class="section-title mb-5">Leave a Reply</h2>
                    <form action="/" method="post">
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="comment" class="sr-only">Comment</label>
                                <textarea name="comment" id="comment" class="form-control" placeholder="Comment" rows="10">Comment</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4" data-aos="fade-right">
                                <label for="name" class="sr-only">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name*">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email*" required>
                            </div>
                            <div class="form-group col-md-4" data-aos="fade-left">
                                <label for="website" class="sr-only">Website</label>
                                <input type="url" name="website" id="website" class="form-control" placeholder="Website*">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <input type="submit" value="Send Message" class="btn btn-warning">
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</main>
@endsection