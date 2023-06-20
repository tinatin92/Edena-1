<div class="form-group">
    {{ Form::label(trans('admin.'.$key), null, ['class' => 'control-label']) }}

    <select name="{{ $key }}" class="form-control select2" >
        @foreach (getCategory()->category as $key => $item)
        <option value="{{ $item->id }}" @if(isset($post->category) &&
    
            ($item->id == $post->category)) selected

            @endif>{{$item->title}}</option>
        @endforeach
    </select>
</div>