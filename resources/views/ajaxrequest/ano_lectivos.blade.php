{{Form::select('id_ano_lectivo', $ano_lectivos->pluck('ano', 'id'), null, ['placeholder'=>"Ano Lectivo", 'class'=>"form-control"])}}
