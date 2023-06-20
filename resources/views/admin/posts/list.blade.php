@extends('admin.layouts.app')

@push('name')
@endpush

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box"> 
            <div style="display: flex; align-items:center; justify-content: space-between; padding:20px 0">
                <h4 class="mt-0 header-title float-left">  @if(isset($section[app()->getlocale()]->title)){{ $section [app()->getLocale()]->title }}@endif</h4>

               
                <a href="/{{ app()->getLocale() }}/admin/section/{{ $section->id }}/posts/create" type="button"
                    class="float-right btn btn-info waves-effect width-md waves-light">{{ trans('admin.add_post') }}</a>
              
                    
            </div>
            <div class="container-fluid">      
                    <input id="gfg" type="text"  placeholder="Search here" class="post-search">
                    
                    </b>
                   
                    <table style="width: 100%">
                    
                        <tbody id="geeks" class="geeks">
                            @foreach ($posts as $post)
                            
                            <tr class="greeks-tr">
                                 <td> 
                                 
                                        <div class="card-box">
                                            <div class="dropdown float-right">
                                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    @if (count($post->submissions) > 0)
                                                    <a style="color: #35b8e0"
                                                        href="/{{ app()->getLocale() }}/admin/submissions?post_id={{ $section->post()->id }}"
                                                        class="dropdown-item">{{ trans('admin.submissions') }}</a>
                                                    @endif
                                                   
                                                    <a style="color: #35b8e0"
                                                        href="{{ route('post.edit', [app()->getLocale(), $post->id]) }}"
                                                        class="dropdown-item">{{ trans('admin.edit') }}</a>
                                                   
                                                    <a style="color: #ff3535"
                                                        href="{{ route('post.destroy', [app()->getLocale(), $post->id]) }}"
                                                        data-confirm="???????????? ???? ??? ????? ?????? ??????"
                                                        class="dropdown-item delete">{{ trans('admin.delete') }}</a>
                
                
                                                </div>
                                            </div>
                                            
                                          @if(isset(json_decode($post->locale_additional)->question ))
                                          <h4 class="header-title mt-0 ">{{json_decode($post->locale_additional)->question  }} <br></h4>
                                          @else
                                          <h4 class="header-title mt-0 ">{{$post->title }}
                                             <br>
                                        </h4>
                                        @if(in_array($section->type_id,[10]))
                                        
                                        <p style="float: right">{{ $post->date }}</p>
                                        @endif
                                          @endif
                                            @if ($post->thumb == null && isset(json_decode($post->locale_additional)->youtube_Link))
                                            <img class="img-fluid card-image"
                                                src="{{ getVideoImage(json_decode($post->locale_additional)->youtube_Link) }}"
                                                alt="Card image cap">
                                            @else
                                            @if($section->type_id == 4)
                                            
                                            @elseif (isset($post->thumb)) 
                                            @if(!in_array($section->type_id ,[ 12 ,10]))
                                            <img class="img-fluid card-image " src="/uploads/img/thumb/{{ $post->thumb }} "
                                                alt="Card image cap">
                                                @endif
                                            @else
                                            @if(!in_array($section->type_id ,[ 12, 10]))
                                            <img class="img-fluid card-image " src="/admin/images/no-image.jpg "
                                            alt="Card image cap">
                                            @endif
                                            @endif
                                            @endif
                
                                        </div>
                
                                    
                                    <div class="col-lg-12">
                                        {{ $posts->links() }}
                                    </div>
                            </td>
                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
    <script>
        $(document).ready(function() {
            $("#gfg").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#geeks tr").filter(function() {
                    $(this).toggle($(this).text()
                    .toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
<style>

.geeks{
    display: flex;
    flex-wrap: wrap;
    margin-top: 20px;
}
.greeks-tr{
    width: 32%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 1%;
}
.greeks-tr td{
    width: 100%;
    height: 100%;
    border: 1px solid #ebeff2;
    border-radius: 5px;
}
</style>
<script>
    var deleteLinks = document.querySelectorAll('.delete');

    for (var i = 0; i < deleteLinks.length; i++) {
        deleteLinks[i].addEventListener('click', function (event) {
            event.preventDefault();

            var choice = confirm(this.getAttribute('data-confirm'));

            if (choice) {
                window.location.href = this.getAttribute('href');
            }
        });
    }

</script>
@endsection
