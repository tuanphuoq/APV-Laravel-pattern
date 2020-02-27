{{-- error login  --}}
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif

{{-- error validate --}}
@if ($errors->any())
<div class="alert alert-warning">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	Vui lòng nhập đầy đủ thông tin đăng nhập !
</div>
@endif