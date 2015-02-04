$(document).ready(function() {
	drawDiagramme();
	var speed = 200;
	$('#text-ressource-financiere').mouseover(function(){
		$('.pie').hide().html("<li class='visualize ressource-financiere' data-color='#d9534f' data-value='80'></li><li class='visualize' data-color='rgba(0,0,0,0)' data-value='20'></li>").fadeIn(speed);
		$('.pie-content').hide().html("<div class='percentage'>80%</div><div class='name'>Financières</div>").fadeIn(speed);
		drawDiagramme();
	}).mouseleave(function(){
		$('.pie').hide().html("<li class='visualize ressource-materiel' data-color='#5cb85c' data-value='20'></li><li class='visualize ressource-financiere' data-color='#d9534f' data-value='23'></li><li class='visualize' data-value='30' data-color='rgba(0,0,0,0)'></li><li class='visualize ressource-humain' data-color='#5bc0de' data-value='27'></li>").fadeIn(speed);
		$('.pie-content').hide().html("<div class='percentage'>70%</div><div class='name'>Total</div>").fadeIn(speed);
		drawDiagramme();
	});
	$('#text-ressource-humaine').mouseover(function(){
		$('.pie').hide().html("<li class='visualize ressource-humain' data-color='#5bc0de' data-value='59'></li><li class='visualize' data-color='rgba(0,0,0,0)' data-value='41'></li>").fadeIn(speed);
		$('.pie-content').hide().html("<div class='percentage'>59%</div><div class='name'>Humaines</div>").fadeIn(speed);
		drawDiagramme();
	}).mouseleave(function(){
		$('.pie').hide().html("<li class='visualize ressource-materiel' data-color='#5cb85c' data-value='20'></li><li class='visualize ressource-financiere' data-color='#d9534f' data-value='23'></li><li class='visualize' data-value='30' data-color='rgba(0,0,0,0)'></li><li class='visualize ressource-humain' data-color='#5bc0de' data-value='27'></li>").fadeIn(speed);
		$('.pie-content').hide().html("<div class='percentage'>70%</div><div class='name'>Total</div>").fadeIn(speed);
		drawDiagramme();
	});
	$('#text-ressource-materiel').mouseover(function(){
		$('.pie').hide().html("<li class='visualize ressource-materiel' data-color='#5cb85c' data-value='32'></li><li class='visualize' data-color='rgba(0,0,0,0)' data-value='68'></li>").fadeIn(speed);
		$('.pie-content').hide().html("<div class='percentage'>32%</div><div class='name'>Matériels</div>").fadeIn(speed);
		drawDiagramme();
	}).mouseleave(function(){
		$('.pie').hide().html("<li class='visualize ressource-materiel' data-color='#5cb85c' data-value='20'></li><li class='visualize ressource-financiere' data-color='#d9534f' data-value='23'></li><li class='visualize' data-value='30' data-color='rgba(0,0,0,0)'></li><li class='visualize ressource-humain' data-color='#5bc0de' data-value='27'></li>").fadeIn(speed);
		$('.pie-content').hide().html("<div class='percentage'>70%</div><div class='name'>Total</div>").fadeIn(speed);
		drawDiagramme();
	});
	
	function drawDiagramme()
	{
		$('.pie').visualize({
			width: 150,
			height: 150,
			type: 'pie',
			legend: false
		});
	}
});