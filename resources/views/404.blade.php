
@extends("shared.layout")
@section('body')
<section id="ccr-404-error">
    <div class="error-404">
        <p class="error-msg">Error 404</p>
        <h2>Page Not Found!</h2>
        <p>Sorry! We could not found the page you are looking for! Please search below...</p>

        <form class="ccr-gallery-ttile" action="#">
            <input type="text" id="404-search" name="s" placeholder="Search here..." required>
            <button type="submit">Search</button>
        </form>

    </div>	<!-- /.error-404 -->
</section> <!-- /#ccr-404-->
@endsection

