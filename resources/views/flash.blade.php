@if(Session::has('success'))
      <div class="alert alert-success">
          {{ Session::get('success') }}
      </div>
@endif

@if(Session::has('info'))
      <div class="alert alert-info">
          {{ Session::get('info') }}
      </div>
@endif
