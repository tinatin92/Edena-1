<ul class="nav nav-tabs">

    @foreach (config('app.locales') as $locale)
    <li class="nav-item ">
        <a href="#locale-{{ $locale }}" data-toggle="tab" aria-expanded="false"
            class="nav-link @if($locale == app()->getLocale()) active @endif">
            <span class="d-none d-sm-block">{{ trans('admin.locale_'.$locale) }}</span>
        </a>
    </li>
    @endforeach

</ul>
<div class="tab-content">
    @foreach (config('app.locales') as $locale)

    <div role="tabpanel" class="tab-pane fade @if($locale == app()->getLocale()) active show @endif "
        id="locale-{{ $locale }}">

        <div class="form-group">

            {{ Form::label(trans('admin.title'), null, ['class' => 'control-label']) }}
            {{ Form::text($locale.'[title]',  $directory->title ?? null, array_merge(['class' => 'form-control'])) }}

        </div>
        <div class="form-group">

            {{ Form::label(trans('admin.Link'), null, ['class' => 'control-label']) }}
            {{ Form::text($locale.'[slug]',  $directory->slug ?? null, array_merge(['class' => 'form-control'])) }}

        </div>

    </div>
    @endforeach
</div>
<br>
<div class="form-group">
    {{ Form::label(trans('admin.home_page_category_cover'), null, ['class' => 'control-label']) }}
    {{ Form::file('cover') }}

    @if(isset($directory->cover) && ($directory->cover != ''))
    <div class="col-md-8 dfie d-flex">
        <img src="{{ image($directory->cover) }}" alt="img" style="width: 25%">

        <span class="delete-file" data-id="{{$directory->id}}" data-token="{{ csrf_token() }}"
            data-route="/{{ app()->getLocale() }}/directory/{{ $directory->id }}/delete-image"
            delete="{{$directory->cover}}">X</span>
    </div>
    @endif
</div>


<div class="form-group text-right mb-0">
    <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
        {{ trans('admin.save') }}
    </button>
</div>
@push('scripts')
<script>
    $(document).ready(function () {
        // Delete file
        $('.delete-file').click(function (e) {
            e.preventDefault();
            var directoryId = $(this).data('id');
            var token = $(this).data('token');
            var route = $(this).data('route');
            if (confirm('Are you sure you want to delete the image?')) {
                $.ajax({
                    url: route,
                    type: 'POST',
                    data: {
                        _method: 'DELETE',
                        _token: token,
                        directory_id: directoryId
                    },
                    success: function (data) {
                        // Remove image from DOM
                        $('.delete-file[data-id=' + directoryId + ']').closest('.dfie')
                            .remove();
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            }
        });
    });

</script>
@endpush
