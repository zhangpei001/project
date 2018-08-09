$('.add').click(function(){
	var t = $(this).parents('.con').find('.vals');
	var p = $(this).parents('.con').find('.single span');
	var s = $(this).parents('.con').find('.sum span');
	t.val(parseInt(t.val())+1);
	s.html( (parseInt(t.val()) * parseFloat(p.html())).toFixed(2));
	sum();
})

$('.min').click(function(){
	var t = $(this).parents('.con').find('.vals');
	var p = $(this).parents('.con').find('.single span');
	var s = $(this).parents('.con').find('.sum span');
	t.val(parseInt(t.val())-1);
	if(t.val() <=1){
		t.val(1)
	}
	s.html( (parseInt(t.val()) * parseFloat(p.html())).toFixed(2))
	sum();
})

$('.checkgoods').click(function(){
	if($('.checkgoods:checked').length == $('.checkgoods').length){
		$('.checkAll').prop('checked',true);
		sum();
	}else{
		$('.checkAll').prop('checked',false);
		sum();
	}
})

$('.checkAll').click(function(){
	if($(this).is(':checked')){ 
		$(':checkbox').prop('checked',true);
		sum();
	}else{
		$(':checkbox').prop('checked',false);
		sum();
	}
})

function sum(){
	var total_num = 0;
	var total_price = 0;
	$('.checkgoods').each(function(){
		if($(this).is(':checked')){
			var nums = parseInt($(this).parents('.con').find('.vals').val());
			var sums = parseFloat($(this).parents('.con').find('.sum span').html());
			total_num += nums;
			total_price += sums;
		}
		$('.already span').html(total_num);
		$('.total span').html((total_price).toFixed(2))
	})
}

