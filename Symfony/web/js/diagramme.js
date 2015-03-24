$(document).ready(function() {
	drawDiagramme();
	var speed = 200;

	var pourcentageFinancier = $('#pourcentage').attr('data-financier');
	var pourcentageBenevole = $('#pourcentage').attr('data-benevole');
	var pourcentageMateriel = $('#pourcentage').attr('data-materiel');
	var pourcentageCommunication = $('#pourcentage').attr('data-communication');
	var pourcentageTotal = $('#pourcentage').attr('data');

	$('#text-ressource-financiere').mouseenter(function(){
		$('.pie').hide().html("<li class='visualize ressource-financiere' data-color='#d9534f' data-value='"+pourcentageFinancier+"'></li><li class='visualize' data-color='rgba(0,0,0,0)' data-value='"+(100 - pourcentageFinancier)+"'></li>").fadeIn(speed);
		$('.pie-content').hide().html("<div class='percentage'>"+pourcentageFinancier+"%</div><div class='name'>Financières</div>").fadeIn(speed);
		drawDiagramme();
	}).mouseleave(function(){
		$('.pie').hide().html("<li class='visualize ressource-materiel' data-color='#5cb85c' data-value='"+pourcentageMateriel+"'></li><li class='visualize ressource-financiere' data-color='#d9534f' data-value='"+pourcentageFinancier+"'></li><li class='visualize' data-value='"+( 100 - pourcentageTotal)+"' data-color='rgba(0,0,0,0)'></li><li class='visualize ressource-humain' data-color='#5bc0de' data-value='"+pourcentageBenevole+"'></li>").fadeIn(speed);
		$('.pie-content').hide().html("<div class='percentage'>"+pourcentageTotal+"%</div><div class='name'>Ressources</div>").fadeIn(speed);
		drawDiagramme();
	});

	$('#text-ressource-humaine').mouseenter(function(){
		$('.pie').hide().html("<li class='visualize ressource-humaine' data-color='#5bc0de' data-value='"+pourcentageBenevole+"'></li><li class='visualize' data-color='rgba(0,0,0,0)' data-value='"+(100 - pourcentageBenevole)+"'></li>").fadeIn(speed);
		$('.pie-content').hide().html("<div class='percentage'>"+pourcentageBenevole+"%</div><div class='name'>Humaines</div>").fadeIn(speed);
		drawDiagramme();
	}).mouseleave(function(){
		$('.pie').hide().html("<li class='visualize ressource-materiel' data-color='#5cb85c' data-value='"+pourcentageMateriel+"'></li><li class='visualize ressource-financiere' data-color='#d9534f' data-value='"+pourcentageFinancier+"'></li><li class='visualize' data-value='"+(100 - pourcentageTotal)+"' data-color='rgba(0,0,0,0)'></li><li class='visualize ressource-humain' data-color='#5bc0de' data-value='"+pourcentageBenevole+"'></li>").fadeIn(speed);
		$('.pie-content').hide().html("<div class='percentage'>"+pourcentageTotal+"%</div><div class='name'>Ressources</div>").fadeIn(speed);
		drawDiagramme();
	});

	$('#text-ressource-materiel').mouseenter(function(){
		$('.pie').hide().html("<li class='visualize ressource-humaine' data-color='#5cb85c' data-value='"+pourcentageMateriel+"'></li><li class='visualize' data-color='rgba(0,0,0,0)' data-value='"+(100 - pourcentageMateriel)+"'></li>").fadeIn(speed);
		$('.pie-content').hide().html("<div class='percentage'>"+pourcentageMateriel+"%</div><div class='name'>Matérielles</div>").fadeIn(speed);
		drawDiagramme();
	}).mouseleave(function(){
		$('.pie').hide().html("<li class='visualize ressource-materiel' data-color='#5cb85c' data-value='"+pourcentageMateriel+"'></li><li class='visualize ressource-financiere' data-color='#d9534f' data-value='"+pourcentageFinancier+"'></li><li class='visualize' data-value='"+(100 - pourcentageTotal)+"' data-color='rgba(0,0,0,0)'></li><li class='visualize ressource-humain' data-color='#5bc0de' data-value='"+pourcentageBenevole+"'></li>").fadeIn(speed);
		$('.pie-content').hide().html("<div class='percentage'>"+pourcentageTotal+"%</div><div class='name'>Ressources</div>").fadeIn(speed);
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