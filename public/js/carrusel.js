window.addEventListener('load',function(){
	new Glider(document.querySelector('.carousel__lista'),{
		slidesToShow: 2,
		slidesToScroll: 2,
		dots: '.carousel__indicadores',
		arrows: {
		  prev: '.carousel__anterior',
		  next: '.carousel__siguiente'
		}
	});
});

window.addEventListener('load',function(){
	new Glider(document.querySelector('.carousel__lista2'),{
		slidesToShow: 2,
		slidesToScroll: 2,
		dots: '.carousel__indicadores2',
		arrows: {
		  prev: '.carousel__anterior2',
		  next: '.carousel__siguiente2'
		}
	});
});

window.addEventListener('load',function(){
	new Glider(document.querySelector('.carousel__lista3'),{
		slidesToShow: 2,
		slidesToScroll: 2,
		dots: '.carousel__indicadores3',
		arrows: {
		  prev: '.carousel__anterior3',
		  next: '.carousel__siguiente3'
		}
	});
});