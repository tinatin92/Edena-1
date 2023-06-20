<div class="form-group">
    {{ Form::label(trans('admin.'.$key), null, ['class' => 'control-label']) }}
    <select name="{{ $key }}[]" class="form-control select2" id="" multiple>
      
        @if(getOrganizations()->organizations_posts != '')
       
        @foreach (getOrganizations()->organizations_posts as $ke3 => $item)
      
        <option value="{{ $item->id }}"
             @if(isset($post->organizations) && in_array($item->id, $post->organizations)) 
         
            selected @endif>
           
            {{$item[app()->getlocale()]->title}}
          
        </option>
        @endforeach
        @endif
    </select>
</div>