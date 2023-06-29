@if (isset($section->fields['trans']) && count($section->fields['trans']) > 0)
    <ul class="nav nav-tabs">
        
        @foreach (config('app.locales') as $locale)
        <li class="nav-item ">
            <a href="#locale-{{ $locale }}" data-toggle="tab" aria-expanded="false" class="nav-link @if($locale == app()->getLocale()) active @endif">
                <span class="d-none d-sm-block">{{ trans('admin.locale_'.$locale) }}</span>            
            </a>
        </li>
        @endforeach
            
    </ul>
    <div class="tab-content">
        @foreach (config('app.locales') as $locale)
        <div role="tabpanel" class="tab-pane fade @if($locale == app()->getLocale()) active show @endif " id="locale-{{ $locale }}">
            @foreach ($section->fields['trans'] as $key => $field)
                @include('admin.form-controllers.trans.'.$field['type'])
            @endforeach
        </div>
        @endforeach
    </div> 

    
@endif
@if (isset($section->fields['nonTrans']) && count($section->fields['nonTrans']) > 0)        
    @foreach ($section->fields['nonTrans'] as $key => $field)
        @include('admin.form-controllers.nonTrans.'.$field['type'])
    @endforeach 
@endif             
                
            
 {{-- <div class="form-group">
    {{ Form::text($key, null, array_merge(['class' => 'form-control', 'placeholder' => "dd/mm/yyyy", 'id' => "timepicker3"])) }}
</div>  --}}

@if(!in_array($section->type_id, [7, 10, 12 , 11, 8  , 3 , 9 ]))
<div class="form-group"> 
    <input type="hidden" value="0" name="active_on_home"> 
    <input type="checkbox" value="1" name="active_on_home" @if (isset($post) && $post->active_on_home != 0) checked @endif> 
    <label for="">{{trans('admin.show_on_home_page')}}</label> 
</div> 
@endif

<div class="form-group text-right mb-0">
    <a href="{{ route('post.list', ['sec' => $section->id, 'locale' => app()->getLocale()]) }}" type="button"
        class="btn btn-info waves-effect width-md waves-light">Go Back</a>
    <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
        {{ trans('admin.save') }}
    </button>
   
     
</div>
                