<script src="/assets/vendor/jquery/jquery.min.js"></script>

@if(config('app.env') === 'production')
    <script defer src="{{ elixir('assets/b/f.js') }}"></script>
@else
    <script defer src="/assets/vendor/bootstrap/bootstrap.js"></script>
    <script defer src="/assets/vendor/lazysizes/lazysizes.js"></script>
    <script defer src="/assets/js/frontend.js"></script>
@endif