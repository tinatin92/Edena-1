<div class="form-group "> 
    @if(isset($field['required']))
    
    {{ Form::label($key,  trans('admin.'.$key),  ['class' => 'control-label iconify', 'data-icon' => "-" ,  'required' ]) }}
    {{ Form::text($locale.'['.$key.']',  null,   array_merge(  ['class' => 'form-control ', 'required'  ] )) }} 
    <span class="errtext"></span>
     @else
    
     {{ Form::label($key,  trans('admin.'.$key),  ['class' => 'control-label iconify',   ]) }}
     {{ Form::text($locale.'['.$key.']',  null,   array_merge(  ['class' => 'form-control '  ])) }} 
     <span class="errtext"></span>
    
     @endif
   
 </div>
 <style>
     [data-icon]:before {
         float: right;
         color:red;
         font-size: 24px;
     }
     .errtext{
         color: red;
     }
 </style>
 