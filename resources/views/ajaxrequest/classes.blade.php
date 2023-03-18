{{Form::select('id_classe', $classes->pluck('classe', 'id'), null, ['placeholder'=>"Classe", 'class'=>"form-control"])}}
