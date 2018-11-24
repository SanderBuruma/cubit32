$("document").ready(function(){
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta')
		}
	})
})