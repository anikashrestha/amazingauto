<div class = "form-group">
        {{Form::date($name,null,['class'=>'control-label'])}}
        {{Form::text($name,new Date\time(),array_merge(['class' => 'form-control'], $attributes))}}
        
        </div>