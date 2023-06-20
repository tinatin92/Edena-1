<div class="form-group">
 
    <label data-icon="-">{{ trans('admin.'.$key) }}</label> <br>
	@if (isset($banner) && $banner->icon != '')
   
	<input type="hidden" name="old_icon" value="{{ $banner->icon }}">
	
	@endif
    <input type="file" name="icon">
	
	@if(isset($banner) && $banner->icon != '')
	<br>
	<a style="margin-top: 10px; display: block;" href="/{{config('config.icon_path').$banner->icon}}" download="{{$banner->icon}}">{{$banner->icon}}</a>
	@endif
</div> 